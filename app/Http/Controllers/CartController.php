<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index ()
    {
        return view('cart.index');
    }

    public function addToCart($id)
    {
        $product = Products::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'quantity' => 1,
                "price" => number_format(($product->price / 1) * (1-($product->promo / 100)), 2, ',', ' ' ),
                "cover" => $product->cover,
                "color" => $product->colors,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back();

    }

    public function remove($id)
    {
        $product = Products::findOrFail($id);
        $cart = session()->get('cart');

        unset($cart[$product->id]);
        session()->put('cart', $cart);

        return redirect()->back();
    }
}
