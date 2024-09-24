<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class ProductDetails extends Component
{
    public $product_id;

    public function mount($product_id)
    {
        $this->product_id = $product_id;
    }

    public function render()
    {
        return view('livewire.client.product-details');
    }
}
