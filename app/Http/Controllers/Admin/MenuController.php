<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Menu;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function menus()
    {
        return Laratables::recordsOf(Menu::class);
    }

    public function index()
    {
    	return view('admin.menu.index');
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $request['is_active'] = (boolean) $request->is_active;
        $menu = Menu::create($request->all());

        $menu->menuitems()->create([
            'name' => 'Root',
            'type' => 'url',
            'target' => '_self',
            'position' => 0,
            'is_root' => 1,
        ]);

        if($menu){
            return response()->json(['success' => 'Menu successfully created!', 'id' => $menu->id]);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function edit(Menu $menu)
    {
        $menuItems = $menu->menuItems()
            ->where('parent_id', NULL)
            ->orderBy('parent_id')
            ->get()->nest();
        return view('admin.menu.edit', compact('menu', 'menuItems'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);


        $request['is_active'] = (boolean) $request->is_active;
        $update = $menu->update($request->all());

        if($update){
            return response()->json(['success' => 'Menu successfully updated!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function destroy(Request $request)
    {

        $delete = Menu::destroy($request->id);

        if($delete){
            return response()->json(['success' => 'Menu successfully deleted!']);
        }else{
            return response()->json(['error' => 'Deleting failed! Please try again!']);
        }
    }
}
