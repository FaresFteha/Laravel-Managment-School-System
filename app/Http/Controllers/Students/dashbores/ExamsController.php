<?php

namespace App\Http\Controllers\Students\dashbores;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Quizze;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamsController extends Controller
{

    public function index()
    {
        //
        $quizzes = Quizze::where('Grade_id', auth()->user()->Grade_id)
            ->where('Classroom_id', auth()->user()->Classroom_id)
            ->where('Section_id', auth()->user()->section_id)
            ->orderBy('id', 'DESC')
            ->get();
            $student_id = Auth::user()->id;
            $degree = Degree::where('student_id' ,$student_id  )->first();
        return view('pages.Students.dashboard.exams.index', compact('quizzes' ,  'degree'));
    }


    public function create()
    {
        //

    }


    public function store(Request $request)
    {
        //
    }


    public function show($quizze_id)
    {
        $student_id = Auth::user()->id;
        return view('pages.Students.dashboard.exams.show', compact('quizze_id', 'student_id'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
