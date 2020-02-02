<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Menu;
use App\Page;
use App\Setting;
use App\Slider;
use Illuminate\Http\Request;

class StorefrontController extends Controller
{
    public function index(Request $request)
	{
		if ($request->type) {
	 	   return view('admin.storefront.home.index');
        }
        return view('admin.storefront.general.index', [
        	'sliders' => Slider::all(),
        	'pages' => Page::all(),
        	'menus' => Menu::all(),
        ]);
	}

	/**
	 * @param Request $request
	 */
	public function update(Request $request)
	{  
		$request->validate([
			'storefront_footer_address' => 'nullable|string|max:255',
			'storefront_copyright_text' => 'nullable|string|max:255',
			'storefront_footer_menu_title' => 'nullable|string|max:255',
			'storefront_facebook_link' => 'nullable|url|max:255',
			'storefront_twitter_link' => 'nullable|url|max:255',
			'storefront_instagram_link' => 'nullable|url|max:255',
			'storefront_linkedin_link' => 'nullable|url|max:255',
			'storefront_google_link' => 'nullable|url|max:255',
			'storefront_youtube_link' => 'nullable|url|max:255'
		]);

		$keys = $request->except('_token', '_method');

        foreach ($keys as $key => $value)
        {
            Setting::set($key, $value);
        }

        return response()->json(['success' => 'Settings successfully updated!']);
	}
}
