<div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                @if (session()->has('images_success'))
                <div class="alert alert-success effect" id="successMessage">
                    {{ session('images_success') }}
                </div>
                @endif
                <div class="col-12 mb-3">
                    <label for="images" class="form-label">Images</label>
                    <div class="row">
                        @if(!empty($images))
                        <div class="col-md-12 mb-3">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner ps-5 pe-5">
                                    @foreach($images as $key => $slide)
                                    <div class="carousel-item @if($key == 0) active @endif}}">
                                        <div class="row">
                                            @foreach($slide as $image)
                                            <div class="col-md-4" style="height: 8vh; position:relative">
                                                <img style="height: inherit;" class="cursor-pointer" src="{{asset('storage/'.$image['path'])}}" wire:click="previewImage('{{ $image['path'] }}')">
                                                <i class="fa fa-times image-cross" wire:click="removeProductImage({{ $image['id'] }})"></i>

                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        @if(!empty($previewImage))
                        <div class="image-preview">
                            <label for="images" class="form-label">Preview</label>
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img id="previewImage" src="{{asset('storage/'.$previewImage)}}" class="img-fluid">
                                        <i class="fa fa-times image-cross" wire:click="hideImagePreview()"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @else
                        <p>No image against this product color.</p>
                        @endif
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="mt-3">
                        <label for="colorSelect" class="form-label">Select Color</label>
                        <div class="row">
                            <div class="col-md-12 mb-1 d-flex">
                                @foreach($product_colors as $color)
                                @if(!empty($color['color']))
                                <input wire:model="color_id" type="radio" class="form-control product-color cursor-pointer @if(!empty($color_id) && $color_id == $color->color_id) color-active @endif" value="{{$color['color']['id']}}" style="background-color: {{$color['color']['code']}};">
                                @endif
                                @endforeach
                                @error('color_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="colorSelect" class="form-label">Select Images to Add</label>
                        <div class="row">
                            <div class="col-md-12 mb-1">
                                <input wire:model="product_images" type="file" class="form-control" multiple>
                                @error('product_images.*') <span class="text-danger">{{ $message }}</span> @enderror
                                `
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-primary" wire:click="addProductImages">Add Images</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>