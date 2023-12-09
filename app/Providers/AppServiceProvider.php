<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\setting;
use Illuminate\Support\ServiceProvider;
use View;
use Cookie;


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
    // footer category
    View::composer('frontend.master.master', function ($view){
        $view->with('categorys', Category::all());

        if (Cookie::has('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = [];
        }

        // Pass $cart_data to the view
        $view->with('totalItemsInCart', count($cart_data));
    });

     // setting
     View::composer('frontend.master.master', function ($view){
        $view->with('setting', setting::all());
    });
     // setting
     View::composer('layouts.dashboard', function ($view){
        $view->with('setting', setting::all());
    });
    // setting
     View::composer('auth.login', function ($view){
        $view->with('setting', setting::all());
    });
    // setting
     View::composer('invoice.invoice', function ($view){
        $view->with('setting', setting::all());
    });
    // setting
     View::composer('backend.orders.view_invoice_print', function ($view){
        $view->with('setting', setting::all());
    });
    // setting
     View::composer('backend.orders.multi_view_invoice_print', function ($view){
        $view->with('setting', setting::all());
    });
}
}
