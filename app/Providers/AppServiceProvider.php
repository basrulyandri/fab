<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Harimayco\Menu\Facades\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_ALL, 'id');
        date_default_timezone_set("Asia/Jakarta");
        view()->composer('layouts.frontend._menu',function($view){
            $view->with('menus',Menu::getByName('Under Logo'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
