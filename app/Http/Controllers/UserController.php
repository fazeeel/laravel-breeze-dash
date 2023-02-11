<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Auth\Events\Registered;
class UserController extends Controller
{
    public function index()
    {
        $users=User::paginate(5);
        $auth= Auth::user();
        return view("users.index",compact('users','auth'));
        //
    }

    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        

        return to_route('users.index');
    }

    
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(User $user)
    {   
        if(Auth::user()->id==$user->id)
        {
            return to_route('users.index');
        }
        $user->delete();
        return to_route('users.index');
        
    }

    public function assignrole(User $user)
    {
        $roles=Role::all();

        return view('users.assignrole',compact('roles','user'));
    }
    public function syncrole(User $user, Request $request)
    {
        $users=User::all();
        $user->syncRoles($request->rolestoassign);
        return view('users.index',compact('users'));
    }
    //--------
    
    public function assignpermission(User $user)
    {
        $permissions=Permission::all();

        return view('users.assignpermission',compact('permissions','user'));
    }

    public function syncpermission(User $user, Request $request)
    {
        $users=User::all();
        $user->syncPermissions($request->permissiontoassign);
        return view('users.index',compact('users'));
    }
}
