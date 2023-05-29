<?php

namespace App\Repository;

use App\Models\Fee;
use App\Models\User;
use App\Models\Student;
use App\Models\Fee_invoice;
use Livewire\WithPagination;
use App\Models\StudentAcounnt;
use App\Notifications\FeesStudyForStudent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\RepositoryInterface\FeeIncoicesRepositoryInterface;

class FeeInvoicesRepository implements FeeIncoicesRepositoryInterface
{
    use WithPagination;
    public function index()
    {
        $Fee_invoices = Fee_invoice::paginate(10);
        return view('pages.FeesInvoices.index', compact('Fee_invoices'));
    }

    public function show($id)
    {
        $student = Student::findOrfail($id);
        $fees = Fee::where('Classroom_id', $student->Classroom_id)->get();
        return view('pages.FeesInvoices.add', compact('student', 'fees'));
    }

    public function store($request)
    {
        $List_Fees = $request->List_Fees;

        DB::beginTransaction();
        try {

            foreach ($List_Fees as $List_Fee) {
                // حفظ البيانات في جدول فواتير الرسوم الدراسية
                $Fees = new Fee_invoice();
                $Fees->invoice_date = date('Y-m-d');
                $Fees->student_id = $List_Fee['student_id'];
                $Fees->Grade_id = $request->Grade_id;
                $Fees->Classroom_id = $request->Classroom_id;;
                $Fees->fee_id = $List_Fee['fee_id'];
                $Fees->amount = $List_Fee['amount'];
                $Fees->description = $List_Fee['description'];
                $Fees->save();

                // حفظ البيانات في جدول حسابات الطلاب 
                $StudentAccount = new StudentAcounnt();
                $StudentAccount->date = date('Y-m-d');
                $StudentAccount->Fee_invoicses_id =  $Fees->id;
                $StudentAccount->type = 'invoice';
                $StudentAccount->student_id = $List_Fee['student_id'];
                $StudentAccount->Debit = $List_Fee['amount'];
                $StudentAccount->credit = 0.00;
                $StudentAccount->description = $List_Fee['description'];
                $StudentAccount->save();
            }
            $user = User::get(); //send notify all users
            $feesStudentId = Fee_invoice::latest()->first();
            Notification::send($user, new FeesStudyForStudent($feesStudentId)); //sent notify to for many user
            DB::commit();
            toastr()->success(trans('meesageop.success'));
            return redirect()->route('FeesInvoices.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $fee_invoices = Fee_invoice::findOrfail($id);
        $fees = Fee::where('Classroom_id', $fee_invoices->Classroom_id)->get();
        return view('pages.FeesInvoices.edit', compact('fee_invoices', 'fees'));
    }

    public function update($request)
    {
        DB::beginTransaction();
        try {

            //تعديل في جدول فواتير الرسوم الدراسية
            $Fees = Fee_invoice::findOrfail($request->id);
            $Fees->amount = $request->amount;
            $Fees->description = $request->description;
            $Fees->save();

            //تعديل في جدول فواتير الرسوم الدراسية
            $StudentAccount = StudentAcounnt::findOrfail($request->id);
            $StudentAccount->Debit = $request->amount;
            $StudentAccount->credit = 0.00;
            $StudentAccount->description = $request->description;
            $StudentAccount->save();

            DB::commit();
            toastr()->success(trans('meesageop.Update'));
            return redirect()->route('FeesInvoices.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {

        try {
            //code...
            Fee_invoice::destroy($request->id);
            toastr()->error(trans('meesageop.Delete'));
            return redirect()->route('FeesInvoices.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
