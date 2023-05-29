<?php

namespace App\Repository;

use App\Models\User;
use App\Models\Student;
use App\Models\FundAcount;
use Livewire\WithPagination;
use App\Models\ReceiptStudent;
use App\Models\StudentAcounnt;
use App\Notifications\PaymentFeesForStudent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\RepositoryInterface\ReceiptRepositoryInterface;

class ReceiptRepository implements ReceiptRepositoryInterface
{
    use WithPagination;
    public function index()
    {

        //  $Debit = StudentAcounnt::where('student_id' , 1)->sum('Debit');
        //$credit = StudentAcounnt::where('student_id' , 1)->sum('credit');
        $receipt_students = ReceiptStudent::when(\request()->keyword != null, function ($query) {
            $query->search(\request()->keyword);
        })
            ->orderBy(\request()->sort_by ?? 'id', \request()->order_by ?? 'desc')
            ->paginate(\request()->limit_by ?? 5);
        return  view('pages.Recipt.index', compact('receipt_students'));
    }

    public function show($id)
    {
        $student = Student::findOrfail($id);
        return view('pages.Recipt.add', compact('student'));
    }

    public function store($request)
    {
        DB::beginTransaction(); // start a database transaction

        try {

            // create a new receipt for a student
            $receipt_students = new ReceiptStudent();
            $receipt_students->date = date('Y-m-d');
            $receipt_students->student_id = $request->student_id;
            $receipt_students->Debit = $request->Debit;
            $receipt_students->description = $request->description;
            $receipt_students->save();

            // create a new fund account for the receipt
            $fund_accounts = new FundAcount();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->receipt_id = $receipt_students->id;
            $fund_accounts->Debit = $request->Debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            // create a new student account for the receipt
            $fund_accounts = new StudentAcounnt();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->type = 'receipt';
            $fund_accounts->receipt_id = $receipt_students->id;
            $fund_accounts->student_id = $request->student_id;
            $fund_accounts->Debit = 0.00;
            $fund_accounts->credit = $request->Debit;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            // send a notification to all users about this new payment
            $user = User::get();
            $ReceiptStudentntId = ReceiptStudent::latest()->first();
            Notification::send($user, new PaymentFeesForStudent($ReceiptStudentntId));

            DB::commit(); // commit the transaction
            toastr()->success(trans('meesageop.success')); // show a success message using Toastr library
            return redirect()->route('ReceiptStudent.index'); // redirect to index page for receipts
        } catch (\Exception $e) {
            DB::rollback(); // rollback the transaction if there's an exception
            return redirect()->back()->withErrors(['error' => $e->getMessage()]); // redirect back with an error message
        }
    }

    public function edit($id)
    {
        $receipt_student = ReceiptStudent::findOrfail($id);
        return view('pages.Recipt.edit', compact('receipt_student'));
    }

    public function update($request)
    {

        DB::beginTransaction();

        try {
            // تعديل البيانات في جدول سندات القبض
            $receipt_students = ReceiptStudent::findorfail($request->id);
            $receipt_students->date = date('Y-m-d');
            $receipt_students->student_id = $request->student_id;
            $receipt_students->Debit = $request->Debit;
            $receipt_students->description = $request->description;
            $receipt_students->save();

            // تعديل البيانات في جدول الصندوق
            $fund_accounts = FundAcount::where('receipt_id', $request->id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->receipt_id = $receipt_students->id;
            $fund_accounts->Debit = $request->Debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            // تعديل البيانات في جدول الصندوق
            $fund_accounts = StudentAcounnt::where('receipt_id', $request->id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->type = 'receipt';
            $fund_accounts->student_id = $request->student_id;
            $fund_accounts->receipt_id = $receipt_students->id;
            $fund_accounts->Debit = 0.00;
            $fund_accounts->credit = $request->Debit;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();


            DB::commit();
            toastr()->success(trans('meesageop.Update'));
            return redirect()->route('ReceiptStudent.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            ReceiptStudent::destroy($request->id);
            toastr()->error(trans('meesageop.Delete'));
            return redirect()->route('ReceiptStudent.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function print_Fatora_Receipt($id)
    {
        $Receipt = ReceiptStudent::where('id', $id)->first();

        return view('pages.Recipt.invoice',  compact('Receipt'));
    }
}
