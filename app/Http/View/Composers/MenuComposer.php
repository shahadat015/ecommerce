<?php

namespace App\Http\View\Composers;

use App\Menu;
use App\Product;
use Illuminate\View\View;

class MenuComposer
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
        $primaryMenu = Menu::find(config('settings.storefront_primary_menu'));
        if($primaryMenu) $primaryMenu->load('menuItems');            
        $popularCategory = Menu::find(config('settings.storefront_footer_menu'));
        if($popularCategory) $popularCategory->load('menuItems');
        $view->with(['primaryMenu' => $primaryMenu, 'popularCategory' => $popularCategory]);
    }
}