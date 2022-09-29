<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Reviews;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store (Request $request, Products $product)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'content' => 'required|min:10',
            'note' => 'required|integer|min:0|max:5',
            'products_id' => 'nullable|exists:products,id',
        ]);

        $validated['released_at'] = Carbon::now();
        $validated['products_id'] = $product->id;

        Reviews::create($validated);

        return redirect()->back();
    }
}
