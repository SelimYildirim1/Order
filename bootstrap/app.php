<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'config' => \App\Http\Middleware\ConfigMiddleware::class,
            'menuses' => \App\Http\Middleware\MenuShareMiddleware::class,
            'products' => \App\Http\Middleware\ProductShareMiddleware::class,
            'AdminOrCourier' => \App\Http\Middleware\AdminOrCourier::class,
            'isAdmin' => \App\Http\Middleware\IsAdmin::class,
            'isCourier' => \App\Http\Middleware\IsCourier::class,
            'sanctum.stateful' => \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
