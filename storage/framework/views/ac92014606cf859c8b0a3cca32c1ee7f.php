<?php if (isset($component)) { $__componentOriginal066474d3ca90bb663733ba5d5a32c765 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal066474d3ca90bb663733ba5d5a32c765 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout-user','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout-user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!-- Header -->
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="<?php echo e(route('user.search')); ?>" class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="font-bold text-lg text-neutral-900">Riwayat Pesanan</h1>
            </div>
        </div>
    </section>

    <!-- Filter Tabs -->
    <section class="bg-white border-b border-neutral-200">
        <div class="container mx-auto px-4">
            <div class="flex gap-2 overflow-x-auto py-3 scrollbar-hide">
                <button onclick="filterBookings('all')" class="filter-tab active px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap">
                    Semua
                </button>
                <button onclick="filterBookings('on-the-way')" class="filter-tab px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap">
                    Dalam Perjalanan
                </button>
                <button onclick="filterBookings('in-progress')" class="filter-tab px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap">
                    Sedang Dikerjakan
                </button>
                <button onclick="filterBookings('completed')" class="filter-tab px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap">
                    Selesai
                </button>
                <button onclick="filterBookings('cancelled')" class="filter-tab px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap">
                    Dibatalkan
                </button>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-4 pb-24">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto space-y-3">
                
                <!-- Booking Card 1 - On The Way -->
                <div class="booking-card card p-4 hover:shadow-lg transition-shadow" data-status="on-the-way">
                    <div class="flex gap-4">
                        <!-- Icon -->
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between mb-2">
                                <div>
                                    <h3 class="font-bold text-neutral-900">Bengkel Jaya Motor</h3>
                                    <p class="text-xs text-neutral-500">14 Nov 2025, 21:45</p>
                                </div>
                                <span class="px-2.5 py-1 bg-primary-100 text-primary-700 text-xs font-semibold rounded-full whitespace-nowrap">
                                    Dalam Perjalanan
                                </span>
                            </div>

                            <div class="space-y-1 mb-3">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-neutral-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-sm text-neutral-600">Tambal Ban</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-neutral-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-sm text-neutral-600 truncate">Jl. A. Yani Km 5.5, Banjarmasin</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-3 border-t border-neutral-100">
                                <span class="font-bold text-primary-700">Rp 21.000</span>
                                <a href="/user/order-tracking/1?status=on-the-way" class="text-sm font-medium text-primary-600 hover:text-primary-700">
                                    Lihat Detail →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Card 2 - In Progress -->
                <div class="booking-card card p-4 hover:shadow-lg transition-shadow" data-status="in-progress">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-info-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-info-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                        </div>

                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between mb-2">
                                <div>
                                    <h3 class="font-bold text-neutral-900">Bengkel Mitra Sejati</h3>
                                    <p class="text-xs text-neutral-500">14 Nov 2025, 18:30</p>
                                </div>
                                <span class="px-2.5 py-1 bg-info-100 text-info-700 text-xs font-semibold rounded-full whitespace-nowrap">
                                    Sedang Dikerjakan
                                </span>
                            </div>

                            <div class="space-y-1 mb-3">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-neutral-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-sm text-neutral-600">Service Ringan</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-neutral-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-sm text-neutral-600 truncate">Jl. Veteran No. 123, Banjarmasin</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-3 border-t border-neutral-100">
                                <span class="font-bold text-primary-700">Rp 56.000</span>
                                <a href="/user/order-tracking/2?status=in-progress" class="text-sm font-medium text-primary-600 hover:text-primary-700">
                                    Lihat Detail →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Card 3 - Completed -->
                <div class="booking-card card p-4 hover:shadow-lg transition-shadow" data-status="completed">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-success-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>

                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between mb-2">
                                <div>
                                    <h3 class="font-bold text-neutral-900">Bengkel Jaya Motor</h3>
                                    <p class="text-xs text-neutral-500">13 Nov 2025, 14:20</p>
                                </div>
                                <span class="px-2.5 py-1 bg-success-100 text-success-700 text-xs font-semibold rounded-full whitespace-nowrap">
                                    Selesai
                                </span>
                            </div>

                            <div class="space-y-1 mb-3">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-neutral-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-sm text-neutral-600">Tambal Ban</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-neutral-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-sm text-neutral-600 truncate">Jl. A. Yani Km 5.5, Banjarmasin</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-3 border-t border-neutral-100">
                                <span class="font-bold text-neutral-700">Rp 21.000</span>
                                <button onclick="showReviewModal(3)" class="text-sm font-medium text-primary-600 hover:text-primary-700">
                                    Beri Ulasan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Card 4 - Completed with Review -->
                <div class="booking-card card p-4 hover:shadow-lg transition-shadow" data-status="completed">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-success-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>

                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between mb-2">
                                <div>
                                    <h3 class="font-bold text-neutral-900">Bengkel Mandiri</h3>
                                    <p class="text-xs text-neutral-500">12 Nov 2025, 09:15</p>
                                </div>
                                <span class="px-2.5 py-1 bg-success-100 text-success-700 text-xs font-semibold rounded-full whitespace-nowrap">
                                    Selesai
                                </span>
                            </div>

                            <div class="space-y-1 mb-3">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-neutral-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-sm text-neutral-600">Service Ringan</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-neutral-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-sm text-neutral-600 truncate">Jl. S. Parman No. 88, Banjarmasin</span>
                                </div>
                                <div class="flex items-center gap-1 mt-1">
                                    <div class="flex text-warning-500">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    </div>
                                    <span class="text-xs text-neutral-500">Pelayanan sangat memuaskan!</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-3 border-t border-neutral-100">
                                <span class="font-bold text-neutral-700">Rp 56.000</span>
                                <a href="/user/order-tracking/4?status=completed" class="text-sm font-medium text-neutral-500 hover:text-neutral-700">
                                    Lihat Detail →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Card 5 - Cancelled -->
                <div class="booking-card card p-4 hover:shadow-lg transition-shadow" data-status="cancelled">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-neutral-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </div>

                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between mb-2">
                                <div>
                                    <h3 class="font-bold text-neutral-900">Bengkel Mitra Sejati</h3>
                                    <p class="text-xs text-neutral-500">11 Nov 2025, 16:00</p>
                                </div>
                                <span class="px-2.5 py-1 bg-neutral-100 text-neutral-600 text-xs font-semibold rounded-full whitespace-nowrap">
                                    Dibatalkan
                                </span>
                            </div>

                            <div class="space-y-1 mb-3">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-neutral-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-sm text-neutral-600">Tambal Ban</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-neutral-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-sm text-neutral-600 truncate">Jl. Veteran No. 123, Banjarmasin</span>
                                </div>
                                <p class="text-xs text-neutral-500 italic mt-1">Tidak ada konfirmasi dari bengkel</p>
                            </div>

                            <div class="flex items-center justify-between pt-3 border-t border-neutral-100">
                                <span class="font-bold text-neutral-400 line-through">Rp 21.000</span>
                                <span class="text-sm text-neutral-500">-</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Empty State (Hidden by default) -->
            <div id="emptyState" class="hidden text-center py-16">
                <div class="w-24 h-24 bg-neutral-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-12 h-12 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-neutral-900 mb-2">Belum Ada Pesanan</h3>
                <p class="text-sm text-neutral-600 mb-6">Yuk mulai pesan layanan bengkel terdekat</p>
                <a href="<?php echo e(route('user.search')); ?>" class="btn btn-primary inline-flex">
                    Cari Bengkel
                </a>
            </div>
        </div>
    </section>

    <?php $__env->startPush('scripts'); ?>
    <style>
        .filter-tab {
            background-color: transparent;
            color: #737373;
            transition: all 0.2s;
        }
        .filter-tab.active {
            background-color: #0051BA;
            color: white;
        }
        .filter-tab:hover {
            background-color: #e5e5e5;
        }
        .filter-tab.active:hover {
            background-color: #003d8f;
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <script>
        function filterBookings(status) {
            const cards = document.querySelectorAll('.booking-card');
            const tabs = document.querySelectorAll('.filter-tab');
            const emptyState = document.getElementById('emptyState');
            let visibleCount = 0;

            // Update active tab
            tabs.forEach(tab => tab.classList.remove('active'));
            event.target.classList.add('active');

            // Filter cards
            cards.forEach(card => {
                const cardStatus = card.getAttribute('data-status');
                if (status === 'all' || cardStatus === status) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show/hide empty state
            if (visibleCount === 0) {
                emptyState.classList.remove('hidden');
            } else {
                emptyState.classList.add('hidden');
            }
        }

        function showReviewModal(bookingId) {
            Swal.fire({
                title: 'Beri Ulasan',
                html: `
                    <div class="text-left space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                            <div class="flex gap-2 justify-center" id="starRating">
                                <svg onclick="setRating(1)" class="star w-10 h-10 cursor-pointer fill-gray-300 hover:fill-warning-500" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                <svg onclick="setRating(2)" class="star w-10 h-10 cursor-pointer fill-gray-300 hover:fill-warning-500" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                <svg onclick="setRating(3)" class="star w-10 h-10 cursor-pointer fill-gray-300 hover:fill-warning-500" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                <svg onclick="setRating(4)" class="star w-10 h-10 cursor-pointer fill-gray-300 hover:fill-warning-500" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                <svg onclick="setRating(5)" class="star w-10 h-10 cursor-pointer fill-gray-300 hover:fill-warning-500" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Ulasan Anda</label>
                            <textarea id="reviewText" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" rows="4" placeholder="Ceritakan pengalaman Anda..."></textarea>
                        </div>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonText: 'Kirim Ulasan',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#0051BA',
                cancelButtonColor: '#737373',
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'px-6 py-2.5 rounded-lg font-medium',
                    cancelButton: 'px-6 py-2.5 rounded-lg font-medium'
                },
                preConfirm: () => {
                    const rating = window.selectedRating || 0;
                    const review = document.getElementById('reviewText').value;
                    
                    if (rating === 0) {
                        Swal.showValidationMessage('Silakan pilih rating terlebih dahulu');
                        return false;
                    }
                    
                    if (!review.trim()) {
                        Swal.showValidationMessage('Silakan tulis ulasan Anda');
                        return false;
                    }
                    
                    return { rating, review };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Simulate saving review
                    Swal.fire({
                        icon: 'success',
                        title: 'Terima Kasih!',
                        text: 'Ulasan Anda telah berhasil dikirim',
                        confirmButtonColor: '#0051BA',
                        timer: 2000
                    }).then(() => {
                        location.reload();
                    });
                }
            });
        }

        function setRating(rating) {
            window.selectedRating = rating;
            const stars = document.querySelectorAll('#starRating .star');
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.remove('fill-gray-300');
                    star.classList.add('fill-warning-500');
                } else {
                    star.classList.remove('fill-warning-500');
                    star.classList.add('fill-gray-300');
                }
            });
        }
    </script>
    <?php $__env->stopPush(); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal066474d3ca90bb663733ba5d5a32c765)): ?>
<?php $attributes = $__attributesOriginal066474d3ca90bb663733ba5d5a32c765; ?>
<?php unset($__attributesOriginal066474d3ca90bb663733ba5d5a32c765); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal066474d3ca90bb663733ba5d5a32c765)): ?>
<?php $component = $__componentOriginal066474d3ca90bb663733ba5d5a32c765; ?>
<?php unset($__componentOriginal066474d3ca90bb663733ba5d5a32c765); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Asus\Downloads\Disk D\project\sibantar\resources\views/user/history.blade.php ENDPATH**/ ?>