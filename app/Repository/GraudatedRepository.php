<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Student;
use Livewire\WithPagination;
use App\RepositoryInterface\GraudatedRepositoryInterface;

class GraudatedRepository implements GraudatedRepositoryInterface
{
use WithPagination;
    public function create(){

       $Grades = Grade::all();
       return view('pages.Students.Graudated.Create' , compact('Grades'));
    }

    public function softDeletes($request){
        $students = Student::where('Grade_id',$request->Grade_id)
        ->where('Classroom_id',$request->Classroom_id)->where('section_id',$request->section_id)->get();
        if($students->count() < 1){
            return redirect()->back()->with('error_Graduated', __('لاتوجد بيانات في جدول الطلاب'));
        }
        
        foreach ($students as $student){
            $ids = explode(',',$student->id);
            student::whereIn('id', $ids)->Delete();
        }

        toastr()->error(trans('meesageop.Delete'));
        return redirect()->back();
    }

    public function Graduate(){
        $search = \request()->input('keyword');
        $students = Student::onlyTrashed()
        ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
        ->paginate(\request()->limit_by ?? 5);
         
        return view('pages.Students.Graudated.indexgraudet' , compact('students'));
    }

    public function ReturnData($request){
        Student::onlyTrashed()->where('id' , $request->id)->first()->restore();
        toastr()->success(trans('meesageop.success'));
        return redirect()->back();
    }

    public function Destroy($request){

        Student::onlyTrashed()->where('id', $request->id)->first()->forceDelete();
        toastr()->error(trans('meesageop.Delete'));
        return redirect()->back();
    }

}