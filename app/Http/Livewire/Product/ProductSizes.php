<?php

namespace App\Http\Livewire\Product;

use App\Models\Size;
use App\Models\Product;
use App\Models\ProductSize;
use Livewire\Component;

class ProductSizes extends Component
{
    public $product_id;
    public $sizes;
    public $sizeOptions;
    public $selectedSizeId;

    public function mount($product_id, $sizes)
    {
        $this->product_id = $product_id;
        $this->sizes = $sizes;
        $this->sizeOptions = Size::pluck('size', 'id')->toArray();
    }

    public function render()
    {
        return view('livewire.product.product-sizes');
    }

    public function addProductSize()
    {
        // Check if a color is selected
        if (!empty($this->selectedSizeId)) {
            // Add the selected color to the product (assuming you have a relationship set up)

            $add_product_size = ProductSize::create([
                'product_id' => $this->product_id,
                'size_id' => $this->selectedSizeId
            ]);
            // Clear the selected color after adding
            $this->selectedSizeId = '';
            $product = Product::with('sizes.size')->find($this->product_id);
            $this->sizes = $product->sizes;
            $this->render();
        }
    }

    public function removeProductSize($size_id)
    {

        $product = Product::find($this->product_id);

        if ($product) {
            // Find and delete the specific color from the loaded product
            $size = $product->sizes()->find($size_id);
            if ($size) {
                $size->delete();
                $product = Product::with('sizes.size')->find($this->product_id);
                $this->sizes = $product->sizes;
                $this->render();
            }
        }
    }
}
