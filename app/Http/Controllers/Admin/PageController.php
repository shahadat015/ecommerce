<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Page;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Create Page')->only(['create', 'store']);
        $this->middleware('permission:View Page')->only(['index']);
        $this->middleware('permission:Update Page')->only(['edit', 'update']);
        $this->middleware('permission:Delete Page')->only(['destroy']);
    }

    public function pages()
    {
        return Laratables::recordsOf(Page::class, function($query)
        {
            return $query->orderBy('name');
        });
    }

    public function index()
    {
        return view('admin.page.index');
    }

    public function create()
    {
        
        return view('admin.page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:pages',
            'body' => 'required|string'
        ]);

        $request['is_active'] = (boolean) $request->is_active;
        $request['slug'] = str_slug($request->name);
        $page = Page::create($request->all());
        
        $page->saveMetaData($request);
        
        if($page){
            return response()->json(['success' => 'Page successfully created!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function edit(page $page)
    {
        $page->load('metadata');
        return view('admin.page.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'body' => 'required|string',
            'url' => 'required|string|unique:pages,slug,'.$page->id
        ]);

        $request['is_active'] = (boolean)$request->is_active;
        $request['slug'] = str_slug($request->url);
        $page->update($request->all());

        $page->saveMetaData($request);

        if($page){
            return response()->json(['success' => 'Page successfully updated!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function destroy(Request $request)
    {
        $delete = Page::destroy($request->id);

        if($delete){
            return response()->json(['success' => 'Page successfully deleted!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }
}
