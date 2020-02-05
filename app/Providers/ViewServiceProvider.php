<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.website', 'App\Http\View\Composers\HomePageComposer');
        view()->composer(['website.index', 'admin.storefront.section.index'], 'App\Http\View\Composers\ProductComposer');
        view()->composer('admin.report.*', function ($view) {
            $view->with('request', $this->app['request']);
        });

    }
}
