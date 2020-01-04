<?php

namespace App\Http\Controllers\Admin;

use App\AttributeSet;
use App\Http\Controllers\Controller;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class AttributeSetController extends Controller
{
    public function attributesets()
    {
        return Laratables::recordsOf(AttributeSet::class, function($query)
        {
            return $query->latest();
        });
    }

    public function index()
    {
    	return view('admin.attributeset.index');
    }

    public function create()
    {
        return view('admin.attributeset.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $request['status'] = (boolean) $request->status;
        $request['slug'] = str_slug($request->name);
        $create = AttributeSet::create($request->all());

        if($create){
            return response()->json(['success' => 'Attribute Set successfully created!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }
    
    public function edit(AttributeSet $attributeSet)
    {
        return view('admin.attributeset.edit', compact('attributeSet'));
    }

    public function update(Request $request, AttributeSet $attributeSet)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $request['status'] = (boolean) $request->status;
        $request['slug'] = str_slug($request->name);
        $update = $attributeSet->update($request->all());

        if($update){
            return response()->json(['success' => 'Attribute Set successfully updated!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function destroy(Request $request)
    {

        $delete = AttributeSet::destroy($request->id);

        if($delete){
            return response()->json(['success' => 'Attribute Set successfully deleted!']);
        }else{
            return response()->json(['error' => 'Deleting failed! Please try again!']);
        }
    }

}
