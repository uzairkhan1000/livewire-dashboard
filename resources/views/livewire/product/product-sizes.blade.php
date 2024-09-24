<div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="sizes" class="form-label">Sizes</label>
                    <div class="row">
                        @if(!empty($sizes))
                            @foreach($sizes as $size)
                            @if(!empty($size->size->size))
                            <div class="col-2">
                                <div class="product-size-parent">
                                    <div class="col-1 product-size">
                                    <p>{{$size->size->size}}</p>
                                    </div>
                                    <i class="fa fa-times color-cross" wire:click="removeProductSize({{ $size->id }})"></i>

                                </div>
                            </div>
                            @endif
                            @endforeach
                        @else
                        <p>No sizes against this product.</p>
                        @endif
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="mt-3">
                        <label for="sizeSelect" class="form-label">Select Size to Add</label>
                        <div class="row">
                            <div class="col-6">
                                <select class="form-select" id="sizeSelect" wire:model="selectedSizeId">
                                    <option value="">Select Size</option>
                                    @foreach($sizeOptions as $optionId => $optionSize)
                                    <option value="{{ $optionId }}"><span>{{ $optionSize }}</span></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-primary" wire:click="addProductSize">Add Size</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>