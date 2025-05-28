<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('frontend.pages.checkout');
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return response()->json(['error' => 'Sepet boş!'], 400);
        }
        $products = collect($cart)->map(fn($item) => $item['name'] . ' x' . $item['quantity'])->implode(', ');
        $total_price = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $user = Auth::user();

        Order::create([
            'user_id'     => $user->id,
            'name'        => $user->name,
            'order_number' => str_pad(rand(0, 99999999999), 11, '0', STR_PAD_LEFT),
            'email'       => $user->email,
            'phone'       => $user->phone,
            'adress'      => $user->adress,
            'products'    => $products,
            'total_price' => $total_price,
            'status'      => 'preparing',
        ]);

        session()->forget('cart');

        return redirect()->route('index')->with('success', 'Ürün sepete eklendi.');
    }
}
