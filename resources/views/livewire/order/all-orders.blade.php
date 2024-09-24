<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Orders</h5>
                        </div>
                        <a wire:click="$emit('handleSetNavbarLink', 'order.add-order')" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New Order</a>
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
                                        Product
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Description
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Color
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Size
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Quantity
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Amount
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Customer
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Customer Phone
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Customer Address
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $order->id }}</p>
                                    </td>
                                    
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $order->product->product_name ?? '' }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $order->product->product_description ?? '' }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $order->color->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $order->size->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $order->quantity }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $order->quantity * $order->product->price}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $order->customer_name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $order->customer_phone }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $order->customer_address }}</p>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" wire:click="editorder({{ $order->id }})" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit order">
                                            <i class="fas fa-edit text-secondary"></i>
                                        </a>
                                        <span>
                                            <a href="#" wire:click="deleteorder({{ $order->id }})" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit order">
                                                <!-- <i class="fas fa-edit text-secondary"></i> -->
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </a>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                                <!-- Updateorder Modal -->

                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 col-md-12 d-flex justify-content-center">
                        {{ $orders->links() }}
                    </div>
                    <!-- @if ($showModal)
                    @livewire('order.update-order', ['order' => $selectedorderId], key($selectedorderId))
                    @endif -->

                </div>
            </div>
        </div>
    </div>
</div>