<?php

namespace App\Http\Controllers\permission;

use App\Http\Controllers\Controller;
use App\RepositoryInterface\RolesRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    protected $Role;

    function __construct(RolesRepositoryInterface $Role)
    {
    $this->Role = $Role;
    $this->middleware('permission:User Permissions|الصلاحيات', ['only' => ['index' , 'show' ]]);
    $this->middleware('permission:Add Permissions|اضافة صلاحيات', ['only' => ['create','store']]);
    $this->middleware('permission:Edit Permissions|تعديل صلاحيات', ['only' => ['edit','update']]);
    $this->middleware('permission:Delete Permissions|حذف صلاحيات', ['only' => ['destroy']]);
    $this->middleware('permission:Show Permissions|عرض صلاحيات', ['only' => ['show']]);
    
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->Role->index($request); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->Role->create(); 

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return $this->Role->store($request); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        return $this->Role->show($id); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        return $this->Role->edit($id); 

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
       
        return $this->Role->update($request , $id);

            
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->Role->destroy($id);
    }
}
