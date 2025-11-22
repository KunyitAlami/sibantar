<x-layout-bengkel>
    <x-slot:title>Dashboard Bengkel - SIBANTAR</x-slot:title>

    <!-- Stats Section with Better Visual Hierarchy -->
    <section class="bg-gradient-to-br from-primary-700 via-primary-600 to-primary-800 text-white py-8">
        <div class="container mx-auto px-4">
            <!-- Main Stats -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="relative overflow-hidden bg-white bg-opacity-15 backdrop-blur-md rounded-3xl p-6 text-center border border-white border-opacity-20 shadow-xl">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-white opacity-5 rounded-full -mr-10 -mt-10"></div>
                    <div class="relative z-10">
                        <p class="text-7xl font-extrabold mb-2 bg-clip-text text-transparent bg-gradient-to-b from-white to-primary-100">{{ $totalOrdersToday }}</p>
                        <p class="text-sm font-semibold text-primary-50">Order Hari Ini</p>
                        <p class="text-xs text-primary-200 mt-1">
                            {{ now()->translatedFormat('l, d F Y') }}
                        </p>
                    </div>
                </div>
                
                <div class="relative overflow-hidden bg-white bg-opacity-15 backdrop-blur-md rounded-3xl p-6 text-center border border-white border-opacity-20 shadow-xl">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-white opacity-5 rounded-full -mr-10 -mt-10"></div>
                    <div class="relative z-10">
                        <p class="text-7xl font-extrabold mb-2 bg-clip-text text-transparent bg-gradient-to-b from-white to-primary-100">{{ $LayananTotal }}</p>
                        <p class="text-sm font-semibold text-primary-50">Total Layanan</p>
                        <p class="text-xs text-primary-200 mt-1">Aktif</p>
                    </div>
                </div>
            </div>

            <!-- Status Bengkel Card -->
            <div class="bg-white bg-opacity-15 backdrop-blur-md rounded-2xl p-5 border border-white border-opacity-20 shadow-lg">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-success-500 rounded-full flex items-center justify-center shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-base font-bold">Status Bengkel</h2>
                            <p class="text-xs text-primary-100" id="statusText">Buka - Siap Terima Order</p>
                        </div>
                    </div>
                    <label class="relative inline-block w-16 h-9">
                        <input type="checkbox" id="statusToggle" class="sr-only peer" checked>
                        <div class="w-16 h-9 bg-white bg-opacity-30 rounded-full peer peer-checked:bg-success-500 transition-all duration-300 cursor-pointer shadow-inner"></div>
                        <div class="absolute left-1 top-1 w-7 h-7 bg-white rounded-full shadow-lg transition-transform duration-300 peer-checked:translate-x-7"></div>
                    </label>
                </div>
                <div class="flex items-center gap-2 text-xs text-primary-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Jam Operasional: 08:00 - 20:00 WITA</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Order Section -->
    <section class="py-6 bg-gradient-to-b from-neutral-50 to-white min-h-screen">
        <div class="container mx-auto px-4">
            {{-- recent activity --}}
            <div> 
                <livewire:bengkel.bengkel-dashboard :id_bengkel="$id_Bengkel" />
            </div>
        </div>
    </section>

    <!-- Detail Modal -->
    <div id="detailModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-end sm:items-center justify-center p-4">
        <div class="bg-white rounded-t-3xl sm:rounded-2xl w-full sm:max-w-lg max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-white border-b border-neutral-200 p-4 flex items-center justify-between rounded-t-3xl">
                <h3 class="text-lg font-bold text-neutral-900">Detail Pesanan</h3>
                <button onclick="closeDetail()" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-neutral-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div id="detailContent" class="p-6">
                <!-- Content will be dynamically inserted -->
            </div>
        </div>
    </div
</x-layout-bengkel>

