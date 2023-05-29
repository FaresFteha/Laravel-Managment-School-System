<?php

namespace App\Http\Controllers\Fees;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeesRequest;
use App\RepositoryInterface\FeesRepositoryInterface;

class FeeController extends Controller
{
    //
    public $Fees;
    public function __construct(FeesRepositoryInterface $Fees)
    {
        $this->Fees = $Fees;
        $this->middleware('permission:Study Fees|رسوم دراسية', ['only' => ['index' ]]);
        $this->middleware('permission:Add Study Fees|اضافة رسوم دراسية', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل رسوم دراسية|Edit Study Fees', ['only' => ['edit','update']]);
        $this->middleware('permission:حذف رسوم دراسية|Delete Study Fees', ['only' => ['destroy']]);
    }

    public function index(){
        $Fees = $this->Fees->index();
        return $Fees;
    }

    public function Create(){
        $Fees = $this->Fees->Create();
        return $Fees;
    }

    public function store(StoreFeesRequest $request){
        
        $Fees = $this->Fees->store($request);
        return $Fees;
    }


    public function destroy(Request $request){
        $Fees = $this->Fees->destroy($request);
        return $Fees;
    }

    public function edit($id){
        $Fees = $this->Fees->edit($id);
        return $Fees;
    }

    public function update(StoreFeesRequest $request){
        $Fees = $this->Fees->update($request);
        return $Fees;
    }


}
