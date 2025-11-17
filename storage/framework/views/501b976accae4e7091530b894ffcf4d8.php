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
                <a href="<?php echo e(url('/bengkel/search')); ?>" class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <div class="flex-1">
                    <h1 class="font-bold text-lg text-neutral-900">Menunggu Konfirmasi</h1>
                    <p class="text-sm text-neutral-500">Pesanan #SB4238012</p>
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

                <!-- Countdown Timer -->
                <div class="card p-6 bg-warning-50 border-2 border-warning-200">
                    <p class="text-center text-sm text-neutral-600 mb-2">Sisa waktu konfirmasi</p>
                    <div id="countdown" class="text-center text-5xl font-bold text-warning-600">02:00</div>
                    <p class="text-center text-xs text-neutral-500 mt-3">
                        Pesanan otomatis dibatalkan jika tidak ada konfirmasi
                    </p>
                </div>

                <!-- Detail Pesanan -->
                <div class="card p-6">
                    <h3 class="font-bold text-lg mb-4">Detail Pesanan</h3>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-neutral-600 text-sm">Jenis Kendaraan</span>
                            <span class="font-semibold text-neutral-900"><?php echo e($order->layananBengkel->kategori ?? ''); ?></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-neutral-600 text-sm">Jenis Masalah</span>
                            <span class="font-semibold text-neutral-900"><?php echo e($order->layananBengkel->nama_layanan ?? ''); ?></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-neutral-600 text-sm">Waktu Pesanan</span>
                            <span class="font-semibold text-neutral-900" id="orderTime"><?php echo e($order->created_at ?? ''); ?></span>
                        </div>
                    </div>
                </div>

                <!-- Rincian Biaya -->
                <div class="card p-6">
                    <h3 class="font-bold text-lg mb-4">Rincian Biaya</h3>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-neutral-600 text-sm">Harga Makimal Layanan</span>
                            <span class="font-semibold text-neutral-900" id="servicePriceDisplay">
                                Rp <?php echo e(number_format($order->estimasi_harga, 0, ',', '.')); ?>

                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-neutral-600 text-sm">Total Harga Maksimal + Ongkir</span>
                            <span class="font-semibold text-neutral-900" id="deliveryFeeDisplay">
                                Rp <?php echo e(number_format($order->total_bayar, 0, ',', '.')); ?>

                            </span>
                        </div>
                        
                        
                        <div class="border-t border-neutral-200 pt-3 mt-3">
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-neutral-900">Total Estimasi Akhir</span>
                                <span class="font-bold text-xl text-primary-700" id="totalPriceDisplay">
                                    Rp <?php echo e(number_format($order->total_bayar, 0, ',', '.')); ?>

                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-warning-50 border border-warning-200 rounded-lg p-3 mt-4">
                        <p class="text-xs text-warning-800">
                            <strong>Catatan:</strong> Harga final dapat berbeda tergantung kondisi kendaraan setelah diperiksa mekanik.
                        </p>
                    </div>
                </div>

                <!-- Bengkel Info -->
                <div class="card p-6">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 bg-neutral-200 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-8 h-8 text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-neutral-900"><?php echo e($order->bengkel->nama_bengkel ?? ''); ?></h4>
                            <div class="flex items-center gap-2 mt-1">
                                <div class="flex text-warning-500">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                </div>
                                <span class="text-sm text-neutral-600"><?php echo e($order->bengkel->alamat_lengkap ?? ''); ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cancel Button -->
                <button id="cancelOrderBtn" class="btn btn-outline w-full text-error-600 border-error-300 hover:bg-error-50">
                    Batalkan Pesanan
                </button>

            </div>
        </div>
    </section>

    <!-- Auto Cancel Modal -->
    <div id="autoCancelModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-sm w-full shadow-xl">
            <div class="p-6 text-center">
                <div class="w-16 h-16 bg-error-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-error-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-neutral-900 mb-2">Pesanan Dibatalkan</h3>
                <p class="text-neutral-600 text-sm mb-6">
                    Bengkel tidak memberikan konfirmasi dalam waktu yang ditentukan. Silakan cari bengkel lain.
                </p>
                <button id="searchAgainBtn" class="btn btn-primary w-full">
                    Cari Bengkel Lain
                </button>
            </div>
        </div>
    </div>

    <!-- Manual Cancel Confirmation Modal -->
    <div id="cancelConfirmModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-sm w-full shadow-xl">
            <div class="p-6">
                <h3 class="text-xl font-bold text-neutral-900 mb-2">Batalkan Pesanan?</h3>
                <p class="text-neutral-600 text-sm mb-6">
                    Apakah Anda yakin ingin membatalkan pesanan ini?
                </p>
                <div class="grid grid-cols-2 gap-3">
                    <button id="cancelNoBtn" class="btn btn-outline">Tidak</button>
                    <button id="cancelYesBtn" class="btn btn-primary bg-error-600 hover:bg-error-700">Ya, Batalkan</button>
                </div>
            </div>
        </div>
    </div>

    

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
<?php /**PATH D:\laragon\www\sibantar\resources\views/user/waiting-confirmation.blade.php ENDPATH**/ ?>