<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Slider;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{

    public function index()
    {
    	$slider = Slider::find(config('settings.storefront_slider'));
    	$brands = Brand::where('status', 1)->get();
    	if($slider) $slider->load('slides');
        return view('website.index', compact('slider', 'brands'));
    }
}
