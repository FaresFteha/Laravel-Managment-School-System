<?php

namespace App\Http\Controllers\Students;
use App\Http\Controllers\Controller;
use App\RepositoryInterface\PromotionsRepositoryInterface as RepositoryInterfacePromotionsRepositoryInterface;
use Illuminate\Http\Request;
use PromotionsRepositoryInterface;

class PromotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public $Promotions;
    public function __construct(RepositoryInterfacePromotionsRepositoryInterface $Promotions)
    {
        $this->Promotions = $Promotions;
        $this->middleware('permission:Student Promotion Department|قسم الترقيات الطلابية', ['only' => ['index' ]]);
        $this->middleware('permission:Add Student Promotions|اضافة ترقيات الطلاب', ['only' => ['create','store']]);
        $this->middleware('permission:Edit Promotion|تعديل ترقيات', ['only' => ['edit','update']]);
        $this->middleware('permission:حذف ترقيات|Delete Promotion', ['only' => ['destroy']]);
        $this->middleware('permission:تراجع الكل|Undo all', ['only' => ['destroy']]);
    }

    public function index()
    {
        //
        $Promotions = $this->Promotions->view();

        return $Promotions;
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Promotions = $this->Promotions->Create();

        return $Promotions;
    
        
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
        $Promotions = $this->Promotions->Store($request);
        return $Promotions;
    
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
             $Promotions = $this->Promotions->destroy($request);
             return $Promotions;
         

    }
}
