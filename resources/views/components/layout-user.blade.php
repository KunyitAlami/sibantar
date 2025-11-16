<!DOCTYPE html>
<html lang="id" data-theme="sibantar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'SIBANTAR - Bantuan Darurat Kendaraan Terdekat' }}</title>
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Notyf CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    
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
    
    <!-- Notyf JS -->
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script>
        // Initialize Notyf globally
        const notyf = new Notyf({
            duration: 3500,
            position: {
                x: 'right',
                y: 'top',
            },
            dismissible: true,
            ripple: false,
            types: [
                {
                    type: 'success',
                    background: 'white',
                    className: 'custom-success',
                    icon: false
                },
                {
                    type: 'error',
                    background: 'white',
                    className: 'custom-error',
                    icon: false
                },
                {
                    type: 'warning',
                    background: 'white',
                    className: 'custom-warning',
                    icon: false
                },
                {
                    type: 'info',
                    background: 'white',
                    className: 'custom-info',
                    icon: false
                }
            ]
        });
    </script>
    <style>
        /* Custom Notyf styling */
        .notyf {
            top: 72px !important;
            padding: 0 16px !important;
        }
        
        .notyf__toast {
            max-width: 400px !important;
            min-width: 320px !important;
            padding: 0 !important;
            border-radius: 12px !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08), 0 0 0 1px rgba(0, 0, 0, 0.05) !important;
            background: white !important;
            overflow: hidden !important;
        }
        
        .notyf__wrapper {
            padding: 14px 16px !important;
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
        }
        
        .notyf__message {
            font-size: 14px !important;
            line-height: 1.5 !important;
            font-weight: 500 !important;
            color: #171717 !important;
            flex: 1 !important;
        }
        
        /* Success */
        .custom-success {
            border-left: 4px solid #10b981 !important;
        }
        .custom-success .notyf__wrapper::before {
            content: '✓';
            display: flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #d1fae5;
            color: #10b981;
            font-weight: 700;
            font-size: 16px;
            flex-shrink: 0;
        }
        
        /* Error */
        .custom-error {
            border-left: 4px solid #ef4444 !important;
        }
        .custom-error .notyf__wrapper::before {
            content: '✕';
            display: flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #fee2e2;
            color: #ef4444;
            font-weight: 700;
            font-size: 16px;
            flex-shrink: 0;
        }
        
        /* Warning */
        .custom-warning {
            border-left: 4px solid #f59e0b !important;
        }
        .custom-warning .notyf__wrapper::before {
            content: '⚠';
            display: flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #fef3c7;
            color: #f59e0b;
            font-weight: 700;
            font-size: 16px;
            flex-shrink: 0;
        }
        
        /* Info */
        .custom-info {
            border-left: 4px solid #0051BA !important;
        }
        .custom-info .notyf__wrapper::before {
            content: 'i';
            display: flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #dbeafe;
            color: #0051BA;
            font-weight: 700;
            font-size: 16px;
            font-style: normal;
            flex-shrink: 0;
        }
        
        /* Dismiss button */
        .notyf__dismiss {
            background: transparent !important;
            border: none !important;
            color: #737373 !important;
            font-size: 20px !important;
            padding: 0 !important;
            width: 24px !important;
            height: 24px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            cursor: pointer !important;
            opacity: 0.6 !important;
            transition: opacity 0.2s !important;
        }
        .notyf__dismiss:hover {
            opacity: 1 !important;
        }
    </style>
    
    <!-- Scripts -->
    @stack('scripts')
    @livewireScripts
</body>
</html>
