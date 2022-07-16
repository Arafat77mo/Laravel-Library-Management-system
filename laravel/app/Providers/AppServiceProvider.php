<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\ServiceProvider;
// to make pagination
use Illuminate\Pagination\Paginator;

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
        Schema::defaultStringLength(191);
       Paginator::useBootstrap();

       view()->composer('user.layout',function($view){
        $view->with('user',Auth::user());
       });
     }
}
