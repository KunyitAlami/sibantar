<div wire:poll.5000ms="loadTracking">

    <!-- Progress Layanan -->
    <div class="card p-6 mb-4">
        <h3 class="font-bold text-neutral-900 mb-4">Progress Layanan</h3>

        @foreach($steps as $step => $info)
            <div class="flex items-start gap-3 mb-4">
                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0
                        @if($step < $currentStep) bg-success-500 text-white
                        @elseif($step == $currentStep) bg-primary-600 text-white
                        @else bg-neutral-200 text-neutral-500
                        @endif">
                        <span class="font-bold">{{ $step }}</span>
                    </div>
                    @if($step != count($steps))
                        <div class="w-0.5 h-8 @if($step < $currentStep) bg-success-500 @else bg-neutral-200 @endif mt-1"></div>
                    @endif
                </div>
                <div class="flex-1 pt-1">
                    <p class="font-semibold @if($step <= $currentStep) text-neutral-900 @else text-neutral-500 @endif">{{ $info['title'] }}</p>
                    <p class="text-xs @if($step <= $currentStep) text-neutral-500 @else text-neutral-400 @endif mt-0.5">{{ $info['desc'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Order Details Card -->
    <div class="card p-4 mb-4">
        <h3 class="font-bold text-lg text-neutral-900 mb-4">Detail Pesanan</h3>
        <div class="space-y-3">
            <div class="flex justify-between items-center">
                <span class="text-sm text-neutral-600">Jenis Kendaraan</span>
                <span class="font-semibold text-neutral-900">{{ $tracking->order->layananBengkel->kategori ?? '-' }}</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-sm text-neutral-600">Jenis Masalah</span>
                <span class="font-semibold text-neutral-900">{{ $tracking->order->layananBengkel->nama_layanan ?? '-' }}</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-sm text-neutral-600">Bengkel</span>
                <span class="font-semibold text-neutral-900">{{ $tracking->order->bengkel->nama_bengkel ?? '-' }}</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-sm text-neutral-600">Waktu Pesanan</span>
                <span class="font-semibold text-neutral-900">{{ optional($tracking->order->created_at)->format('H:i d/m/Y') ?? '-' }}</span>
            </div>
        </div>
    </div>

    <!-- Final Price & Payment (hanya muncul setelah step 3) -->
    @if(($tracking->current_step ?? 0) >= 3 && ($tracking->finalPrice ?? 0) > 0)
        <div class="card p-4 mb-4 bg-success-50 border border-success-200 rounded-xl">
            <h3 class="font-bold text-lg text-success-700 mb-3">Rincian Biaya Final</h3>
            <div class="flex justify-between mb-2">
                <span>Harga Keseluruhan</span>
                <span>Rp {{ number_format(($tracking->finalPrice ?? 0) - ($tracking->deliveryFee ?? 0), 0, ',', '.') }}</span>
            </div>
            {{-- <div class="flex justify-between mb-4">
                <span>Ongkos Datang</span>
                <span>Rp {{ number_format($tracking->deliveryFee ?? 0, 0, ',', '.') }}</span>
            </div> --}}

            <div class="flex justify-between items-center font-semibold text-success-800 text-lg mb-3">
                <span>Total</span>
                <span>Rp {{ number_format($tracking->finalPrice ?? 0, 0, ',', '.') }}</span>
            </div>

            {{-- href="{{ route('payment.page', ['orderId' => $tracking->order->id_order ?? 0]) }}"  --}}
            <a href="#" 
                class="block text-center py-3 bg-success-500 hover:bg-success-600 text-white rounded-xl font-bold">
                Bayar Sekarang
            </a>
        </div>
    @endif

</div>
