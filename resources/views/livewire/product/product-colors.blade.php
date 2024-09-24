<div>
    <div class="card">
        <div class="card-body">
            @if (session()->has('error'))
            <div class="alert alert-danger effect" id="errorMessage">
                {{ session('error') }}
            </div>
            @endif
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="colors" class="form-label">Colors</label>
                    <div class="row">
                        @if(!empty($colors))
                        @foreach($colors as $color)
                        @if(!empty($color->color))
                        <div class="col-2">
                            <div class="col-1 product-color" style="background-color:<?php echo $color->color ? $color->color->code : '#fff' ?>;">
                                <i class="fa fa-times color-cross" wire:click="removeProductColor({{ $color->id }})"></i>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @else
                        <p>No color against this product.</p>
                        @endif
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="mt-3">
                        <label for="colorSelect" class="form-label">Select Color to Add</label>
                        <div class="row">
                            <div class="col-6">
                                <select class="form-select" id="colorSelect" wire:model="selectedColorId">
                                    <option value="">Select Color</option>
                                    @if(!empty($colorOptions))
                                    @foreach($colorOptions as $optionId => $optionCode)
                                    <option value="{{ $optionId }}" style="padding:10px; background-color: {{ $optionCode }}; color: white;">
                                        {{ $optionCode }}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>


                            </div>
                            <div class="col-6">
                                <a class="btn btn-primary" wire:click="addProductColor">Add Color</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>