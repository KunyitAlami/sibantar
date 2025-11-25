<?php if (isset($component)) { $__componentOriginal2e6fb18f75884c4fed4e10444e669251 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2e6fb18f75884c4fed4e10444e669251 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout-admin','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout-admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!-- Header tombol back -->
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="<?php echo e(route('admin.dashboard.index')); ?>" class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="font-bold text-lg text-neutral-900">Kembali ke Dashboard</h1>
            </div>
        </div>
    </section>

    <div class="container mx-auto px-4 py-8 max-w-7xl">
        
        <div class="bg-white rounded-lg shadow-sm border border-neutral-200 p-6 mb-6">
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-neutral-900"><?php echo e($bengkel->nama_bengkel); ?></h2>
                        <p class="text-neutral-600 mt-1"><?php echo e($bengkel->kecamatan); ?></p>
                    </div>
                </div>
                <span class="px-4 py-2 rounded-full text-sm font-semibold
                    <?php echo e($bengkel->status == 'aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'); ?>">
                    <?php echo e(ucfirst($bengkel->status)); ?>

                </span>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-neutral-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <div>
                        <p class="text-sm text-neutral-500">Alamat Lengkap</p>
                        <p class="text-neutral-900 font-medium"><?php echo e($bengkel->alamat_lengkap); ?></p>
                    </div>
                </div>
                
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-neutral-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <p class="text-sm text-neutral-500">Jam Operasional</p>
                        <p class="text-neutral-900 font-medium"><?php echo e($bengkel->jam_operasional); ?></p>
                    </div>
                </div>
            </div>

            <?php if($bengkel->link_gmaps): ?>
            <div class="mt-4">
                <a href="<?php echo e($bengkel->link_gmaps); ?>" target="_blank" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                    Lihat di Google Maps
                </a>
            </div>
            <?php endif; ?>
        </div>

        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white rounded-lg shadow-sm border border-neutral-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-neutral-500 mb-1">Total Order</p>
                        <p class="text-3xl font-bold text-neutral-900"><?php echo e($orders->count()); ?></p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border border-neutral-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-neutral-500 mb-1">Selesai</p>
                        <p class="text-3xl font-bold text-green-600"><?php echo e($orders->where('status', 'selesai')->count()); ?></p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border border-neutral-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-neutral-500 mb-1">Pending</p>
                        <p class="text-3xl font-bold text-yellow-600"><?php echo e($orders->where('status', 'pending')->count()); ?></p>
                    </div>
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border border-neutral-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-neutral-500 mb-1">Ditolak</p>
                        <p class="text-3xl font-bold text-red-600"><?php echo e($orders->where('status', 'ditolak')->count()); ?></p>
                    </div>
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="bg-white rounded-lg shadow-sm border border-neutral-200 p-6 mb-6">
            <h3 class="text-xl font-bold text-neutral-900 mb-4 flex items-center gap-2">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Layanan Tersedia (<?php echo e($layanan_bengkel->count()); ?>)
            </h3>
            
            <?php if($layanan_bengkel->count() > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <?php $__currentLoopData = $layanan_bengkel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="border border-neutral-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                    <div class="flex items-start justify-between mb-2">
                        <h4 class="font-semibold text-neutral-900"><?php echo e($layanan->nama_layanan); ?></h4>
                        <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs rounded-full"><?php echo e($layanan->kategori); ?></span>
                    </div>
                    <p class="text-sm text-neutral-600 mb-3"><?php echo e($layanan->deskripsi); ?></p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-neutral-500">Estimasi Harga</span>
                        <span class="font-bold text-blue-600">
                            Rp <?php echo e(number_format($layanan->harga_awal, 0, ',', '.')); ?> - Rp <?php echo e(number_format($layanan->harga_akhir, 0, ',', '.')); ?>

                        </span>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php else: ?>
            <div class="text-center py-8 text-neutral-500">
                <svg class="w-16 h-16 mx-auto mb-3 text-neutral-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <p>Belum ada layanan yang tersedia</p>
            </div>
            <?php endif; ?>
        </div>

        
        <div class="bg-white rounded-lg shadow-sm border border-neutral-200 p-6 mb-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-neutral-900 flex items-center gap-2">
                    <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                    </svg>
                    Review & Rating
                </h3>
                <?php if($reviews->count() > 0): ?>
                <div class="text-right">
                    <div class="text-3xl font-bold text-neutral-900">
                        <?php echo e(number_format($reviews->avg('ratingBengkel'), 1)); ?>

                    </div>
                    <div class="text-sm text-neutral-500">dari <?php echo e($reviews->count()); ?> review</div>
                </div>
                <?php endif; ?>
            </div>

            <?php if($reviews->count() > 0): ?>
            <div class="space-y-4 max-h-96 overflow-y-auto">
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="border border-neutral-200 rounded-lg p-4">
                    <div class="flex items-start justify-between mb-2">
                        <div>
                            <p class="font-semibold text-neutral-900"><?php echo e($review->user->name ?? 'User'); ?></p>
                            <div class="flex items-center gap-4 mt-1">
                                <div class="flex items-center gap-1">
                                    <span class="text-xs text-neutral-500">Bengkel:</span>
                                    <div class="flex">
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                        <svg class="w-4 h-4 <?php echo e($i <= $review->ratingBengkel ? 'text-yellow-400' : 'text-neutral-300'); ?>" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                        </svg>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                                <div class="flex items-center gap-1">
                                    <span class="text-xs text-neutral-500">Layanan:</span>
                                    <div class="flex">
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                        <svg class="w-4 h-4 <?php echo e($i <= $review->ratingLayanan ? 'text-yellow-400' : 'text-neutral-300'); ?>" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                        </svg>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="text-xs text-neutral-500"><?php echo e($review->created_at->diffForHumans()); ?></span>
                    </div>
                    <?php if($review->comment): ?>
                    <p class="text-neutral-700 text-sm mt-2"><?php echo e($review->comment); ?></p>
                    <?php endif; ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php else: ?>
            <div class="text-center py-8 text-neutral-500">
                <svg class="w-16 h-16 mx-auto mb-3 text-neutral-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                </svg>
                <p>Belum ada review</p>
            </div>
            <?php endif; ?>
        </div>

        
        <div class="bg-white rounded-lg shadow-sm border border-neutral-200 p-6">
            <h3 class="text-xl font-bold text-neutral-900 mb-4 flex items-center gap-2">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                Riwayat Order (<?php echo e($orders->count()); ?>)
            </h3>

            <?php if($orders->count() > 0): ?>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-neutral-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-600 uppercase tracking-wider">ID Order</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-600 uppercase tracking-wider">Customer</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-600 uppercase tracking-wider">Layanan</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-600 uppercase tracking-wider">Status</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-600 uppercase tracking-wider">Total Bayar</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-600 uppercase tracking-wider">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-200">
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $tracking = $order_tracking->where('id_order', $order->id_order)->first();
                        ?>
                        <tr class="hover:bg-neutral-50">
                            <td class="px-4 py-3 text-sm font-medium text-neutral-900">#<?php echo e($order->id_order); ?></td>
                            <td class="px-4 py-3 text-sm text-neutral-700"><?php echo e($order->user->name ?? '-'); ?></td>
                            <td class="px-4 py-3 text-sm text-neutral-700"><?php echo e($order->layananBengkel->nama_layanan ?? '-'); ?></td>
                            <td class="px-4 py-3">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full
                                    <?php if($order->status == 'selesai'): ?> bg-green-100 text-green-700
                                    <?php elseif($order->status == 'pending'): ?> bg-yellow-100 text-yellow-700
                                    <?php elseif($order->status == 'ditolak'): ?> bg-red-100 text-red-700
                                    <?php else: ?> bg-blue-100 text-blue-700
                                    <?php endif; ?>">
                                    <?php echo e(ucfirst($order->status)); ?>

                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm font-semibold text-neutral-900">
                                <?php if($tracking && $tracking->finalPrice): ?>
                                    Rp <?php echo e(number_format($tracking->finalPrice, 0, ',', '.')); ?>

                                <?php else: ?>
                                    Rp <?php echo e(number_format($order->estimasi_harga ?? 0, 0, ',', '.')); ?>

                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-3 text-sm text-neutral-600"><?php echo e($order->created_at->format('d M Y')); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
            <div class="text-center py-8 text-neutral-500">
                <svg class="w-16 h-16 mx-auto mb-3 text-neutral-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <p>Belum ada order</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2e6fb18f75884c4fed4e10444e669251)): ?>
<?php $attributes = $__attributesOriginal2e6fb18f75884c4fed4e10444e669251; ?>
<?php unset($__attributesOriginal2e6fb18f75884c4fed4e10444e669251); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2e6fb18f75884c4fed4e10444e669251)): ?>
<?php $component = $__componentOriginal2e6fb18f75884c4fed4e10444e669251; ?>
<?php unset($__componentOriginal2e6fb18f75884c4fed4e10444e669251); ?>
<?php endif; ?><?php /**PATH D:\laragon\www\sibantar\resources\views/admin/bengkel/aktivitas.blade.php ENDPATH**/ ?>