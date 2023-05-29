<?php

namespace App\Repository;

use App\Models\Fee;
use App\Models\Grade;
use App\Models\Classroom;
use Livewire\WithPagination;
use App\RepositoryInterface\FeesRepositoryInterface;

class FeesRepository implements FeesRepositoryInterface
{
    use WithPagination;
    public function index()
    {
        $fees = Fee::paginate(10);
        return view('pages.Fees.index', compact('fees'));
    }


    public function Create()
    {
        $Grades = Grade::all();
        $Classroom = Classroom::all();
        return view('pages.Fees.add', compact('Grades', 'Classroom'));
    }

    public function store($request)
    {
        try {

            $fees = new Fee();
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount  = $request->amount;
            $fees->Grade_id  = $request->Grade_id;
            $fees->Classroom_id  = $request->Classroom_id;
            $fees->description  = $request->description;
            $fees->year  = $request->year;
            $fees->Fee_type  = $request->Fee_type;
            $fees->save();
            toastr()->success(trans('meesageop.success'));
            return redirect()->route('Fees.Create');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id){

        $fee = Fee::findorfail($id);
        $Grades = Grade::all();
        return view('pages.Fees.edit',compact('fee','Grades'));

    }
    
    public function update($request)
    {
        try {
            $fees = Fee::findorfail($request->id);
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount  =$request->amount;
            $fees->Grade_id  =$request->Grade_id;
            $fees->Classroom_id  =$request->Classroom_id;
            $fees->description  =$request->description;
            $fees->year  =$request->year;
            $fees->Fee_type  =$request->Fee_type;
            $fees->save();
            toastr()->success(trans('meesageop.Update'));
            return redirect()->route('Fees.index');
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $Fees = Fee::destroy($request->id);
        toastr()->error(trans('meesageop.Delete'));
        return redirect()->back();
    }
}
