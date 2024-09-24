<div class="container-fluid">
    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <h5 class="text-lg font-semibold">Add Role</h5>
                </div>
                <a wire:click="$emit('handleSetNavbarLink', 'roles.all-roles')" class="btn bg-gradient-primary btn-sm">All Roles</a>
            </div>
        </div>
        <div class="card-body">
            @if (session()->has('role_add_success'))
                <div class="alert alert-success effect" id="successMessage">
                    {{ session('role_add_success') }}
                </div>
            @endif
            <form wire:submit.prevent="addRole">
                <div class="mb-3">
                    <label for="role_name" class="form-label">Role Name</label>
                    <input wire:model.defer="role_name" type="text" class="form-control">
                    @error('role_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Add Role</button>
                </div>

                <div wire:loading>
                    <div class="loading-bar"></div>
                </div>
            </form>
        </div>
    </div>
</div>
