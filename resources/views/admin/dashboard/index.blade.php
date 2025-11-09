<x-layout>
    <x-slot:title>Admin Dashboard - SIBANTAR</x-slot:title>

    <section class="py-8">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <!-- Header -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-neutral-900 mb-2">Admin Dashboard</h1>
                    <p class="text-neutral-600">Kelola seluruh sistem SIBANTAR</p>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                    <!-- Total Users -->
                    <div class="card p-6">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-sm text-neutral-600">Total User</p>
                            <svg class="w-8 h-8 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <p class="text-3xl font-bold text-neutral-900">1,234</p>
                        <p class="text-xs text-success-600 mt-1">↑ 12% dari bulan lalu</p>
                    </div>

                    <!-- Total Bengkel -->
                    <div class="card p-6">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-sm text-neutral-600">Total Bengkel</p>
                            <svg class="w-8 h-8 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <p class="text-3xl font-bold text-neutral-900">89</p>
                        <p class="text-xs text-success-600 mt-1">↑ 5 bengkel baru</p>
                    </div>

                    <!-- Total Transaksi -->
                    <div class="card p-6">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-sm text-neutral-600">Transaksi</p>
                            <svg class="w-8 h-8 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <p class="text-3xl font-bold text-neutral-900">456</p>
                        <p class="text-xs text-neutral-500 mt-1">Bulan ini</p>
                    </div>

                    <!-- Revenue -->
                    <div class="card p-6">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-sm text-neutral-600">Revenue</p>
                            <svg class="w-8 h-8 text-warning-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="text-3xl font-bold text-neutral-900">Rp 125jt</p>
                        <p class="text-xs text-neutral-500 mt-1">Bulan ini</p>
                    </div>
                </div>

                <livewire:create-management-buttons />

            </div>
        </div>
    </section>

</x-layout>
