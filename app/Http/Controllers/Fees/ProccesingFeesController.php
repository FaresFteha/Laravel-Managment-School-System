<?php

namespace App\Http\Controllers\Fees;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RepositoryInterface\ProccessingIncoicesRepositoryInterface;

class ProccesingFeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  $Proccesing;
     public function __construct(ProccessingIncoicesRepositoryInterface $Proccesing)
     {
         $this->Proccesing = $Proccesing;
         $this->middleware('permission:List of Exclude Fee|قائمة استثناء الرسوم', ['only' => ['index' ]]);
         $this->middleware('permission:استبعاد الرسوم|Exclude fee', ['only' => ['create','store']]);
         $this->middleware('permission:تعديل استثناء الرسوم|Edit Exclude Fee', ['only' => ['edit','update']]);
         $this->middleware('permission:حذف استثناء الرسوم|Delete Exclude Fee', ['only' => ['destroy']]);
     }
    public function index()
    {
        $Proccesing = $this->Proccesing->index();
        return $Proccesing;
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
        $Proccesing = $this->Proccesing->store($request);
        return $Proccesing;
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
       $Proccesing = $this->Proccesing->show($id);
       return $Proccesing;
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
        $Proccesing = $this->Proccesing->edit($id);
        return $Proccesing;

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
      
       $Proccesing = $this->Proccesing->update($request);
       return $Proccesing;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $Proccesing = $this->Proccesing->destroy($request);
        return $Proccesing;
    }
}
