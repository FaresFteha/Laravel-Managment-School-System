<?php
namespace App\Repository;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use App\RepositoryInterface\SubjectRepositoryInterface;
use Livewire\WithPagination;

class SubjectRepository implements SubjectRepositoryInterface{

use WithPagination;     
public function index(){
     $search = \request()->input('keyword');
     $subjects = Subject::where('name->ar', 'LIKE', "%{$search}%")
     ->orWhere('name->en', 'LIKE', "%{$search}%")
     ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
     ->paginate(\request()->limit_by ?? 5);
     return view('pages.Subject.index' , compact('subjects'));
}

 

public function create(){
     $grades = Grade::get();
     $teachers = Teacher::get();
return view('pages.Subject.create' , compact('grades' , 'teachers') );


}

public function store($request)
{
     $request->validated();
     try {
          $subjects = new Subject();
          $subjects->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
          $subjects->Grade_id = $request->Grade_id;
          $subjects->Classroom_id = $request->Classroom_id;
          $subjects->teacher_id = $request->teacher_id;
          $subjects->save();
          toastr()->success(trans('meesageop.success'));
          return redirect()->route('Subject.index');
      }
      catch (\Exception $e) {
          return redirect()->back()->with(['error' => $e->getMessage()]);
      }
}

public function edit($id){
     $subject =Subject::findorfail($id);
        $grades = Grade::get();
        $teachers = Teacher::get();
        return view('pages.Subject.edit',compact('subject','grades','teachers'));
}

public function update($request){
     $request->validated();
     try {
          $subjects =Subject::findorfail($request->id);
          $subjects->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
          $subjects->Grade_id = $request->Grade_id;
          $subjects->Classroom_id = $request->Classroom_id;
          $subjects->teacher_id = $request->teacher_id;
          $subjects->save();
          toastr()->success(trans('meesageop.success'));
          return redirect()->route('Subject.index');
      }
      catch (\Exception $e) {
          return redirect()->back()->with(['error' => $e->getMessage()]);
      }
}

public function destroy($request){
Subject::destroy($request->id);
toastr()->error(trans('meesageop.Delete'));
return redirect()->route('Subject.index');
}

}