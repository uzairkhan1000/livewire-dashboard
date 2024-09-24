<div class="container-fluid">
    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <h5 class="text-lg font-semibold">Add Color</h5>
                </div>
                <a wire:click="$emit('handleSetNavbarLink', 'color.all-colors')" class="btn bg-gradient-primary btn-sm">All COlors</a>
            </div>
        </div>
        <div class="card-body">
            @if (session()->has('color_success'))
            <div class="alert alert-success effect" id="successMessage">
                {{ session('color_success') }}
            </div>
            @endif
            <form wire:submit.prevent="saveColor">
                <div class="mb-3">
                    <label for="color_code" class="form-label">Color Code</label>
                    <input wire:model.defer="color_code" type="text" class="form-control">
                    @error('color_code') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="color_name" class="form-label">Color Name</label>
                    <input wire:model.defer="color_name" type="text" class="form-control">
                    @error('color_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Add more form fields here as needed -->

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Add Color</button>
                </div>

                <div wire:loading>
                    <div class="loading-bar"></div>
                </div>
            </form>
        </div>
    </div>
</div>