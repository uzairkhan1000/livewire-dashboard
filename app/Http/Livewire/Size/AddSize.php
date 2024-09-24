<?php

namespace App\Http\Livewire\Size;

use Livewire\Component;
use App\Models\Size; // Make sure to import your Size model

class AddSize extends Component
{
    public $size;
    public $name;

    protected $rules = [
        'size' => 'required | unique:sizes,size',
        'name' => 'required',
    ];

    public function saveSize()
    {
        $this->validate();

        // Create a new size record in the database using the Size model
        Size::create([
            'size' => $this->size,
            'name' => $this->name,
        ]);

        // Clear the form fields after successfully saving
        $this->size = '';
        $this->name = '';

        session()->flash('size_success', 'Size added successfully!');
        $this->emit('showSuccessMessage');
    }

    public function render()
    {
        $this->emit('setActiveMenuItem', '');
        return view('livewire.size.add-size');
    }
}
