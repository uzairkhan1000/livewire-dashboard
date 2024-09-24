<div>
<div>
    <div class="table-responsive p-0">
        {!! $dataTable->table(['class' => 'table align-items-center mb-0']) !!} <!-- Render the data table -->
    </div>
</div>

@push('styles')
    <!-- Include Yajra DataTables CSS files here -->
    <link rel="stylesheet" href="{{ asset('vendor/datatables/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap5.min.css') }}">
@endpush

@push('scripts')
    <!-- Include Yajra DataTables JavaScript files here -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.buttons.min.js') }}"></script>
    <!-- Add any other Yajra DataTables extensions you have installed -->

    {!! $dataTable->scripts() !!}
@endpush
</div>
