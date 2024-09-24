<?php

namespace App\Http\Livewire\Client;

use App\Models\Product;
use Livewire\Component;

class Landing extends Component
{
    public $products;
    public $product_id;

    public function mount()
    {
        $this->products = Product::active()
        ->whereHas('images')
        ->with('images')
        ->latest()
        ->limit(6)
        ->get();
    }
    public function render()
    {
        return view('livewire.client.landing');
    }

    public function setProductId($id)
    {
        $this->product_id = $id;
    }
}
