<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Products</h5>
                        </div>
                        <a wire:click="setActiveLinkView('product.add-product-form')" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New Product</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                @if (session()->has('success'))
                    <div class="alert alert-success effect" id="successMessage">
                        {{ session('success') }}
                    </div>
                @endif
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Category
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Photo
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        SKU
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Price
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Stock Quantity
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $product->id }}</p>
                                    </td>
                                    
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $product->category->name ?? '' }}</p>
                                    </td>
                                    <td>
                                        @if(!empty($product->product_images))
                                        <div>
                                            @foreach(json_decode($product->images) as $key => $image)
                                            @if($key < 3) 
                                            <img src="<?php echo asset('storage/'.$image->path) ?>" class="avatar avatar-sm me-3">
                                            @endif
                                            @endforeach
                                        </div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $product->product_name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $product->sku }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $product->price }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $product->stock_quantity }}</p>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" wire:click="editProduct({{ $product->id }})" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                            <i class="fas fa-edit text-secondary"></i>
                                        </a>
                                        <span>
                                            <a href="#" wire:click="deleteProduct({{ $product->id }})" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                                <!-- <i class="fas fa-edit text-secondary"></i> -->
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </a>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                                <!-- UpdateProduct Modal -->

                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 col-md-12 d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>
                    @if ($showModal)
                    @livewire('product.update-product', ['product' => $selectedProductId], key($selectedProductId))
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>