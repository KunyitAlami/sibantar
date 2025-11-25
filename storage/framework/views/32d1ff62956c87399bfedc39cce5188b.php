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
     <?php $__env->slot('title', null, []); ?> Laporan - Admin <?php $__env->endSlot(); ?>

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
                        <h1 class="text-2xl sm:text-2xl md:text-2xl font-bold">Aduan</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php $__env->startPush('scripts'); ?>
    <script>
        (function(){
            const select = document.getElementById('filter-select');
            const rows = Array.from(document.querySelectorAll('#laporan-rows tr[data-source]'));
            const noResults = document.getElementById('no-results');

            function applyFilter(filter){
                let visible = 0;
                rows.forEach(r=>{
                    if(filter==='all' || r.dataset.source===filter){
                        r.style.display='';
                        visible++;
                    } else {
                        r.style.display='none';
                    }
                });
                noResults.style.display = visible ? 'none' : '';
            }

            if(select){
                select.addEventListener('change', function(){
                    applyFilter(this.value);
                });
                // init
                applyFilter(select.value || 'all');
            }
        })();
    </script>
    <?php $__env->stopPush(); ?>

    <section class="py-8">
        <div class="container mx-auto px-4">
            <!-- Unified Laporan Table with filter -->
            <div class="mt-6">
                <div class="bg-white rounded-lg p-6 shadow-sm border border-neutral-100">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h1 class="text-2xl font-bold text-black">Daftar Aduan</h1>
                            <p class="text-gray-500">Filter dan lihat aduan dari Mitra Bengkel atau User</p>
                        </div>

                        <div class="flex items-center gap-3">
                            <label for="filter-select" class="text-sm text-neutral-600">Filter:</label>
                            <select id="filter-select" class="px-3 py-2 border border-neutral-200 rounded-md text-sm bg-white">
                                <option value="all">Semua Aduan</option>
                                <option value="bengkel">Aduan Bengkel</option>
                                <option value="user">Aduan User</option>
                            </select>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-center">
                            <thead>
                                <tr class="text-left font-semibold bg-neutral-200">
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">ID Report</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">ID Order</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Jenis Aduan</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Nama User</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Nama Bengkel</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Deskripsi</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Tanggal Laporan</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Aktivitas</th>
                                </tr>
                            </thead>
                            <tbody id="laporan-rows" class="divide-y divide-neutral-100">
                                <?php if(isset($reportBengkel)): ?>
                                    <?php $__currentLoopData = $reportBengkel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="hover:bg-neutral-50 align-middle" data-source="bengkel">
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($rb->id_report_from_bengkel); ?></td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($rb->id_order); ?></td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-secondary-100 text-secondary-700">Bengkel</span>
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($rb->user->username ?? '-'); ?></td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($rb->bengkel->nama_bengkel ?? '-'); ?></td>
                                            <td class="px-6 py-4 text-sm text-neutral-900 text-left">
                                                <div class="max-w-xl truncate" title="<?php echo e($rb->deskripsi); ?>"><?php echo e(Str::limit($rb->deskripsi, 120) ?? '-'); ?></div>
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($rb->created_at->format('d/m/Y H:i')); ?></td>
                                            <td class="px-4 py-2">
                                                <a href="<?php echo e(route('admin.cek-aduan-bengkel', ['id_report_from_bengkel' => $rb->id_report_from_bengkel])); ?>" class="inline-flex items-center px-3 py-1.5 rounded-md border border-primary-600 text-primary-600 bg-white hover:bg-primary-600 hover:text-white transition text-sm">
                                                    Detail
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                <?php if(isset($reportUser)): ?>
                                    <?php $__currentLoopData = $reportUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="hover:bg-neutral-50 align-middle" data-source="user">
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($ru->id_report_from_user); ?></td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($ru->id_order); ?></td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-success-100 text-success-700">User</span>
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($ru->user->username ?? '-'); ?></td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($ru->bengkel->nama_bengkel ?? '-'); ?></td>
                                            <td class="px-6 py-4 text-sm text-neutral-900 text-left">
                                                <div class="max-w-xl truncate" title="<?php echo e($ru->deskripsi); ?>"><?php echo e(Str::limit($ru->deskripsi, 120) ?? '-'); ?></div>
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($ru->created_at->format('d/m/Y H:i')); ?></td>
                                            <td class="px-4 py-2">
                                                
                                                <a href="<?php echo e(route('admin.cek-aduan-user', ['id_report_from_user' => $ru->id_report_from_user])); ?>" class="inline-flex items-center px-3 py-1.5 rounded-md border border-primary-600 text-primary-600 bg-white hover:bg-primary-600 hover:text-white transition text-sm">
                                                    Detail
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                <tr id="no-results" class="text-center text-neutral-500" style="display:none;">
                                    <td colspan="8" class="py-8">Tidak ada aduan yang sesuai filter.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
<?php /**PATH D:\laragon\www\sibantar\resources\views/admin/laporan/index.blade.php ENDPATH**/ ?>