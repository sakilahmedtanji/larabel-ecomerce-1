<?php

namespace App\Providers;

use App\Models\cart;
use App\Models\settings;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      View::composer('*',function ($view){
        $view->with('allsettings', settings::first());
        $view->with('cartdetailsall', cart::where('ip_adress',request()->ip())->get());
        $view->with('productcount', cart::where('ip_adress',request()->ip())->count());
      });
    }
}
