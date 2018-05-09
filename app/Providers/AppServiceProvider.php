<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            if (!session()->has('cart')) {
                session()->put('cart.total_price', 0);
                session()->put('cart.total_qtty', 0);
                session()->put('cart.products', []);
            }
            $cart       = session()->get('cart');
            $categories = Category::all();


            $view->with(compact('cart', 'categories'));
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
