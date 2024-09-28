<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
        <div class="card-header pb-0 pt-3 ">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
                <p>See our dashboard options.</p>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            <div class="mt-3">
                <ul class="navbar-nav">
                    <li class="nav-item mt-2">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Color</h6>
                    </li>
                    <li class="nav-item" wire:click="setActiveLinkView('color.add-color')">
                        <a class="nav-link d-flex cursor-pointer {{ $activeView == 'color.add-color' ? 'active' : '' }}">
                            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-cart-plus ps-2 pe-2 text-center
                                {{ $activeView == 'color.add-color' ? 'text-white' : 'text-dark' }}"></i>
                            </div>
                            <span class="nav-link-text ms-1">Add Color</span>
                        </a>
                    </li>

                    <li class="nav-item" wire:click="setActiveLinkView('color.all-colors')">
                        <a class="nav-link d-flex cursor-pointer {{ $activeView == 'color.all-colors' ? 'active' : '' }}">
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
                        <a class="nav-link d-flex cursor-pointer {{ $activeView == 'size.add-size' ? 'active' : '' }}">
                            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-cart-plus ps-2 pe-2 text-center
                                {{ $activeView == 'size.add-size' ? 'text-white' : 'text-dark' }}"></i>
                            </div>
                            <span class="nav-link-text ms-1">Add Size</span>
                        </a>
                    </li>

                    <li class="nav-item" wire:click="setActiveLinkView('size.all-sizes')">
                        <a class="nav-link d-flex cursor-pointer {{ $activeView == 'size.all-sizes' ? 'active' : '' }}">
                            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center
    {{ $activeView == 'size.all-sizes' ? 'text-white' : 'text-dark' }}"></i>
                            </div>
                            <span class="nav-link-text ms-1">All Sizes</span>
                        </a>
                    </li>


                </ul>
            </div>
            <div>
                <h6 class="mb-0">Sidebar Colors</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors my-2 text-start">
                    <span class="badge filter bg-gradient-primary active" data-color="primary"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success" data-color="success"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning" data-color="warning"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger" data-color="danger"
                        onclick="sidebarColor(this)"></span>
                </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">Sidenav Type</h6>
                <p class="text-sm">Choose between 2 different sidenav types.</p>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent"
                    onclick="sidebarType(this)">Transparent</button>
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white"
                    onclick="sidebarType(this)">White</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="mt-3">
                <h6 class="mb-0">Navbar Fixed</h6>
            </div>
            <div class="form-check form-switch ps-0">
                <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                    onclick="navbarFixed(this)">
            </div>
            <hr class="horizontal dark my-sm-4">
            <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard-laravel-livewire"
                target="_blank">Free download</a>
            <a class="btn btn-outline-dark w-100"
                href="/documentation/bootstrap/overview/soft-ui-dashboard/index.html" target="blank">View
                documentation</a>
            <div class="w-100 text-center">
                <a class="github-button" href=" https://github.com/creativetimofficial/soft-ui-dashboard-laravel-livewire"
                    data-icon="octicon-star" data-size="large" data-show-count="true"
                    aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
                <h6 class="mt-3">Thank you for sharing!</h6>
                <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20and%20%40UPDIVISION%20%23webdesign%20%23dashboard%20%23laravel%20%23livewire%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard-laravel-livewire"
                    class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard-laravel-livewire"
                    class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                </a>
            </div>
        </div>
    </div>
</div>
