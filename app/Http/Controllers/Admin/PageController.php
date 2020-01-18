<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Page;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class PageController extends Controller
{

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
            'name' => 'required|string|max:255',
            'body' => 'required|string'
        ]);

        $request['is_active'] = (boolean) $request->is_active;
        $request['slug'] = str_slug($request->name);
        $page = Page::create($request->all());
        
        if($request->meta_title){
            $page->metadata()->create([
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]);
        }
        
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

        $page->metadata()->update([
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
        ]);

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
