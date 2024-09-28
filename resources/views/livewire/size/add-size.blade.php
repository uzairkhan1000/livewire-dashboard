<div class="container-fluid">
    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <h5 class="text-lg font-semibold">Add Size</h5>
                </div>
                <a wire:click="$emit('handleSetContent', 'size.all-sizes')" class="btn bg-gradient-primary btn-sm">All Sizes</a>
            </div>
        </div>
        <div class="card-body">
            @if (session()->has('size_success'))
            <div class="alert alert-success effect" id="successMessage">
                {{ session('size_success') }}
            </div>
            @endif
            <form wire:submit.prevent="saveSize">
                <div class="mb-3">
                    <label for="size" class="form-label">Size</label>
                    <input wire:model.defer="size" type="text" class="form-control">
                    @error('size') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Size Name</label>
                    <input wire:model.defer="name" type="text" class="form-control">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Add more form fields here as needed -->

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Add Size</button>
                </div>

                <div wire:loading>
                    <div class="loading-bar"></div>
                </div>
            </form>
        </div>
    </div>
</div>