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

    <!-- Hero (small) -->
    <section class="bg-gradient-to-br from-primary-700 via-primary-600 to-primary-800 text-white py-4">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="flex items-center gap-3">
                    <a href="<?php echo e(route('admin.dashboard.index')); ?>" class="hover:bg-white/10 p-1.5 rounded-md transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-2xl font-bold">Kelola Bengkel</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-8 bg-gradient-to-b from-neutral-50 to-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-neutral-100">

                    <?php
                        $bengkels = \App\Models\BengkelModel::all();
                        $calonbengkels = \App\Models\CalonBengkelModel::all();
                    ?>

                    <!-- Tab filter (dropdown) -->
                    <div class="mt-6">
                        <div class="w-full sm:w-1/3">
                            <label for="bengkelFilterSelect" class="sr-only">Filter bengkel</label>
                                <select id="bengkelFilterSelect" onchange="setBengkelTab(this.value)" class="w-full px-4 py-3 rounded-xl bg-neutral-100 text-neutral-700 text-base font-semibold">
                                <option value="calon">Calon Bengkel</option>
                                <option value="daftar">Bengkel Terdaftar</option>
                            </select>
                        </div>
                    </div>

                    <!-- Calon Bengkel Table -->
                    <div id="panel-calon" class="mt-6">
                        <?php $belumDiterima = $calonbengkels->where('status','belum_diterima'); ?>
                        <?php if($belumDiterima->isEmpty()): ?>
                            <div class="text-center py-12 text-neutral-500">
                                <p class="font-semibold">Belum ada calon Mitra baru</p>
                                <p class="text-sm mt-1">Calon Mitra akan tampil di sini</p>
                            </div>
                        <?php else: ?>
                        <div class="overflow-x-auto mt-4">
                            <table class="min-w-full divide-y divide-neutral-200">
                                <thead class="bg-neutral-100">
                                    <tr class="text-left font-semibold text-neutral-700">
                                        <th class="w-20 px-4 py-3 text-xs uppercase tracking-wide">ID Calon</th>
                                        <th class="px-4 py-3 text-xs uppercase tracking-wide">Nama Bengkel</th>
                                        <th class="px-4 py-3 text-xs uppercase tracking-wide">Kecamatan</th>
                                        <th class="px-4 py-3 text-xs uppercase tracking-wide">Alamat</th>
                                        <th class="px-4 py-3 text-xs uppercase tracking-wide">Jam Operasional</th>
                                        <th class="px-4 py-3 text-xs uppercase tracking-wide">Status</th>
                                        <th class="px-4 py-3 text-xs uppercase tracking-wide">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-neutral-100">
                                    <?php $__currentLoopData = $belumDiterima; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="hover:bg-neutral-50">
                                            <td class="w-20 px-4 py-3 text-sm font-medium text-neutral-900"><?php echo e($b->id_calon_bengkel); ?></td>
                                            <td class="px-4 py-3 text-sm font-medium text-neutral-900"><?php echo e($b->nama_bengkel); ?></td>
                                            <td class="px-4 py-3 text-sm font-medium text-neutral-900"><?php echo e($b->kecamatan); ?></td>
                                            <td class="px-4 py-3 text-sm text-neutral-700"><?php echo e($b->alamat_lengkap ?? '-'); ?></td>
                                            <td class="px-4 py-3 text-sm font-medium text-neutral-900"><?php echo e($b->jam_operasional ?? ($b->jam_buka.' - '.$b->jam_tutup.' WITA')); ?></td>
                                            <td class="px-4 py-3 text-sm font-medium text-neutral-900"><?php echo e($b->status); ?></td>
                                            <td class="px-4 py-3">
                                                <a href="<?php echo e(route('admin.calonBengkel.show', $b->id_calon_bengkel)); ?>" class="px-3 py-1.5 bg-primary-600 text-white text-sm font-semibold rounded-md hover:bg-primary-700 transition">Detail</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Bengkel Terdaftar Table -->
                    <div id="panel-daftar" class="mt-6 hidden">
                        <div class="overflow-x-auto mt-4">
                            <table class="min-w-full divide-y divide-neutral-200">
                                <thead class="bg-neutral-100">
                                    <tr class="text-left font-semibold text-neutral-700">
                                        <th class="px-4 py-3 text-xs uppercase tracking-wide">ID Bengkel</th>
                                        <th class="px-4 py-3 text-xs uppercase tracking-wide">ID Akun</th>
                                        <th class="px-4 py-3 text-xs uppercase tracking-wide">Nama Bengkel</th>
                                        <th class="px-4 py-3 text-xs uppercase tracking-wide">Kecamatan</th>
                                        <th class="px-4 py-3 text-xs uppercase tracking-wide">Alamat</th>
                                        <th class="px-4 py-3 text-xs uppercase tracking-wide">Jam Operasional</th>
                                        <th class="px-4 py-3 text-xs uppercase tracking-wide">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-neutral-100">
                                    <?php $__currentLoopData = $bengkels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="hover:bg-neutral-50">
                                            <td class="px-4 py-3 text-sm font-medium text-neutral-900"><?php echo e($b->id_bengkel); ?></td>
                                            <td class="px-4 py-3 text-sm font-medium text-neutral-900"><?php echo e($b->id_user ?? '-'); ?></td>
                                            <td class="px-4 py-3 text-sm font-medium text-neutral-900"><?php echo e($b->nama_bengkel); ?></td>
                                            <td class="px-4 py-3 text-sm font-medium text-neutral-900"><?php echo e($b->kecamatan); ?></td>
                                            <td class="px-4 py-3 text-sm text-neutral-700"><?php echo e($b->alamat_lengkap ?? '-'); ?></td>
                                            <td class="px-4 py-3 text-sm font-medium text-neutral-900"><?php echo e($b->jam_operasional); ?></td>
                                            <td class="px-4 py-3 text-sm font-medium text-neutral-900"><?php echo e($b->status); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        function setBengkelTab(tab) {
            const calon = document.getElementById('panel-calon');
            const daftar = document.getElementById('panel-daftar');

            if (tab === 'calon') {
                calon.classList.remove('hidden');
                daftar.classList.add('hidden');
            } else {
                daftar.classList.remove('hidden');
                calon.classList.add('hidden');
            }

            // keep select in sync if called programmatically
            const sel = document.getElementById('bengkelFilterSelect');
            if (sel && sel.value !== tab) sel.value = tab;
        }

        // default to calon on DOM ready
        document.addEventListener('DOMContentLoaded', function() {
            const sel = document.getElementById('bengkelFilterSelect');
            if (sel) sel.value = 'calon';
            setBengkelTab('calon');
        });
    </script>
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