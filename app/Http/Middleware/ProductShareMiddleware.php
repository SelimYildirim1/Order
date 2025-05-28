<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class ProductShareMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Menü ve ürünleri veri tabanından al
        $produtcs = Products::all();
        View::share('products', $produtcs);
        return $next($request);
    }
}
