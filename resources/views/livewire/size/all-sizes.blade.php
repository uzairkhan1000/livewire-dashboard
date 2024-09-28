<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="text-lg font-semibold">All Sizes</h5>
                        </div>
                        <a wire:click="$emit('handleSetContent', 'size.add-size')" class="btn bg-gradient-primary btn-sm">+ New Size</a>
                    </div>
                </div>
                @if (session()->has('size_success'))
                <div class="alert alert-success effect mb-4 mx-4" id="successMessage">
                    {{ session('size_success') }}
                </div>
                @endif
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Size Code</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Size Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sizes as $size)
                            <tr>
                                <td class="py-2 px-4">{{ $size->id }}</td>
                                <td class="py-2 px-4">{{ $size->size }}</td>
                                <td class="py-2 px-4">{{ $size->name }}</td>
                                <td class="text-center py-2 px-4">
                                    <a href="#" wire:click="editSize({{ $size->id }})" class="mx-3">
                                        <i class="fas fa-edit text-secondary"></i>
                                    </a>
                                    <a href="#" wire:click="deleteSize({{ $size->id }})" class="mx-3">
                                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 col-md-12 d-flex justify-content-center">
                    {{ $sizes->links() }}
                </div>
                @if ($showSizeModal)
                @livewire('size.update-size', ['size' => $selectedSizeId], key($selectedSizeId))
                @endif

            </div>
        </div>
    </div>
</div>