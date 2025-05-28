<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\MenuController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\PagesController;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CheckoutController;

Route::middleware([
    'auth',
    'config',
    'menuses',
    'products',
    'web',
    'sanctum.stateful',
    'auth:sanctum',
])->group(function () {
    Route::get('/', [PagesController::class, 'index'])->name('index');

    Route::get('/menus', [MenuController::class, 'index'])->name('menus');

    // Sepet
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'add'])->name('add.to.cart');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

    // Ödeme
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkoutPost');

    // Siparişler
    Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('myOrders');

    // Ürün Detayı
    Route::get('/product/{slug}', [ProductController::class, 'show'])->name('productDetail');

    // Ana sayfa (gerekliyse)
});
// Kayıt
Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => ['required', 'string', 'max:255'],
        'adress' => ['required', 'string', 'max:255'],
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:6',
    ]);

    $user = User::create([
        'name' => $request->name,
        'phone' => $request->phone,
        'adress' => $request->adress,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return response()->json(['message' => 'Kayıt başarılı'], 201);
});

// Giriş
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['Girdiğiniz bilgiler yanlış.'],
        ]);
    }

    return response()->json([
        'token' => $user->createToken('auth-token')->plainTextToken,
    ]);
});

// Korumalı kullanıcı bilgisi
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
