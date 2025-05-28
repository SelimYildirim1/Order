<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\PagesController;
use App\Http\Controllers\Admin\DashBoardController;


Route::group(["middleware" => ['auth', 'config', 'AdminOrCourier'], 'prefix' => 'panel', 'as' => 'panel.'], function () {
    Route::get('/', [DashBoardController::class, 'index'])->name('index');
});

Route::group(["middleware" => ['auth', 'config', 'isAdmin'], 'prefix' => 'panel', 'as' => 'panel.'], function () {

    Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/slider/add', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/slider/store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('/slider/{id}/update', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('/slider/{id}/destroy', [SliderController::class, 'destroy'])->name('slider.destroy');

    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('/menu/add', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/menu/store', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{id}/update', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}/destroy', [MenuController::class, 'destroy'])->name('menu.destroy');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/add', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/settings', [ConfigController::class, 'index'])->name('settings.index');
    Route::post('/settings/edit', [ConfigController::class, 'update'])->name('settings.update');

    Route::get('/orders', [OrderController::class, 'getOrders'])->name('orders.getOrders');
    Route::put('/orders/{id}/update', [OrderController::class, 'updateStatus'])->name('orders.update');
    Route::put('/orders/{id}/courier', [OrderController::class, 'updateCourier'])->name('orders.courier');

    Route::get('/couriers', [CourierController::class, 'index'])->name('couriers.index');
    Route::get('/couriers/add', [CourierController::class, 'create'])->name('couriers.create');
    Route::post('/couriers/store', [CourierController::class, 'store'])->name('couriers.store');
    Route::get('/couriers/{id}/edit', [CourierController::class, 'edit'])->name('couriers.edit');
    Route::put('/couriers/{id}/update', [CourierController::class, 'update'])->name('couriers.update');
    Route::delete('/couriers/{id}/destroy', [CourierController::class, 'destroy'])->name('couriers.destroy');
});
Route::group(["middleware" => ['auth', 'config', 'isCourier'], 'prefix' => 'panel', 'as' => 'panel.'], function () {
    Route::get('/myOrders', [CourierController::class, 'myOrders'])->name('couriers.myOrders');
});





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Auth::routes();
