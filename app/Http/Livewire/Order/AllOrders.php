<?php

namespace App\Http\Livewire\Order;

use App\Models\Order;
use Livewire\Component;

class AllOrders extends Component
{
    public $showModal = false;

    public function render()
    {
        $orders = Order::with('product', 'color', 'size')->latest()->paginate(10);
        return view('livewire.order.all-orders', compact('orders'));
    }
}
