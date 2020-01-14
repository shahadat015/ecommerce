<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\AttributeSet;
use App\Http\Controllers\Controller;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function attributes()
    {
        return Laratables::recordsOf(Attribute::class, function($query)
        {
            return $query->latest('id');
        });
    }

    public function index()
    {
    	return view('admin.attribute.index');
    }

    public function create()
    {
        $attributesets = AttributeSet::active()->get();
        return view('admin.attribute.create', compact('attributesets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'attribute_set_id' => 'required|integer'
        ],[
            'attribute_set_id.required' => 'Attribute Set field is required'
        ]);

        $request['status'] = (boolean) $request->status;
        $request['slug'] = str_slug($request->name);
        $attribute = Attribute::create($request->all());

        $create = $attribute->values()->createMany($request->values);

        if($create){
            return response()->json(['success' => 'Attribute successfully created!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }
    
    public function edit(Attribute $attribute)
    {
        $attributesets = AttributeSet::active()->get();
        return view('admin.attribute.edit', compact('attribute', 'attributesets'));
    }

    public function update(Request $request, Attribute $attribute)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'attribute_set_id' => 'required|integer'
        ],[
            'attribute_set_id.required' => 'Attribute Set field is required'
        ]);

        $request['status'] = (boolean) $request->status;
        $request['slug'] = str_slug($request->name);
        $attribute->values()->delete();
        $attribute->values()->createMany($request->values);
        $update = $attribute->update($request->all());

        if($update){
            return response()->json(['success' => 'Attribute successfully updated!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function destroy(Request $request)
    {

        $delete = Attribute::destroy($request->id);

        if($delete){
            return response()->json(['success' => 'Attribute successfully deleted!']);
        }else{
            return response()->json(['error' => 'Deleting failed! Please try again!']);
        }
    }

}
