<!DOCTYPE html>
<html lang="id" data-theme="sibantar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'SIBANTAR - Dashboard Bengkel' }}</title>
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Notyf CSS (toast notifications) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Additional Styles -->
    @stack('styles')

    @livewireStyles
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="bg-neutral-50">
    
    <!-- Navbar Bengkel -->
    <x-navbar-bengkel />
    
    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>
    
    <!-- Footer Component -->
    <x-footer />
    
    <!-- Scripts -->
    @stack('scripts')
    <!-- Notyf JS -->
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <script>
        // initialize Notyf
        const notyf = new Notyf({
            duration: 4000,
            position: { x: 'right', y: 'top' }
        });

        // Show Laravel session flash messages via Notyf
        @if(session('success'))
            notyf.success(@json(session('success')));
        @endif

        @if(session('error'))
            notyf.error(@json(session('error')));
        @endif
    </script>

    @livewireScripts
</body>
</html>
