<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class Dashboard extends Component
{
    public $all_products;
    public $active_products;
    public $orders;

    public function mount()
    {
        $this->all_products = Product::count();

        $this->active_products = Product::where('status', 'active')->count();
        $this->orders = Order::count();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
