<?php

namespace App\Observers;

use App\Models\Product;
use App\Services\PusherService;
use Illuminate\Support\Facades\Log;

class ProductObserver
{
    protected $pusherService;

    public function __construct(PusherService $pusherService)
    {
        $this->pusherService = $pusherService;
    }
    public function created(Product $product)
    {
        $adminId = auth()->user()->id; // Replace with the actual admin ID
        $product->load('colors', 'sizes');
        $this->pusherService->triggerNotification(
            'product-added.' . $adminId,
            'App\Events\ProductAdded',
            ['product' => $product, 'userId' => $adminId]
        );

        // event(new ProductAdded($product,$adminId));
        Log::info('true'. $adminId);
    }
}
