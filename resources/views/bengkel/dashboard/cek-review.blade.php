<x-layout-bengkel>
    <x-slot:title>Review Pesanan - SIBANTAR</x-slot:title>

    <!-- Header -->
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="{{ route('bengkel.dashboard', ['id_bengkel' => $order->id_bengkel]) }}" 
                   class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="font-bold text-lg text-neutral-900">Lihat Review</h1>
            </div>
        </div>
    </section>

    <section class="container mx-auto px-4 py-6">
        <div class="max-w-xl mx-auto">
            <div class="bg-white rounded-xl shadow-sm p-4 sm:p-6">
                <h2 class="text-lg font-bold text-neutral-900 mb-2">
                    Review Order #{{ $order->id_order }}
                </h2>

                <div class="text-sm text-neutral-600 mb-3">
                    Bengkel: <span class="text-neutral-800 font-semibold">{{ $order->bengkel->nama_bengkel }}</span>
                </div>
                <div class="text-sm text-neutral-600 mb-3">
                    Pelanggan: <span class="text-neutral-800 font-semibold">{{ $order->user->username }}</span>
                </div>
                <div class="text-sm text-neutral-500 mb-4">
                    Tanggal Order: {{ $order->created_at->format('d M Y, H:i') }}
                </div>

                <hr class="my-4">

                <div class="mb-4">
                    <div class="text-neutral-800 font-medium mb-2">Rating Bengkel</div>
                    <div class="flex items-center gap-1 text-2xl">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $order->review->ratingBengkel)
                                <span class="text-yellow-500">★</span>
                            @else
                                <span class="text-gray-300">★</span>
                            @endif
                        @endfor
                        <span class="text-sm text-neutral-600 ml-2">
                            ({{ $order->review->ratingBengkel }}/5)
                        </span>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="text-neutral-800 font-medium mb-2">Rating Layanan</div>
                    <div class="flex items-center gap-1 text-2xl">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $order->review->ratingLayanan)
                                <span class="text-yellow-500">★</span>
                            @else
                                <span class="text-gray-300">★</span>
                            @endif
                        @endfor
                        <span class="text-sm text-neutral-600 ml-2">
                            ({{ $order->review->ratingLayanan }}/5)
                        </span>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="text-neutral-800 font-medium mb-2">Komentar</div>
                    <div class="bg-neutral-50 p-3 rounded-lg text-neutral-700 text-sm">
                        {{ $order->review->comment ?? 'Tidak ada komentar' }}
                    </div>
                </div>

                <div class="text-xs text-neutral-500 mb-4">
                    Diorder pada: {{ $order->review->created_at->format('d M Y, H:i') }}
                </div>

                <div class="mt-6">
                    <a href="{{ route('bengkel.dashboard', ['id_bengkel' => $order->id_bengkel]) }}" 
                       class="block w-full text-center py-2.5 text-sm font-semibold text-blue-600 border border-blue-600 rounded-full hover:bg-blue-600 hover:text-white transition-all">
                        Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>
    </section>

</x-layout-bengkel>