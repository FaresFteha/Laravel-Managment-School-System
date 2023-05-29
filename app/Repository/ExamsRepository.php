<?php

namespace App\Repository;

use App\Models\Exams;
use App\Models\Grade;
use App\Models\Subject;
use App\RepositoryInterface\ExamsRepositoryInterface;

class ExamsRepository implements ExamsRepositoryInterface
{

    public function index()
    {
        $Grades = Grade::with(['Exams'])->get();
        $list_Grades = Grade::all();
        return view('pages.Exams.Sections', compact('Grades', 'list_Grades'));
    }

    public function create()
    {
        $grades = Grade::get();
        $subj = Subject::get();
        return view('pages.Exams.create', compact('grades', 'subj'));
    }

    public function store($request)
    {
        $request->validated();
        try {
            $exams = new Exams();
            $exams->Subject_id =  $request->Subject_id;
            $exams->term = $request->term;
            $exams->academic_year = $request->academic_year;

            $exams->exam_duration = $request->exam_duration;
            $exams->start_exam = $request->start_exam;
            $exams->exam_time = $request->exam_time;
            $exams->day_exam = ['en' => $request->day_exam_en, 'ar' => $request->day_exam_ar];
            $exams->grade_id  = $request->grade_id;
            $exams->save();
            toastr()->success(trans('meesageop.success'));
            return redirect()->route('Exams.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $exam = Exams::findorfail($id);
        $subj = Subject::all();
        $grades = Grade::all();
        return view('pages.Exams.edit', compact('exam', 'subj',  'grades'));
    }

    public function update($request)
    {
        $request->validated();
        try {
            $exams = Exams::findorfail($request->id);
            $exams->Subject_id =  $request->Subject_id;
            $exams->term = $request->term;
            $exams->academic_year = $request->academic_year;

            $exams->exam_duration = $request->exam_duration;
            $exams->start_exam = $request->start_exam;
            $exams->exam_time = $request->exam_time;
            $exams->day_exam = ['en' => $request->day_exam_en, 'ar' => $request->day_exam_ar];
            $exams->grade_id  = $request->grade_id;

            $exams->save();
            toastr()->success(trans('meesageop.success'));
            return redirect()->route('Exams.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        Exams::destroy($request->id);
        toastr()->error(trans('meesageop.Delete'));
        return redirect()->route('Exams.index');
    }

    public function print_Exams($id)
    {
        # code...
        $Exams = Exams::where('grade_id', $id)->get();
        if ($Exams->isEmpty()) {
            toastr()->error(trans('exams_trans.examschedule'));
            return redirect()->route('Exams.index');
        } else {
            return view('pages.Exams.invoice', compact('Exams'));
        }
    }
}
