<?php

namespace App\Providers;

use App\Models\card;
use App\Models\setting;
use App\Models\wish;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use View;

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
        // card
        View::composer('frontend.layouts.footer', function ($view){
            $view->with('cards', card::where('customer_id', Auth::guard('customerlogin')->id())->get());
        });

        // card count
        View::composer('frontend.layouts.header', function ($view){
            $view->with('card_count', card::where('customer_id', Auth::guard('customerlogin')->id())->count());
        });


        // wish
        View::composer('frontend.layouts.footer', function ($view){
            $view->with('wishs', wish::where('customer_id', Auth::guard('customerlogin')->id())->get());
        });

        // wish count
        View::composer('frontend.layouts.header', function ($view){
            $view->with('wish_count', wish::where('customer_id', Auth::guard('customerlogin')->id())->count());
        });

        // logo
        View::composer('frontend.layouts.header', function ($view){
            $view->with('settings', setting::all());
        });

        // logo
        View::composer('backend.layouts.header', function ($view){
            $view->with('settings', setting::all());
        });
        // logo
        View::composer('frontend.layouts.app', function ($view){
            $view->with('settings', setting::all());
        });
        // logo
        View::composer('frontend.layouts.footer', function ($view){
            $view->with('settings', setting::all());
        });
        // logo
        View::composer('backend.layouts.footer', function ($view){
            $view->with('settings', setting::all());
        });

        Paginator::useBootstrap();
    }
}
