<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\Teacher;
use Livewire\WithPagination;
use App\Models\Specialization;
use Illuminate\Support\Facades\Hash;
use App\RepositoryInterface\TeacherRepositoryInterface;

class TeacherRepository implements TeacherRepositoryInterface
{

    use WithPagination;
    public function getAllTeachers()
    {
        $search = \request()->input('keyword');
        return Teacher::where('name->ar', 'LIKE', "%{$search}%")
        ->orWhere('name->en', 'LIKE', "%{$search}%")
        ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
        ->paginate(\request()->limit_by ?? 5);;
    }

    public function getSpecializations()
    {
        return  Specialization::all();
    }

    public function getGenders()
    {
        return  Gender::all();
    }

    public function StoreTeachers($request)
    {
        try {
            $validated = $request->validated();
            //code...
            $Teachers = new Teacher();
            $Teachers->email = $request->Email;
            $Teachers->password =  Hash::make($request->Password);
            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();
            toastr()->success(trans('meesageop.success'));
            return redirect()->route('TeachersTableview');
        } catch (\Exception  $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }


    public function EditTeachers($id)
    {
        return Teacher::findOrFail($id);
    }


    // get all  EditTeachers
    public function UpdateTeachers($request)
    {
        try {
            $validated = $request->validated();

            $Teachers = Teacher::findOrFail($request->id);
            $Teachers->email = $request->Email;
            $Teachers->password =  Hash::make($request->Password);
            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();
            toastr()->success(trans('meesageop.Update'));
            return redirect()->route('TeachersTableview');
        } catch (\Exception  $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destoryTeachers($request){
        Teacher::findOrFail($request->id)->delete();
        toastr()->error(trans('meesageop.Delete'));
        return redirect()->route('TeachersTableview');
    }
}
