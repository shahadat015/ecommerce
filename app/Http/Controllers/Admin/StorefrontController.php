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
		$request->validate([
			'product_features_1_icon' => 'required|string|max:255',
			'product_features_1_title' => 'required|string|max:255',
			'product_features_1_subtitle' => 'required|string|max:255',
			'product_features_2_icon' => 'required|string|max:255',
			'product_features_2_title' => 'required|string|max:255',
			'product_features_2_subtitle' => 'required|string|max:255',
			'product_features_3_icon' => 'required|string|max:255',
			'product_features_3_title' => 'required|string|max:255',
			'product_features_3_subtitle' => 'required|string|max:255',
			'product_carousel_1_title' => 'nullable|required_with:product_carousel_1_enable',
			'product_carousel_2_title' => 'nullable|required_with:product_carousel_2_enable',
			'product_carousel_3_title' => 'nullable|required_with:product_carousel_3_enable',
			'featured_products_title' => 'nullable|required_with:featured_product_enable',
			'recent_products_title' => 'nullable|required_with:enable_recent_products',
			'recent_total_products' => 'nullable|required_with:enable_recent_products',
			'product_tab_1_title' => 'nullable|required_with:enable_products_tabs',
		]);

		$request['product_carousel_1_enable'] = (boolean) $request->product_carousel_1_enable;
		$request['product_carousel_2_enable'] = (boolean) $request->product_carousel_2_enable;
		$request['product_carousel_3_enable'] = (boolean) $request->product_carousel_3_enable;
		$request['featured_product_enable'] = (boolean) $request->featured_product_enable;
		$request['enable_products_tabs'] = (boolean) $request->enable_products_tabs;

		$keys = $request->except('_token', '_method');

        foreach ($keys as $key => $value)
        {
            Setting::set($key, $value);
        }

        return response()->json(['success' => 'Settings successfully updated!']);
	}
}
