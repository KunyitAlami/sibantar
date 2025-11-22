<div wire:poll.5000ms="loadTracking">

    <!-- Progress Layanan -->
    <div class="card p-6 mb-4">
        <h3 class="font-bold text-neutral-900 mb-4">Progress Layanan</h3>

        @foreach($steps as $step => $info)
            <div class="flex items-start gap-3 mb-4">
                <div class="flex flex-col items-center">
                    @php
                        $isCompleted = ($step < $currentStep) || ($step == $currentStep && $currentStep == 5);
                        $isCurrent = ($step == $currentStep && $currentStep != 5);
                    @endphp
                    <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 {{ $isCompleted ? 'bg-success-500 text-white' : ($isCurrent ? 'bg-primary-600 text-white' : 'bg-neutral-200 text-neutral-500') }}">
                        <span class="font-bold">{{ $step }}</span>
                    </div>
                    @if($step != count($steps))
                        <div class="w-0.5 h-8 {{ $step < $currentStep ? 'bg-success-500' : 'bg-neutral-200' }} mt-1"></div>
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

    <!-- Final Price & Payment -->
    @if(($tracking->finalPrice ?? 0) > 0)
        <div class="card p-4 mb-4 bg-success-50 border border-success-200 rounded-xl">
            <h3 class="font-bold text-lg text-success-700 mb-3">Rincian Biaya Final</h3>

            <div class="space-y-2 text-sm text-success-800 mb-3">
                <div class="flex justify-between">
                    <span class="text-neutral-700">Layanan</span>
                    <span class="font-semibold">{{ $tracking->order->layananBengkel->nama_layanan ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-neutral-700">Harga Layanan</span>
                    <span class="font-semibold">Rp {{ number_format($tracking->order->layananBengkel->harga_awal ?? 0, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-neutral-700">Ongkir</span>
                    <span class="font-semibold">Rp {{ number_format($tracking->deliveryFee ?? 0, 0, ',', '.') }}</span>
                </div>
                @if(isset($tracking->admin_fee) && $tracking->admin_fee > 0)
                <div class="flex justify-between">
                    <span class="text-neutral-700">Biaya Admin</span>
                    <span class="font-semibold">Rp {{ number_format($tracking->admin_fee, 0, ',', '.') }}</span>
                </div>
                @endif
            </div>

            <div class="flex justify-between items-center font-semibold text-success-800 text-lg mb-3">
                <span>Total</span>
                <span>Rp {{ number_format($tracking->finalPrice ?? 0, 0, ',', '.') }}</span>
            </div>

            @php
                $paidStatuses = ['settlement', 'capture'];
                $isPaid = in_array($tracking->midtrans_status ?? '', $paidStatuses) || (($tracking->current_step ?? 0) >= 5);
            @endphp

            {{-- Metode pembayaran removed per request --}}

            @if($isPaid)
                <div class="py-3 text-center text-sm font-semibold text-success-700 border border-success-200 rounded-xl bg-success-100">
                    Pembayaran berhasil
                </div>
            @else
                <button id="pay-now"
                    data-order-id="{{ $tracking->order->id_order ?? 0 }}"
                    data-amount="{{ $tracking->finalPrice ?? 0 }}"
                    class="block w-full text-center py-3 bg-success-500 hover:bg-success-600 text-white rounded-xl font-bold">
                    Bayar Sekarang
                </button>
            @endif
            @push('scripts')
                @php $midtransClientKey = config('services.midtrans.client_key'); $isProd = config('services.midtrans.is_production'); @endphp
                <script src="{{ $isProd ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}" data-client-key="{{ $midtransClientKey }}"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const payBtn = document.getElementById('pay-now');
                        if (!payBtn) return;

                        payBtn.addEventListener('click', function (e) {
                            e.preventDefault();
                            const orderId = this.dataset.orderId;
                            const amount = parseInt(this.dataset.amount || 0, 10);

                            if (!amount || amount <= 0) {
                                alert('Jumlah pembayaran tidak valid');
                                return;
                            }

                            payBtn.disabled = true;
                            payBtn.textContent = 'Membuat transaksi...';

                            fetch("{{ route('user.create-transaction') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({
                                    order_id: orderId,
                                    gross_amount: amount,
                                    customer_details: {
                                        first_name: "{{ $tracking->order->user->username ?? 'User' }}",
                                        email: "{{ $tracking->order->user->email ?? 'user@example.com' }}",
                                        phone: "{{ $tracking->order->user->phone ?? '081234567890' }}",
                                    }
                                })
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.error) throw new Error(data.error);
                                const token = data.snap_token;
                                if (!token) throw new Error('Token tidak diterima dari server');

                                // Open Midtrans Snap popup
                                const transactionId = data.transaction_id;
                                window.snap.pay(token, {
                                    onSuccess: function(result){
                                        // Notify server (useful when webhook cannot reach local env)
                                        fetch("{{ route('user.confirm-transaction') }}", {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                            },
                                            body: JSON.stringify({ transaction_id: transactionId, status: 'settlement' })
                                        }).finally(() => {
                                            window.location.reload();
                                        });
                                    },
                                    onPending: function(result){
                                        fetch("{{ route('user.confirm-transaction') }}", {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                            },
                                            body: JSON.stringify({ transaction_id: transactionId, status: 'pending' })
                                        }).finally(() => {
                                            window.location.reload();
                                        });
                                    },
                                    onError: function(result){
                                        alert('Terjadi kesalahan saat pembayaran');
                                        payBtn.disabled = false;
                                        payBtn.textContent = 'Bayar Sekarang';
                                    }
                                });
                            })
                            .catch(err => {
                                console.error(err);
                                alert('Gagal membuat transaksi: ' + (err.message || 'error'));
                                payBtn.disabled = false;
                                payBtn.textContent = 'Bayar Sekarang';
                            });
                        });
                    });
                </script>
            @endpush
        </div>
    @endif

</div>
