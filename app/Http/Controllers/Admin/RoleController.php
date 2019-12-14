<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    
    public function getRoles()
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
            'name' => 'required|string|max:255'
        ]);

        $role = Role::create(['name' => $request->name]);
        $create = $role->syncPermissions($request->permissions);

        if($create){
            return response()->json(['success' => $request->name . ' successfully created!']);
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
            return response()->json(['success' => $request->name . ' successfully updated!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']);
        }
    }

    public function destroy(Role $role)
    {
        $role->revokePermissionTo($role->permissions);
        $delete = $role->delete();

        if($delete){
            return response()->json(['success' => $role->name . ' successfully deleted']);
        }else{
            return response()->json(['error' => 'Deleting failed! Please try again!']);
        }
    }
}
