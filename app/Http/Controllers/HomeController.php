<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'products' => Products::all(),
            'products_random' => Products::where('favori', 1)->take(3)->get(),
            'product_favori' => Products::where('favori', 1)->take(1)->get(),
            'products_favori' => Products::where('favori', 1)->take(4)->get(),
            'products_lasted' => Products::all()->sortByDesc('released_at')->take(4),
        ]);
    }


    public function contact()
    {
        return view('contact');
    }
}
