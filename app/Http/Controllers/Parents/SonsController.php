<?php

namespace App\Http\Controllers\Parents;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Attendance;
use App\Models\AvaregeMark;
use App\Models\Degree;
use App\Models\Fee_invoice;
use App\Models\myparent;
use App\Models\ReceiptStudent;
use App\Models\Student;
use App\Models\StudentAcounnt;
use App\Models\StudentAverage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\Parent_;

class SonsController extends Controller
{
    use WithPagination;
    public function index()
    {
        $Sons = Student::where('parent_id', Auth::user()->id)->paginate(10);
        return view('pages.Parents.Sons.index', compact('Sons'));
    }

    public function results($id)
    {
        $students = Student::findOrfail($id);
        if ($students->parent_id !== Auth::user()->id) {
            toastr()->error('يوجد خطا في كود الطالب');
            return redirect()->route('Sons.index');
        } else {
            $degrees = Degree::where('student_id', $id)->get();
            if ($degrees->isEmpty()) {
                toastr()->error('لا توجد نتائج لهذا الطالب');
                return redirect()->route('Sons.index');
            }
            return view('pages.Parents.Degrees.degree', compact('degrees'));
        }
    }

    public function showYear($id)
    {
        $StudentAverage = StudentAverage::where('Student_id', $id)->get();
        $StudentAc = AcademicYear::with(['academicyears'])->get();
        /* علامات المواد في الفصل الدراسي الاول */
        $semester1 = StudentAverage::where('Student_id', $id)->first();
        // /* علامات المواد في الفصل الدراسي الثاني */
        // $semester2 = StudentAverage::where('semester' , '2')
        // ->where('Student_id' , $id)->get();
        /* المواد المتبقية في الفصل الدراسي الاول */
        $studentMark1 = StudentAverage::where('semester', '1')
            ->where('Student_id', $id)
            ->whereBetween('mark', ['0', '49'])->get();

        /* المواد المتبقية في الفصل الدراسي الثاني */
        $studentMark2 = StudentAverage::where('semester', '2')
            ->where('Student_id', $id)
            ->whereBetween('mark', ['0', '49'])->get();


        $avg = AvaregeMark::where('semester', '1')
            ->where('Student_id', $id)->first();
        $avg2 = AvaregeMark::where('semester', '2')
            ->where('Student_id', $id)->first();
            
        if ($StudentAverage->isEmpty()) {
            toastr()->error(trans('students_trans.Mark_show'));
            return redirect()->route('Sons.index');
        } else {
            return view('pages.Parents.Degrees.showmark', compact('StudentAverage', 'StudentAc', 'studentMark1', 'studentMark2', 'semester1', 'avg', 'avg2'));
        }
    }

    public function resultsExam($id)
    {
        $students = Student::findOrfail($id);
        if ($students->parent_id !== Auth::user()->id) {
            toastr()->error('يوجد خطا في كود الطالب');
            return redirect()->route('Sons.index');
        } else {
            $degrees = Degree::where('student_id', $id)->get();
            if ($degrees->isEmpty()) {
                toastr()->error('لا توجد نتائج لهذا الطالب');
                return redirect()->route('Sons.index');
            }
            return view('pages.Parents.Degrees.degree', compact('degrees'));
        }
    }

    public function attendances()
    {
        $students = Student::where('parent_id', Auth::user()->id)->get();
        return view('pages.Parents.Attendances.index', compact('students'));
    }

    public function attendancesSearch(Request $request)
    {
        $request->validate([
            'from' => 'required|date|date_format:Y-m-d',
            'to' => 'required|date|date_format:Y-m-d|after_or_equal:from'
        ], [
            'to.after_or_equal' => 'تاريخ النهاية لابد ان اكبر من تاريخ البداية او يساويه',
            'from.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
            'to.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
        ]);

        $ids = DB::table('teacher__sections')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        if ($request->student_id == 0) {

            $Students = Attendance::whereBetween('attendance_date', [$request->from, $request->to])->get();
            return view('pages.Parents.Attendances.index', compact('Students', 'students'));
        } else {

            $Students = Attendance::whereBetween('attendance_date', [$request->from, $request->to])
                ->where('student_id', $request->student_id)->get();
            return view('pages.Parents.Attendances.index', compact('Students', 'students'));
        }
    }

    public function Fees()
    {
        $students_Ids = Student::where('parent_id', Auth::user()->id)->pluck('id');
        $Fee_invoices = Fee_invoice::whereIn('student_id', $students_Ids)->get();
        return view('pages.Parents.Fees.index', compact('Fee_invoices'));
    }

    public function accounts_Statment_show()
    {
        $students_Ids = Student::where('parent_id', Auth::user()->id)->pluck('id');
        $Fee_invoices = Fee_invoice::whereIn('student_id', $students_Ids)->get();
        return view('pages.Parents.Fees.index', compact('Fee_invoices'));
    }

    
    public function accounts_Statment($id)
    {
        $Fee_invoice = Fee_invoice::where('student_id', $id)->first();
        $receipt_students = ReceiptStudent::where('student_id', $id)->paginate(5);
        $student_acounnts = StudentAcounnt::where('student_id', $id)->get();
        if ($student_acounnts->isEmpty()) {
            toastr()->error(trans('Invoice_Accoints_trans.Fees_toaster'));
            return redirect()->route('Sons.Fees');
        } else {
            return view('pages.Parents.Fees.Account_statment', compact('receipt_students', 'Fee_invoice', 'student_acounnts'));
        }

    }
    public function receipt($id)
    {
        $students = Student::findOrfail($id);
        if ($students->parent_id !== Auth::user()->id) {
            toastr()->error(trans('parent_trans.studentcode'));
            return redirect()->route('Sons.Fees');
        } else {
            $receipt_students = ReceiptStudent::where('student_id', $id)->get();
            if ($receipt_students->isEmpty()) {
                toastr()->error(trans('parent_trans.nopayments'));
                return redirect()->route('Sons.Fees');
            }
            return view('pages.Parents.Receipt.recepit', compact('receipt_students'));
        }
    }

    public function profile()
    {
        $information = myparent::findOrfail(Auth::user()->id);
        return view('pages.Parents.Profile.update', compact('information'));
    }

    public function profileUpdate(Request $request, $id)
    {
        $information = myparent::findorFail($id);

        if (!empty($request->password)) {
            $information->Name_Father = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $information->password = Hash::make($request->password);
            $information->save();
        } else {
            $information->Name_Father = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $information->save();
        }
        toastr()->success(trans('meesageop.success'));
        return redirect()->back();
    }
}
