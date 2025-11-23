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
     <?php $__env->slot('title', null, []); ?> Kelola Bengkel - Admin <?php $__env->endSlot(); ?>

    <section class="bg-gradient-to-br from-primary-700 via-primary-600 to-primary-800 text-white py-4 md:py-4">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="flex items-center gap-3">
                    <a href="/admin/dashboard" class="hover:bg-white/10 p-2 rounded-lg transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-2xl sm:text-2xl md:text-2xl font-bold">Kelola Bengkel</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-8">
        <div class="container mx-auto px-4">
            <!-- Filter & Table -->
            <div class="bg-white rounded-2xl p-6 shadow-lg mb-6 border border-neutral-100">
                <div class="flex flex-col gap-4">
                    <div class="w-full sm:w-64">
                        <label for="bengkelFilter" class="sr-only">Filter bengkel</label>
                        <select id="bengkelFilter" class="select select-bordered w-full h-12">
                            <option value="all">Semua</option>
                            <option value="calon">Calon Bengkel</option>
                            <option value="terdaftar">Bengkel Terdaftar</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg border border-neutral-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gradient-to-r from-neutral-50 to-neutral-100">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Nama Bengkel</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Pemilik</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Kontak</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="bengkelTableBody" class="divide-y divide-neutral-200">
                            
                            <?php if(isset($calonBengkels) && $calonBengkels->count()): ?>
                                <?php $__currentLoopData = $calonBengkels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="bengkel-row" data-status="calon">
                                        <td class="px-6 py-4 text-sm"><?php echo e($calon->id_calon_bengkel); ?></td>
                                        <td class="px-6 py-4 font-semibold"><?php echo e($calon->nama_bengkel); ?></td>
                                        <td class="px-6 py-4"><?php echo e($calon->username ?? '-'); ?></td>
                                        <td class="px-6 py-4"><?php echo e($calon->wa_number ?? ($calon->email ?? '-')); ?></td>
                                        <td class="px-6 py-4"><span class="px-3 py-1.5 text-xs font-bold text-warning-700 bg-warning-100 rounded-full border border-warning-200">Calon</span></td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-2">
                                                <a href="<?php echo e(route('admin.calonBengkel.show', $calon->id_calon_bengkel)); ?>" class="p-2 hover:bg-primary-50 rounded-lg transition-colors">Lihat</a>
                                                <form action="<?php echo e(route('admin.calonBengkel.approve', $calon->id_calon_bengkel)); ?>" method="POST" onsubmit="return confirm('Terima calon bengkel ini?');">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="p-2 hover:bg-success-50 rounded-lg transition-colors">Approve</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            
                            <?php if(isset($bengkels) && $bengkels->count()): ?>
                                <?php $__currentLoopData = $bengkels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="bengkel-row" data-status="terdaftar">
                                        <td class="px-6 py-4 text-sm"><?php echo e($b->id_bengkel); ?></td>
                                        <td class="px-6 py-4 font-semibold"><?php echo e($b->nama_bengkel); ?></td>
                                        <td class="px-6 py-4"><?php echo e(optional($b->user)->username ?? '-'); ?></td>
                                        <td class="px-6 py-4"><?php echo e(optional($b->user)->wa_number ?? '-'); ?></td>
                                        <td class="px-6 py-4"><span class="px-3 py-1.5 text-xs font-bold text-secondary-700 bg-secondary-100 rounded-full border border-secondary-200">Terdaftar</span></td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-2">
                                                <a href="#" class="p-2 hover:bg-primary-50 rounded-lg transition-colors">Lihat</a>
                                                <form action="#" method="POST" onsubmit="return confirm('Nonaktifkan bengkel ini?');">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="p-2 hover:bg-error-50 rounded-lg transition-colors">Nonaktifkan</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <script>
                const bengkelFilter = document.getElementById('bengkelFilter');
                function filterBengkel(value) {
                    const rows = document.querySelectorAll('.bengkel-row');
                    rows.forEach(r => {
                        const status = r.getAttribute('data-status');
                        if (value === 'all' || status === value) {
                            r.style.display = '';
                        } else {
                            r.style.display = 'none';
                        }
                    });
                }
                if (bengkelFilter) {
                    bengkelFilter.addEventListener('change', function(e) {
                        filterBengkel(e.target.value);
                    });
                }
                // init
                filterBengkel('all');
            </script>

        </div>
    </section>
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
<?php /**PATH C:\laragon\www\sibantar\resources\views/admin/bengkel/index.blade.php ENDPATH**/ ?>