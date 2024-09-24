<div class="container-fluid">
    <div class="card">
    <div class="card-header pb-0">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <h5 class="text-lg font-semibold">Add Product</h5>
                </div>
                <a wire:click="$emit('handleSetNavbarLink', 'product.product-listing')" class="btn bg-gradient-primary btn-sm">All Products</a>
            </div>
        </div>
        <div class="card-body">
            @if (session()->has('success'))
            <div class="alert alert-success effect" id="successMessage">
                {{ session('success') }}
            </div>
            @endif
            <form wire:submit.prevent="saveProduct">
                <div class="mb-3">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input wire:model.defer="product_name" type="text" class="form-control">
                    @error('product_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="sku" class="form-label">SKU</label>
                    <input wire:model.defer="sku" type="text" class="form-control">
                    @error('sku') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select wire:model="category_id" class="form-control">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="product_description" class="form-label">Product Description</label>
                    <textarea wire:model.defer="product_description" class="form-control"></textarea>
                    @error('product_description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input wire:model.defer="price" type="number" step="0.01" class="form-control">
                    @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="stock_quantity" class="form-label">Stock Quantity</label>
                    <input wire:model.defer="stock_quantity" type="number" class="form-control">
                    @error('stock_quantity') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select wire:model="status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="active">Active</option>
                        <option value="in_active">In Active</option>
                    </select>
                    @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="product_images" class="form-label">Product Images</label>
                    <input wire:model="product_images" type="file" class="form-control" multiple>
                    @error('product_images.*') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Add more form fields here as per your database table -->

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>

                <div wire:loading>
                    <div class="loading-bar"></div>
                </div>
            </form>
        </div>
    </div>
</div>