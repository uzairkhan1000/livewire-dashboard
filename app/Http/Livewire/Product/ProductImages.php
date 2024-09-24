<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ProductImages extends Component
{
    use WithFileUploads;

    public $product_id;
    public $images;
    public $product_images;
    public $product_colors;
    public $previewImage = '';
    public $color_id ;

    protected $listeners = ['refreshProductImages' => 'refreshProductImages'];

    public function mount($product_id)
    {
        $this->product_id = $product_id;
        $this->product_colors = ProductColor::with('color')->where('product_id', $this->product_id)->get();
        
        if(!empty($this->color_id)) {
            $images = ProductImage::where('product_id', $this->product_id)->where('color_id', $this->color_id)->get()->toArray() ?? [];
            $this->images = array_chunk($images, 3);
        } else {
            $images = ProductImage::where('product_id', $this->product_id)->get()->toArray() ?? [];
            $this->images = array_chunk($images, 3);
        }
    }

    public function render()
    {
        return view('livewire.product.product-images');
    }

    public function updatedColorId() {
        if(!empty($this->color_id)) {
            $images = ProductImage::where('product_id', $this->product_id)->where('color_id', $this->color_id)->get()->toArray() ?? [];
            $this->images = array_chunk($images, 3);
        }
    }

    public function addProductImages()
    {
        $this->validate([
            'color_id' => 'required | numeric', // Validate each image file (max size: 2MB)
            'product_images.*' => 'required | image | mimes:jpeg,png,jpg,gif', // Validate each image file (max size: 2MB)
        ]);

        if (!empty($this->product_images)) {
            foreach ($this->product_images as $image) {
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $destinationPath = storage_path('app/public/product/'); // Change storage_path to public_path

                if (!File::isDirectory($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }

                $compressedImage = Image::make($image->getRealPath());
                // $compressedImage->resize(500, 500, function ($constraint) {
                //     $constraint->aspectRatio();
                // })->save($destinationPath . $imageName);
                $compressedImage->resize(900, 1080)->save($destinationPath . $imageName);

                $add_image = ProductImage::create([
                    'product_id' => $this->product_id,
                    'color_id' => $this->color_id,
                    'path' => 'product/' . $imageName,
                ]);                

            }

            // $images = ProductImage::where('product_id', $this->product_id)->get()->toArray();
            // $this->images = array_chunk($images, 3);
            $this->reset('product_images');
            $this->mount($this->product_id);
            session()->flash('images_success', 'Images added successfully!');
            $this->emit('showSuccessMessage');
        }

    }

    public function removeProductImage($image_id)
    {

        $product = Product::find($this->product_id);

        if ($product) {
            // Find and delete the specific color from the loaded product
            $image = $product->images()->find($image_id);
            if ($image) {
                $image->delete();
                $product = Product::with('images')->find($this->product_id);
                $images = $product->images->toArray();
                $this->images = array_chunk($images, 3);
                
                session()->flash('images_success', 'Image deleted successfully!');
                $this->emit('showSuccessMessage');
                $this->mount($this->product_id);
            }
        }
    }

    public function previewImage($image) {
        $this->previewImage = $image;
    }

    public function hideImagePreview() {
        $this->previewImage = '';
    }

    public function refreshProductImages() {
        $this->mount($this->product_id);
    }
   
}
