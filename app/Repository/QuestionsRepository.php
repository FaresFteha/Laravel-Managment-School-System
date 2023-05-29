<?php

namespace App\Repository;

use App\Models\Quizze;
use App\Models\Question;
use Livewire\WithPagination;
use App\RepositoryInterface\QuestionsRepositoryInterface;

class QuestionsRepository implements QuestionsRepositoryInterface
{
    use WithPagination;
    public function index()
    {
        $questions = Question::when(\request()->keyword != null, function ($query) {
            $query->search(\request()->keyword);
        })
        ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
        ->paginate(\request()->limit_by ?? 5);;;
        return view('pages.Questions.index' , compact('questions'));
    }

    public function create()
    {
        $quizzes = Quizze::get();
        return view('pages.Questions.create',compact('quizzes'));
    }

    public function store($request)
    {
        $request->validated();
        try {
            $question = new Question();
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->quizze_id = $request->quizze_id;
            $question->save();
            toastr()->success(trans('meesageop.success'));
            return redirect()->route('Questions.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $question = Question::findorfail($id);
        $quizzes = Quizze::get();
        return view('pages.Questions.edit',compact('question','quizzes'));
    }

    public function update($request)
    {
        $request->validated();
        try {
            $question =  Question::findorfail($request->id);
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->quizze_id = $request->quizze_id;
            $question->save();
            toastr()->success(trans('meesageop.success'));
            return redirect()->route('Questions.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            //code...
            Question::destroy($request->id);
            toastr()->error(trans('meesageop.Delete'));
            return redirect()->route('Questions.index');
        }catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
