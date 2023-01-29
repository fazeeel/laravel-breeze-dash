<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    
    public function index()
    {
        $permissions=Permission::all();
        return view('permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
        //
    }

    
    public function store(PermissionRequest $request)
    {
        
        Permission::create($request->validated());
        return to_route('permissions.index');
    }

    
    public function edit(Permission $permission)
    {
        return view('permissions.edit',compact('permission'));
    }

    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->update($request->validated());
        return to_route('permissions.index');
    }
    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return to_route('permissions.index');
     
    }
    public function assign(Permission $permission)
    {
        $roles=Role::all();
        return view('permissions.assign',compact('permission','roles'));

        # code...
    }
    public function sync(Permission $permission, Request $request)
    {
       $permission->syncRoles($request->rolestoassign);
       return to_route('permissions.index');
    
        ///return view('permissions.assign',compact('permission));

        # code...
    }
}
