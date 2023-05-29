<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Subject;
use App\Models\Teacher;
use Livewire\WithPagination;
use App\RepositoryInterface\QuizzesRepositoryInterface;

class QuizzesRepository implements QuizzesRepositoryInterface
{
    use WithPagination;
    public function index()
    {
        $search = \request()->input('keyword');
        $quizzes = Quizze::where('name->ar', 'LIKE', "%{$search}%")
        ->orWhere('name->en', 'LIKE', "%{$search}%")
        ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
        ->paginate(\request()->limit_by ?? 5);
        return view('pages.Quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::all();
        $data['teachers'] = Teacher::all();
        return view('pages.Quizzes.create', $data);
    }



    public function store($request)
    {
        $request->validated();
        try {
            //code...
            $Quizzes = new Quizze();
            $Quizzes->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Quizzes->Grade_id = $request->Grade_id;
            $Quizzes->Classroom_id = $request->Classroom_id;
            $Quizzes->Section_id = $request->section_id;
            $Quizzes->Teacher_id = $request->teacher_id;
            $Quizzes->Subject_id = $request->subject_id;
            $Quizzes->save();
            toastr()->success(trans('meesageop.success'));
            return redirect()->route('Quizzes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $quizz = Quizze::findorFail($id);
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::all();
        $data['teachers'] = Teacher::all();
        return view('pages.Quizzes.edit', $data, compact('quizz'));

    }

    public function update($request)
    {
        $request->validated();
        try {
            //code...
            $Quizzes = Quizze::findorFail($request->id);
            $Quizzes->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Quizzes->Grade_id = $request->Grade_id;
            $Quizzes->Classroom_id = $request->Classroom_id;
            $Quizzes->Section_id = $request->section_id;
            $Quizzes->Teacher_id = $request->teacher_id;
            $Quizzes->Subject_id = $request->subject_id;
            $Quizzes->save();
            toastr()->success(trans('meesageop.success'));
            return redirect()->route('Quizzes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            //code...
            Quizze::destroy($request->id);
            toastr()->error(trans('meesageop.Delete'));
            return redirect()->route('Quizzes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
