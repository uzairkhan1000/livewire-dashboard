
<div class="container-fluid">
    <div class="settings-modal d-block" tabindex="-1">
        <form wire:submit.prevent="updateProduct">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="card-title">Settings</h4>
                        <a wire:click="hideSettings()" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>

                        </a>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 ms-3 position-relative" id="sidenav-main">
                                
                                <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
                                    <ul class="navbar-nav">
                                        <li class="nav-item mt-2">
                                            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Color</h6>
                                        </li>
                                        <li class="nav-item" wire:click="setActiveLinkView('color.add-color')">
                                            <a class="nav-link {{ $activeView == 'color.add-color' ? 'active' : '' }}">
                                                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                                    <i class="fa fa-cart-plus ps-2 pe-2 text-center
                                                    {{ $activeView == 'color.add-color' ? 'text-white' : 'text-dark' }}"></i>
                                                </div>
                                                <span class="nav-link-text ms-1">Add Color</span>
                                            </a>
                                        </li>

                                        <li class="nav-item" wire:click="setActiveLinkView('color.all-colors')">
                                            <a class="nav-link {{ $activeView == 'color.all-colors' ? 'active' : '' }}">
                                                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                                    <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center
                        {{ $activeView == 'color.all-colors' ? 'text-white' : 'text-dark' }}"></i>
                                                </div>
                                                <span class="nav-link-text ms-1">All Colors</span>
                                            </a>
                                        </li>

                                        <li class="nav-item mt-2">
                                            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Size</h6>
                                        </li>

                                        <li class="nav-item" wire:click="setActiveLinkView('size.add-size')">
                                            <a class="nav-link {{ $activeView == 'size.add-size' ? 'active' : '' }}">
                                                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                                    <i class="fa fa-cart-plus ps-2 pe-2 text-center
                                                    {{ $activeView == 'size.add-size' ? 'text-white' : 'text-dark' }}"></i>
                                                </div>
                                                <span class="nav-link-text ms-1">Add Size</span>
                                            </a>
                                        </li>

                                        <li class="nav-item" wire:click="setActiveLinkView('size.all-sizes')">
                                            <a class="nav-link {{ $activeView == 'size.all-sizes' ? 'active' : '' }}">
                                                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                                    <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center
                        {{ $activeView == 'size.all-sizes' ? 'text-white' : 'text-dark' }}"></i>
                                                </div>
                                                <span class="nav-link-text ms-1">All Sizes</span>
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                            </aside>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="mt-3">
                            <a wire:click="hideSettings()" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                        </div>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
    </div>
    </form>
</div>
