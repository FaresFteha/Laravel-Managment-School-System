<?php

namespace App\Http\Controllers\Teachers\dashbores;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Degree;
use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class StudentsController extends Controller
{
    use WithPagination;

    public function index()
    {
        $ids = Teacher::findorfail(auth()->user()->id)->Sections()->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        return view('pages.Teachers.dashboaed.students.index', compact('students'));
    }

    public function attendanceStudents($id)
    {
        $ids = Teacher::findorfail(auth()->user()->id)->Sections()->pluck('section_id');
        $students = Student::where('section_id' , $id)->paginate(10);
        if ($students->isEmpty()) {
            # code...
            toastr()->error(trans('لا يوجد طلاب في القسم حاليا'));
            return redirect()->back();
        }else{
            return view('pages.Teachers.dashboaed.Sections.Attendance', compact('students'));
        }
    }

    public function Sections()
    {
        $ids = Teacher::findorfail(auth()->user()->id)->Sections()->pluck('section_id');
        $sections = Section::whereIn('id', $ids)->paginate(10);
        return view('pages.Teachers.dashboaed.Sections.index', compact('sections'));
    }

    public function students($id){
        $ids = Teacher::findorfail(auth()->user()->id)->Sections()->pluck('section_id');
        $students = Student::where('section_id' , $id)->paginate(10);
        if ($students->isEmpty()) {
            # code...
            toastr()->error(trans('لا يوجد طلاب في القسم حاليا'));
            return redirect()->back();
        }else{
            return view('pages.Teachers.dashboaed.Sections.Studentslist', compact('students'));
        }
       
    }

    public function Attendance(Request $request)
    {

        try {

            $date = date('Y-m-d');
            foreach ($request->attendences as $student_id => $attendences) {

                if ($attendences == 'presence') {
                    $attendence_status = true;
                } else if ($attendences == 'absent') {
                    $attendence_status = false;
                }


                Attendance::updateOrCreate([
                    
                    'student_id' => $student_id,
                    'attendance_date' => $date

                ], [
                    'student_id' => $student_id,
                    'Grade_id' => $request->grade_id,
                    'Classroom_id' => $request->classroom_id,
                    'section_id' => $request->section_id,
                    'teacher_id' =>  auth()->user()->id,
                    'attendance_date' =>  $date,
                    'attendance_status' => $attendence_status
                ]);
            }

            toastr()->success(trans('meesageop.success'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function Reports()
    {
        //  $ids = Teacher::findorfail(auth()->user()->id)->Sections()->pluck('section_id');
        $ids = DB::table('teacher__sections')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        return view('pages.Teachers.dashboaed.students.attendance_report', compact('students'));
    }
    public function reportsExams()
    {
        $ids = DB::table('teacher__sections')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        $id = auth()->user()->id;
        $Quizzes = Quizze::where('Teacher_id',  $id)->get();
        return view('pages.Teachers.dashboaed.students.exams_report', compact('students' , 'Quizzes'));
    }

    public function ReportsSearch(Request $request)
    {

        $request->validate(
            [
                'from'  => 'required|date|date_format:Y-m-d',
                'to' => 'required|date|date_format:Y-m-d|after_or_equal:from'

            ],

            [
                'from.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',

                'to.after_or_equal' => 'تاريخ النهاية لابد ان يكون اكبر من تاريخ البداية او يساويه',

                'to.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
            ]
        );

        $ids = DB::table('teacher__sections')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();


        if ($request->student_id == 0) {
            # code...
            $Students = Attendance::whereBetween('attendance_date', [$request->from, $request->to])->get();
            return  view('pages.Teachers.dashboaed.students.attendance_report', compact('Students', 'students'));
        } else {
            $Students = Attendance::whereBetween('attendance_date', [$request->from, $request->to])
                ->where('student_id', $request->student_id)->get();
            return  view('pages.Teachers.dashboaed.students.attendance_report', compact('Students', 'students'));
        }
    }

    public function reportsSearchExam(Request $request)
    {
        $ids = DB::table('teacher__sections')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        $id = auth()->user()->id;
        $Quizzes = Quizze::where('Teacher_id',  $id)->get();

        if ($request->student_id == 0) {
            # code...
            $Students = Degree::where('quizze_id', $request->quizze_id)->get();
            return  view('pages.Teachers.dashboaed.students.exams_report', compact('Students', 'students' , 'Quizzes'));
        } else {
            $Students = Degree::where('student_id', $request->student_id)
                ->where('quizze_id', $request->quizze_id)->get();
            return  view('pages.Teachers.dashboaed.students.exams_report', compact('Students', 'students' , 'Quizzes'));
        }
    }

    /*
    public function AttendanceEdite(Request $request)
    {

        try{
            $date = date('Y-m-d');
            $student_id = Attendance::where('attendance_date',date('Y-m-d'))->where('student_id',$request->id)->first();
            if( $request->attendences == 'presence' ) {
                $attendence_status = true;
            } else if( $request->attendences == 'absent' ){
                $attendence_status = false;
            }
            $student_id->update([
                'attendance_status'=> $attendence_status
            ]);
            toastr()->success(trans('meesageop.Update'));
            return redirect()->back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        */
}
