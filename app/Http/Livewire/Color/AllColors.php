<?php

namespace App\Http\Livewire\Color;

use Livewire\Component;
use App\Models\Color;
use Livewire\WithPagination;

class AllColors extends Component
{
    use WithPagination;

    public $selectedColorId;
    public $showColorModal = false;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['hideColorsUpdateModel', 'refreshColors' => '$refresh'];

    public function editColor($colorId)
    {
        $this->selectedColorId = $colorId;
        $this->showColorModal = true;
    }

    public function deleteColor($colorId)
    {
        Color::findOrFail($colorId)->delete();
        session()->flash('color_success', 'Color deleted successfully.');
        $this->emit('refreshColors');
    }

    public function render()
    {
        $colors = Color::latest()->paginate(10);
        return view('livewire.color.all-colors', compact(['colors']));
    }
}
