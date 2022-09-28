<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Colors;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function product()
    {
        return view('admin.products', [
            'products' => Products::paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.create', [
            'categories' => Categories::all(),
            'colors' => Colors::all(),
        ]);
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|min:3|unique:products',
            'description' => 'required|min:10',
            'cover' => 'required|image',
            'promo' => 'required|integer|min:10|max:50',
            'price' => 'required|integer|min:20|max:99',
            'categories_id' => 'nullable|exists:categories,id',
            'colors_id' => 'nullable',
        ]);

        
        if ($request->hasFile('cover')) {
            $validated['cover'] = '/storage/'.$request->file('cover')->store('products');
        }

        $validated['slug'] = str($request->name)->slug();
        $validated['favori'] = false;
        $validated['released_at'] = Carbon::now();

        $product = Products::create(collect($validated)->except('colors_id')->all());
        $product->colors()->attach($validated['colors_id']);
       

        Products::create($validated);

        return redirect()->route('admin.product');
    
    }

    public function edit()
    {
        return view('admin.edit', [
            'colors' => Colors::all(),
            'categories' => Categories::all(),
            'products' => Products::all()
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|unique:products',
            'description' => 'required|min:10',
            'cover' => 'required|image',
            'promo' => 'required|integer|min:10|max:50',
            'price' => 'required|integer|min:20|max:99',
            'categories_id' => 'nullable|exists:categories,id',
            'colors_id' => 'nullable',
        ]);

        
        if ($request->hasFile('cover')) {
            $validated['cover'] = '/storage/'.$request->file('cover')->store('products');
        }

        $validated['slug'] = str($request->name)->slug();
        $validated['favori'] = false;
        $validated['released_at'] = Carbon::now();

        $product = Products::create(collect($validated)->except('colors_id')->all());
        $product->colors()->attach($validated['colors_id']);
       

        Products::create($validated);

        return redirect()->route('admin.product');
    }

    public function destroy(Products $product)
    {

        Storage::delete(str($product->cover)->remove('/storage/'));
        $product->delete();

        return redirect()->route('admin.product');
    }
}
