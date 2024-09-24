<!DOCTYPE html>

<head>
    @include('livewire.client.partials.header')
    @yield('css')
</head>

<body class="relative">
    @yield('content')

    @include('livewire.client.partials.footer')
</body>

</html>