<?php

namespace App\Http\Controllers\API;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // app/Http/Controllers/ProductController.php

    public function store(Request $request)
    {

    }


    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $product = Products::where('slug', $slug)->firstOrFail();
        return view('frontend.pages.productdetail', compact('product'));
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
