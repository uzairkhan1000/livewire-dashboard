<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="text-lg font-semibold">All Colors</h5>
                        </div>
                        <a wire:click="$emit('handleSetContent', 'color.add-color')" class="btn bg-gradient-primary btn-sm">+ New Color</a>
                    </div>
                </div>
                @if (session()->has('color_success'))
                <div class="alert alert-success effect mb-4 mx-4" id="successMessage">
                    {{ session('color_success') }}
                </div>
                @endif
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Color Code</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Color Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $color)
                            <tr>
                                <td class="py-2 px-4">{{ $color->id }}</td>
                                <td class="py-2 px-4"><span style="background-color: {{ $color->code }};">{{ $color->code }}</span></td>
                                <td class="py-2 px-4">{{ $color->name }}</td>
                                <td class="text-center py-2 px-4">
                                    <a href="#" wire:click="editColor({{ $color->id }})" class="mx-3">
                                        <i class="fas fa-edit text-secondary"></i>
                                    </a>
                                    <a href="#" wire:click="deleteColor({{ $color->id }})" class="mx-3">
                                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 col-md-12 d-flex justify-content-center">
                    {{ $colors->links() }}
                </div>
                @if ($showColorModal)
                @livewire('color.update-color', ['color' => $selectedColorId], key($selectedColorId))
                @endif

            </div>
        </div>
    </div>
</div>