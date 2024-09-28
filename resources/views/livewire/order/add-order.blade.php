<div class="container-fluid">
    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <h5 class="text-lg font-semibold">Add Order</h5>
                </div>
                <a wire:click="$emit('handleSetContent', 'order.all-orders')" class="btn bg-gradient-primary btn-sm">All Orders</a>
            </div>
        </div>
        <div class="card-body">
            @if (session()->has('success'))
            <div class="alert alert-success effect" id="successMessage">
                {{ session('success') }}
            </div>
            @endif
            <form wire:submit.prevent="saveOrder">
                <div class="mb-3">
                    <label for="product_id" class="form-label">Product</label>
                    <input wire:model.debounce.500ms="product_id" type="text" class="form-control">
                    @error('product_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="customer_name" class="form-label">Customer Name</label>
                    <input wire:model.defer="customer_name" type="text" class="form-control">
                    @error('customer_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="customer_phone" class="form-label">Customer Phone</label>
                    <input wire:model.defer="customer_phone" type="text" class="form-control">
                    @error('customer_phone') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="customer_address" class="form-label">Customer Address</label>
                    <input wire:model.defer="customer_address" type="text" class="form-control">
                    @error('customer_address') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="color_id" class="form-label">Select Color</label>
                    <select wire:model="color_id" class="form-control">
                        <option value="">Select a color</option>
                        @if(!empty($color_options))
                        @foreach($color_options as $color)
                        @if(!empty($color->color))
                        <option value="{{ $color->color->id }}">{{ $color->color->code }}</option>
                        @endif
                        @endforeach
                        @endif
                    </select>
                    @error('color_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="size_id" class="form-label">Select Size</label>
                    <select wire:model="size_id" class="form-control">
                        <option value="">Select a size</option>
                        @if(!empty($size_options))
                        @foreach($size_options as $size)
                        @if(!empty($size->size))
                        <option value="{{ $size->size->id }}">{{ $size->size->size }}</option>
                        @endif
                        @endforeach
                        @endif
                    </select>
                    @error('size_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input wire:model.defer="quantity" type="text" class="form-control">
                    @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Add the rest of the form fields as per the Livewire component -->

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Add Order</button>
                </div>

                <div wire:loading>
                    <div class="loading-bar"></div>
                </div>
            </form>
        </div>
    </div>
</div>