<div class="container-fluid">
    <div class="modal d-block" tabindex="-1">
        <form wire:submit.prevent="updateProduct">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="card-title">Update Product</h4>
                        <a wire:click.prefetch="hideModal()" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>

                        </a>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                @if (session()->has('success'))
                                <div class="alert alert-success effect" id="successMessage">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <label for="product_name" class="form-label">Product Name</label>
                                                <input wire:model.defer="product_name" type="text" class="form-control">
                                                @error('product_name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="sku" class="form-label">SKU</label>
                                                <input wire:model.defer="sku" type="text" class="form-control">
                                                @error('sku') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="category" class="form-label">Category</label>
                                                <select wire:model="category_id" class="form-control">
                                                    <option value="">Select a category</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="product_description" class="form-label">Product Description</label>
                                                <textarea wire:model.defer="product_description" class="form-control"></textarea>
                                                @error('product_description') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="col-12 mb-3">
                                            <label for="price" class="form-label">Price</label>
                                            <input wire:model.defer="price" type="number" step="0.01" class="form-control">
                                            @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label for="stock_quantity" class="form-label">Stock Quantity</label>
                                            <input wire:model.defer="stock_quantity" type="number" class="form-control">
                                            @error('stock_quantity') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select wire:model="status" class="form-control">
                                                <option value="">Select Status</option>
                                                <option value="active" @if($status=='active' ) selected @endif>Active</option>
                                                <option value="in_active" @if($status=='in_active' ) selected @endif>In Active</option>
                                            </select>
                                            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label for="product_thumbnail" class="form-label">Product Thumbnail</label>
                                                    <input wire:model.defer="product_thumbnail" type="file" class="form-control">
                                                    @error('product_thumbnail') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="col-md-4 product-thumbnail">

                                                @if(!empty($product_thumbnail_img))
                                                <img src="{{$product_thumbnail_img}}" > 
                                                @endif

                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-primary">Update Product</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="row">
                                            <div class="col-12 mb-2">
                                                @livewire('product.product-images', ['product_id' => $product->id])
                                            </div>
                                            <div class="col-12 mb-2">
                                                @livewire('product.product-colors', ['product_id' => $product->id, 'colors' => $product_colors])
                                            </div>
                                            <div class="col-12">
                                                @livewire('product.product-sizes', ['product_id' => $product->id, 'sizes' => $product_sizes])
                                            </div>
                                        </div>


                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="mt-3">
                            <a wire:click="hideModal()" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                        </div>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
    </div>
    </form>
</div>