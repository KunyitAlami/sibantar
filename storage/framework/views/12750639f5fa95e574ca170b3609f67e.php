<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> Development Team SIBANTAR <?php $__env->endSlot(); ?>

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-primary-700 to-primary-900 text-white">
        <div class="container mx-auto py-12 lg:py-20 text-center">
            <h1 class="mb-10 text-3xl font-bold">Development Team SIBANTAR</h1>

            <!-- Grid Card -->
            <div class="grid gap-10  sm:grid-cols-4 lg:grid-cols-4 justify-items-center">
                <!-- Card 1 -->
                <div class="w-[20rem] bg-white border border-gray-200 rounded-2xl shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col items-center pb-10">
                        <img class="w-64 h-72 mt-10 mb-3 rounded-lg shadow-lg object-cover" 
                             src="<?php echo e(asset('images/pengembang/randy.jpg')); ?>" 
                             alt="Randy Febrian">
                        <h5 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Randy Febrian</h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Project Manager</span>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="w-[20rem] bg-white border border-gray-200 rounded-2xl shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col items-center pb-10">
                        <img class="w-64 h-72 mt-10 mb-3 rounded-lg shadow-lg object-cover" 
                             src="<?php echo e(asset('images/pengembang/billa.jpg')); ?>" 
                             alt="Zahra Nabila">
                        <h5 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Zahra Nabila</h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Data Analyst</span>
                    </div>
                </div>
                

                <!-- Card 3 -->
                <div class="w-[20rem] bg-white border border-gray-200 rounded-2xl shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col items-center pb-10">
                        <img class="w-64 h-72 mt-10 mb-3 rounded-lg shadow-lg object-cover" 
                             src="<?php echo e(asset('images/pengembang/rizky.jpg')); ?>" 
                             alt="Muhammad Rizky">
                        <h5 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Muhammad Rizky</h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Frontend Developer</span>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="w-[20rem] bg-white border border-gray-200 rounded-2xl shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col items-center pb-10">
                        <img class="w-64 h-72 mt-10 mb-3 rounded-lg shadow-lg object-cover" 
                             src="<?php echo e(asset('images/pengembang/ghani.jpg')); ?>" 
                             alt="Ghani Mudzakir">
                        <h5 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Ghani Mudzakir</h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Backend Developer</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Asus\Downloads\Disk D\project\sibantar\resources\views/about_us.blade.php ENDPATH**/ ?>