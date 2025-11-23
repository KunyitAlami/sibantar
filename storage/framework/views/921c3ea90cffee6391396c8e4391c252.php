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
     <?php $__env->slot('title', null, []); ?> Dashboard Bengkel - SIBANTAR <?php $__env->endSlot(); ?>

    <!-- Stats Section with Better Visual Hierarchy -->
    <section class="bg-gradient-to-br from-primary-700 via-primary-600 to-primary-800 text-white py-8">
        <div class="container mx-auto px-4">
            <!-- Main Stats -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="relative overflow-hidden bg-white bg-opacity-15 backdrop-blur-md rounded-3xl p-6 text-center border border-white border-opacity-20 shadow-xl">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-white opacity-5 rounded-full -mr-10 -mt-10"></div>
                    <div class="relative z-10">
                        <p class="text-7xl font-extrabold mb-2 bg-clip-text text-transparent bg-gradient-to-b from-white to-primary-100"><?php echo e($totalOrdersToday); ?></p>
                        <p class="text-sm font-semibold text-primary-50">Order Hari Ini</p>
                        <p class="text-xs text-primary-200 mt-1">
                            <?php echo e(now()->translatedFormat('l, d F Y')); ?>

                        </p>
                    </div>
                </div>
                
                <div class="relative overflow-hidden bg-white bg-opacity-15 backdrop-blur-md rounded-3xl p-6 text-center border border-white border-opacity-20 shadow-xl">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-white opacity-5 rounded-full -mr-10 -mt-10"></div>
                    <div class="relative z-10">
                        <p class="text-7xl font-extrabold mb-2 bg-clip-text text-transparent bg-gradient-to-b from-white to-primary-100"><?php echo e($LayananTotal); ?></p>
                        <p class="text-sm font-semibold text-primary-50">Total Layanan</p>
                        <p class="text-xs text-primary-200 mt-1">Aktif</p>
                    </div>
                </div>
            </div>

            <!-- Status Bengkel Card -->
            <div class="bg-white bg-opacity-15 backdrop-blur-md rounded-2xl p-5 border border-white border-opacity-20 shadow-lg">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-success-500 rounded-full flex items-center justify-center shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-base font-bold">Status Bengkel</h2>
                            <p class="text-xs text-primary-100" id="statusText">Buka - Siap Terima Order</p>
                        </div>
                    </div>
                    <label class="relative inline-block w-16 h-9">
                        <input type="checkbox" id="statusToggle" class="sr-only peer" checked>
                        <div class="w-16 h-9 bg-white bg-opacity-30 rounded-full peer peer-checked:bg-success-500 transition-all duration-300 cursor-pointer shadow-inner"></div>
                        <div class="absolute left-1 top-1 w-7 h-7 bg-white rounded-full shadow-lg transition-transform duration-300 peer-checked:translate-x-7"></div>
                    </label>
                </div>
                <div class="flex items-center gap-2 text-xs text-primary-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Jam Operasional: 08:00 - 20:00 WITA</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Order Section -->
    <section class="py-6 bg-gradient-to-b from-neutral-50 to-white min-h-screen">
        <div class="container mx-auto px-4">
            
            <div> 
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('bengkel.bengkel-dashboard', ['idBengkel' => $id_Bengkel,'id_bengkel' => $id_Bengkel]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3392341865-0', $__slots ?? [], get_defined_vars());

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

    <!-- Detail Modal -->
    <div id="detailModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-end sm:items-center justify-center p-4">
        <div class="bg-white rounded-t-3xl sm:rounded-2xl w-full sm:max-w-lg max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-white border-b border-neutral-200 p-4 flex items-center justify-between rounded-t-3xl">
                <h3 class="text-lg font-bold text-neutral-900">Detail Pesanan</h3>
                <button onclick="closeDetail()" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-neutral-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div id="detailContent" class="p-6">
                <!-- Content will be dynamically inserted -->
            </div>
        </div>
    </div
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

<?php /**PATH C:\laragon\www\sibantar\resources\views/bengkel/dashboard/index.blade.php ENDPATH**/ ?>