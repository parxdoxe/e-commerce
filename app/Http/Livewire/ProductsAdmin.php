<?php

namespace App\Http\Livewire;

use App\Models\Products;
use Livewire\Component;

class ProductsAdmin extends Component
{
    public $products = [];

    public function mount()
    {
        $this->products = Products::all();
    }

    public function render()
    {
        return view('livewire.products-admin');
    }
}
