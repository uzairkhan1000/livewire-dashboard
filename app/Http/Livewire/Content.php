<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Content extends Component
{
    public $activePage = 'Dashboard';
    public $activeView = 'dashboard';
    public $showSettings = false;

    protected $listeners = ['handleSetNavbarLink', 'hideSettings'];

    public function render()
    {
        return view('livewire.content');
    }

    public function handleSetNavbarLink($view)
    {
        if ($view !== $this->activeView) {
            
            $this->activeView = $view;
            $lastDotPosition = strrpos($view, '.');
            if ($lastDotPosition !== false) {
                // Use substr to get the string from the last dot onward
                $substringFromLastDot = substr($view, $lastDotPosition + 1);
            } else {
                $substringFromLastDot = substr($view, $lastDotPosition);
            }

            $cleanedSubstring = ucwords(str_replace(['-', '_'], ' ', $substringFromLastDot));
            $this->activePage = $cleanedSubstring;
            $this->emit('setActiveMenuItem', $view);
            
        }
    }

    public function showSettings() {
        if($this->showSettings === false) {
            $this->showSettings = true;
        } else {
            $this->showSettings = false;
        }
    }

    function hideSettings() {
        $this->showSettings = false;
    }
}
