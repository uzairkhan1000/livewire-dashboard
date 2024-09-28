<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Settings extends Component
{
    public $activeView = '';
    
    public function render()
    {
        return view('livewire.settings');
    }

    public function setActiveLinkView($view)
    {
        $this->emit('handleSetNavbarLink', $view);
    }
}
