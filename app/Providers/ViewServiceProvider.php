<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class ViewServiceProvider extends ServiceProvider
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
        view()->composer('*', function ($view)
        {
            $menu = Menu::where('status', 1)->get();

            $view->with('menus', $menu);
        });
    }
}
