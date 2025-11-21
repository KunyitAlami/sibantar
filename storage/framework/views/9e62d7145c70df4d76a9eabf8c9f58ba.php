<div wire:init="loadOrder" wire:poll.1000ms="loadOrder">
    <!-- Header -->
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="<?php echo e(url('/bengkel/search')); ?>" class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <div class="flex-1">
                    <h1 class="font-bold text-lg text-neutral-900">Menunggu Konfirmasi</h1>
                    <p class="text-sm text-neutral-500">Pesanan #<?php echo e($order->id_order ?? '-'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-6">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto space-y-6">

                <!-- Status Card -->
                <div class="text-center mb-8">
                    <div class="w-20 h-20 bg-warning-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-warning-600 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-neutral-900 mb-2">Menunggu Konfirmasi</h2>
                    <p class="text-neutral-600 text-sm">Sedang menunggu konfirmasi<br>dari bengkel</p>
                </div>
                <!--[if BLOCK]><![endif]--><?php if($order && $order->status !== 'ditolak'): ?>
                    <!-- Countdown Timer -->
                    <div class="card p-6 bg-warning-50 border-2 border-warning-200 text-center">
                        <p class="text-sm text-neutral-600 mb-2">Sisa waktu konfirmasi</p>
                        <div class="mt-3 text-sm text-neutral-600">
                            <!--[if BLOCK]><![endif]--><?php if($this->countdown !== null): ?>
                                <span class="font-semibold text-red-600" 
                                        x-data="{ end: <?php echo e($this->countdown); ?>, now: 0, diff: 0 }" 
                                        x-init="setInterval(() => { now += 1000; diff = end - now }, 1000)" 
                                        x-text="diff > 0 ? new Date(diff).toISOString().substr(14,5) : 'Waktu habis'">
                                </span>
                            <?php else: ?>
                                <span class="text-neutral-400">Tidak ada batas konfirmasi</span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <p class="text-center text-xs text-neutral-500 mt-3">
                            Pesanan otomatis dibatalkan jika tidak ada konfirmasi
                        </p>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!-- Status Pesanan -->
                <div class="mt-4">
                    <!--[if BLOCK]><![endif]--><?php if($order && $order->status === 'ditolak' && $this->countdown !== null): ?>
                        <div class="p-3 bg-red-50 border border-red-200 rounded-lg text-center space-y-2">
                            <div class="text-red-700 font-semibold">
                                Pesanan ini telah ditolak oleh bengkel.
                            </div>

                            <a href="<?php echo e(route('user.dashboard')); ?>" 
                            class="inline-block px-4 py-2 bg-primary-600 text-white rounded-lg shadow-md hover:bg-primary-700 transition">
                            Ayo cari bengkel lain
                            </a>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>
    </section>
</div>
  

<?php /**PATH C:\laragon\www\sibantar\resources\views/livewire/user/waiting-confirmation.blade.php ENDPATH**/ ?>