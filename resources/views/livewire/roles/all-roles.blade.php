<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Roles</h5>
                        </div>
                        <a wire:click="setActiveLinkView('roles.add-role')" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New Role</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                @if (session()->has('success'))
                    <div class="alert alert-success effect" id="successMessage">
                        {{ session('success') }}
                    </div>
                @endif
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Name
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Guard Name
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $role->id }}</p>
                                    </td>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $role->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $role->guard_name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" wire:click="editRole({{ $role->id }})" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit role">
                                            <i class="fas fa-edit text-secondary"></i>
                                        </a>
                                        <span>
                                            <a href="#" wire:click="deleteRole({{ $role->id }})" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Delete role">
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </a>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 col-md-12 d-flex justify-content-center">
                        {{ $roles->links() }}
                    </div>
                    @if ($showModal)
                    @livewire('role.update-role', ['role' => $selectedRoleId], key($selectedRoleId))
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
