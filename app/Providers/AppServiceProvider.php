<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
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
        View::composer('*', function ($view) {
            $cart = session()->get('cart', []);
            $view->with('cart', $cart);
        });
    }
    public function redirectTo()
{
    if (Auth::check() && Auth::user()->role === 'courier') {
        return route('panel.orders.myOrders');
    }
}
}
