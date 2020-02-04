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
            $primaryMenu->load('menuItems');
            $popularCategories = Menu::find(config('settings.storefront_footer_menu'))
                ->menuItems()->where('is_root',0)->get();
            $view->with(['primaryMenu' => $primaryMenu, 'popularCategories' => $popularCategories]);
        });
    }
}
