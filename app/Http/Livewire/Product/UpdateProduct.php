<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class UpdateProduct extends Component
{
    use WithFileUploads;

    public $categories;
    public $category_id;    
    public $product;
    public $productId;
    public $product_name;
    public $sku;
    public $product_description;
    public $price;
    public $stock_quantity; 
    public $status; 
    public $product_colors; 
    public $product_sizes; 
    public $product_thumbnail; 
    public $product_thumbnail_img; 

    protected $listeners = ['refreshProductUpdateModal' => '$refresh'];

    // Add other form fields...

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->productId = $product->id;
        $this->product_name = $product->product_name;
        $this->sku = $product->sku;
        $this->category_id = $product->category_id;
        $this->product_description = $product->product_description;
        $this->price = $product->price;
        $this->stock_quantity = $product->stock_quantity;
        $this->status = $product->status;
        $this->product_colors = $product->colors;
        $this->product_sizes = $product->sizes;
        $this->product_thumbnail_img = $product->product_thumbnail;
        $this->categories = Category::all();

        // Set other form fields...
    }

    public function updateProduct()
    {
        $validatedData = $this->validate([
            'product_name' => 'required|string|max:255',
            'sku' => 'required|string|unique:products,sku,' . $this->product->id,
            'product_description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'category_id' => 'required|numeric',
            'status' => 'required',
            'product_thumbnail' => 'required | image',
            // Add validation rules for other form fields...
        ]);

        $destinationPath = storage_path('app/public/product/thumbnails/');
        $image = $validatedData['product_thumbnail'];
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        $compressedImage = Image::make($image->getRealPath());
        // $compressedImage->resize(500, 500, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save($destinationPath . $imageName);
        $compressedImage->resize(300, 400)->save($destinationPath . $imageName);

        $this->product->update([
            'product_name' => $validatedData['product_name'],
            'sku' => $validatedData['sku'],
            'product_description' => $validatedData['product_description'],
            'price' => $validatedData['price'],
            'stock_quantity' => $validatedData['stock_quantity'],
            'status' => $validatedData['status'],
            'category_id' => $validatedData['category_id'],
            'product_thumbnail' => asset('storage/product/thumbnails/'.$imageName),
        ]);

        session()->flash('success', 'Product updated successfully!');
        $this->emit('showSuccessMessage');
        $this->emit('refreshProductListing');
        $this->mount(Product::find($this->productId));
        // $this->emit('refreshProductUpdateModal');
        // $this->emit('hideProductUpdateModal');
    }

    public function render()
    {
        return view('livewire.product.update-product');
    }
    public function hideModal()
    {
        $this->emit('hideProductUpdateModal');
    }
}
