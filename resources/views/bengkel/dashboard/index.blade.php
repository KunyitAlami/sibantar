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
                        <p class="text-7xl font-extrabold mb-2 bg-clip-text text-transparent bg-gradient-to-b from-white to-primary-100">12</p>
                        <p class="text-sm font-semibold text-primary-50">Order Hari Ini</p>
                        <p class="text-xs text-primary-200 mt-1">+3 dari kemarin</p>
                    </div>
                </div>
                
                <div class="relative overflow-hidden bg-white bg-opacity-15 backdrop-blur-md rounded-3xl p-6 text-center border border-white border-opacity-20 shadow-xl">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-white opacity-5 rounded-full -mr-10 -mt-10"></div>
                    <div class="relative z-10">
                        <p class="text-7xl font-extrabold mb-2 bg-clip-text text-transparent bg-gradient-to-b from-white to-primary-100">7</p>
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

    <!-- Order Masuk Section -->
    <section class="py-6 bg-gradient-to-b from-neutral-50 to-white min-h-screen">
        <div class="container mx-auto px-4">
            <!-- Tabs Navigation -->
            <div class="flex gap-2 mb-6 bg-white rounded-xl p-1 shadow-sm">
                <button class="tab-btn active flex-1 py-3 px-4 rounded-lg font-semibold text-sm transition-all" data-tab="incoming">
                    Order Masuk <span class="ml-1 px-2 py-0.5 bg-warning-500 text-white rounded-full text-xs">3</span>
                </button>
                <button class="tab-btn flex-1 py-3 px-4 rounded-lg font-semibold text-sm transition-all" data-tab="ongoing">
                    Berlangsung <span class="ml-1 px-2 py-0.5 bg-neutral-300 text-neutral-600 rounded-full text-xs">2</span>
                </button>
            </div>

            <!-- Tab Content: Order Masuk -->
            <div id="tab-incoming" class="tab-content">

            <!-- Order Card 1 - Normal -->
            <div class="bg-white rounded-2xl p-5 mb-4 shadow-md border border-neutral-100 hover:shadow-lg transition-all duration-300">
                <div class="flex items-start justify-between mb-3">
                    <div>
                        <h3 class="font-bold text-xl text-neutral-900 mb-2">Sari Dewi</h3>
                        <div class="flex items-center gap-2 text-sm text-neutral-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            <span>2.3 km</span>
                            <span class="text-neutral-300">•</span>
                            <span>5 menit lalu</span>
                        </div>
                    </div>
                    <span class="px-3 py-1 bg-warning-100 text-warning-700 rounded-full text-xs font-semibold">
                        Menunggu
                    </span>
                </div>

                <div class="bg-neutral-50 rounded-xl p-4 mb-4">
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="w-5 h-5 text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm font-semibold text-neutral-700">Detail Masalah</span>
                    </div>
                    <p class="text-neutral-800 font-medium">Motor • Oli Bocor</p>
                    <p class="text-sm text-neutral-600 mt-1">Estimasi: Rp 50.000 - Rp 100.000</p>
                </div>
                
                <div class="grid grid-cols-3 gap-3">
                    <button class="py-3 text-sm font-semibold text-error-600 bg-error-50 border-2 border-error-200 rounded-xl hover:bg-error-100 transition-all">
                        Tolak
                    </button>
                    <button class="py-3 text-sm font-bold text-white bg-success-500 rounded-xl hover:bg-success-600 shadow-md hover:shadow-lg transition-all col-span-2">
                        Terima Pesanan
                    </button>
                </div>
                <button class="w-full mt-3 py-3 text-sm font-semibold text-success-700 bg-white border-2 border-success-300 rounded-xl hover:bg-success-50 transition-all flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                    Hubungi via WhatsApp
                </button>
            </div>

            <!-- Order Card 2 - Normal -->
            <div class="bg-white rounded-2xl p-5 mb-4 shadow-md border border-neutral-100 hover:shadow-lg transition-all duration-300">
                <div class="flex items-start justify-between mb-3">
                    <div>
                        <h3 class="font-bold text-xl text-neutral-900 mb-2">Budi Santoso</h3>
                        <div class="flex items-center gap-2 text-sm text-neutral-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            <span>2.3 km</span>
                            <span class="text-neutral-300">•</span>
                            <span>8 menit lalu</span>
                        </div>
                    </div>
                    <span class="px-3 py-1 bg-warning-100 text-warning-700 rounded-full text-xs font-semibold">
                        Menunggu
                    </span>
                </div>

                <div class="bg-neutral-50 rounded-xl p-4 mb-4">
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="w-5 h-5 text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm font-semibold text-neutral-700">Detail Masalah</span>
                    </div>
                    <p class="text-neutral-800 font-medium">Motor • Ban Kempes</p>
                    <p class="text-sm text-neutral-600 mt-1">Estimasi: Rp 20.000 - Rp 50.000</p>
                </div>
                
                <div class="grid grid-cols-3 gap-3">
                    <button class="py-3 text-sm font-semibold text-error-600 bg-white border-2 border-error-300 rounded-xl hover:bg-error-50 transition-all">
                        Tolak
                    </button>
                    <button class="py-3 text-sm font-bold text-white bg-success-500 rounded-xl hover:bg-success-600 shadow-md hover:shadow-lg transition-all col-span-2">
                        Terima Pesanan
                    </button>
                </div>
                <button class="w-full mt-3 py-3 text-sm font-semibold text-success-700 bg-white border-2 border-success-300 rounded-xl hover:bg-success-50 transition-all flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                    Hubungi via WhatsApp
                </button>
            </div>
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="w-5 h-5 text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm font-semibold text-neutral-700">Detail Masalah</span>
                    </div>
                    <p class="text-neutral-800 font-medium">Motor • Ban Kempes</p>
                    <p class="text-sm text-neutral-600 mt-1">Estimasi: Rp 20.000 - Rp 50.000</p>
                </div>
                
                <div class="grid grid-cols-3 gap-3">
                    <button class="py-3 text-sm font-semibold text-error-600 bg-error-50 border-2 border-error-200 rounded-xl hover:bg-error-100 transition-all">
                        Tolak
                    </button>
                    <button class="py-3 text-sm font-bold text-white bg-gradient-to-r from-success-500 to-success-600 rounded-xl hover:from-success-600 hover:to-success-700 shadow-md hover:shadow-lg transition-all col-span-2">
                        Terima Pesanan
                    </button>
                </div>
                <button class="w-full mt-3 py-3 text-sm font-semibold text-success-700 bg-success-50 border-2 border-success-200 rounded-xl hover:bg-success-100 transition-all flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                    Hubungi via WhatsApp
                </button>
            </div>

            <!-- Order Card 3 - Urgent -->
            <div class="bg-gradient-to-br from-error-50 to-orange-50 rounded-2xl p-5 mb-4 shadow-lg border-2 border-error-300 hover:shadow-xl transition-all duration-300 relative overflow-hidden">
                <!-- Urgent Badge -->
                <div class="absolute top-4 right-4 z-10">
                    <div class="relative">
                        <div class="absolute inset-0 bg-error-600 rounded-full animate-ping opacity-75"></div>
                        <div class="relative w-9 h-9 bg-gradient-to-br from-error-500 to-error-700 rounded-full flex items-center justify-center shadow-lg">
                            <svg class="w-5 h-5 text-white animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="flex items-start justify-between mb-3 pr-12">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-error-500 to-error-600 rounded-full flex items-center justify-center text-white font-bold shadow-md">
                            KS
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-neutral-900">Konco Sukoro</h3>
                            <div class="flex items-center gap-2 text-sm text-neutral-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                                <span>2.3 km</span>
                                <span class="text-neutral-300">•</span>
                                <span class="text-error-700 font-semibold">URGENT!</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white bg-opacity-70 backdrop-blur-sm rounded-xl p-4 mb-4 border border-error-200">
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="w-5 h-5 text-error-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <span class="text-sm font-bold text-error-700">Kondisi Darurat</span>
                    </div>
                    <p class="text-neutral-900 font-bold">Motor • Mesin Overheat</p>
                    <p class="text-sm text-neutral-700 mt-1">Perlu penanganan segera! Motor mogok di jalan</p>
                </div>
                
                <button class="w-full py-3 text-sm font-bold text-white bg-success-500 rounded-xl hover:bg-success-600 shadow-lg hover:shadow-xl transition-all flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                    Hubungi Sekarang - DARURAT
                </button>
            </div>

            </div>

            <!-- Tab Content: Pesanan Berlangsung -->
            <div id="tab-ongoing" class="tab-content hidden">
                <!-- Ongoing Order 1 -->
                <div class="bg-white rounded-2xl p-5 mb-4 shadow-md border border-success-200 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-start justify-between mb-3">
                        <div>
                            <h3 class="font-bold text-xl text-neutral-900 mb-2">Ahmad Hidayat</h3>
                            <div class="flex items-center gap-2 text-sm text-neutral-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                                <span>1.8 km</span>
                                <span class="text-neutral-300">•</span>
                                <span>Sedang dikerjakan</span>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-success-100 text-success-700 rounded-full text-xs font-semibold">
                            Diterima
                        </span>
                    </div>

                    <div class="bg-success-50 rounded-xl p-4 mb-4 border border-success-200">
                        <div class="flex items-center gap-2 mb-2">
                            <svg class="w-5 h-5 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm font-semibold text-success-700">Detail Pekerjaan</span>
                        </div>
                        <p class="text-neutral-800 font-medium">Motor • Ganti Ban</p>
                        <p class="text-sm text-neutral-600 mt-1">Estimasi Awal: Rp 100.000 - Rp 150.000</p>
                        <p class="text-xs text-success-700 mt-2 font-semibold">🕐 Dimulai 15 menit yang lalu</p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-3">
                        <button class="py-3 text-sm font-semibold text-success-700 bg-white border-2 border-success-300 rounded-xl hover:bg-success-50 transition-all flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                            WhatsApp
                        </button>
                        <a href="/bengkel/final-price/1" class="py-3 text-sm font-bold text-white bg-secondary-500 rounded-xl hover:bg-secondary-600 shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Final Price
                        </a>
                    </div>
                </div>

                <!-- Ongoing Order 2 -->
                <div class="bg-white rounded-2xl p-5 mb-4 shadow-md border border-success-200 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-start justify-between mb-3">
                        <div>
                            <h3 class="font-bold text-xl text-neutral-900 mb-2">Dewi Sartika</h3>
                            <div class="flex items-center gap-2 text-sm text-neutral-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                                <span>3.5 km</span>
                                <span class="text-neutral-300">•</span>
                                <span>Sedang dikerjakan</span>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-success-100 text-success-700 rounded-full text-xs font-semibold">
                            Diterima
                        </span>
                    </div>

                    <div class="bg-success-50 rounded-xl p-4 mb-4 border border-success-200">
                        <div class="flex items-center gap-2 mb-2">
                            <svg class="w-5 h-5 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm font-semibold text-success-700">Detail Pekerjaan</span>
                        </div>
                        <p class="text-neutral-800 font-medium">Motor • Servis Rutin + Ganti Oli</p>
                        <p class="text-sm text-neutral-600 mt-1">Estimasi Awal: Rp 75.000 - Rp 120.000</p>
                        <p class="text-xs text-success-700 mt-2 font-semibold">🕐 Dimulai 30 menit yang lalu</p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-3">
                        <button class="py-3 text-sm font-semibold text-success-700 bg-white border-2 border-success-300 rounded-xl hover:bg-success-50 transition-all flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                            WhatsApp
                        </button>
                        <a href="/bengkel/final-price/2" class="py-3 text-sm font-bold text-white bg-secondary-500 rounded-xl hover:bg-secondary-600 shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Final Price
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    @push('scripts')
    <script>
        // Tab Switching
        const tabButtons = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetTab = button.dataset.tab;

                // Remove active from all buttons
                tabButtons.forEach(btn => {
                    btn.classList.remove('active', 'bg-primary-700', 'text-white');
                    btn.classList.add('text-neutral-600');
                });

                // Add active to clicked button
                button.classList.add('active', 'bg-primary-700', 'text-white');
                button.classList.remove('text-neutral-600');

                // Hide all contents
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });

                // Show target content
                document.getElementById(`tab-${targetTab}`).classList.remove('hidden');
            });
        });

        // Toggle Status Bengkel with enhanced UX
        const statusToggle = document.getElementById('statusToggle');
        const statusText = document.getElementById('statusText');
        
        statusToggle.addEventListener('change', function() {
            if (this.checked) {
                statusText.textContent = 'Buka - Siap Terima Order';
                // Show success notification
                showNotification('Bengkel dibuka untuk menerima pesanan', 'success');
            } else {
                statusText.textContent = 'Tutup - Tidak Terima Order';
                // Show info notification
                showNotification('Bengkel ditutup, pesanan baru ditolak otomatis', 'info');
            }
        });

        // Menu Toggle - removed, using navbar now

        // Simple notification function
        function showNotification(message, type = 'info') {
            const colors = {
                success: 'bg-success-500',
                info: 'bg-primary-500',
                error: 'bg-error-500'
            };
            
            const notification = document.createElement('div');
            notification.className = `fixed bottom-4 right-4 ${colors[type]} text-white px-6 py-3 rounded-xl shadow-lg z-50 transform transition-all duration-300 translate-y-20 opacity-0`;
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.classList.remove('translate-y-20', 'opacity-0');
            }, 100);
            
            setTimeout(() => {
                notification.classList.add('translate-y-20', 'opacity-0');
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }

        // Auto-refresh order list (simulated)
        setInterval(() => {
            // In production, this would fetch new orders from API
            console.log('Checking for new orders...');
        }, 30000); // Check every 30 seconds
    </script>
    @endpush

</x-layout-bengkel>

