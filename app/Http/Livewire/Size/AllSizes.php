<?php

namespace App\Http\Livewire\Size;

use Livewire\Component;
use App\Models\Size;
use Livewire\WithPagination;

class AllSizes extends Component
{
    use WithPagination;

    public $selectedSizeId;
    public $showSizeModal = false;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['hideSizesUpdateModel', 'refreshSizes' => '$refresh'];

    public function editSize($sizeId)
    {
        $this->selectedSizeId = $sizeId;
        $this->showSizeModal = true;
    }

    public function deleteSize($sizeId)
    {
        Size::findOrFail($sizeId)->delete();
        session()->flash('size_success', 'size deleted successfully.');
        $this->emit('refreshSizes');
    }

    public function render()
    {
        $sizes = Size::latest()->paginate(10);
        return view('livewire.size.all-sizes', compact(['sizes']));
    }
}
