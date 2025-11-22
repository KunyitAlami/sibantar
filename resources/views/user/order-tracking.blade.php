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
                <h1 class="font-bold text-lg text-neutral-900">Progress Layanan</h1>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-6 pb-24">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto">

                <!-- Status Header -->
                {{-- <div class="text-center mb-6">
                    <div class="w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M5 13l4 4L19 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-neutral-900 mb-2">Pesanan Sedang Diproses</h1>
                    <p class="text-sm text-neutral-600">Status terbaru akan ditampilkan di sini</p>
                </div> --}}
                <div class="text-center mb-6">

                    {{-- ICON berdasarkan status --}}
                    <div
                        class="w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-4 
                        @if($order->status == 'selesai') bg-green-100 text-green-600
                        @elseif($order->status == 'ditolak') bg-red-100 text-red-600
                        @else bg-yellow-100 text-yellow-600 @endif">

                        @if($order->status == 'selesai')
                            {{-- ICON SELESAI --}}
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        @elseif($order->status == 'ditolak')
                            {{-- ICON DITOLAK --}}
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        @else
                            {{-- ICON PROSES --}}
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 6v6l4 2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        @endif
                    </div>

                    {{-- TITLE berdasarkan status --}}
                    <h1 class="text-2xl font-bold text-neutral-900 mb-2">
                        @if($order->status == 'selesai')
                            Pesanan Telah Selesai
                        @elseif($order->status == 'ditolak')
                            Pesanan Ditolak
                        @else
                            Pesanan Sedang Diproses
                        @endif
                    </h1>

                    {{-- DESC --}}
                    <p class="text-sm text-neutral-600">
                        @if($order->status == 'selesai')
                            Terima kasih! Pesanan Anda telah selesai diproses.
                        @elseif($order->status == 'ditolak')
                            Maaf, pesanan ini tidak dapat diproses oleh bengkel.
                        @else
                            Status terbaru akan ditampilkan di sini.
                        @endif
                    </p>

                </div>


                <!-- Progress Layanan -->
                @livewire('bengkel.order-progress', ['orderId' => $orderId])
            </div>
        </div>
    </section>
</x-layout-user>
