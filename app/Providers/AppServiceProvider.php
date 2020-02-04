<?php

namespace App\Providers;

use App\Image;
use App\Visitor;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!cache(request()->ip())){
            Visitor::saveVisitor();
        }

        view()->composer('admin.report.*', function ($view) {
            $view->with('request', $this->app['request']);
        });

        view()->composer('layouts.website', function ($view) {
            $primaryMenu = Menu::find(config('settings.storefront_primary_menu'));
            if($primaryMenu) $primaryMenu->load('menuItems');            
            $popularCategory = Menu::find(config('settings.storefront_footer_menu'));
            if($popularCategory) $popularCategory->load('menuItems');
            $view->with(['primaryMenu' => $primaryMenu, 'popularCategory' => $popularCategory]);
        });
    }
}
