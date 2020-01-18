<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index($page, $subs = null)
    {
    	$page = Page::whereSlug($page)->firstOrFail();
        return view('website.page', compact('page'));
    }
}
