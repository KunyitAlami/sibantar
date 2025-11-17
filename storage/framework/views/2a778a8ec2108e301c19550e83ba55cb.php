<?php
    $statusConfig = [
        'on-the-way' => [
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />',
            'bgColor' => 'bg-primary-100',
            'iconColor' => 'text-primary-600',
            'title' => 'Teknisi Dalam Perjalanan',
            'subtitle' => 'Teknisi sedang menuju lokasi Anda',
            'estimate' => 'Estimasi tiba: 8 menit',
            'currentStep' => 1,
            'showMap' => true,
            'showContact' => true
        ],
        'in-progress' => [
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />',
            'bgColor' => 'bg-info-100',
            'iconColor' => 'text-info-600',
            'title' => 'Sedang Diperbaiki',
            'subtitle' => 'Teknisi sedang memperbaiki kendaraan Anda',
            'currentStep' => 2,
            'showMap' => false,
            'showContact' => true
        ],
        'waiting-payment' => [
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />',
            'bgColor' => 'bg-secondary-100',
            'iconColor' => 'text-secondary-600',
            'title' => 'Menunggu Pembayaran',
            'subtitle' => 'Silakan lakukan pembayaran untuk menyelesaikan pesanan',
            'currentStep' => 3,
            'showMap' => false,
            'showContact' => false,
            'showPayment' => true
        ],
        'completed' => [
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />',
            'bgColor' => 'bg-success-100',
            'iconColor' => 'text-success-600',
            'title' => 'Perbaikan Selesai',
            'subtitle' => 'Terima kasih! Pesanan Anda telah selesai',
            'currentStep' => 4,
            'showMap' => false,
            'showContact' => false
        ]
    ];
    
    $config = $statusConfig[$status] ?? $statusConfig['on-the-way'];
