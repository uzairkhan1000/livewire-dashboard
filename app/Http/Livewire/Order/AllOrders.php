<?php

namespace App\Http\Livewire\Order;

use App\Models\Order;
use Livewire\Component;

class AllOrders extends Component
{
    public $showModal = false;
    public $selectedOrderId;

    protected $listeners = ['hideOrderUpdateModal', 'refreshOrderListing' => '$refresh'];

    public function render()
    {
        $orders = Order::with('product', 'color', 'size')->latest()->paginate(10);
        return view('livewire.order.all-orders', compact('orders'));
    }

    public function editOrder($order_id)
    {
        $this->selectedOrderId = $order_id;
        $this->showModal = true;
    }
    public function refreshOrderListing($order_id)
    {
        $this->selectedOrderId = $order_id;
        $this->showModal = true;
    }

    public function hideOrderUpdateModal()
    {
        $this->showModal = false;
        $this->selectedOrderId = '';
    }
}
