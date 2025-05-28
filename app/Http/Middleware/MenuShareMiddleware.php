<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Menus;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class MenuShareMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Menü ve ürünleri veri tabanından al
        $menuses = Menus::all();
        $products = Products::all();

        // Her menüye ait ürünleri ekle (Eager Loading yapabilirsin model ilişkisi varsa)
        foreach ($menuses as $menu) {
            $menu->products = $products->where('MainCat', $menu->id);
        }
        View::share('menuses', $menuses);
        return $next($request);
    }
}
