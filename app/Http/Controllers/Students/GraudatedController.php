<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RepositoryInterface\GraudatedRepositoryInterface;

class GraudatedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $Graudated;
    public function __construct(GraudatedRepositoryInterface $Graudated)
    {
        $this->Graudated = $Graudated;
        $this->middleware('permission:List Graduate|قائمة تخرج الطلاب', ['only' => ['index' ]]);
        $this->middleware('permission:اضافة تخرج الطلاب|Add Graduate', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل تخرج|Edit Graduate', ['only' => ['edit','update']]);
        $this->middleware('permission:حذف تخرج|Delete Graduate', ['only' => ['destroy']]);
    }


    public function Graduate()
    {
        //
        $Graudated = $this->Graudated->Graduate();
        return $Graudated;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Graudated = $this->Graudated->create();
        return $Graudated;
    }

    public function softDeletes(Request $request){
        $Graudated = $this->Graudated->softDeletes($request);
        return $Graudated;
    }

    public function ReturnData(Request $request){
        $Graudated = $this->Graudated->ReturnData($request);
        return $Graudated;
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        $Graudated = $this->Graudated->Destroy($request);
        return $Graudated;
    }
}
