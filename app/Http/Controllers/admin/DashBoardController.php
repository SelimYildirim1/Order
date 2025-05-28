<?php

namespace App\Http\Controllers\Admin;

use App\Models\Configs;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function index()
    {
        $auth = Auth::id();
        $user = User::where('id', $auth)->get()->first();
        // Eğer kullanıcı courier ise /myOrders sayfasına yönlendir
        if ($user->role === 'courier') {
            return redirect()->route('panel.couriers.myOrders');
        }

        // Admin ya da diğer roller için normal işlem devam eder
        $configs = Configs::where('id', '1')->firstOrFail();
        return view('backend.pages.configs.edit', compact('configs'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
