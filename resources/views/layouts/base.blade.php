<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Soft UI Dashboard by Creative Tim</title>

    <!-- Metas -->
    @if(env('IS_DEMO'))
        <x-demo-metas></x-demo-metas>
    @endif

    <!-- Icons and Fonts -->
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/soft-ui-dashboard.css')}}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @livewireStyles
</head>

<body class="g-sidenav-show bg-gray-100">
    {{ $slot }}

    <!-- Core JS Files -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('assets/js/core/popper.min.js')}}" defer></script>
    <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}" defer></script>
    <script src="{{asset('assets/js/soft-ui-dashboard.js')}}" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    
    @livewireScripts

    <script src="{{ asset('js/custom.js') }}" defer></script> <!-- Externalized custom scripts -->

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = { damping: '0.5' };
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

        document.addEventListener('livewire:load', function () {
            Livewire.on('showSuccessMessage', function () {
                var successMessage = document.getElementById('successMessage');
                successMessage.style.display = 'block';
                setTimeout(function () {
                    successMessage.style.display = 'none';
                }, 5000);
            });
            Livewire.on('showErrorMessage', function () {
                var errorMessage = document.getElementById('errorMessage');
                errorMessage.style.display = 'block';
                setTimeout(function () {
                    errorMessage.style.display = 'none';
                }, 5000);
            });
        });

        @if (auth()->check())
        function playNotificationSound() {
            var sound = document.getElementById('notification-sound');
            sound.play();
        }

        $(document).ready(function() {
            if (typeof window.Echo !== 'undefined') {
                console.log(window.Echo, 'product-added.{{ auth()->user()->id }}');
                window.Echo.private('product-added.{{ auth()->user()->id }}')
                    .listen('ProductAdded', function(e) {
                        $('.notification-bell').css('color', '#ffdd40');
                        $('.notification-bell').css('animation', 'animation-layer-2 5000ms infinite');
                        playNotificationSound();
                        var notifications = $('#notifications');
                        var notification = $(`<li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 " alt="User Avatar">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">New Product Added</span> from ${e.product.created_by_name}
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i> 13 minutes ago
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>`);
                        notifications.append(notification);
                    });
            } else {
                console.error('Echo is not initialized.');
            }

            $('.notification-bell').click(function() {
                $('.notification-bell').css('color', 'black');
                $('.notification-bell').css('animation', 'none');
            });
        });
        @endif
    </script>
</body>

</html>
