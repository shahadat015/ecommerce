<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Create User')->only(['create', 'store']);
        $this->middleware('permission:View User')->only(['index', 'show']);
        $this->middleware('permission:Update User')->only(['edit', 'update']);
        $this->middleware('permission:Delete User')->only(['destroy', 'delete']);
    }

    public function users()
    {
        $users = User::with('roles', 'image')->latest()->paginate(10);
        return view('admin.user.users', compact('users'));
    }

    public function index()
    {
        $users = User::with('roles', 'image')->latest()->get();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.user.create', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'nullable|string|max:11|min:11',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $request['password'] = bcrypt($request->password);
        $user = User::create($request->all());
        $user->assignRole($request->roles);
        $create = $user->givePermissionTo($request->permissions);

        if($create){
            return response()->json(['success' => 'User successfully created!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.user.edit', compact('roles', 'permissions', 'user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'phone' => 'nullable|string|max:11|min:11',
            'password' => 'nullable|string|min:8|confirmed'
        ]);

        if($request->password){
            $request['password'] = bcrypt($request->password);
        }else{
            $request['password'] = $user->password;
        }

        $user->update($request->all());
        $user->syncRoles($request->roles);
        $update = $user->syncPermissions($request->permissions);

        if($update){
            return response()->json(['success' => 'User successfully updated!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function destroy(Request $request)
    {
        $delete = User::destroy($request->id);

        if($delete){
            return response()->json(['success' => 'User successfully deleted!']);
        }else{
            return response()->json(['error' => 'Deleting failed! Please try again!']);
        }
    }

    public function profile()
    {
        $user = auth()->user();
        return view('admin.user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'phone' => 'nullable|string|max:11|min:11',
            'password' => 'nullable|string|min:8|confirmed'
        ]);

        if($request->password){
            $request['password'] = bcrypt($request->password);
        }else{
            $request['password'] = $user->password;
        }

        $update = $user->update($request->all());

        if($update){
            return response()->json(['success' => 'Profile successfully updated!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }
}
