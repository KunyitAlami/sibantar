<div wire:init="loadOrder" wire:poll.3000ms="loadOrder">
    <!-- Header -->
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="{{ route('user.dashboard') }}" class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="font-bold text-lg text-neutral-900">Riwayat Pesanan</h1>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-6">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto space-y-6">

                <!-- Status Card -->
                <div class="text-center mb-8">
                    <div class="w-20 h-20 bg-warning-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-warning-600 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-neutral-900 mb-2">Menunggu Konfirmasi</h2>
                    <p class="text-neutral-600 text-sm">Sedang menunggu konfirmasi<br>dari bengkel</p>
                </div>

                @if($order && $order->status !== 'ditolak')
                    <!-- Countdown Timer -->
                    <div class="card p-6 bg-warning-50 border-2 border-warning-200 text-center"
                         x-data="{
                             countdown_ms: {{ $order->countdown_ms ?? 0 }},
                             now: 0,
                             diff: {{ $order->countdown_ms ?? 0 }},
                             isActive: {{ ($order->countdown_ms ?? 0) > 0 ? 'true' : 'false' }},
                             isConfirmed: '{{ $order->countDown?->status ?? '' }}' === 'terkonfirmasi',
                             orderStatus: '{{ $order->status }}',
                             countdownExpired: false,
                             redirectTimer: null
                         }"
                         x-init="
                             console.log('Order #{{ $order->id_order }}', {
                                 countdown_ms: countdown_ms,
                                 isActive: isActive,
                                 isConfirmed: isConfirmed,
                                 countDownStatus: '{{ $order->countDown?->status ?? 'NULL' }}',
                                 orderStatus: orderStatus
                             });
                             
                             // Helper to toggle navbar disabled state and beforeunload
                             const navbar = document.getElementById('main-navbar-user');
                             const beforeUnloadHandler = (e) => {
                                 e.preventDefault();
                                 e.returnValue = 'Dilarang meninggalkan halaman sampai countdown berakhir';
                             };

                             function toggleNavbarAndWarn(){
                                 if(navbar){
                                     if(isActive){
                                         navbar.classList.add('pointer-events-none','opacity-60','select-none');
                                     } else {
                                         navbar.classList.remove('pointer-events-none','opacity-60','select-none');
                                     }
                                 }
                                 if(isActive){
                                     window.addEventListener('beforeunload', beforeUnloadHandler);
                                 } else {
                                     window.removeEventListener('beforeunload', beforeUnloadHandler);
                                 }
                             }

                             // Initial toggle based on current state
                             toggleNavbarAndWarn();

                             // Watch isActive to toggle nav & beforeunload
                             $watch('isActive', (val) => {
                                 isActive = val;
                                 toggleNavbarAndWarn();
                             });

                             // Watch for confirmation/expiry to ensure nav is re-enabled
                             $watch('isConfirmed', (val) => {
                                 if(val){
                                     isActive = false; countdownExpired = false;
                                     toggleNavbarAndWarn();
                                 }
                             });
                             $watch('countdownExpired', (val) => {
                                 if(val){
                                     isActive = false;
                                     toggleNavbarAndWarn();
                                 }
                             });

                             if(isActive && !isConfirmed && countdown_ms > 0){
                                 let interval = setInterval(() => {
                                     now += 1000;
                                     diff = countdown_ms - now;
                                     
                                     if(diff <= 0){
                                         diff = 0;
                                         isActive = false;
                                         countdownExpired = true;
                                         clearInterval(interval);
                                         
                                         // Panggil method Livewire untuk menandakan countdown habis
                                         $wire.handleCountdownExpired();
                                         
                                         // Jangan redirect otomatis: tampilkan UI 'Pesanan ditolak' di halaman
                                     }
                                 }, 1000);
                             } else if (diff <= 0) {
                                 // Jika countdown sudah habis dari awal
                                 countdownExpired = true;
                                 // Panggil Livewire untuk memastikan state server terupdate
                                 $wire.handleCountdownExpired();
                             }
                             
                             // Listen untuk event dari Livewire
                             window.addEventListener('countdown-expired', () => {
                                 countdownExpired = true;
                             });
                         ">
                        <p class="text-sm text-neutral-600 mb-2">Sisa waktu konfirmasi</p>
                        
                        <div class="mt-3">
                            <!-- Countdown Display -->
                            <template x-if="!isConfirmed && !countdownExpired && diff > 0">
                                <span x-text="Math.floor(diff/60000).toString().padStart(2,'0') + ':' + Math.floor((diff%60000)/1000).toString().padStart(2,'0')"
                                      class="text-3xl font-bold text-red-600">
                                </span>
                            </template>

                            <!-- Sudah Dikonfirmasi -->
                            <template x-if="isConfirmed">
                                <div class="space-y-2">
                                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto">
                                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span class="text-lg font-semibold text-green-600">
                                        Pesanan sudah dikonfirmasi
                                    </span>
                                </div>
                            </template>

                            <!-- Waktu Habis -->
                            <template x-if="!isConfirmed && countdownExpired">
                                <div class="space-y-3 animate-fade-in">
                                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto">
                                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-lg font-semibold text-red-600 mb-2">
                                            Waktu konfirmasi habis
                                        </p>
                                        <p class="text-sm text-neutral-600">
                                            Pesanan otomatis dibatalkan
                                        </p>
                                        <div class="mt-4 flex items-center justify-center gap-2 text-sm text-neutral-500">
                                            <svg class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                            <span>Mengalihkan ke detail pesanan...</span>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                        
                        <p class="text-center text-xs text-neutral-500 mt-3" x-show="!countdownExpired">
                            Pesanan otomatis dibatalkan jika tidak ada konfirmasi
                        </p>

                        <!-- Warning about leaving page while countdown active -->
                        <div x-show="isActive && !isConfirmed" x-cloak class="mt-4">
                            <div class="px-4 py-3 bg-red-50 border border-red-200 rounded-lg text-center">
                                <p class="text-sm font-semibold text-red-700">Dilarang meninggalkan halaman sampai countdown berakhir</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Status Pesanan -->
                <div class="mt-4">
                    @if($order && $order->status === 'ditolak')
                        <div class="p-4 bg-red-50 border border-red-200 rounded-lg text-center space-y-3 animate-fade-in">
                            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto">
                                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                            <div class="text-red-700 font-semibold">
                                Pesanan ditolak oleh bengkel
                            </div>
                            <a href="{{ route('user.dashboard') }}" 
                               class="inline-block px-6 py-2 bg-primary-600 text-white rounded-lg shadow-md hover:bg-primary-700 transition-all hover:scale-105">
                                Cari bengkel lain
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in {
            animation: fade-in 0.5s ease-out;
        }
    </style>
</div>