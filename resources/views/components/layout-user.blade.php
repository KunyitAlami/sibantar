<!DOCTYPE html>
<html lang="id" data-theme="sibantar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'SIBANTAR - Bantuan Darurat Kendaraan Terdekat' }}</title>
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Notyf removed: toasts disabled per request -->
    
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <!-- Additional Styles -->
    @stack('styles')

    @livewireStyles
</head>
<body class="bg-neutral-50">
    
    <!-- Navbar User -->
    <x-navbar-user />
    
    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>
    
    <!-- Footer Component -->
    <x-footer />
    
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Notyf removed: toasts disabled per request -->
    
    <!-- Scripts -->
    @stack('scripts')
    @livewireScripts
</body>
</html>
