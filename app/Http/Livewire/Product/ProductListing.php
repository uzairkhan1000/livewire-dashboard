<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ProductListing extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $showModal = false;
    public $selectedProductId;

    protected $listeners = ['hideProductUpdateModal', 'refreshProductListing' => '$refresh'];

    public function render()
    {
        $products = Product::with(['category', 'colors', 'sizes', 'images'])->latest()->paginate(10);
        return view('livewire.product.product-listing', compact('products'));
    }

    public function setActiveLinkView($view)
    {
        $this->emit('setActiveMenuItem', $view);
        $this->emit('handleSetContent', $view);
    }

    public function editProduct($productId)
    {
        $this->showModal = true;
        $this->selectedProductId = $productId;
    }

    public function deleteProduct($productId)
    {
        Product::destroy($productId);
        session()->flash('success', 'Product deleted successfully!');
        $this->emit('showSuccessMessage');
    }

    public function hideProductUpdateModal()
    {
        $this->showModal = false;
        $this->selectedProductId = '';
    }

}
