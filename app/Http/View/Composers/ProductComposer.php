<?php

namespace App\Http\View\Composers;

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
            'carousel_1_products' => $this->carousel1Products(),
            'carousel_2_products' => $this->carousel2Products(),
            'carousel_3_products' => $this->carousel3Products(),
            'featured_products' => $this->featuredProducts(),
            'recent_products' => $this->recentProducts(),
            'tab_1_products' => $this->tab1Products(),
            'tab_2_products' => $this->tab2Products(),
            'tab_3_products' => $this->tab3Products(),
        ]);
    }

    public function carousel1Products()
    {
        $ids = json_decode(config('settings.product_carousel_1_products'));
        return Product::published()->whereIn('id', $ids ?: [])->get();
    }

    public function carousel2Products()
    {
        $ids = json_decode(config('settings.product_carousel_2_products'));
        return Product::published()->whereIn('id', $ids ?: [])->get();
    }

    public function carousel3Products()
    {
        $ids = json_decode(config('settings.product_carousel_3_products'));
        return Product::published()->whereIn('id', $ids ?: [])->get();
    }

    public function featuredProducts()
    {
        $ids = json_decode(config('settings.featured_products'));
        return Product::published()->whereIn('id', $ids ?: [])->get();
    }
    public function recentProducts()
    {
        $limit = config('settings.recent_total_products');
        return Product::latest('id')->published()->limit($limit)->get();
    }
    public function tab1Products()
    {
        $ids = json_decode(config('settings.product_tab_1_products'));
        return Product::published()->whereIn('id', $ids ?: [])->get();
    }
    public function tab2Products()
    {
        $ids = json_decode(config('settings.product_tab_2_products'));
        return Product::published()->whereIn('id', $ids ?: [])->get();
    }
    public function tab3Products()
    {
        $ids = json_decode(config('settings.product_tab_3_products'));
        return Product::published()->whereIn('id', $ids ?: [])->get();
    }
}