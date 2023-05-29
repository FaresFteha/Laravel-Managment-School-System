<?php

namespace App\Http\Controllers\Zoom;

use App\Http\Controllers\Controller;
use App\Http\Requests\ZoomRequest;

use Illuminate\Http\Request;

use App\RepositoryInterface\ZoomRepositoryInterface;

class ZoomController extends Controller
{
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $Zoom;
    public function __construct(ZoomRepositoryInterface $Zoom)
    {
        $this->Zoom= $Zoom;
        $this->middleware('permission:Meeting rooms|غرف الإجتماعات', ['only' => ['index' ]]);
        $this->middleware('permission:اضافة غرف الإجتماعات اونلاين|Add Meeting rooms Online', ['only' => ['create','store']]);
        $this->middleware('permission:اضافة غرف الإجتماعات اوفلاين|Add Meeting rooms Offline', ['only' => ['indirectCreate','indirectStore']]);
        $this->middleware('permission:حذف غرف الإجتماعات|Delete Meeting rooms', ['only' => ['destroy']]);
    }
    
    public function index()
    {
       return $this->Zoom->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return $this->Zoom->create();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Zoom Integration
    public function store(Request $request)
    {

        return $this->Zoom->store($request);

    }


    public function indirectCreate()
    {
        //
        return $this->Zoom->indirectCreate();

    }

    //OffLine Zoom
    public function indirectStore(ZoomRequest $request)
    {
        return $this->Zoom->indirectStore($request);

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
        return $this->Zoom->destroy($request);

    }
}
