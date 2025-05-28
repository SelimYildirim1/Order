<?php

namespace App\Http\Controllers\API;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index()
    {

        $slider = Slider::where('status', '1')->get();
        return view('frontend.pages.index', compact('slider'));
    }
}
