<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Products::paginate(6),
            'product_lasted' => Products::all()->sortByDesc('released_at')->take(1),
        ]);
    }
}