?>

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
                <a href="<?php echo e(route('user.history')); ?>" class="text-neutral-700 hover:text-primary-700">
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
                <div class="text-center mb-6">
                    <div class="w-24 h-24 <?php echo e($config['bgColor']); ?> rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-12 h-12 <?php echo e($config['iconColor']); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <?php echo $config['icon']; ?>

                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-neutral-900 mb-2"><?php echo e($config['title']); ?></h1>
                    <p class="text-sm text-neutral-600"><?php echo e($config['subtitle']); ?></p>
                    <?php if(isset($config['estimate'])): ?>
                        <p class="text-sm font-semibold text-secondary-600 mt-1"><?php echo e($config['estimate']); ?></p>
                    <?php endif; ?>
                </div>

                <!-- Progress Steps -->
                <div class="card p-6 mb-4">
                    <h3 class="font-bold text-neutral-900 mb-4">Progress Layanan</h3>
                    <div class="relative">
                        <!-- Step 1 - Pesanan Dikonfirmasi -->
                        <div class="flex items-start gap-3 mb-4">
                            <div class="flex flex-col items-center">
                                <div class="w-8 h-8 <?php echo e($config['currentStep'] >= 1 ? 'bg-success-500' : 'bg-neutral-200'); ?> rounded-full flex items-center justify-center flex-shrink-0">
                                    <?php if($config['currentStep'] >= 1): ?>
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    <?php else: ?>
                                        <span class="text-neutral-500 font-bold text-sm">1</span>
                                    <?php endif; ?>
                                </div>
                                <div class="w-0.5 h-8 <?php echo e($config['currentStep'] >= 2 ? 'bg-success-500' : 'bg-neutral-200'); ?> mt-1"></div>
                            </div>
                            <div class="flex-1 pt-1">
                                <p class="font-semibold <?php echo e($config['currentStep'] >= 1 ? 'text-neutral-900' : 'text-neutral-500'); ?>">Pesanan Dikonfirmasi</p>
                                <?php if($config['currentStep'] >= 1): ?>
                                    <p class="text-xs text-neutral-500 mt-0.5">14:25 WITA</p>
                                <?php else: ?>
                                    <p class="text-xs text-neutral-400 mt-0.5">Menunggu konfirmasi bengkel</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Step 2 - Teknisi Dalam Perjalanan -->
                        <div class="flex items-start gap-3 mb-4">
                            <div class="flex flex-col items-center">
                                <div class="w-8 h-8 <?php echo e($config['currentStep'] > 2 ? 'bg-success-500' : ($config['currentStep'] == 2 ? 'bg-primary-600' : 'bg-neutral-200')); ?> rounded-full flex items-center justify-center flex-shrink-0">
                                    <?php if($config['currentStep'] > 2): ?>
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    <?php else: ?>
                                        <span class="<?php echo e($config['currentStep'] == 2 ? 'text-white' : 'text-neutral-500'); ?> font-bold text-sm">2</span>
                                    <?php endif; ?>
                                </div>
                                <div class="w-0.5 h-8 <?php echo e($config['currentStep'] >= 3 ? 'bg-success-500' : 'bg-neutral-200'); ?> mt-1"></div>
                            </div>
                            <div class="flex-1 pt-1">
                                <p class="font-semibold <?php echo e($config['currentStep'] == 2 ? 'text-primary-700' : ($config['currentStep'] > 2 ? 'text-neutral-900' : 'text-neutral-500')); ?>">Teknisi Dalam Perjalanan</p>
                                <?php if($config['currentStep'] == 2): ?>
                                    <p class="text-xs text-neutral-500 mt-0.5">Teknisi sedang menuju lokasi Anda</p>
                                <?php elseif($config['currentStep'] > 2): ?>
                                    <p class="text-xs text-neutral-500 mt-0.5">14:33 WITA</p>
                                <?php else: ?>
                                    <p class="text-xs text-neutral-400 mt-0.5">Teknisi akan segera berangkat</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Step 3 - Proses Perbaikan -->
                        <div class="flex items-start gap-3 mb-4">
                            <div class="flex flex-col items-center">
                                <div class="w-8 h-8 <?php echo e($config['currentStep'] >= 3 ? 'bg-success-500' : 'bg-neutral-200'); ?> rounded-full flex items-center justify-center flex-shrink-0">
                                    <?php if($config['currentStep'] >= 3): ?>
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    <?php else: ?>
                                        <span class="text-neutral-500 font-bold text-sm">3</span>
                                    <?php endif; ?>
                                </div>
                                <div class="w-0.5 h-8 <?php echo e($config['currentStep'] >= 3 ? 'bg-success-500' : 'bg-neutral-200'); ?> mt-1"></div>
                            </div>
                            <div class="flex-1 pt-1">
                                <p class="font-semibold <?php echo e($config['currentStep'] >= 3 ? 'text-neutral-900' : 'text-neutral-500'); ?>">Proses Perbaikan</p>
                                <?php if($config['currentStep'] >= 3): ?>
                                    <p class="text-xs text-neutral-500 mt-0.5">14:45 - 15:20 WITA</p>
                                <?php else: ?>
                                    <p class="text-xs text-neutral-400 mt-0.5">Teknisi akan memperbaiki kendaraan Anda</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Step 4 - Menunggu Pembayaran -->
                        <div class="flex items-start gap-3 mb-4">
                            <div class="flex flex-col items-center">
                                <div class="w-8 h-8 <?php echo e($config['currentStep'] > 3 ? ($config['currentStep'] >= 4 ? 'bg-success-500' : 'bg-secondary-600') : 'bg-neutral-200'); ?> rounded-full flex items-center justify-center flex-shrink-0">
                                    <?php if($config['currentStep'] > 4): ?>
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    <?php elseif($config['currentStep'] == 4): ?>
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    <?php else: ?>
                                        <span class="text-neutral-500 font-bold text-sm">4</span>
                                    <?php endif; ?>
                                </div>
                                <div class="w-0.5 h-8 <?php echo e($config['currentStep'] > 3 ? 'bg-success-500' : 'bg-neutral-200'); ?> mt-1"></div>
                            </div>
                            <div class="flex-1 pt-1">
                                <p class="font-semibold <?php echo e($config['currentStep'] == 3 ? 'text-secondary-700' : ($config['currentStep'] > 3 ? 'text-neutral-900' : 'text-neutral-500')); ?>">Menunggu Pembayaran</p>
                                <?php if($config['currentStep'] == 3): ?>
                                    <p class="text-xs text-neutral-500 mt-0.5">Silakan lakukan pembayaran</p>
                                <?php elseif($config['currentStep'] > 3): ?>
                                    <p class="text-xs text-neutral-500 mt-0.5">15:22 WITA</p>
                                <?php else: ?>
                                    <p class="text-xs text-neutral-400 mt-0.5">Menunggu proses pembayaran</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Step 5 - Selesai -->
                        <div class="flex items-start gap-3">
                            <div class="flex flex-col items-center">
                                <div class="w-8 h-8 <?php echo e($config['currentStep'] >= 4 ? 'bg-success-500' : 'bg-neutral-200'); ?> rounded-full flex items-center justify-center flex-shrink-0">
                                    <?php if($config['currentStep'] >= 4): ?>
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    <?php else: ?>
                                        <span class="text-neutral-500 font-bold text-sm">5</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="flex-1 pt-1">
                                <p class="font-semibold <?php echo e($config['currentStep'] >= 4 ? 'text-success-700' : 'text-neutral-500'); ?>">Selesai</p>
                                <?php if($config['currentStep'] >= 4): ?>
                                    <p class="text-xs text-neutral-500 mt-0.5">15:30 WITA</p>
                                <?php else: ?>
                                    <p class="text-xs text-neutral-400 mt-0.5">Berikan ulasan</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map Container (Only show for on-the-way status) -->
                <?php if($config['showMap']): ?>
                <div class="mb-4">
                    <div id="trackingMap" class="w-full h-48 rounded-xl overflow-hidden border-2 border-neutral-200"></div>
                    <div class="mt-3 p-3 bg-primary-50 rounded-lg border border-primary-200">
                        <div class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-primary-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            <div class="flex-1">
                                <p class="text-xs text-neutral-600 mb-1">Lokasi Anda</p>
                                <p id="userAddress" class="font-medium text-neutral-900 text-sm">Mendeteksi lokasi...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Bengkel Contact Card (Show for on-the-way and in-progress) -->
                <?php if($config['showContact']): ?>
                <div class="card p-4 mb-4">
                    <h3 class="font-semibold text-neutral-900 mb-3">Kontak Bengkel</h3>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-success-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-success-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-neutral-900">0812-7452-8522</p>
                                <p class="text-xs text-neutral-500">Chat Whatsapp</p>
                            </div>
                        </div>
                        <a href="https://wa.me/6281274528522?text=Halo,%20saya%20ingin%20bertanya%20tentang%20pesanan%20saya" target="_blank" class="btn btn-sm btn-primary">
                            Whatsapp
                        </a>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Payment Section (Show for waiting-payment status) -->
                <?php if(isset($config['showPayment']) && $config['showPayment']): ?>
                <div class="card p-4 mb-4">
                    <h3 class="font-bold text-lg text-neutral-900 mb-4">Rincian Pembayaran</h3>
                    <div class="space-y-3 mb-4">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-neutral-600">Biaya Layanan</span>
                            <span class="font-semibold text-neutral-900">Rp 15.000</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-neutral-600">Ongkir</span>
                            <span class="font-semibold text-neutral-900">Rp 6.000</span>
                        </div>
                        <div class="border-t border-neutral-200 pt-3">
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-neutral-900">Total Pembayaran</span>
                                <span class="font-bold text-primary-700 text-xl">Rp 21.000</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Payment Method -->
                    <div class="bg-neutral-50 rounded-lg p-4 mb-4">
                        <p class="text-sm font-semibold text-neutral-900 mb-2">Metode Pembayaran</p>
                        <div class="space-y-2">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="payment" value="cash" checked class="w-4 h-4 text-primary-600">
                                <div class="flex-1">
                                    <span class="text-sm font-medium text-neutral-900">Cash (Tunai)</span>
                                    <p class="text-xs text-neutral-500">Bayar langsung ke teknisi</p>
                                </div>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="payment" value="cashless" class="w-4 h-4 text-primary-600">
                                <div class="flex-1">
                                    <span class="text-sm font-medium text-neutral-900">Cashless</span>
                                    <p class="text-xs text-neutral-500">E-Wallet, VA, Kartu Kredit via Midtrans</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <button onclick="confirmPayment()" class="btn btn-primary w-full">
                        Konfirmasi Pembayaran
                    </button>
                </div>
                <?php endif; ?>

                <!-- Order Details Card -->
                <div class="card p-4">
                    <h3 class="font-bold text-lg text-neutral-900 mb-4">Detail Pesanan</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-neutral-600">Jenis Kendaraan</span>
                            <span class="font-semibold text-neutral-900">Motor</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-neutral-600">Jenis Masalah</span>
                            <span class="font-semibold text-neutral-900">Ban Bocor</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-neutral-600">Bengkel</span>
                            <span class="font-semibold text-neutral-900">Bengkel Jaya Motor</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-neutral-600">Waktu Pesanan</span>
                            <span class="font-semibold text-neutral-900">14:32 WITA</span>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons (Show for completed status) -->
                <?php if($status == 'completed'): ?>
                <div class="mt-4 space-y-3">
                    <a href="#" class="btn btn-primary w-full">Berikan Ulasan</a>
                    <a href="<?php echo e(route('user.search')); ?>" class="btn btn-outline w-full">Kembali ke Beranda</a>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <?php if(isset($config['showPayment']) && $config['showPayment']): ?>
    <?php $__env->startPush('scripts'); ?>
    <!-- Midtrans Snap JS -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo e(config('services.midtrans.client_key')); ?>"></script>
    
    <script>
        function confirmPayment() {
            const paymentMethod = document.querySelector('input[name="payment"]:checked').value;
            
            if (paymentMethod === 'cashless') {
                // Payment via Midtrans
                processMidtransPayment();
            } else {
                // Cash payment
                confirmCashPayment();
            }
        }

        function confirmCashPayment() {
            Swal.fire({
                title: 'Konfirmasi Pembayaran Tunai',
                html: `
                    <div class="text-left">
                        <p class="text-sm text-gray-600 mb-3">Pastikan pembayaran tunai sudah dilakukan:</p>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Total:</span>
                                <span class="font-semibold">Rp 21.000</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Metode:</span>
                                <span class="font-semibold">Tunai</span>
                            </div>
                        </div>
                    </div>
                `,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Sudah Bayar',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#0051BA',
                cancelButtonColor: '#737373',
                reverseButtons: true,
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'px-6 py-2.5 rounded-lg font-medium',
                    cancelButton: 'px-6 py-2.5 rounded-lg font-medium'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Memproses...',
                        html: 'Mohon tunggu sebentar',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    setTimeout(() => {
                        Swal.close();
                        window.location.href = '<?php echo e(route('user.order-tracking', ['orderId' => $orderId ?? 1])); ?>?status=completed';
                    }, 1500);
                }
            });
        }

        function processMidtransPayment() {
            // Show loading
            Swal.fire({
                title: 'Memproses...',
                html: 'Mohon tunggu, sedang membuat transaksi',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Create transaction via API
            fetch('<?php echo e(route('user.create-transaction')); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify({
                    order_id: '<?php echo e($orderId ?? 1); ?>',
                    gross_amount: 21000,
                    customer_details: {
                        first_name: 'User',
                        email: 'user@example.com',
                        phone: '081234567890'
                    }
                })
            })
            .then(response => response.json())
            .then(data => {
                Swal.close();
                
                if (data.snap_token) {
                    // Open Midtrans Snap
                    snap.pay(data.snap_token, {
                        onSuccess: function(result) {
                            notyf.success('Pembayaran berhasil!');
                            setTimeout(() => {
                                window.location.href = '<?php echo e(route('user.order-tracking', ['orderId' => $orderId ?? 1])); ?>?status=completed';
                            }, 1500);
                        },
                        onPending: function(result) {
                            notyf.open({
                                type: 'info',
                                message: 'Menunggu pembayaran...'
                            });
                        },
                        onError: function(result) {
                            notyf.error('Pembayaran gagal!');
                        },
                        onClose: function() {
                            notyf.open({
                                type: 'warning',
                                message: 'Pembayaran dibatalkan'
                            });
                        }
                    });
                } else {
                    notyf.error('Gagal membuat transaksi');
                }
            })
            .catch(error => {
                Swal.close();
                notyf.error('Terjadi kesalahan: ' + error.message);
            });
        }
    </script>
    <?php $__env->stopPush(); ?>
    <?php endif; ?>

    <?php if($config['showMap']): ?>
    <?php $__env->startPush('scripts'); ?>
    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        window.addEventListener('DOMContentLoaded', function() {
            // Koordinat user dan mekanik
            const userLocation = [-3.3186, 114.5942];
            const mechanicLocation = [-3.3250, 114.5880];

            // Initialize map
            const trackingMap = L.map('trackingMap').setView(userLocation, 14);
            
            // Add OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                maxZoom: 19
            }).addTo(trackingMap);

            // Get user's real location
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        const realUserLocation = [position.coords.latitude, position.coords.longitude];
                        
                        // Update map to user's location
                        trackingMap.setView(realUserLocation, 14);
                        
                        // User marker (blue)
                        const userIcon = L.divIcon({
                            className: 'custom-marker',
                            html: '<div style="background-color: #0051BA; width: 24px; height: 24px; border-radius: 50%; border: 4px solid white; box-shadow: 0 2px 8px rgba(0,0,0,0.4);"></div>',
                            iconSize: [24, 24],
                            iconAnchor: [12, 12]
                        });
                        L.marker(realUserLocation, { icon: userIcon }).addTo(trackingMap)
                            .bindPopup('<b>Lokasi Anda</b>');

                        // Get address from coordinates using Nominatim
                        fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${position.coords.latitude}&lon=${position.coords.longitude}&zoom=18&addressdetails=1`)
                            .then(response => response.json())
                            .then(data => {
                                const address = data.display_name || `${position.coords.latitude.toFixed(6)}, ${position.coords.longitude.toFixed(6)}`;
                                document.getElementById('userAddress').textContent = address;
                            })
                            .catch(error => {
                                console.error('Error getting address:', error);
                                document.getElementById('userAddress').textContent = `Koordinat: ${position.coords.latitude.toFixed(6)}, ${position.coords.longitude.toFixed(6)}`;
                            });

                        // Mechanic marker (orange)
                        const mechanicIcon = L.divIcon({
                            className: 'custom-marker',
                            html: '<div style="background-color: #FF9800; width: 28px; height: 28px; border-radius: 50%; border: 4px solid white; box-shadow: 0 2px 12px rgba(0,0,0,0.5);"></div>',
                            iconSize: [28, 28],
                            iconAnchor: [14, 14]
                        });
                        L.marker(mechanicLocation, { icon: mechanicIcon }).addTo(trackingMap)
                            .bindPopup('<b>Teknisi</b>');

                        // Draw route line
                        L.polyline([mechanicLocation, realUserLocation], {
                            color: '#0051BA',
                            weight: 3,
                            opacity: 0.7,
                            dashArray: '10, 10'
                        }).addTo(trackingMap);

                        // Fit map to show both markers
                        const bounds = L.latLngBounds([realUserLocation, mechanicLocation]);
                        trackingMap.fitBounds(bounds, { padding: [50, 50] });
                    },
                    function(error) {
                        console.error('Geolocation error:', error);
                        document.getElementById('userAddress').textContent = 'Gagal mendapatkan lokasi Anda';
                        
                        // Fallback to default location
                        const userIcon = L.divIcon({
                            className: 'custom-marker',
                            html: '<div style="background-color: #0051BA; width: 24px; height: 24px; border-radius: 50%; border: 4px solid white; box-shadow: 0 2px 8px rgba(0,0,0,0.4);"></div>',
                            iconSize: [24, 24],
                            iconAnchor: [12, 12]
                        });
                        L.marker(userLocation, { icon: userIcon }).addTo(trackingMap)
                            .bindPopup('<b>Lokasi Anda</b>');

                        const mechanicIcon = L.divIcon({
                            className: 'custom-marker',
                            html: '<div style="background-color: #FF9800; width: 28px; height: 28px; border-radius: 50%; border: 4px solid white; box-shadow: 0 2px 12px rgba(0,0,0,0.5);"></div>',
                            iconSize: [28, 28],
                            iconAnchor: [14, 14]
                        });
                        L.marker(mechanicLocation, { icon: mechanicIcon }).addTo(trackingMap)
                            .bindPopup('<b>Teknisi</b>');

                        L.polyline([mechanicLocation, userLocation], {
                            color: '#0051BA',
                            weight: 3,
                            opacity: 0.7,
                            dashArray: '10, 10'
                        }).addTo(trackingMap);

                        const bounds = L.latLngBounds([userLocation, mechanicLocation]);
                        trackingMap.fitBounds(bounds, { padding: [50, 50] });
                    }
                );
            } else {
                document.getElementById('userAddress').textContent = 'Browser tidak mendukung geolokasi';
                
                // Fallback to default location
                const userIcon = L.divIcon({
                    className: 'custom-marker',
                    html: '<div style="background-color: #0051BA; width: 24px; height: 24px; border-radius: 50%; border: 4px solid white; box-shadow: 0 2px 8px rgba(0,0,0,0.4);"></div>',
                    iconSize: [24, 24],
                    iconAnchor: [12, 12]
                });
                L.marker(userLocation, { icon: userIcon }).addTo(trackingMap)
                    .bindPopup('<b>Lokasi Anda</b>');

                const mechanicIcon = L.divIcon({
                    className: 'custom-marker',
                    html: '<div style="background-color: #FF9800; width: 28px; height: 28px; border-radius: 50%; border: 4px solid white; box-shadow: 0 2px 12px rgba(0,0,0,0.5);"></div>',
                    iconSize: [28, 28],
                    iconAnchor: [14, 14]
                });
                L.marker(mechanicLocation, { icon: mechanicIcon }).addTo(trackingMap)
                    .bindPopup('<b>Teknisi</b>');

                L.polyline([mechanicLocation, userLocation], {
                    color: '#0051BA',
                    weight: 3,
                    opacity: 0.7,
                    dashArray: '10, 10'
                }).addTo(trackingMap);

                const bounds = L.latLngBounds([userLocation, mechanicLocation]);
                trackingMap.fitBounds(bounds, { padding: [50, 50] });
            }
        });
    </script>
    <?php $__env->stopPush(); ?>
    <?php endif; ?>

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
<?php /**PATH D:\laragon\www\sibantar\resources\views/user/order-tracking.blade.php ENDPATH**/ ?>