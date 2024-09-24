<?php

namespace App\Http\Livewire;

use App\DataTables\ProductDataTable;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Yajra\DataTables\DataTables;

class DataTable extends Component
{
    use WithPagination;

    public $dataTable;

    public function mount(ProductDataTable $dataTable)
    {
        $this->dataTable = $dataTable;
    }

    public function render(ProductDataTable $dataTable)
    {
        

        return $dataTable->render('livewire.product.product-listing');
    }
}