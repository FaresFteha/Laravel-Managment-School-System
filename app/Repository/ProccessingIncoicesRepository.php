<?php

namespace App\Repository;

use App\Models\Student;
use App\Models\ProccessingFee;
use App\Models\StudentAcounnt;
use Illuminate\Support\Facades\DB;
use App\RepositoryInterface\ProccessingIncoicesRepositoryInterface;
use Livewire\WithPagination;

class ProccessingIncoicesRepository implements ProccessingIncoicesRepositoryInterface
{
use WithPagination;
    public function index()
    {
       $ProcessingFees = ProccessingFee::paginate(5 , ['id' ,'student_id' , 'amount' , 'description' , 'date']);
       return view('pages.ProccessingFees.index' , compact('ProcessingFees'));
    }

 
    public function show($id)
    {
        $student = Student::findorfail($id);
        return view('pages.ProccessingFees.add', compact('student'));
    }

    public function edit($id)
    {
       
            $ProcessingFee  = ProccessingFee::findorfail($id);
            return view('pages.ProccessingFees.edit', compact('ProcessingFee'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            //حفظ البيانات في جدول معالجة الرسوم
            // حفظ البيانات في جدول معالجة الرسوم
            $ProcessingFee = new ProccessingFee();
            $ProcessingFee->date   = date('Y-m-d');
            $ProcessingFee->student_id = $request->student_id;
            $ProcessingFee->amount = $request->Debit;
            $ProcessingFee->description = $request->description;
            $ProcessingFee->save();

            // حفظ البيانات في جدول حساب الطلاب
            $students_accounts = new StudentAcounnt();
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'ProcessingFee';
            $students_accounts->student_id = $request->student_id;
            $students_accounts->proccessing_id = $ProcessingFee->id;
            $students_accounts->Debit = 0.00;
            $students_accounts->credit = $request->Debit;
            $students_accounts->description = $request->description;
            $students_accounts->save();

            DB::commit();
            toastr()->success(trans('meesageop.success'));
            return redirect()->route('ProccessingFeesStudent.index');
        } catch (\Exception $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    public function update($request)
    {
        DB::beginTransaction();
        try {
            //حفظ البيانات في جدول معالجة الرسوم
            // حفظ البيانات في جدول معالجة الرسوم
            $ProcessingFee = ProccessingFee::findorfail($request->id);
            $ProcessingFee->date   = date('Y-m-d');
            $ProcessingFee->student_id = $request->student_id;
            $ProcessingFee->amount = $request->Debit;
            $ProcessingFee->description = $request->description;
            $ProcessingFee->save();

            // حفظ البيانات في جدول حساب الطلاب
            $students_accounts = new StudentAcounnt();
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'ProcessingFee';
            $students_accounts->student_id = $request->student_id;
            $students_accounts->proccessing_id = $ProcessingFee->id;
            $students_accounts->Debit = 0.00;
            $students_accounts->credit = $request->Debit;
            $students_accounts->description = $request->description;
            $students_accounts->save();

            DB::commit();
            toastr()->success(trans('meesageop.success'));
            return redirect()->route('ProccessingFeesStudent.index');
        } catch (\Exception $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    public function destroy($request)
    {
        ProccessingFee::destroy($request->id);
        toastr()->error(trans('meesageop.Delete'));
        return redirect()->route('ProccessingFeesStudent.index');
    }
}
