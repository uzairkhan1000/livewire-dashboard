<?php

namespace App\Http\Livewire\Order;

use App\Models\Order;
use Livewire\Component;

class UpdateOrder extends Component
{
    public $order_id; 
    public $product_id; 
    public $customer_name;
    public $customer_phone;
    public $customer_address;
    public $quantity;
    public $color_id;
    public $size_id;
    public $color_options;
    public $size_options;

    public function mount(Order $order)
    {
        $this->order_id = $order->id;
        $this->product_id = $order->product_id;
        $this->color_id = $order->color_id;
        $this->size_id = $order->size_id;
        $this->customer_name = $order->customer_name;
        $this->customer_phone = $order->customer_phone;
        $this->customer_address = $order->customer_address;
        $this->quantity = $order->quantity;
        $this->color_options = $order->product->colors;
        $this->size_options = $order->product->sizes;
    }

    public function render()
    {
        return view('livewire.order.update-order');
    }

    public function updateOrder() {
        $this->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'required|string|max:500',
            'quantity' => 'required|integer|min:1',
            'color_id' => 'required|exists:colors,id',
            'size_id' => 'required|exists:sizes,id',
        ]);

        // Update the order
        $update_order = Order::find($this->order_id)->update([
            'customer_name' => $this->customer_name,
            'customer_phone' => $this->customer_phone,
            'customer_address' => $this->customer_address,
            'quantity' => $this->quantity,
            'color_id' => $this->color_id,
            'size_id' => $this->size_id,
        ]);

        // Optionally, you can add success messages or redirect to another page
        session()->flash('success', 'Order updated successfully!');
        $this->emit('refreshOrderListing');
        $this->mount(Order::find($this->order_id));
    }

    public function hideModal()
    {
        $this->emit('hideOrderUpdateModal');
    }
}
