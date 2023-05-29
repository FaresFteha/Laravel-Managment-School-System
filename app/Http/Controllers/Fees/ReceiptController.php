<?php

namespace App\Http\Controllers\Fees;
use Illuminate\Http\Request;
use App\Models\ReceiptStudent;
use App\Http\Controllers\Controller;
use App\RepositoryInterface\ReceiptRepositoryInterface;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public $Receipt;
    public function __construct(ReceiptRepositoryInterface $Receipt)
    {
        $this->Receipt = $Receipt;
        $this->middleware('permission:List of Receipt|قائمة سندات القبض', ['only' => ['index' ]]);
        $this->middleware('permission:سند قبض|Receipt', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل سند قبض|Edit Receipt', ['only' => ['edit','update']]);
        $this->middleware('permission:حذف سند قبض|Delete Receipt', ['only' => ['destroy']]);
        $this->middleware('permission:طباعة سند قبض|Print Receipt', ['only' => ['print_Fatora_Receipt']]);
    }

    public function index()
    {
              $Receipt =  $this->Receipt->index();
              return $Receipt;
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
            //
            $Receipt =  $this->Receipt->store($request);
            return $Receipt;

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
        $Receipt =  $this->Receipt->show($id);
        return $Receipt;
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
        $Receipt =  $this->Receipt->edit($id);
        return $Receipt;
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
        
        $Receipt =  $this->Receipt->update($request);
        return $Receipt;
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $Receipt =  $this->Receipt->destroy($request);
        return $Receipt;
    }

    public function print_Fatora_Receipt($id)
    {
        $Receipt =  $this->Receipt->print_Fatora_Receipt($id);
        return $Receipt;
        
    }
}
