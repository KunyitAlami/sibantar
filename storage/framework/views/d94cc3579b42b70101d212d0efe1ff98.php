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
     <?php $__env->slot('title', null, []); ?> Tentang Kami - SIBANTAR <?php $__env->endSlot(); ?>

    <!-- Header -->
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="<?php echo e(route('user.dashboard')); ?>" class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="font-bold text-lg text-neutral-900">Tentang SIBANTAR</h1>
            </div>
        </div>
    </section>

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-primary-700 to-primary-900 text-white py-8 lg:py-24">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center mb-4">
                <p class="text-white leading-relaxed">
                    SIBANTAR adalah platform digital yang menghubungkan pemilik kendaraan dengan bengkel motor terpercaya. 
                    Kami berkomitmen untuk memberikan kemudahan dalam mencari dan memesan layanan bengkel dengan transparansi harga 
                    dan kualitas pelayanan terbaik.
                </p>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-12 lg:py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-neutral-900 mb-3">Tim Pengembang</h2>
            </div>

            <!-- Team Grid dengan 3D Effect -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
                
                <!-- Card 1 - Randy Febrian -->
                <div class="hover-3d">
                    <div class="card bg-white overflow-hidden rounded-2xl">
                        <figure class="relative p-8 pb-2">
                            <img class="w-full aspect-[3/4] object-cover rounded-2xl scale-110" 
                                 src="<?php echo e(asset('images/pengembang/randy.jpg')); ?>" 
                                 alt="Randy Febrian">
                        </figure>
                        <div class="px-5 pb-5 pt-3 text-center">
                            <h3 class="text-xl font-bold text-neutral-900 mb-1">Randy Febrian</h3>
                            <p class="text-sm text-primary-700 font-medium mb-2">Project Manager</p>
                        </div>
                    </div>
                    <!-- 8 empty divs needed for the 3D effect -->
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>

                <!-- Card 2 - Zahra Nabila -->
                <div class="hover-3d">
                    <div class="card bg-white overflow-hidden rounded-2xl">
                        <figure class="relative p-8 pb-2">
                            <img class="w-full aspect-[3/4] object-cover rounded-2xl scale-110" 
                                 src="<?php echo e(asset('images/pengembang/billa.jpg')); ?>" 
                                 alt="Zahra Nabila">
                        </figure>
                        <div class="px-5 pb-5 pt-3 text-center">
                            <h3 class="text-xl font-bold text-neutral-900 mb-1">Zahra Nabila</h3>
                            <p class="text-sm text-primary-700 font-medium mb-2">Data Analyst</p>
                        </div>
                    </div>
                    <!-- 8 empty divs needed for the 3D effect -->
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>

                <!-- Card 3 - Muhammad Rizky -->
                <div class="hover-3d">
                    <div class="card bg-white overflow-hidden rounded-2xl">
                        <figure class="relative p-8 pb-2">
                            <img class="w-full aspect-[3/4] object-cover rounded-2xl scale-110" 
                                 src="<?php echo e(asset('images/pengembang/rizky.jpg')); ?>" 
                                 alt="Muhammad Rizky">
                        </figure>
                        <div class="px-5 pb-5 pt-3 text-center">
                            <h3 class="text-xl font-bold text-neutral-900 mb-1">Muhammad Rizky</h3>
                            <p class="text-sm text-primary-700 font-medium mb-2">Frontend Developer</p>
                        </div>
                    </div>
                    <!-- 8 empty divs needed for the 3D effect -->
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>

                <!-- Card 4 - Ghani Mudzakir -->
                <div class="hover-3d">
                    <div class="card bg-white overflow-hidden rounded-2xl">
                        <figure class="relative p-8 pb-2">
                            <img class="w-full aspect-[3/4] object-cover rounded-2xl scale-110" 
                                 src="<?php echo e(asset('images/pengembang/ghani.jpg')); ?>" 
                                 alt="Ghani Mudzakir">
                        </figure>
                        <div class="px-5 pb- pt-3 text-center">
                            <h3 class="text-xl font-bold text-neutral-900 mb-1">Ghani Mudzakir</h3>
                            <p class="text-sm text-primary-700 font-medium mb-2">Backend Developer</p>
                        </div>
                    </div>
                    <!-- 8 empty divs needed for the 3D effect -->
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
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
<?php /**PATH D:\laragon\www\sibantar\resources\views/about_us.blade.php ENDPATH**/ ?>