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
            'All Products' => 'product.product-listing',
        ],
        'Order' => [
            'Add Order' => 'order.add-order',
            'All Orders' => 'order.all-orders',
        ],
        'Roles / Permissions' => [
            'Roles' => [
                'Add Role' => 'roles.add-role',
                'All Roles' => 'roles.all-roles'
            ],
        ],
    ];

    public function render()
    {
        return view('livewire.sidebar');
    }

    public function setActiveLinkView($view)
    {
        $this->activeView = $view;
        $this->emit('handleSetContent', $view);
    }

    public function getIconClass($componentPath)
    {
        $iconClasses = [
            'dashboard' => 'fa fa-tachometer-alt',
            'product.add-product-form' => 'fa fa-plus-circle',
            'product.product-listing' => 'fa fa-list',
            'order.add-order' => 'fa fa-cart-plus',
            'order.all-orders' => 'fa fa-shopping-cart',
            'roles.add-role' => 'fa fa-user-plus',
            'roles.all-roles' => 'fa fa-users-cog',
        ];

        return $iconClasses[$componentPath] ?? 'fa fa-question-circle';
    }
}
