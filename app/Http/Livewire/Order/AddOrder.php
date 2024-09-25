<?php

namespace App\Http\Livewire\Order;

use App\Models\Color;
use App\Models\Order;
use Livewire\Component;
use App\Models\Product; // Make sure to import the necessary models
use App\Models\Size;

class AddOrder extends Component
{
    public $customer_name;
    public $customer_phone;
    public $customer_address;
    public $product_id;
    public $color_id;
    public $size_id;
    public $quantity;
    public $color_options;
    public $size_options;

    public function render()
    {

        return view('livewire.order.add-order');
    }

    public function saveOrder()
    {
        // Validation rules for the form fields
        $validatedData = $this->validate([
            'customer_name' => 'required|string',
            'customer_phone' => 'required|string',
            'customer_address' => 'required|string',
            'product_id' => 'required|exists:products,id',
            'color_id' => 'required', // Add appropriate validation rules
            'size_id' => 'required',  // Add appropriate validation rules
            'quantity' => 'required|integer|min:1',
        ]);

        $order = Order::create([
            'customer_name' => $validatedData['customer_name'],
            'customer_phone' => $validatedData['customer_phone'],
            'customer_address' => $validatedData['customer_address'],
            'product_id' => $validatedData['product_id'],
            'color_id' => $validatedData['color_id'],
            'size_id' => $validatedData['size_id'],
            'quantity' => $validatedData['quantity'], // Convert array to JSON string
            // Add other form fields...
        ]);

        // Clear form fields after successful submission
        $this->reset([
            'customer_name',
            'customer_phone',
            'customer_address',
            'product_id',
            'color_id',
            'size_id',
            'quantity',
        ]);

        // Show success message
        session()->flash('success', 'Order added successfully!');
        $this->emit('showSuccessMessage');
    }

    public function updatedProductId($value)
    {
        $product = Product::with('colors.color', 'sizes.size')->find($value);
        
        if ($product) {
            $this->color_options = $product->colors;
            $this->size_options = $product->sizes;
        } else {
            $this->color_options = [];
            $this->size_options = [];
        }
    }

    public function editOrder(Order $order)
    {
        $product = Product::with('colors.color', 'sizes.size')->find($value);
        
        if ($product) {
            $this->color_options = $product->colors;
            $this->size_options = $product->sizes;
        } else {
            $this->color_options = [];
            $this->size_options = [];
        }
    }
}
