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
     <?php $__env->slot('title', null, []); ?> Admin Dashboard - SIBANTAR <?php $__env->endSlot(); ?>

    <!-- Hero Section with Gradient -->
    <section class="bg-gradient-to-br from-primary-700 via-primary-600 to-primary-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h1 class="text-4xl font-bold mb-2">Admin Dashboard</h1>
                <p class="text-primary-100 text-lg">Kelola seluruh sistem SIBANTAR</p>
            </div>
        </div>
    </section>

    <!-- Stats Cards with Modern Design -->
    <section class="py-8 bg-gradient-to-b from-neutral-50 to-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-12 mb-12">
                    <!-- Total Users -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-neutral-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-sm text-neutral-600 mb-1">Total User</p>
                        <p class="text-3xl font-bold text-neutral-900 mb-2"><?php echo e($user->count()); ?></p>
                        <p class="text-xs text-success-600 font-medium">Total pengguna SIBANTAR</p>

                    </div>

                    <!-- Total Bengkel -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-neutral-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-secondary-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-secondary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-sm text-neutral-600 mb-1">Total Bengkel</p>
                        <p class="text-3xl font-bold text-neutral-900 mb-2"><?php echo e($bengkel->count()); ?></p>
                        <p class="text-xs text-success-600 font-medium">Total mitra bengkel SIBANTAR</p>
                    </div>

                    <!-- Total Transaksi -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-neutral-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-success-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-success-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-sm text-neutral-600 mb-1">Transaksi</p>
                        <p class="text-3xl font-bold text-neutral-900 mb-2"><?php echo e($order->count()); ?></p>
                        <p class="text-xs text-neutral-500 font-medium">Pertolongan yang berhasil di SIBANTAR</p>
                    </div>

                    <!-- Revenue -->
                    
                </div>

                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('create-management-buttons', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1399337649-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2e6fb18f75884c4fed4e10444e669251)): ?>
<?php $attributes = $__attributesOriginal2e6fb18f75884c4fed4e10444e669251; ?>
<?php unset($__attributesOriginal2e6fb18f75884c4fed4e10444e669251); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2e6fb18f75884c4fed4e10444e669251)): ?>
<?php $component = $__componentOriginal2e6fb18f75884c4fed4e10444e669251; ?>
<?php unset($__componentOriginal2e6fb18f75884c4fed4e10444e669251); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\sibantar\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>