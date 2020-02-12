<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use App\Http\Controllers\Controller;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Create Slider')->only(['create', 'store']);
        $this->middleware('permission:View Slider')->only(['index']);
        $this->middleware('permission:Update Slider')->only(['edit', 'update']);
        $this->middleware('permission:Delete Slider')->only(['destroy']);
    }

    public function sliders()
    {
        return Laratables::recordsOf(Slider::class, function($query)
        {
            return $query->latest('id');
        });
    }

    public function index()
    {
        return view('admin.slider.index');
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'autoplay_speed' => 'required|numeric',
            'slides.*.title' => 'nullable|string|max:255',
            'slides.*.subtitle' => 'nullable|string|max:255',
            'slides.*.call_to_action_text' => 'nullable|string|max:255',
            'slides.*.call_to_action_url' => 'nullable|url|max:255',
        ]);

        $request['autoplay'] = (boolean)$request->autoplay;
        $request['arrows'] = (boolean)$request->arrows;
        $request['dots'] = (boolean)$request->dots;
        $slider = Slider::create($request->all());

        $slider->slides()->createMany($request->slides);

        if($slider){
            return response()->json(['success' => 'Slider successfully created!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function edit(Slider $slider)
    {
        $slider->load('slides');
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'autoplay_speed' => 'required|numeric',
            'slides.*.title' => 'nullable|string|max:255',
            'slides.*.subtitle' => 'nullable|string|max:255',
            'slides.*.call_to_action_text' => 'nullable|string|max:255',
            'slides.*.call_to_action_url' => 'nullable|url|max:255',
        ]);

        $request['autoplay'] = (boolean)$request->autoplay;
        $request['arrows'] = (boolean)$request->arrows;
        $request['dots'] = (boolean)$request->dots;
        $slider->update($request->all());

        $slider->slides()->delete();
        $slider->slides()->createMany($request->slides);

        if($slider){
            return response()->json(['success' => 'Slider successfully updated!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }

    public function destroy(Request $request)
    {
        $delete = Slider::destroy($request->id);

        if($delete){
            return response()->json(['success' => 'Slider successfully deleted!']);
        }else{
            return response()->json(['error' => 'Ops! please try again!']); 
        }
    }
}
