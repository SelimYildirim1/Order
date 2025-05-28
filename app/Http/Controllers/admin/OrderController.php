<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrders()
    {
        $orders = Order::all();
        $couriers = User::where('role', 'courier')->get();
        return view('backend.pages.order.index', compact('orders', 'couriers'));
    }
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return back()->with('success', 'Sipariş durumu güncellendi.');
    }
    public function updateCourier(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->courier = $request->courier_id;
        $order->save();

        return back()->with('success', 'Kurye güncellendi.');
    }
}
