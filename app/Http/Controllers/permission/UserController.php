<?php

namespace App\Http\Controllers\permission;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\RepositoryInterface\UsersRepositoryInterface;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
class UserController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $User;
    function __construct(UsersRepositoryInterface $User)
    {
    $this->User= $User ;
    $this->middleware('permission:List of Users|قائمة المستخدمين', ['only' => ['index']]);
    $this->middleware('permission:Add Users|اضافة المستخدمين', ['only' => ['create','store']]);
    $this->middleware('permission:Edit Users|تعديل المستخدمين', ['only' => ['edit','update']]);
    $this->middleware('permission:Delete Users|حذف المستخدمين', ['only' => ['destroy']]);
    $this->middleware('permission:Show Users|عرض المستخدمين', ['only' => ['show']]);
    }

    public function index(Request $request)
    {
       
        return $this->User->index($request); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return $this->User->create(); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(UserRequest $request)
    {
        return $this->User->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        return $this->User->show($id); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        return $this->User->edit($id); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UserRequest $request, $id)
    {
        return $this->User->update($request , $id); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        return $this->User->destroy($id); 
    }
}
