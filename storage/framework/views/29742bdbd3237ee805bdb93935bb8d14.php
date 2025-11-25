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
                <a href="<?php echo e(route('user.history', ['id_user' => Auth::id()])); ?>" class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="font-bold text-lg text-neutral-900">Lihat Review</h1>
            </div>
        </div>
    </section>

    <section class="container mx-auto px-4 py-6">
        <div class="max-w-xl mx-auto">
            <div class="bg-white rounded-xl shadow-sm p-4 sm:p-6">
                <h2 class="text-lg font-bold text-neutral-900 mb-2">Review Anda</h2>

                <div class="text-sm text-neutral-600 mb-3">Bengkel: <span class="text-neutral-800 font-semibold"><?php echo e($order->bengkel->nama_bengkel); ?></span></div>
                <div class="text-sm text-neutral-500 mb-4">Tanggal Order: <?php echo e($order->created_at); ?></div>

                <div class="mb-3">
                    <div class="text-neutral-800 font-medium mb-1">Rating Bengkel</div>
                    <div class="flex items-center gap-1 text-2xl">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <?php if($i <= $review->ratingBengkel): ?>
                                <span class="text-yellow-500">★</span>
                            <?php else: ?>
                                <span class="text-gray-300">★</span>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="text-neutral-800 font-medium mb-1">Rating Layanan</div>
                    <div class="flex items-center gap-1 text-2xl">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <?php if($i <= $review->ratingLayanan): ?>
                                <span class="text-yellow-500">★</span>
                            <?php else: ?>
                                <span class="text-gray-300">★</span>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="text-neutral-800 font-medium mb-1">Komentar</div>
                    <div class="text-neutral-700 text-sm"><?php echo e($review->comment ?? '-'); ?></div>
                </div>

                <div class="mt-3">
                    <a href="<?php echo e(route('user.history', ['id_user' => Auth::id()])); ?>" class="btn btn-outline w-full rounded-full">Kembali</a>
                </div>
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
<?php /**PATH D:\laragon\www\sibantar\resources\views/user/review_show.blade.php ENDPATH**/ ?>