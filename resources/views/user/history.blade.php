<x-layout-user>
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
    <section class="py-4 pb-24">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6 justify-items-center">
            @foreach ($orders as $order)
                    @php
                        // Dynamic status badge
                        $statusColor = match($order->status) {
                            // Progress/waiting
                            'pending', 'menunggu_konfirmasi', 'diproses' => 'bg-warning-100 text-warning-700',
                            // Success
                            'dibayar', 'selesai' => 'bg-success-100 text-success-700',
                            // Cancel/fail
                            'gagal', 'ditolak', 'dibatalkan' => 'bg-danger-100 text-danger-700',
                            default => 'bg-neutral-100 text-neutral-700',
                        };
                        $statusLabels = [
                            'menunggu_konfirmasi' => 'Menunggu Konfirmasi',
                            'pending' => 'Pending',
                            'dibayar' => 'Dibayar',
                            'diproses' => 'Diproses',
                            'selesai' => 'Selesai',
                            'ditolak' => 'Ditolak',
                            'dibatalkan' => 'Dibatalkan',
                        ];
                    @endphp
                <!-- Booking Card -->
                <div class="booking-card card p-6 hover:shadow-lg transition-shadow rounded-lg bg-white max-w-[560px] w-full" data-status="in-progress">
                    <div class="flex items-start justify-between mb-2">
                        <div>
                            <h3 class="font-bold text-base md:text-lg text-neutral-900">{{ $order->bengkel->nama_bengkel }}</h3>
                            <p class="text-xs text-neutral-500 mt-1">Tanggal Order: {{ $order->created_at }}</p>
                        </div>
                        <span class="px-2.5 py-1 {{ $statusColor }} text-xs font-semibold rounded-full whitespace-nowrap">
                            {{ $statusLabels[$order->status] ?? ucfirst($order->status) }}
                        </span>
                    </div>

                        <div class="space-y-1 mb-1">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-neutral-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-sm text-neutral-600">Jenis Pelayanan: {{ $order->layananBengkel->nama_layanan }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-neutral-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-sm text-neutral-600">Jenis Kendaraaan: {{ $order->layananBengkel->kategori }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-neutral-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-sm text-neutral-600 truncate">{{ $order->bengkel->alamat_lengkap }}</span>
                        </div>
                    </div>

                    @if ($order->status === 'ditolak')
                        
                    @else
                            <div class="pt-2 border-t border-neutral-100">
                            <div class="flex items-center justify-between gap-4">
                                <span class="font-bold text-lg md:text-xl text-primary-700">
                                    Rp {{ number_format(optional($order->tracking)->finalPrice ?? 0, 0, ',', '.') }}
                                </span>
                            </div>
                            <div class="mt-1 flex gap-2">
                                <a href="{{ route('user.report.order', ['id_order' => $order->id_order]) }}" class="btn btn-sm md:btn-sm btn-outline flex-1 border-primary-700 text-primary-700 hover:border-primary-700 hover:text-primary-700 rounded-full px-4 py-2 border-[1.5px]">
                                    Lapor
                                </a>
                                <a href="{{ route('user.invoice', $order->id_order) }}" class="btn btn-sm md:btn-sm btn-outline flex-1 border-primary-700 text-primary-700 hover:border-primary-700 hover:text-primary-700 rounded-full px-4 py-2 border-[1.5px]">
                                    Invoice
                                </a>
                                <a href="{{ route('user.order-tracking', ['id' => $order->id_order]) }}" class="btn btn-sm md:btn-sm btn-outline flex-1 border-primary-700 text-primary-700 hover:border-primary-700 hover:text-primary-700 rounded-full px-4 py-2 border-[1.5px]">
                                    Detail
                                </a>
                            </div>
                        </div>
                        {{-- rating dan review --}}
                        <div class="mt-1 mb-1">
                                @if ($order->review)
                                    <div class="mt-1">
                                        <a href="{{ route('user.review.show', ['id_order' => $order->id_order]) }}" class="btn btn-sm md:btn-sm btn-outline w-full border-primary-700 text-primary-700 hover:border-primary-700 hover:text-primary-700 rounded-full px-4 py-2 border-[1.5px]">
                                            Lihat Review
                                        </a>
                                    </div>
                                @else
                                    <div class="mt-1">
                                        <a href="{{ route('user.review', ['id_order' => $order->id_order]) }}" class="btn btn-sm md:btn-sm btn-outline w-full border-primary-700 text-primary-700 hover:border-primary-700 hover:text-primary-700 rounded-full px-4 py-2 border-[1.5px]">
                                            Beri Review
                                        </a>
                                    </div>
                                @endif
                        </div>
                    @endif
                </div>
            @endforeach
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
                <a href="{{ route('user.search') }}" class="btn btn-primary inline-flex">
                    Cari Bengkel
                </a>
            </div>
        </div>
    </section>

</x-layout-user>
