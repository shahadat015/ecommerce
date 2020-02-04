<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{

    public function index()
    {
    	$slider = Slider::find(config('settings.storefront_slider'));
        return view('website.index', compact('slider'));
    }
}
