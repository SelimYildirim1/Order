<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CourierController extends Controller
{
    public function index()
    {
        $couriers = user::where('role', "courier")->get();
        return view('backend.pages.courier.index', compact('couriers'));
    }
    public function create()
    {
        return view('backend.pages.courier.edit');
    }
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => 'courier',
        ]);

        return redirect()->back()->with('success', 'Kurye başarıyla eklendi.');
    }
    public function edit(string $id)
    {
        $courier = User::where('id', $id)->firstOrFail();
        return view('backend.pages.courier.edit', compact('courier'));
    }
    public function update(Request $request, $id)
    {
        $courier = User::where('role', 'courier')->findOrFail($id);

        $courier->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->back()->with('success', 'Kurye başarıyla güncellendi.');
    }
    public function destroy(string $id)
    {
        $courier=User::where('id',$id)->firstOrFail();
        $courier->delete();
    }
    public function myOrders()
    {
        $courier=Auth::id();
        $orders=Order::where('courier',$courier)->get();
        return view('backend.pages.order.courier',compact('orders'));
    }
}
