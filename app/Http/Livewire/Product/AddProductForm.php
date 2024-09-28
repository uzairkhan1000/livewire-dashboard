<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;

class AddProductForm extends Component
{
    use WithFileUploads;
    
    public $categories;
    public $category_id;
    public $product_name;
    public $sku;
    public $product_description;
    public $price;
    public $stock_quantity;
    public $product_images;
    public $status;
    // Add more form fields here...

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.product.add-product-form'); // Assuming 'layouts.app' is the theme's layout file
    }

    public function saveProduct()
{
    $validatedData = $this->validate([
        'product_name' => 'required|string|max:255',
        'sku' => 'required|string|unique:products,sku',
        'product_description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'category_id' => 'required|numeric',
        'stock_quantity' => 'required|integer|min:0',
        'status' => 'required',
    ]);

    $this->validate([
        'product_images.*' => 'image|max:2048', // Validate each image file (max size: 2MB)
    ]);

    // Handle image uploads and store them in the "storage/product/" directory
    $imagePaths = [];
    if(!empty($this->product_images)) {
        foreach ($this->product_images as $image) {
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('product', $imageName);
            $imagePaths[] = 'product/' . $imageName;
        }
    }

    // Create a new Product record
    $product = Product::create([
        'product_name' => $validatedData['product_name'],
        'sku' => $validatedData['sku'],
        'product_description' => $validatedData['product_description'],
        'price' => $validatedData['price'],
        'stock_quantity' => $validatedData['stock_quantity'],
        'status' => $validatedData['status'],
        'category_id' => $validatedData['category_id'],
        'product_images' => json_encode($imagePaths), 
        'created_by' => auth()->user()->id,
        'created_by_name' => auth()->user()->name
    ]);

    // Clear the form fields after successful submission
    $categories = $this->categories;
    $this->reset();
    $this->categories = $categories;

    session()->flash('success', 'Product added successfully!');
    $this->emit('showSuccessMessage');
}

}

