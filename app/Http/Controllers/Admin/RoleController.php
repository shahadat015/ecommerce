<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Create Role')->only(['create', 'store']);
        $this->middleware('permission:View Role')->only(['index', 'show']);
        $this->middleware('permission:Update Role')->only(['edit', 'update']);
        $this->middleware('permission:Delete Role')->only(['destroy', 'delete']);
    }

    public function roles()
    {
        return Laratables::recordsOf(Role::class);
    }

    public function index()
    {
        return view('admin.role.index');
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles'
        ]);
        
        $role = Role::create(['name' => $request->name]);
        $create = $role->syncPermissions($request->permissions);

        if($create){
            return response()->json(['success' => 'Role successfully created!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.role.edit', compact('permissions', 'role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $role->update(['name' => $request->name]);
        $update = $role->syncPermissions($request->permissions);

        if($update){
            return response()->json(['success' => 'Role successfully updated!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']);
        }
    }

    public function destroy(Request $request)
    {
        $delete = Role::destroy($request->id);

        if($delete){
            return response()->json(['success' => 'Role successfully deleted!']);
        }else{
            return response()->json(['error' => 'Deleting failed! Please try again!']);
        }
    }
}
