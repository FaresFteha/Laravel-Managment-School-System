<?php

namespace App\Http\Controllers\Fees;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RepositoryInterface\PaymentRepositoryInterface;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected  $Payment;
    public function __construct(PaymentRepositoryInterface $Payment)
    {
           $this->Payment=$Payment;   
           $this->middleware('permission:List of Voucher of Exchange|قائمة سندات الصرف', ['only' => ['index' ]]);
           $this->middleware('permission:Voucher of Exchange|سند الصرف', ['only' => ['create','store']]);
           $this->middleware('permission:Edit Voucher of Exchange|تعديل سند الصرف', ['only' => ['edit','update']]);
           $this->middleware('permission:حذف سند الصرف|Delete Voucher of Exchange', ['only' => ['destroy']]); 
      

    }

    public function index()
    {
        //
        return $this->Payment->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return $this->Payment->store($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $this->Payment->show($id);

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return $this->Payment->edit($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        return $this->Payment->update($request);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        return $this->Payment->destroy($request);

    }
}
