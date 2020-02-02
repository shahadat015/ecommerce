<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Services\MenuItemOrdener;
use App\Menu;
use App\MenuItem;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MenuItemController extends Controller
{

    public function create(Menu $menu)
    {
        $categories = Category::all();
        $pages = Page::all();
        $menuitems = $menu->menuitems()->where('is_root', 0)->get();
        return view('admin.menuitem.create', compact('menu', 'categories', 'pages', 'menuitems'));
    }

    public function store(Menu $menu, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required',
            'category_id' => 'required_if:type,category',
            'page_id' => 'required_if:type,page',
            'url' => 'required_if:type,url',
            'target' => 'required',
        ]);

        $root = $menu->menuitems()->where('is_root', 1)->first();

        $request['is_active'] = (boolean)$request->is_active;
        $request['parent_id'] = $request->parent_id ?: $root->id;
        $create = $menu->menuitems()->create($request->all());

        if($create){
            return response()->json(['success' => 'Menu successfully created!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function edit(Menu $menu, MenuItem $menuitem)
    {
        $categories = Category::all();
        $pages = Page::all();
        $menuitems = $menu->menuitems()->where('is_root', 0)->get();
        return view('admin.menuitem.edit', compact('menu', 'categories', 'pages', 'menuitems', 'menuitem'));
    }

    public function update(Request $request, MenuItem $menuitem)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required',
            'category_id' => 'required_if:type,category',
            'page_id' => 'required_if:type,page',
            'url' => 'required_if:type,url',
            'target' => 'required',
        ]);

        $request['is_active'] = (boolean)$request->is_active;
        $request['parent_id'] = $request->parent_id ?: $menuitem->parent_id;
        $update = $menuitem->update($request->all());

        if($update){
            return response()->json(['success' => 'Menu Item successfully updated!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function destroy(MenuItem $menuitem)
    {
        $delete = $menuitem->delete();

        if($delete){
            return response()->json(['success' => 'Menu Item successfully deleted!']);
        }else{
            return response()->json(['error' => 'Deleting failed! Please try again!']);
        }
    }

    public function updateOrder(MenuItemOrdener $ordener)
    {
        $ordener->order(request()->json()->all());
        return response()->json(['success' => 'Menu Item Order successfully updated!']);
    }
}
