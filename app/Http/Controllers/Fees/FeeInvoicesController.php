<?php

namespace App\Http\Controllers\Fees;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RepositoryInterface\FeeIncoicesRepositoryInterface;

class FeeInvoicesController extends Controller
{
    //
    public $FeeIncoices;
    public function __construct(FeeIncoicesRepositoryInterface $FeeIncoices)
    {
        $this->FeeIncoices = $FeeIncoices;
        $this->middleware('permission:Invoices|الفواتير', ['only' => ['index']]);
        $this->middleware('permission:Add a fee invoice|أضف فاتورة رسوم', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit Invoices|تعديل الفواتير', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete Invoices|حذف الفواتير', ['only' => ['destroy']]);
    }

    public function index()
    {
        $FeeIncoices = $this->FeeIncoices->index();
        return $FeeIncoices;
    }

    public function show($id)
    {
        $FeeIncoices = $this->FeeIncoices->show($id);
        return $FeeIncoices;
    }

    public function store(Request $request)
    {
        $FeeIncoices = $this->FeeIncoices->store($request);
        return $FeeIncoices;
    }

    public function edit($id)
    {
        $FeeIncoices = $this->FeeIncoices->edit($id);
        return $FeeIncoices;
    }


    public function update(Request $request)
    {
        $FeeIncoices = $this->FeeIncoices->update($request);
        return $FeeIncoices;
    }

    public function destroy(Request $request)
    {
        $FeeIncoices = $this->FeeIncoices->destroy($request);
        return $FeeIncoices;
    }

    public function readAllNotify(Request $request)
    {
        $userUnreadNotification = auth()->user()->unreadNotifications;

        if ($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
            return back();
        }
    }
}
