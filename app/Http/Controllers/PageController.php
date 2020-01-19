<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index($page)
    {
    	$page = Page::whereSlug($page)->firstOrFail();
        return view()->first(['website.'.$page->template, 'website.page'], compact('page'));
    }
}
