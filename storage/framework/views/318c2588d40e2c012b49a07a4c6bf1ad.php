<?php if (isset($component)) { $__componentOriginal70339126620b9ce2988dbf7f78f02854 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal70339126620b9ce2988dbf7f78f02854 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout-bengkel','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout-bengkel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-50 mb-5">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="<?php echo e(route('bengkel.dashboard', ['id_bengkel' => $order->id_bengkel])); ?>"
                   class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <h1 class="font-bold text-lg text-neutral-900">Form Laporan</h1>
            </div>
        </div>
    </section>

    
    
    <section class="px-4">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-sm mb-6">
            
            <form action="<?php echo e(route('bengkel.report.store', $order->id_order)); ?>"
                method="POST" enctype="multipart/form-data" class="mb-6 gap-5">
                <?php echo csrf_field(); ?>

                <div class="space-y-5">
                    <div>
                        <h1 class="font-semibold text-lg mb-2">Keterangan Order</h1>
                        <div class="space-y-1 text-sm text-neutral-700">

                            <p><span class="font-semibold">Pelanggan:</span> <?php echo e($order->user->username); ?></p>

                            <p><span class="font-semibold">Kategori:</span> <?php echo e($order->layananBengkel->kategori ?? '-'); ?></p>

                            <p><span class="font-semibold">Layanan:</span> <?php echo e($order->layananBengkel->nama_layanan ?? '-'); ?></p>

                            <p><span class="font-semibold">Dibuat pada:</span> 
                                <?php echo e($order->created_at->format('d M Y, H:i')); ?>

                            </p>

                        </div>

                    </div>

                    <div>
                        <label class="font-semibold mb-3">Deskripsi Laporan</label>
                        <textarea name="deskripsi" rows="5"
                                class="w-full border rounded-lg p-3 mt-3"
                                placeholder="Tuliskan laporan lengkap mengenai kondisi pesanan..."></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 rounded-full text-center mt-4">
                        Laporkan
                    </button>

                    <input type="hidden" name="id_order" value="<?php echo e($order->id_order); ?>">
                    <input type="hidden" name="id_bengkel" value="<?php echo e($order->id_bengkel); ?>">
                    <input type="hidden" name="id_user" value="<?php echo e($order->id_user); ?>">
                </div>
            </form>

        </div>
        
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal70339126620b9ce2988dbf7f78f02854)): ?>
<?php $attributes = $__attributesOriginal70339126620b9ce2988dbf7f78f02854; ?>
<?php unset($__attributesOriginal70339126620b9ce2988dbf7f78f02854); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal70339126620b9ce2988dbf7f78f02854)): ?>
<?php $component = $__componentOriginal70339126620b9ce2988dbf7f78f02854; ?>
<?php unset($__componentOriginal70339126620b9ce2988dbf7f78f02854); ?>
<?php endif; ?>
<?php /**PATH D:\laragon\www\sibantar\resources\views/bengkel/form/lapor.blade.php ENDPATH**/ ?>