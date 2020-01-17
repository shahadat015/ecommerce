<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
	{
	    return view('admin.setting.index');
	}

	/**
	 * @param Request $request
	 */
	public function update(Request $request)
	{

	}
}
