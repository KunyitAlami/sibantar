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
            @foreach ($orders as $order)
                    @php
                        // Dynamic status badge
                        $statusColor = match($order->status) {
                            'pending' => 'bg-yellow-100 text-yellow-700',
                            'dibayar' => 'bg-green-100 text-green-700',
                            'diproses' => 'bg-blue-100 text-blue-700',
                            'selesai'  => 'bg-green-100 text-green-700',
                            'gagal'    => 'bg-red-100 text-red-700',
                            'ditolak'  => 'bg-red-100 text-red-700',
                            'dibatalkan' => 'bg-gray-100 text-gray-700',
                            default    => 'bg-gray-100 text-gray-700',
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
                <!-- Booking Card 1 - In Progress -->
                <div class="booking-card card p-4 hover:shadow-lg transition-shadow mb-6" data-status="in-progress">
                    <div class="flex items-start justify-between mb-2">
                        <div>
                            <h3 class="font-bold text-neutral-900">{{ $order->bengkel->nama_bengkel }}</h3>
                            <p class="text-xs text-neutral-500 mt-2">Tanggal Order: {{ $order->created_at }}</p>
                        </div>
                        <span class="px-2.5 py-1 bg-info-100 text-info-700 text-xs font-semibold rounded-full whitespace-nowrap">
                            {{ $statusLabels[$order->status] ?? ucfirst($order->status) }}
                        </span>
                    </div>

                    <div class="space-y-1 mb-3">
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

                    <div class="flex items-center justify-between pt-3 border-t border-neutral-100">
                        <span class="font-bold text-xl text-primary-700">
                                    Rp {{ number_format($order->tracking->finalPrice, 0, ',', '.') }}
                        </span>
                        <div class="flex gap-2">
                            <a href="{{ route('user.report.order', ['id_order' => $order->id_order]) }}" class="btn btn-sm btn-outline btn-error">
                                Lapor
                            </a>
                            <a href="{{ route('user.invoice', $order->id_order) }}" 
                            class="btn btn-sm btn-outline btn-error">
                            Invoice
                            </a>
                            <a href="{{ route('user.order-tracking', ['id' => $order->id_order]) }}" class="btn btn-sm btn-outline btn-error">
                                Detail Order
                            </a>
                        </div>
                    </div>
                    {{-- rating dan review --}}
                    <div class="mt-10 mb-5">
                            @if ($order->review)
                                <p>Rating Bengkel: 
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $order->review->ratingBengkel)
                                            ★
                                        @else
                                            ☆
                                        @endif
                                    @endfor
                                </p>
                                <p>Rating Layanan: 
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $order->review->ratingLayanan)
                                            ★
                                        @else
                                            ☆
                                        @endif
                                    @endfor
                                </p>
                            @else
                                <p>
                                    <a href="{{ route('user.review', ['id_order' => $order->id_order]) }}" class="text-gray-600 italic underline">
                                        Belum ada review
                                    </a>
                                </p>
                            @endif
                    </div>
                </div>
            @endforeach

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
