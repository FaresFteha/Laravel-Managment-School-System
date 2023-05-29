<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\AvaregeMark;
use App\Models\Exams;
use App\Models\Library;
use App\Models\OnlineClasse;
use App\Models\StudentAverage;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class StudentdashboardController extends Controller
{
    //
    use WithPagination;
    public function semesterMarks(){
        $id = auth()->user()->id;
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
            
        // if ($StudentAverage->isEmpty()) {
        //     toastr()->error(trans('students_trans.Mark_show'));
        //     return redirect()->route('Home.Student');
        // } else {
            return view('pages.Students.dashboard.exams.showmark', compact('StudentAverage', 'StudentAc', 'studentMark1', 'studentMark2', 'semester1', 'avg', 'avg2'));
        // }
    }

    public function Avareg(){
        $studentGet = auth()->user()->name;
        return view('pages.Students.dashboard.exams.calculateAvarege', compact('studentGet'));

    }

    public function examsSchedule(){
        $id =  auth()->user()->Grade_id;
        $examsschedule = Exams::where('grade_id' , $id)->get();
        return view('pages.Students.dashboard.exams.examsSchedule', compact('examsschedule'));
    }

    public function books(){
        $id =  auth()->user()->Grade_id;
        $books = Library::where('grade_id' , $id)
        ->paginate(10);
        return view('pages.Students.dashboard.books.books', compact('books'));
    }

    public function zooms(){

        $Grade_id=  auth()->user()->Grade_id;
        $section_id =  auth()->user()->section_id;
        $online_classes = OnlineClasse::where('Grade_id' , $Grade_id)
        ->where('section_id' , $section_id )
        ->paginate(10);
        return view('pages.Students.dashboard.Zoom.zoom', compact('online_classes'));
    }

    public function downloadAttachment($filename){
        return response()->download(public_path('attachments/library/'.$filename));
    }
}
