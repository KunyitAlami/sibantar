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

    <script>
        document.addEventListener('DOMContentLoaded', function(){
            const bengkelFilter = document.getElementById('bengkelFilter');
            const tableBody = document.getElementById('bengkelTableBody');

            function filterBengkel(value) {
                if (!tableBody) return;
                const rows = tableBody.querySelectorAll('tr[data-status]');
                let visibleCount = 0;
                rows.forEach(r => {
                    if (r.getAttribute('data-status') === value) {
                        r.style.display = '';
                        visibleCount++;
                    } else {
                        r.style.display = 'none';
                    }
                });

                // Show a placeholder row if none visible
                const existingEmpty = tableBody.querySelector('.no-data-row');
                if (existingEmpty) existingEmpty.remove();
                if (visibleCount === 0) {
                    const tr = document.createElement('tr');
                    tr.className = 'no-data-row';
                    tr.innerHTML = `<td class="px-6 py-6 text-neutral-500" colspan="8">Tidak ada data untuk pilihan ini.</td>`;
                    tableBody.appendChild(tr);
                }
            }

            if (bengkelFilter) {
                bengkelFilter.addEventListener('change', function(e) {
                    filterBengkel(e.target.value);
                });

                // init default to 'calon'
                bengkelFilter.value = 'calon';
                filterBengkel('calon');
            }
        });
    </script>


    <section class="py-12 bg-gradient-to-b from-neutral-50 to-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <!-- Filter control (calon / terdaftar) -->
                <div class="bg-white rounded-2xl p-4 shadow-sm mb-6 border border-neutral-100">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <select id="bengkelFilter" class="select select-bordered h-10" style="height: 45px;">
                                <option value="calon">Calon Bengkel</option>
                                <option value="terdaftar">Bengkel Terdaftar</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Combined table: rows marked with data-status="calon" or "terdaftar" -->
                <div id="combinedBox" class="bg-white rounded-2xl shadow-lg border border-neutral-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-neutral-50 to-neutral-100">
                                <tr>
                                    <th class="px-6 py-6 text-left text-sm font-bold text-neutral-700 uppercase tracking-wider">ID BENGKEL</th>
                                    <th class="px-6 py-6 text-left text-sm font-bold text-neutral-700 uppercase tracking-wider">ID USER</th>
                                    <th class="px-6 py-6 text-left text-sm font-bold text-neutral-700 uppercase tracking-wider">NAMA BENGKEL</th>
                                    <th class="px-6 py-6 text-left text-sm font-bold text-neutral-700 uppercase tracking-wider">KECAMATAN</th>
                                    <th class="px-6 py-6 text-left text-sm font-bold text-neutral-700 uppercase tracking-wider">ALAMAT</th>
                                    <th class="px-6 py-6 text-left text-sm font-bold text-neutral-700 uppercase tracking-wider">JAM OPERASIONAL</th>
                                    <th class="px-6 py-6 text-left text-sm font-bold text-neutral-700 uppercase tracking-wider">STATUS</th>
                                    <th class="px-6 py-6 text-left text-sm font-bold text-neutral-700 uppercase tracking-wider">AKSI</th>
                                </tr>
                            </thead>
                            <tbody id="bengkelTableBody" class="divide-y divide-neutral-200">
                                <?php if(isset($calonBengkels) && $calonBengkels->count()): ?>
                                    <?php $__currentLoopData = $calonBengkels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr data-status="calon">
                                            <td class="px-6 py-6 text-sm"><?php echo e($calon->id_calon_bengkel); ?></td>
                                            <td class="px-6 py-6 text-sm text-neutral-500 italic"><?php if($calon->id_user): ?><?php echo e($calon->id_user); ?><?php else: ?> - <?php endif; ?></td>
                                            <td class="px-6 py-6 font-semibold"><?php echo e($calon->nama_bengkel); ?></td>
                                            <td class="px-6 py-6"><?php echo e($calon->kecamatan ?? '-'); ?></td>
                                            <td class="px-6 py-6"><?php echo e($calon->alamat_lengkap ?? '-'); ?></td>
                                            <td class="px-6 py-6"><?php echo e($calon->jam_operasional ?? ($calon->jam_buka . ' - ' . $calon->jam_tutup)); ?> WITA</td>
                                            <?php
                                                $s = strtolower($calon->status ?? 'belum diterima');
                                                if (str_contains($s, 'belum') || str_contains($s, 'diterima') && $s !== 'diterima') {
                                                    $statusLabel = 'Belum Diterima';
                                                    $statusClasses = 'text-warning-700 bg-warning-100 border-warning-200';
                                                } elseif (str_contains($s, 'diterima') || $s === 'diterima') {
                                                    $statusLabel = 'Diterima';
                                                    $statusClasses = 'text-secondary-700 bg-secondary-100 border-secondary-200';
                                                } else {
                                                    $statusLabel = ucfirst($s);
                                                    $statusClasses = 'text-neutral-700 bg-neutral-100 border-neutral-200';
                                                }
                                            ?>
                                            <td class="px-6 py-6">
                                                <span class="inline-flex items-center gap-1 whitespace-nowrap px-3 py-1 text-xs font-bold rounded-full border <?php echo e($statusClasses); ?>"><?php echo e($statusLabel); ?></span>
                                            </td>
                                            <td class="px-6 py-6 text-right">
                                                <a href="<?php echo e(route('admin.calonBengkel.show', $calon->id_calon_bengkel)); ?>" class="px-3 py-1.5 text-sm font-medium rounded-full border border-primary-200 text-primary-600 bg-primary-50 hover:bg-primary-100">Detail</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                <?php if(isset($bengkels) && $bengkels->count()): ?>
                                    <?php $__currentLoopData = $bengkels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr data-status="terdaftar">
                                            <td class="px-6 py-6 text-sm"><?php echo e($b->id_bengkel); ?></td>
                                            <td class="px-6 py-6 text-sm"><?php echo e($b->id_user ?? optional($b->user)->id_user ?? '-'); ?></td>
                                            <td class="px-6 py-6 font-semibold"><?php echo e($b->nama_bengkel); ?></td>
                                            <td class="px-6 py-6"><?php echo e($b->kecamatan ?? '-'); ?></td>
                                            <td class="px-6 py-6"><?php echo e($b->alamat_lengkap ?? '-'); ?></td>
                                            <td class="px-6 py-6"><?php echo e($b->jam_operasional ?? ($b->jam_buka . ' - ' . $b->jam_tutup)); ?> WITA</td>
                                            <?php
                                                $s2 = strtolower($b->status ?? 'terdaftar');
                                                if (str_contains($s2, 'aktif') || str_contains($s2, 'terdaftar')) {
                                                    $statusLabel2 = ucfirst($s2);
                                                    $statusClasses2 = 'text-success-700 bg-success-100 border-success-200';
                                                } else {
                                                    $statusLabel2 = ucfirst($s2);
                                                    $statusClasses2 = 'text-neutral-700 bg-neutral-100 border-neutral-200';
                                                }
                                            ?>
                                            <td class="px-6 py-6">
                                                <span class="inline-flex items-center gap-1 whitespace-nowrap px-3 py-1 text-xs font-bold rounded-full border <?php echo e($statusClasses2); ?>"><?php echo e($statusLabel2); ?></span>
                                            </td>
                                            <td class="px-6 py-6 text-right">
                                                <a href="<?php echo e(route('admin.cekAktivitas', ['id_bengkel' => $b->id_bengkel])); ?>" class="px-3 py-1.5 text-sm font-medium rounded-full border border-primary-200 text-primary-600 bg-primary-50 hover:bg-primary-100">Detail</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                <?php if((!isset($calonBengkels) || !$calonBengkels->count()) && (!isset($bengkels) || !$bengkels->count())): ?>
                                    <tr><td class="px-6 py-6 text-neutral-500" colspan="8">Belum ada data bengkel.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
<?php /**PATH D:\laragon\www\sibantar\resources\views/admin/bengkel/index.blade.php ENDPATH**/ ?>