<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Create Brand')->only(['create', 'store']);
        $this->middleware('permission:View Brand')->only(['index', 'show']);
        $this->middleware('permission:Update Brand')->only(['edit', 'update']);
        $this->middleware('permission:Delete Brand')->only(['destroy']);
    }

    public function brands()
    {
        return Laratables::recordsOf(Brand::class, function($query)
        {
            return $query->latest('id');
        });
    }

    public function index()
    {
    	return view('admin.brand.index');
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255'
        ]);

        $request['status'] = (boolean) $request->status;
        $request['slug'] = str_slug($request->name);
        $create = Brand::create($request->all());

        if($create){
            return response()->json(['success' => 'Brand successfully created!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function show(Brand $brand)
    {
        return view('admin.brand.show', compact('brand'));
    }

    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255'
        ]);

        $request['status'] = (boolean) $request->status;
        $request['slug'] = str_slug($request->name);
        $update = $brand->update($request->all());

        if($update){
            return response()->json(['success' => 'Brand successfully updated!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function destroy(Request $request)
    {

        $delete = Brand::destroy($request->id);

        if($delete){
            return response()->json(['success' => 'Brand successfully deleted!']);
        }else{
            return response()->json(['error' => 'Deleting failed! Please try again!']);
        }
    }

}
