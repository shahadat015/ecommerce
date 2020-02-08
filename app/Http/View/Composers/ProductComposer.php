<?php

namespace App\Http\View\Composers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\View\View;

class ProductComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'categories' => $this->categories(),
            'brands' => $this->brands(),
            'featuredProducts' => $this->featuredProducts(),
        ]);
    }

    public function categories()
    {
        return Category::where('status', 1)->inRandomOrder()->limit(10)->get();
    }

    public function brands()
    {
        return Brand::where('status', 1)->inRandomOrder()->limit(10)->get();
    }

    public function featuredProducts()
    {
        $ids = json_decode(config('settings.featured_products'));
        return Product::published()->whereIn('id', $ids ?: [])->get();
    }
}