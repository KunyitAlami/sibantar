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

$__html = app('livewire')->mount($__name, $__params, 'lw-1623562624-0', $__slots ?? [], get_defined_vars());

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
    </div>

    <?php $__env->startPush('scripts'); ?>
    <script>
        // Detail Modal Functions
        const orders = {
            1: {
                name: 'Ahmad Hidayat',
                phone: '081234567890',
                distance: '1.5 km',
                problem: 'Ban Bocor - Motor',
                description: 'Ban depan bocor kena paku di jalan. Butuh tambal atau ganti ban baru.',
                location: 'Jl. Ahmad Yani No. 45, Banjarmasin',
                lat: -3.316694,
                lng: 114.590111
            },
            2: {
                name: 'Siti Nurhaliza',
                phone: '081234567891',
                distance: '2.8 km',
                problem: 'Service Berkala - Motor',
                description: 'Service rutin 3 bulan sekali. Ganti oli dan cek kondisi motor.',
                location: 'Jl. Lambung Mangkurat No. 12, Banjarmasin',
                lat: -3.320000,
                lng: 114.595000
            },
            3: {
                name: 'Budi Santoso',
                phone: '081234567892',
                distance: '0.9 km',
                problem: 'Ganti Oli & Filter - Motor',
                description: 'Oli sudah hitam dan motor terasa berat. Perlu ganti oli dan filter sekaligus.',
                location: 'Jl. Pangeran Antasari No. 88, Banjarmasin',
                lat: -3.318000,
                lng: 114.592000
            }
        };

        function showDetail(orderId) {
            const order = orders[orderId];
            const modal = document.getElementById('detailModal');
            const content = document.getElementById('detailContent');
            
            content.innerHTML = `
                <div class="space-y-4">
                    <div class="bg-neutral-50 rounded-xl p-4">
                        <h4 class="font-bold text-neutral-900 mb-3">Informasi Customer</h4>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span class="text-neutral-900 font-medium">${order.name}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span class="text-neutral-700">${order.phone}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-neutral-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                                <span class="text-neutral-700">${order.distance}</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-neutral-50 rounded-xl p-4">
                        <h4 class="font-bold text-neutral-900 mb-3">Detail Masalah</h4>
                        <p class="text-neutral-900 font-medium mb-2">${order.problem}</p>
                        <p class="text-sm text-neutral-600">${order.description}</p>
                    </div>

                    <div class="bg-neutral-50 rounded-xl p-4">
                        <h4 class="font-bold text-neutral-900 mb-3">Lokasi Customer</h4>
                        <p class="text-sm text-neutral-700 mb-3">${order.location}</p>
                        <div class="h-48 bg-neutral-200 rounded-lg flex items-center justify-center">
                            <p class="text-neutral-500 text-sm">Map akan ditampilkan di sini</p>
                        </div>
                        <a href="https://www.google.com/maps/search/?api=1&query=${order.lat},${order.lng}" target="_blank" class="btn btn-primary w-full mt-3 btn-sm">
                            Buka di Google Maps
                        </a>
                    </div>
                </div>
            `;
            
            modal.classList.remove('hidden');
        }

        function closeDetail() {
            document.getElementById('detailModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('detailModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDetail();
            }
        });

        // Toggle Status Bengkel
        const statusToggle = document.getElementById('statusToggle');
        const statusText = document.getElementById('statusText');
        
        statusToggle.addEventListener('change', function() {
            if (this.checked) {
                statusText.textContent = 'Buka - Siap Terima Order';
            } else {
                statusText.textContent = 'Tutup - Tidak Terima Order';
            }
        });
    </script>
    <?php $__env->stopPush(); ?>

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

<?php /**PATH D:\laragon\www\sibantar\resources\views/bengkel/dashboard/index.blade.php ENDPATH**/ ?>