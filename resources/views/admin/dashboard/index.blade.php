<x-layout-admin>
    <x-slot:title>Admin Dashboard - SIBANTAR</x-slot:title>

    <!-- Hero Section with Gradient -->
    <section class="bg-gradient-to-br from-primary-700 via-primary-600 to-primary-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h1 class="text-4xl font-bold mb-2">Admin Dashboard</h1>
                <p class="text-primary-100 text-lg">Kelola seluruh sistem SIBANTAR</p>
            </div>
        </div>
    </section>

    <!-- Stats Cards with Modern Design -->
    <section class="py-8 bg-gradient-to-b from-neutral-50 to-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-12 mb-12">
                    <!-- Total Users -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-neutral-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-sm text-neutral-600 mb-1">Total User</p>
                        <p class="text-3xl font-bold text-neutral-900 mb-2">{{ $user->count() }}</p>
                        <p class="text-xs text-success-600 font-medium">Total pengguna SIBANTAR</p>

                    </div>

                    <!-- Total Bengkel -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-neutral-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-secondary-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-secondary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-sm text-neutral-600 mb-1">Total Bengkel</p>
                        <p class="text-3xl font-bold text-neutral-900 mb-2">{{ $bengkel->count() }}</p>
                        <p class="text-xs text-success-600 font-medium">Total mitra bengkel SIBANTAR</p>
                    </div>

                    <!-- Total Transaksi -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-neutral-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-success-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-success-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-sm text-neutral-600 mb-1">Transaksi</p>
                        <p class="text-3xl font-bold text-neutral-900 mb-2">{{ $order->count() }}</p>
                        <p class="text-xs text-neutral-500 font-medium">Pertolongan yang berhasil di SIBANTAR</p>
                    </div>

                    <!-- Revenue -->
                    {{-- <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-neutral-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-warning-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-warning-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-sm text-neutral-600 mb-1">Revenue</p>
                        <p class="text-3xl font-bold text-neutral-900 mb-2">Rp 125jt</p>
                        <p class="text-xs text-neutral-500 font-medium">Bulan ini</p>
                    </div> --}}
                </div>

                <livewire:create-management-buttons />
{{-- 
    <style>
        .filter-btn {
            background: #f5f5f5;
            color: #666;
        }
        .filter-btn:hover {
            background: #e5e5e5;
        }
        .filter-btn.active {
            background: linear-gradient(135deg, #0066cc 0%, #0052a3 100%);
            color: white;
            box-shadow: 0 4px 6px rgba(0, 102, 204, 0.3);
        }
    </style> --}}

</x-layout-admin>
