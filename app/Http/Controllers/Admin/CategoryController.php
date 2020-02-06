<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Responses\CategoryTreeResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function categories()
    {
        $categories = Category::orderBy('parent_id')->get();
        return new CategoryTreeResponse($categories);
    }

    public function index()
    {
		$categories = Category::treeList();
    	return view('admin.category.index', compact('categories'));
    }

    public function edit(Category $category)
    {
        $categories = Category::where('id', '<>', $category->id)
        ->get()->nest()->setIndent('|-- ')->listsFlattened('name');
        return view('admin.category.edit', compact('categories', 'category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $slug = str_slug($request->name);
        $category = Category::where('slug', $slug)->first();

        $request['status'] = (boolean) $request->status;
        $request['slug'] = $category ? $slug .'-'. uniqid() : $slug;
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
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255|unique:categories,slug,'.$category->id,
        ]);

        $request['status'] = (boolean) $request->status;
        $request['slug'] = str_slug($request->url);
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

    public function getCategories()
    {
        $categories = Category::orderBy('parent_id')->get()->nest()->setIndent('|-- ')->listsFlattened('name');
        return view('admin.category.category', compact('categories'));
    }
}
