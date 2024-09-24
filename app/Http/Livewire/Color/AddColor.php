<?php

namespace App\Http\Livewire\Color;

use Livewire\Component;
use App\Models\Color; // Make sure to import your Color model

class AddColor extends Component
{
    public $color_code;
    public $color_name;

    protected $rules = [
        'color_code' => 'required | unique:colors,code',
        'color_name' => 'required',
    ];

    public function updated($field)
    {
        $this->validateOnly($field); // Apply validation to the updated field
        // $this->updatedField = $field;
    }


    public function saveColor()
    {
        $this->validate();

        // Create a new color record in the database using the Color model
        Color::create([
            'code' => $this->color_code,
            'name' => $this->color_name,
        ]);

        // Clear the form fields after successfully saving
        $this->color_code = '';
        $this->color_name = '';

        session()->flash('color_success', 'Color added successfully!');
        $this->emit('showSuccessMessage');
    }

    public function render()
    {
        $this->emit('setActiveMenuItem', '');
        return view('livewire.color.add-color');
    }
}
