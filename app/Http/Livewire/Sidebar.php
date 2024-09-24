<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public $activeView = 'dashboard';

    protected $listeners = ['setActiveMenuItem'];

    public function render()
    {
        return view('livewire.sidebar');
    }

    public function setActiveLinkView($view)
    {
        $this->activeView = $view;
        $this->emit('handleSetNavbarLink', $view);
    }

    public function setActiveMenuItem($view)
    {
        $this->activeView = $view;
    }
}
