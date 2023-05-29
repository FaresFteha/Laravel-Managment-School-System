<?php

namespace App\Repository;
use App\RepositoryInterface\RolesRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesRepository implements RolesRepositoryInterface
{
    use WithPagination;
    public function index($request)
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return view('pages.Users.Roles.index', compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('pages.Users.Roles.Creat', compact('permission'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( $request)
    {

        $role = new Role();
        $role->name = $request->input('name_en');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        toastr()->success(trans('meesageop.success'));
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();
        return view('pages.Users.Roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('pages.Users.Roles.edit', compact('role', 'permission', 'rolePermissions'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
       
        $role = Role::find($id);
        $role->name =$request->input('name_en');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        toastr()->success(trans('meesageop.success'));
        return redirect()->route('roles.index');
            
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        toastr()->success(trans('meesageop.success'));
        return redirect()->route('roles.index');
    }
}