<?php

namespace App\Http\Controllers\Admin;

use App\Option;
use App\Http\Controllers\Controller;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function options()
    {
        return Laratables::recordsOf(Option::class, function($query)
        {
            return $query->latest('id')->where('is_global', 1);
        });
    }

    public function index()
    {
    	return view('admin.option.index');
    }

    public function create()
    {
        return view('admin.option.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255'
        ]);

        $request['is_required'] = (boolean) $request->is_required;
        $request['is_global'] = 1;
        $option = Option::create($request->all());

        $create = $option->values()->createMany($request->values);

        if($create){
            return response()->json(['success' => 'Option successfully created!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }
    
    public function edit(Option $option)
    {
        return view('admin.option.edit', compact('option'));
    }

    public function update(Request $request, Option $option)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255'
        ]);

        $request['is_required'] = (boolean) $request->is_required;
        $request['is_global'] = 1;
        $option->values()->delete();
        $option->values()->createMany($request->values);
        $update = $option->update($request->all());

        if($update){
            return response()->json(['success' => 'Option successfully updated!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function destroy(Request $request)
    {

        $delete = Option::destroy($request->id);

        if($delete){
            return response()->json(['success' => 'Option successfully deleted!']);
        }else{
            return response()->json(['error' => 'Deleting failed! Please try again!']);
        }
    }

}
