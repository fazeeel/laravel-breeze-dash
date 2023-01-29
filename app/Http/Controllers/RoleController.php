<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Models\User;
class RoleController extends Controller
{
    
    public function index()
    {
        $roles=Role::all();
        $users=User::all();
        return view('roles.index',compact('roles','users'));
    }

    
    public function create()
    {
        return view('roles.create');
    }

  
    public function store(RoleRequest $request)
    {
        Role::create($request->validated());
        return to_route('roles.index');
    }

  
   
    public function edit(Role $role)
    {
        return view('roles.edit',compact('role'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->validated());
        return to_route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return to_route('roles.index');
     
    }
    //----

    public function assign(Role $role)
    {
        $permissions=Permission::all();
        return view('roles.assign',compact('permissions','role'));

        # code...
    }
    public function sync(Role $role, Request $request)
    {
        
       $role->syncPermissions($request->permissionstoassign);
       return to_route('roles.index');
    
        ///return view('permissions.assign',compact('permission));

        # code...
    }
}
