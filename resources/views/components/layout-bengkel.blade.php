<!DOCTYPE html>
<html lang="id" data-theme="sibantar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'SIBANTAR - Dashboard Bengkel' }}</title>
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
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
    @livewireScripts
</body>
</html>
