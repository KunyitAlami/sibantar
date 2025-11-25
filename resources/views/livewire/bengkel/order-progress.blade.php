<div wire:poll.2000ms="loadTracking">
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

    <!-- Final Price & Payment -->
    @if(($tracking->finalPrice ?? 0) > 0)
        <div class="card p-4 mb-4 bg-success-50 border border-success-200 rounded-xl">
            <h3 class="font-bold text-lg text-success-700 mb-3">Rincian Biaya Final</h3>
            <div class="flex justify-between mb-2">
                <span>Harga Keseluruhan</span>
                <span>Rp {{ number_format(($tracking->finalPrice ?? 0) - ($tracking->deliveryFee ?? 0), 0, ',', '.') }}</span>
            </div>

            <div class="flex justify-between items-center font-semibold text-success-800 text-lg mb-3">
                <span>Total</span>
                <span>Rp {{ number_format($tracking->finalPrice ?? 0, 0, ',', '.') }}</span>
            </div>

            @php
                $paidStatuses = ['settlement', 'capture'];
                $isPaid = in_array($tracking->midtrans_status ?? '', $paidStatuses) || (($tracking->current_step ?? 0) >= 5);
            @endphp

            @if($isPaid)
                <div class="py-3 text-center text-sm font-semibold text-success-700 border border-success-200 rounded-xl bg-success-100">
                    Pembayaran berhasil
                </div>
            @else
                <button 
                    type="button"
                    onclick="handlePayment({{ $tracking->order->id_order ?? 0 }}, {{ $tracking->finalPrice ?? 0 }})"
                    class="block w-full text-center py-3 bg-success-500 hover:bg-success-600 text-white rounded-xl font-bold transition-colors">
                    Bayar Sekarang
                </button>
            @endif
        </div>
    @endif
</div>

@push('scripts')
    @php 
        $midtransClientKey = config('services.midtrans.client_key'); 
        $isProd = config('services.midtrans.is_production'); 
    @endphp
    <script src="{{ $isProd ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}" data-client-key="{{ $midtransClientKey }}"></script>
    <script>
        // Global function yang bisa dipanggil kapan saja
        window.handlePayment = function(orderId, amount) {
            console.log('Payment triggered - Order ID:', orderId, 'Amount:', amount);
            
            if (!amount || amount <= 0) {
                alert('Jumlah pembayaran tidak valid');
                return;
            }

            // Cari tombol yang diklik
            const btn = event.target;
            const originalText = btn.textContent;
            btn.disabled = true;
            btn.textContent = 'Membuat transaksi...';

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
            .then(res => {
                if (!res.ok) {
                    throw new Error('Network response was not ok: ' + res.status);
                }
                return res.json();
            })
            .then(data => {
                console.log('Server response:', data);
                
                if (data.error) {
                    throw new Error(data.error);
                }
                
                const token = data.snap_token;
                const transactionId = data.transaction_id;

                if (!token) {
                    throw new Error('Token tidak diterima dari server');
                }

                console.log('Opening Midtrans Snap...');

                // Pastikan Snap library sudah loaded
                if (typeof window.snap === 'undefined') {
                    throw new Error('Midtrans Snap belum loaded');
                }

                window.snap.pay(token, {
                    onSuccess: function(result) {
                        console.log('Payment success:', result);
                            // Show immediate SweetAlert confirmation (client-side fallback)
                        try {
                            window.paymentAlertShown = true;
                            Swal.fire({
                                title: 'Pembayaran Berhasil',
                                text: 'Pembayaran Anda telah diterima.',
                                icon: 'success',
                                confirmButtonText: 'Lihat Riwayat',
                                allowOutsideClick: false,
                                confirmButtonColor: '#0051BA',
                                background: '#ffffff',
                                timer: 5000,
                                timerProgressBar: true,
                            }).then((res) => {
                                // Redirect to history whether clicked or auto-closed
                                window.location.href = '{{ route('user.history', ['id_user' => Auth::id()]) }}';
                            });
                        } catch (e) {
                            console.warn('SweetAlert not available yet:', e);
                        }

                            // Panggil Livewire method untuk konfirmasi server-side
                            if (typeof Livewire !== 'undefined') {
                                Livewire.find('{{ $_instance->getId() }}').call('handleTransactionConfirmed', transactionId, 'settlement', orderId);
                            }

                            // Fallback: reload halaman jika Livewire tidak tersedia
                            setTimeout(() => {
                                if (!window.paymentAlertShown) {
                                    window.location.reload();
                                }
                            }, 1500);
                    },
                    onPending: function(result) {
                        console.log('Payment pending:', result);
                        
                        if (typeof Livewire !== 'undefined') {
                            Livewire.find('{{ $_instance->getId() }}').call('handleTransactionConfirmed', transactionId, 'pending', orderId);
                        }
                        
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    },
                    onError: function(result) {
                        console.error('Payment error:', result);
                        alert('Terjadi kesalahan saat pembayaran');
                        btn.disabled = false;
                        btn.textContent = originalText;
                    },
                    onClose: function() {
                        console.log('Payment popup closed');
                        btn.disabled = false;
                        btn.textContent = originalText;
                    }
                });
            })
            .catch(err => {
                console.error('Error:', err);
                alert('Gagal membuat transaksi: ' + (err.message || 'Unknown error'));
                btn.disabled = false;
                btn.textContent = originalText;
            });
        }

        // Log untuk debugging
        console.log('Payment script loaded');
        console.log('Midtrans Snap available:', typeof window.snap !== 'undefined');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Ensure flag exists to avoid duplicate alerts
        window.paymentAlertShown = window.paymentAlertShown || false;

        // Listen for Livewire browser event when payment is processed
        window.addEventListener('payment-processed', function(e) {
            console.log('payment-processed event:', e.detail);
            if (window.paymentAlertShown) return; // already shown by client-side fallback

            if (e.detail && (e.detail.status === 'settlement' || e.detail.status === 'capture')) {
                window.paymentAlertShown = true;
                Swal.fire({
                    title: 'Pembayaran Berhasil',
                    text: 'Pembayaran Anda telah diterima.',
                    icon: 'success',
                    confirmButtonText: 'Lihat Riwayat',
                    allowOutsideClick: false,
                    confirmButtonColor: '#0051BA',
                    background: '#ffffff',
                    timer: 5000,
                    timerProgressBar: true,
                }).then((result) => {
                    // Redirect to history whether clicked or auto-closed
                    window.location.href = '{{ route('user.history', ['id_user' => Auth::id()]) }}';
                });
            }
        });
    </script>
@endpush
