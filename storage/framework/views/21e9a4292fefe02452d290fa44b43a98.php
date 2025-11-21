<div class="max-w-2xl mx-auto py-6">

    <!-- Flash Message -->
    <!--[if BLOCK]><![endif]--><?php if(session()->has('success')): ?>
        <div class="p-3 bg-success-100 text-success-700 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <?php if(session()->has('error')): ?>
        <div class="p-3 bg-error-100 text-error-700 rounded mb-4">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!-- Customer Info -->
    <div class="bg-white rounded-2xl p-5 mb-4 shadow-md border border-neutral-100 mt-4 ml-4 mr-4">
        <div class="mb-4">
            <h1 class="font-bold text-2xl">Order Detail</h1>
        </div>
        <div class="flex justify-between mb-4">
            <div>
                <h3 class="font-bold text-xl"><?php echo e($tracking->order->user->username ?? 'Customer'); ?></h3>
                <p class="text-sm text-neutral-500">Order #<?php echo e($tracking->order->id_order ?? ''); ?></p>
            </div>
            
        </div>
        <div class="bg-neutral-50 rounded-xl p-6">
            <p class="text-sm text-neutral-600 mb-1">Masalah:</p>
            <p class="text-neutral-900 font-semibold"><?php echo e($tracking->order->layananBengkel->nama_layanan ?? '-'); ?></p>
            <p class="text-sm text-neutral-600 mb-1 mt-2">Jenis Kendaraan:</p>
            <p class="text-neutral-900 font-semibold"><?php echo e($tracking->order->layananBengkel->kategori ?? '-'); ?></p>
            <p class="text-sm text-neutral-600 mb-1 mt-2">Catatan Dari Pelanggan:</p>
            <p class="text-neutral-900 font-semibold"><?php echo e($tracking->order->notes ?? '-'); ?></p>
            <p class="text-sm text-neutral-600 mb-1 mt-2">Link Lokasi (Temukan Lokasi):</p>
            
            <?php
                $lat = $tracking->order->user_latitude ?? null;
                $lng = $tracking->order->user_longitude ?? null;
            ?>

            <!--[if BLOCK]><![endif]--><?php if($lat && $lng): ?>
                <a 
                    href="https://www.google.com/maps?q=<?php echo e($lat); ?>,<?php echo e($lng); ?>"
                    target="_blank"
                    class="text-primary-600 underline font-semibold"
                >
                    Buka di Google Maps
                </a>
            <?php else: ?>
                <p class="text-neutral-500 italic">Lokasi tidak tersedia</p>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <div class="mt-3" wire:ignore>
                <div id="map" style="height: 250px; border-radius: 14px;"></div>
            </div>
            <p class="text-xs text-black font-semibold mt-4">Estimasi Awal (Harga + Ongkir): Rp <?php echo e(number_format($tracking->order->total_bayar ?? 0,0,',','.')); ?></p>
        </div>
    </div>

    
    <div class="bg-white rounded-2xl p-5 mb-4 shadow-md border border-neutral-100 mt-4 ml-4 mr-4">
        <div class="mb-4">
            <h1 class="font-bold text-2xl">Current Step Saat ini</h1>
        </div>

        <div class="mb-4">
            <select wire:model="currentStep" wire:change="updateStep($event.target.value)" class="w-full border rounded-lg p-2 text-base">
                <?php $__currentLoopData = $steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!--[if BLOCK]><![endif]--><?php if((int)$key >= $currentStep): ?>
                        <option value="<?php echo e($key); ?>"><?php echo e($label); ?></option>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </select>
            <p class="text-xs text-neutral-500 mt-2">Pilih step untuk update status layanan.</p>
        </div>
    </div>


    <!-- Final Price Form -->
    <div class="bg-white rounded-2xl p-6 shadow-md border border-neutral-100 mt-4 ml-4 mr-4">
        <h2 class="text-xl font-bold text-neutral-900 mb-5">Rincian Biaya Final</h2>

        <form wire:submit.prevent="submitFinalPrice">
            <!-- Service Price -->
            <div class="mb-5">
                <label class="block text-sm font-semibold text-neutral-700 mb-2">Harga Layanan *</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-neutral-500 font-medium">Rp</span>
                    <input type="number" 
                        required 
                        wire:model.defer="servicePrice" 
                        class="input text-lg font-semibold w-full"
                        <?php if($finalPriceSent): ?> readonly <?php endif; ?>>
                </div>
                <p class="text-xs text-neutral-500 mt-1">Harga untuk perbaikan/servis yang dilakukan</p>
            </div>

            <!-- Delivery Fee -->
            <div class="mb-5">
                <label class="block text-sm font-semibold text-neutral-700 mb-2">Ongkos Datang *</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-neutral-500 font-medium">Rp</span>
                    <input readonly type="number" wire:model.defer="deliveryFee" class="input text-lg font-semibold w-full">
                </div>
                <p class="text-xs text-neutral-500 mt-1">Biaya perjalanan ke lokasi customer</p>
            </div>

            <!--[if BLOCK]><![endif]--><?php if(!$finalPriceSent): ?>
                <!-- Buttons -->
                <div class="grid grid-cols-2 gap-3">
                    <a href="/bengkel/dashboard" class="py-3 text-center text-sm font-semibold text-neutral-700 bg-white border-2 border-neutral-300 rounded-xl hover:bg-neutral-50 transition-all">
                        Batal
                    </a>
                    <button type="submit"
                        class="py-3 text-sm font-bold text-white rounded-xl shadow-md 
                            <?php echo e($currentStep === 3 ? 'bg-success-500 hover:bg-success-600' : 'bg-gray-300 cursor-not-allowed'); ?>"
                        <?php if($currentStep !== 3): ?> disabled <?php endif; ?>
                    >
                        Kirim ke Customer
                    </button>
                </div>
            <?php else: ?>
                <div class="py-3 text-center text-sm font-semibold text-success-600 border border-success-500 rounded-xl bg-success-50">
                    Final Price Sudah Dikirim ke Customer
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </form>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const userLat = <?php echo e($tracking->order->user_latitude); ?>;
            const userLng = <?php echo e($tracking->order->user_longitude); ?>;
            const bengkelLat = <?php echo e($tracking->order->bengkel_latitude); ?>;
            const bengkelLng = <?php echo e($tracking->order->bengkel_longitude); ?>;

            const map = L.map("map").setView([userLat, userLng], 13);

            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                maxZoom: 19,
            }).addTo(map);

            const userMarker = L.marker([userLat, userLng]).addTo(map).bindPopup("Lokasi Pelanggan");
            const bengkelMarker = L.marker([bengkelLat, bengkelLng]).addTo(map).bindPopup("Lokasi Bengkel");
            const routingUrl = `https://router.project-osrm.org/route/v1/driving/${bengkelLng},${bengkelLat};${userLng},${userLat}?overview=full&geometries=geojson`;

            fetch(routingUrl)
                .then(res => res.json())
                .then(data => {
                    if (data.routes && data.routes.length > 0) {
                        const route = data.routes[0].geometry;
                        L.geoJSON(route, {
                            style: {
                                color: "blue",
                                weight: 4
                            }
                        }).addTo(map);
                        const coords = route.coordinates.map(c => [c[1], c[0]]);
                        map.fitBounds(coords, { padding: [20, 20] });
                    }
                })
                .catch(() => {
                    console.log("Gagal mengambil rute OSRM");
                });

        });
    </script>
<?php $__env->stopPush(); ?>



<?php /**PATH D:\laragon\www\sibantar\resources\views/livewire/bengkel/order-tracking-bengkel.blade.php ENDPATH**/ ?>