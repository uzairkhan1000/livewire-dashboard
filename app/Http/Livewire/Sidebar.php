<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Sidebar extends Component
{
    public $activeView = 'dashboard';

    public $sidebar_items = [
        'Dashboard' => 'dashboard', 
        'Product' => [
            'Add Product' => 'product.add-product-form',
            'All Product' => 'product.product-listing',
        ],
        'Order' => [
            'Add Order' => 'order.add-order',
            'All Order' => 'order.all-orders',
        ],
        'Roles / Permissions' => [
            'Roles' => [
                'Add Role' => 'roles.add-role',
                'All Role' => 'roles.all-roles'
            ],
        ],
    ];

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

    public function getIconClass($component)
    {
        // Make an HTTP request to the Iconify API with the "fa" prefix
        if (str_word_count($component) === 1) {
            // If only one word, just convert to lowercase
            $icon = 'fa-' . strtolower($component);
        } else {
            // If more than one word, explode and get the last word, then convert to lowercase
            $words = explode(' ', $component);
            $icon = 'fa-' . strtolower(end($words));
        }

        
        $response = Http::get("https://api.iconify.design/search?query=$icon");
        
        if ($response->successful()) {
            $iconData = $response->json();
            Log::info( $iconData);
            // Extract the first icon from the search results
            $firstIcon = $iconData['icons'][0] ?? null;
            if ($firstIcon) {
                return str_replace(':', '-', $firstIcon);
            }
        }

        // Handle error (e.g., icon not found)
        return 'fa-question-circle'; // Default icon if not found
    }
}
