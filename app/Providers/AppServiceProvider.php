<?php

namespace App\Providers;

use App\Models\cart;
use App\Models\settings;
use App\Models\Category;
use App\Models\subcatagory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
        View::composer('*', function ($view) {
            try {
                // ডাটাবেজ কানেক্টেড থাকলে এবং টেবিলগুলো থাকলে ডাটা লোড হবে
                if (Schema::hasTable('settings')) {
                    $view->with('allsettings', settings::first());
                }
                if (Schema::hasTable('carts')) {
                    $ip = request()->ip();
                    $view->with('cartdetailsall', cart::where('ip_adress', $ip)->get());
                    $view->with('productcount', cart::where('ip_adress', $ip)->count());
                }
                if (Schema::hasTable('categories')) {
                    $view->with('globalcategory', Category::orderBy('name', 'asc')->with('subcatagory')->get());
                }
                if (Schema::hasTable('subcatagories')) {
                    $view->with('globalsubcategory', subcatagory::orderBy('name', 'asc')->get());
                }
            } catch (\Throwable $e) {
                // কোনো কারণে ডাটাবেজ ফেইল করলে যাতে এরর পেজ ক্র্যাশ না করে
                $view->with([
                    'allsettings' => null,
                    'cartdetailsall' => collect(),
                    'productcount' => 0,
                    'globalcategory' => collect(),
                    'globalsubcategory' => collect(),
                ]);
            }
        });
    }
}