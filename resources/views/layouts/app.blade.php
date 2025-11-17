<!DOCTYPE html>
<html lang="id" data-theme="sibantar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'SIBANTAR - Bantuan Darurat Kendaraan Terdekat' }}</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
    <style>
    #map {
            width: 100%;
            height: 350px !important;
            background: #e5e7eb;
            border-radius: 0.75rem;
        }
        .leaflet-container {
            background: #e5e7eb !important;
        }
    </style>
</head>
<body class="bg-neutral-50">
    
    @include('components.header')
    
    <main>
        {{ $slot }}
    </main>
    
    @include('components.footer')
    
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    @stack('scripts')
</body>
</html>