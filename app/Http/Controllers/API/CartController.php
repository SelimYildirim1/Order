<?php

namespace App\Http\Controllers\API;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('frontend.pages.cart', compact('cart'));
    }



    public function add(Request $request)
    {
        $product = Products::findOrFail($request->product_id);
        $quantity = $request->quantity ?? 1;

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                "quantity" => $quantity,
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'message' => 'Ürün sepete eklendi.',
            'redirect' => '/api/checkout', // veya '/api/cart' ihtiyaca göre
            'cart' => $cart,
        ]);
    }

    public function remove(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return response()->json([
            'message' => 'Ürün sepetten kaldırıldı.',
            'cart' => $cart,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
