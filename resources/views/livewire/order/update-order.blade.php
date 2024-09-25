<div class="container-fluid">
    <div class="modal d-block" tabindex="-1">
        <form wire:submit.prevent="updateOrder">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="card-title">Update Order</h4>
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
                                    <div class="col-12 col-md-6">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <label for="customer_name" class="form-label">Customer Name</label>
                                                <input wire:model.defer="customer_name" type="text" class="form-control">
                                                @error('customer_name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="customer_phone" class="form-label">Customer Phone</label>
                                                <input wire:model.defer="customer_phone" type="text" class="form-control">
                                                @error('customer_phone') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="customer_address" class="form-label">Customer Address</label>
                                                <input wire:model.defer="customer_address" type="text" class="form-control">
                                                @error('customer_address') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="color_id" class="form-label">Select Color</label>
                                                <select wire:model="color_id" class="form-control">
                                                    <option value="">Select a color</option>
                                                    @if(!empty($color_options))
                                                    @foreach($color_options as $color)
                                                    @if(!empty($color->color))
                                                    <option value="{{ $color->color->id }}" @if($color->color->id == $color_id) selected @endif >{{ $color->color->code }}</option>
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
                                                    <option value="{{ $size->size->id }}" @if($size->size->id == $size_id) selected @endif>{{ $size->size->size }}</option>
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </select>
                                                @error('size_id') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="quantity" class="form-label">Quantity</label>
                                                <input wire:model.defer="quantity" type="text" class="form-control">
                                                @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>       
                                            
                                            <div class="col-12 mb-3">
                                                <div class="mt-3">
                                                    <button type="submit" class="btn btn-primary">Update Order</button>
                                                </div>
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