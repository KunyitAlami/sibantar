<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'SIBANTAR - Bantuan Darurat Kendaraan Terdekat' }}</title>
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Additional Styles -->
    @stack('styles')

    @livewireStyles
</head>
<body class="bg-neutral-50">
    
    <!-- Header Component -->
    <x-header />
    
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
