<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorefrontValidate;
use App\Menu;
use App\Page;
use App\Product;
use App\Setting;
use App\Slider;
use Illuminate\Http\Request;

class StorefrontController extends Controller
{
	public function __construct()
    {
        $this->middleware('permission:View Settings')->only(['index', 'sections']);
        $this->middleware('permission:Update Settings')->only(['update', 'updateSections']);
    }

    public function index()
	{
		$sliders = Slider::all();
		$pages = Page::all();
		$menus = Menu::all();
        return view('admin.storefront.general.index', compact('sliders', 'pages', 'menus'));
	}

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

	public function updateSections(StorefrontValidate $request)
	{  
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

	public function carouselProducts($id)
    {
        $ids = json_decode(config('settings.product_carousel_'. $id .'_products'));
        return Product::whereIn('id', $ids ?: [])->get();
    }

    public function featuredProducts()
    {
        $ids = json_decode(config('settings.featured_products'));
        return Product::whereIn('id', $ids ?: [])->get();
    }
    public function tabProducts($id)
    {
        $ids = json_decode(config('settings.product_tab_'. $id .'_products'));
        return Product::whereIn('id', $ids ?: [])->get();
    }

}
