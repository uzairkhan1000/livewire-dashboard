<?php

namespace App\Http\Livewire\Product;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use Livewire\Component;

class ProductColors extends Component
{
    public $product_id;
    public $colors;
    public $colorOptions;
    public $selectedColorId;

    protected $listeners = ['refreshProductColors' => '$refresh'];

    public function mount($product_id, $colors)
    {
        $this->product_id = $product_id;
        $this->colors = $colors;
        $this->colorOptions = Color::distinct('code')->pluck('code', 'id')->toArray();
    }

    public function render()
    {
        return view('livewire.product.product-colors');
    }

    public function addProductColor()
    {
        // Check if a color is selected
        if (!empty($this->selectedColorId)) {
            // Add the selected color to the product (assuming you have a relationship set up)
            $existingColor = ProductColor::where('product_id', $this->product_id)
                ->where('color_id', $this->selectedColorId)
                ->first();

            if (!$existingColor) {
                // Add the selected color to the product (assuming you have a relationship set up)
                $add_product_color = ProductColor::create([
                    'product_id' => $this->product_id,
                    'color_id' => $this->selectedColorId
                ]);

                // Clear the selected color after adding
                $this->selectedColorId = '';

                $product = Product::with('colors.color')->find($this->product_id);
                $this->colors = $product->colors;
                $this->emit('refreshProductColors');
                $this->emit('refreshProductImages');
            } else {
                session()->flash('error', 'Color Already Exists!');
                $this->emit('showErrorMessage');
            }
        }
    }

    public function removeProductColor($color_id)
    {

        $product = Product::find($this->product_id);

        if ($product) {
            // Find and delete the specific color from the loaded product
            $color = $product->colors()->find($color_id);
            if ($color) {
                $color->delete();
                $product = Product::with('colors.color')->find($this->product_id);
                $this->colors = $product->colors;
                $this->emit('refreshProductImages');
                $this->render();
            }
        }
    }
}
