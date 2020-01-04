<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
		$categories = Category::where('category_id', null)->get();
    	return view('admin.category.index', compact('categories'));
    }

    public function edit(Category $category)
    {
        $categories = Category::where('category_id', null)->get();
        return view('admin.category.edit', compact('categories', 'category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $request['status'] = (boolean) $request->status;
        $request['slug'] = str_slug($request->name);
        $create = Category::create($request->all());

        if($create){
            return response()->json(['success' => 'Category successfully created!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $request['status'] = (boolean) $request->status;
        $request['slug'] = str_slug($request->name);
        $update = $category->update($request->all());

        if($update){
            return response()->json(['success' => 'Category successfully updated!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function destroy(Request $request)
    {

        $delete = Category::destroy($request->id);

        if($delete){
            return response()->json(['success' => 'Category successfully deleted!']);
        }else{
            return response()->json(['error' => 'Deleting failed! Please try again!']);
        }
    }
}
