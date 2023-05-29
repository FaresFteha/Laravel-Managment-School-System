<?php
namespace App\Repository;
use App\RepositoryInterface\StudentsAvaregeRepositoryInterface;
use App\Models\AcademicYear;
use App\Models\AvaregeMark;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\StudentAverage;
use App\Models\Subject;
class StudentsAvaregeRepository implements StudentsAvaregeRepositoryInterface
{
    public function index()
    {

        $Grades = Grade::with(['Sections'])->get();
        $list_Grades = Grade::all();
        return view('pages.Students.StudentsAvarege.index', compact('Grades', 'list_Grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['students'] = Student::all();
        $data['grades'] = Grade::all();
        $data['classrooms'] = Classroom::all();
        $data['sections'] = Section::all();
        $data['subjects'] = Subject::all();
        $data['academic_years'] = AcademicYear::all();


        return view('pages.Students.StudentsAvarege.create',  $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        //
        $request->validated();
        try {
            //code...
            $avargStudent = new StudentAverage();
            $avargStudent->Student_id = $request->Student_id;
            $avargStudent->Grade_id = $request->Grade_id;
            $avargStudent->Classroom_id = $request->Classroom_id;
            $avargStudent->Section_id = $request->Section_id;


            $avargStudent->Subject_id = $request->Subject_id;
            $avargStudent->monthly_exam = $request->monthlyexam;
            $avargStudent->school_year_work = $request->schoolyearwork;
            $avargStudent->end_of_term_exam = $request->endoftermexam;
            $avargStudent->mark = $request->mark;

            $avargStudent->Academic_id = $request->academic_year;
            $avargStudent->semester = $request->semester;

            $avargStudent->save();

            toastr()->success(trans('meesageop.success'));
            return redirect()->route('StudentsAvarege.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $StudentAverage = Student::where('Section_id', $id)->get();
        return view('pages.Students.StudentsAvarege.show', compact('StudentAverage'));
    }

    public function mark_show($id)
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
            return redirect()->route('StudentsAvarege.index');
        } else {
            return view('pages.Students.StudentsAvarege.mark_show', compact('StudentAverage', 'StudentAc', 'studentMark1', 'studentMark2', 'semester1', 'avg', 'avg2'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $StudentAverage = StudentAverage::findorfail($id);
        $data['students'] = Student::all();
        $data['grades'] = Grade::all();
        $data['classrooms'] = Classroom::all();
        $data['sections'] = Section::all();
        $data['subjects'] = Subject::all();
        $data['academic_years'] = AcademicYear::all();
        return view('pages.Students.StudentsAvarege.edit', $data, compact('StudentAverage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        //
        //
        $request->validated();
        try {
            //code...
            $avargStudent = StudentAverage::findorfail($id);
            $avargStudent->Student_id = $request->Student_id;
            $avargStudent->Grade_id = $request->Grade_id;
            $avargStudent->Classroom_id = $request->Classroom_id;
            $avargStudent->Section_id = $request->section_id;


            $avargStudent->Subject_id = $request->Subject_id;
            $avargStudent->monthly_exam = $request->monthlyexam;
            $avargStudent->school_year_work = $request->schoolyearwork;
            $avargStudent->end_of_term_exam = $request->endoftermexam;
            $avargStudent->mark = $request->mark;

            $avargStudent->Academic_id = $request->Academic_id;
            $avargStudent->semester = $request->semester;

            $avargStudent->save();

            toastr()->success(trans('meesageop.success'));
            return redirect()->route('StudentsAvarege.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($request)
    {
        //
        StudentAverage::destroy($request->id);
        toastr()->error(trans('meesageop.Delete'));
        return redirect()->route('StudentsAvarege.index');
    }

    public function avaregeMarksCreate($id)
    {
        $studentGet = StudentAverage::where('Student_id', $id)->first();
        if (!$studentGet) {
            toastr()->error(trans('students_trans.Mark_show'));
            return redirect()->route('StudentsAvarege.index');
        }
        return view('pages.Students.StudentsAvarege.calculateAvarege', compact('studentGet'));
    }
}
