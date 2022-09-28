<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Colors;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Products::paginate(6),
            'product_lasted' => Products::all()->sortByDesc('released_at')->take(1),
            'categories' => Categories::all(),
            'colors' => Colors::all(),
        ]);
    }

    public function show($slug)
    {
        return view('products.show', [
            'product' => Products::where('slug', $slug)->firstorfail(),
        ]);
    }
}
