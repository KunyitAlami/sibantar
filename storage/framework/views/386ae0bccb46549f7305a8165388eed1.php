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
                <a href="<?php echo e(route('user.dashboard')); ?>" class="text-neutral-700 hover:text-primary-700">
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

                    
                    <div
                        class="w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-4 
                        <?php if($order->status == 'selesai'): ?> bg-green-100 text-green-600
                        <?php elseif($order->status == 'ditolak'): ?> bg-red-100 text-red-600
                        <?php else: ?> bg-yellow-100 text-yellow-600 <?php endif; ?>">

                        <?php if($order->status == 'selesai'): ?>
                            
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        <?php elseif($order->status == 'ditolak'): ?>
                            
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        <?php else: ?>
                            
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 6v6l4 2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        <?php endif; ?>
                    </div>

                    
                    <h1 class="text-2xl font-bold text-neutral-900 mb-2">
                        <?php if($order->status == 'selesai'): ?>
                            Pesanan Telah Selesai
                        <?php elseif($order->status == 'ditolak'): ?>
                            Pesanan Ditolak
                        <?php else: ?>
                            Pesanan Sedang Diproses
                        <?php endif; ?>
                    </h1>

                    
                    <p class="text-sm text-neutral-600">
                        <?php if($order->status == 'selesai'): ?>
                            Terima kasih! Pesanan Anda telah selesai diproses.
                        <?php elseif($order->status == 'ditolak'): ?>
                            Maaf, pesanan ini tidak dapat diproses oleh bengkel.
                        <?php else: ?>
                            Status terbaru akan ditampilkan di sini.
                        <?php endif; ?>
                    </p>

                </div>


                <!-- Progress Layanan -->
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('bengkel.order-progress', ['orderId' => $orderId]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3017124580-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
        </div>
    </section>
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
<?php /**PATH C:\laragon\www\sibantar\resources\views/user/order-tracking.blade.php ENDPATH**/ ?>