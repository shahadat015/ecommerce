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
    public function index()
	{
		$sliders = Slider::all();
		$pages = Page::all();
		$menus = Menu::all();
        return view('admin.storefront.general.index', compact('sliders', 'pages', 'menus'));
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

	public function sections()
	{
		return view('admin.storefront.section.index');
	}

	/**
	 * @param Request $request
	 */
	public function updateSections(Request $request)
	{  
		// $request->validate([
			
		// ]);

		// return getType(config('settings.product_carousel_1_products'));

		// $request['product_carousel_1_products'] = json_encode($request->product_carousel_1_products);


		$keys = $request->except('_token', '_method');

        foreach ($keys as $key => $value)
        {
            Setting::set($key, $value);
        }

        return response()->json(['success' => 'Settings successfully updated!']);
	}
}
