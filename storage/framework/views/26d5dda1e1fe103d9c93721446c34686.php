<div wire:init="loadOrder" wire:poll.1000ms="loadOrder">
    <!-- Header -->
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="<?php echo e(route('user.dashboard')); ?>" class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="font-bold text-lg text-neutral-900">Riwayat Pesanan</h1>
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
                    <div class="card p-6 bg-warning-50 border-2 border-warning-200 text-center"
                         x-data="{
                             countdown_ms: <?php echo e($order->countdown_ms ?? 0); ?>,
                             now: 0,
                             diff: <?php echo e($order->countdown_ms ?? 0); ?>,
                             isActive: <?php echo e(($order->countdown_ms ?? 0) > 0 ? 'true' : 'false'); ?>,
                             isConfirmed: '<?php echo e($order->countDown?->status ?? ''); ?>' === 'terkonfirmasi',
                             orderStatus: '<?php echo e($order->status); ?>'
                         }"
                         x-init="
                             console.log('Order #<?php echo e($order->id_order); ?>', {
                                 countdown_ms: countdown_ms,
                                 isActive: isActive,
                                 isConfirmed: isConfirmed,
                                 countDownStatus: '<?php echo e($order->countDown?->status ?? 'NULL'); ?>',
                                 orderStatus: orderStatus
                             });
                             
                             if(isActive && !isConfirmed && countdown_ms > 0){
                                 let interval = setInterval(() => {
                                     now += 1000;
                                     diff = countdown_ms - now;
                                     if(diff <= 0){
                                         diff = 0;
                                         isActive = false;
                                         clearInterval(interval);
                                     }
                                 }, 1000);
                             }
                         ">
                        <p class="text-sm text-neutral-600 mb-2">Sisa waktu konfirmasi</p>
                        
                        <div class="mt-3">
                            <!-- Countdown Display -->
                            <template x-if="!isConfirmed && diff > 0">
                                <span x-text="Math.floor(diff/60000).toString().padStart(2,'0') + ':' + Math.floor((diff%60000)/1000).toString().padStart(2,'0')"
                                      class="text-3xl font-bold text-red-600">
                                </span>
                            </template>

                            <!-- Sudah Dikonfirmasi -->
                            <template x-if="isConfirmed">
                                <span class="text-lg font-semibold text-green-600">
                                    Pesanan sudah dikonfirmasi
                                </span>
                            </template>

                            <!-- Waktu Habis -->
                            <template x-if="!isConfirmed && diff <= 0">
                                <span class="text-lg font-semibold text-red-600">
                                    Waktu konfirmasi habis
                                </span>
                            </template>
                        </div>
                        
                        <p class="text-center text-xs text-neutral-500 mt-3">
                            Pesanan otomatis dibatalkan jika tidak ada konfirmasi
                        </p>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!-- Status Pesanan -->
                <div class="mt-4">
                    <!--[if BLOCK]><![endif]--><?php if($order && $order->status === 'ditolak'): ?>
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

                    <!--[if BLOCK]><![endif]--><?php if($order && $order->status === 'pending' && $order->countDown?->status === 'terkonfirmasi'): ?>
                        <!-- <div class="p-3 bg-green-50 border border-green-200 rounded-lg text-center space-y-2">
                            <div class="text-green-700 font-semibold">
                                Pesanan sudah diterima bengkel!
                            </div>
                            <p class="text-sm text-neutral-600">
                                Silakan tunggu bengkel menentukan harga final
                            </p>
                        </div> -->
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>
    </section>
</div><?php /**PATH D:\laragon\www\sibantar\resources\views/livewire/user/waiting-confirmation.blade.php ENDPATH**/ ?>