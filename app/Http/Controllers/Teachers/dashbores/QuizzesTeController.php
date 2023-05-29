<?php

namespace App\Http\Controllers\Teachers\dashbores;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizzesRequest;
use App\Models\Classroom;
use App\Models\Degree;
use App\Models\Grade;
use App\Models\Question;
use App\Models\Quizze;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class QuizzesTeController extends Controller
{
    use WithPagination;
    public function index() 
    {
        $Quizze = Quizze::where('teacher_id' , auth()->user()->id )->paginate(10);
        return view('pages.Teachers.dashboaed.Quizzes.index', compact('Quizze'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::where('teacher_id' , auth()->user()->id)->get();
        return view('pages.Teachers.dashboaed.Quizzes.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizzesRequest $request)
    {
        try {
            //code...
            $Quizzes = new Quizze();
            $Quizzes->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Quizzes->Grade_id = $request->Grade_id;
            $Quizzes->Classroom_id = $request->Classroom_id;
            $Quizzes->Section_id = $request->section_id;
            $Quizzes->Teacher_id =  auth()->user()->id;
            $Quizzes->Subject_id = $request->Subject_id;
            $Quizzes->save();
            toastr()->success(trans('meesageop.success'));
          return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
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
        $questions = Question::where('quizze_id' , $id)->get();
        $quizz = Quizze::findorFail($id);
        return view('pages.Teachers.dashboaed.Questions.index' , compact('questions' , 'quizz'));
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
        $quizz = Quizze::findorFail($id);
        $data['grades'] = Grade::all();
        $data['subjects'] =Subject::where('teacher_id' , auth()->user()->id)->get();
        return view('pages.Teachers.dashboaed.Quizzes.edit', $data, compact('quizz'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizzesRequest $request)
    {
        try {
            //code...
            $Quizzes = Quizze::findorFail($request->id);
            $Quizzes->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Quizzes->Grade_id = $request->Grade_id;
            $Quizzes->Classroom_id = $request->Classroom_id;
            $Quizzes->Section_id = $request->section_id;
            $Quizzes->Teacher_id = auth()->user()->id;
            $Quizzes->Subject_id = $request->Subject_id;
            $Quizzes->save();
            toastr()->success(trans('meesageop.success'));
            return redirect()->route('quizzes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try {
            //code...
            Quizze::destroy($request->id);
            toastr()->error(trans('meesageop.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function student_quizze($quizze_id)
    {
        $degrees = Degree::where('quizze_id', $quizze_id)->get();
        return view('pages.Teachers.dashboaed.Quizzes.student_quizze', compact('degrees'));
    }

    public function repeat_quizze(Request $request)
    {
        Degree::where('student_id', $request->student_id)->where('quizze_id', $request->quizze_id)->delete();
        toastr()->success(trans('students_trans.opened'));
        return redirect()->back();
    }
  
  
}
