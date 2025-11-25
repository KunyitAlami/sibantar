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
                <h1 class="font-bold text-lg text-neutral-900">Kembali</h1>
            </div>
        </div>
    </section>

    <!-- Form Review -->
    <section class="container mx-auto px-4 py-6">
        <div class="max-w-xl mx-auto">
            <form action="<?php echo e(route('user.review.store', ['id_order' => $order->id_order])); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="bg-white rounded-xl shadow-sm p-4 sm:p-6">
                    <!-- Heading -->
                    <h2 class="text-lg font-bold text-neutral-900 mb-3">Beri Review</h2>

                    <!-- Rating Bengkel -->
                    <div class="mb-3">
                        <label class="block text-neutral-900 font-medium mb-0">Rating Bengkel</label>
                        <div class="flex items-center gap-2 text-2xl">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <label class="cursor-pointer">
                                    <input type="radio" name="ratingBengkel" value="<?php echo e($i); ?>" class="hidden" 
                                        <?php echo e(isset($review) && $review->ratingBengkel == $i ? 'checked' : ''); ?>>
                                    <span class="inline-block px-1 py-0.5 rounded hover:text-yellow-500 <?php echo e(isset($review) && $review->ratingBengkel >= $i ? 'text-yellow-500' : 'text-gray-400'); ?>">★</span>
                                </label>
                            <?php endfor; ?>
                        </div>
                        <?php $__errorArgs = ['ratingBengkel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-red-500 text-sm mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Rating Layanan -->
                    <div class="mb-3">
                        <label class="block text-neutral-900 font-medium mb-0">Rating Layanan</label>
                        <div class="flex items-center gap-2 text-2xl">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <label class="cursor-pointer">
                                    <input type="radio" name="ratingLayanan" value="<?php echo e($i); ?>" class="hidden" 
                                        <?php echo e(isset($review) && $review->ratingLayanan == $i ? 'checked' : ''); ?>>
                                    <span class="inline-block px-1 py-0.5 rounded hover:text-yellow-500 <?php echo e(isset($review) && $review->ratingLayanan >= $i ? 'text-yellow-500' : 'text-gray-400'); ?>">★</span>
                                </label>
                            <?php endfor; ?>
                        </div>
                        <?php $__errorArgs = ['ratingLayanan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-red-500 text-sm mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Comment -->
                    <div class="mb-3">
                        <label for="comment" class="block text-neutral-900 font-medium mb-2">Komentar (Opsional)</label>
                        <textarea name="comment" id="comment" rows="4" 
                            class="w-full border border-neutral-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500"
                            placeholder="Tulis komentar..."><?php echo e($review->comment ?? old('comment')); ?></textarea>
                        <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-red-500 text-sm mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="w-full bg-primary-700 text-white px-4 py-3 rounded-lg hover:bg-primary-600 transition font-semibold">
                            Kirim Review
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script>
        const updateStars = (container) => {
            const inputs = container.querySelectorAll('input');
            const stars = container.querySelectorAll('span');
            stars.forEach((s, i) => {
                if(inputs[i].checked) {
                    for(let j = 0; j <= i; j++) {
                        stars[j].classList.add('text-yellow-500');
                    }
                    for(let j = i+1; j < stars.length; j++) {
                        stars[j].classList.remove('text-yellow-500');
                    }
                } else if(!Array.from(inputs).some(inp => inp.checked)) {
                    s.classList.remove('text-yellow-500');
                }
            });
        };

        document.querySelectorAll('label span').forEach(star => {
            star.addEventListener('mouseover', function() {
                const parent = this.parentNode.parentNode;
                const stars = parent.querySelectorAll('span');
                stars.forEach((s, i) => {
                    if(i <= Array.from(stars).indexOf(this)) s.classList.add('text-yellow-500');
                    else s.classList.remove('text-yellow-500');
                });
            });

            star.addEventListener('mouseout', function() {
                const parent = this.parentNode.parentNode;
                updateStars(parent);
            });

            star.addEventListener('click', function() {
                const input = this.previousElementSibling;
                input.checked = true;
                const parent = this.parentNode.parentNode;
                updateStars(parent);
            });
        });

        document.querySelectorAll('.mb-3').forEach(container => updateStars(container));
    </script>

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
<?php /**PATH D:\laragon\www\sibantar\resources\views/user/review.blade.php ENDPATH**/ ?>