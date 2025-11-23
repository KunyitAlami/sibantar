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
     <?php $__env->slot('title', null, []); ?> Statistik - Admin <?php $__env->endSlot(); ?>

    <?php
        $userCount = \App\Models\UserModel::count();
        $bengkelCount = \App\Models\BengkelModel::count();
    ?>

    <section class="py-8">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="flex items-center gap-3">
                    <a href="<?php echo e(route('admin.dashboard.index')); ?>" class="hover:bg-white/10 p-1.5 rounded-md transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-2xl font-bold">Statistik</h1>
                    </div>
                </div>
            </div>
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-neutral-100">
                    <h2 class="text-2xl font-bold">Statistik</h2>
                    <p class="text-sm text-neutral-600 mt-2 mb-4">Ringkasan jumlah pengguna dan bengkel terdaftar.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center justify-between bg-neutral-50 rounded-xl p-4">
                                <div>
                                    <p class="text-sm text-neutral-600">Total Pengguna</p>
                                    <p class="text-2xl font-bold text-neutral-900"><?php echo e($userCount); ?></p>
                                </div>
                                <div class="text-neutral-400">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11c1.657 0 3-1.567 3-3.5S17.657 4 16 4s-3 1.567-3 3.5S14.343 11 16 11zM6 20v-2a4 4 0 014-4h4" />
                                    </svg>
                                </div>
                            </div>

                            <div class="flex items-center justify-between bg-neutral-50 rounded-xl p-4">
                                <div>
                                    <p class="text-sm text-neutral-600">Bengkel Terdaftar</p>
                                    <p class="text-2xl font-bold text-neutral-900"><?php echo e($bengkelCount); ?></p>
                                </div>
                                <div class="text-neutral-400">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7M16 3v4M8 3v4" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <canvas id="statChart" width="400" height="250" class="rounded-xl bg-white"></canvas>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('statChart').getContext('2d');
            const data = {
                labels: ['Pengguna', 'Bengkel'],
                datasets: [{
                    label: 'Jumlah',
                    data: [<?php echo e($userCount); ?>, <?php echo e($bengkelCount); ?>],
                    backgroundColor: ['#2563eb', '#0ea5a4'],
                    borderColor: ['#1e40af', '#0f766e'],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { precision: 0 }
                        }
                    },
                    plugins: {
                        legend: { display: false },
                        tooltip: { enabled: true }
                    }
                }
            };

            // Set canvas parent height for proper responsive sizing
            const canvas = document.getElementById('statChart');
            canvas.parentElement.style.height = '250px';

            new Chart(ctx, config);
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
<?php /**PATH C:\laragon\www\sibantar\resources\views/admin/statistik/index.blade.php ENDPATH**/ ?>