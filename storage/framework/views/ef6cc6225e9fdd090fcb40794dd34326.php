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
     <?php $__env->slot('title', null, []); ?> Input Final Price - SIBANTAR <?php $__env->endSlot(); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('bengkel.order-tracking-bengkel', ['orderId' => $orderId]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1204523887-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
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
<?php $__env->startPush('scripts'); ?>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // Ambil koordinat dari Livewire
            const userLat = <?php echo e($tracking->order->user_latitude ?? 'null'); ?>;
            const userLng = <?php echo e($tracking->order->user_longitude ?? 'null'); ?>;
            const bengkelLat = <?php echo e($tracking->order->bengkel_latitude ?? 'null'); ?>;
            const bengkelLng = <?php echo e($tracking->order->bengkel_longitude ?? 'null'); ?>;

            // Inisialisasi map
            const map = L.map("map").setView([userLat, userLng], 14);

            // Tambahkan tile OpenStreetMap (gratis)
            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                maxZoom: 19,
            }).addTo(map);

            // Tambahkan marker user
            if (userLat && userLng) {
                L.marker([userLat, userLng])
                    .addTo(map)
                    .bindPopup("Lokasi Pelanggan")
                    .openPopup();
            }

            // Tambahkan marker bengkel
            if (bengkelLat && bengkelLng) {
                L.marker([bengkelLat, bengkelLng], { icon: L.icon({
                    iconUrl: "https://cdn-icons-png.flaticon.com/512/684/684908.png",
                    iconSize: [35, 35],
                })})
                .addTo(map)
                .bindPopup("Lokasi Bengkel");
            }

            // Fit map supaya kedua titik kelihatan
            const bounds = [];
            if (userLat && userLng) bounds.push([userLat, userLng]);
            if (bengkelLat && bengkelLng) bounds.push([bengkelLat, bengkelLng]);

            if (bounds.length > 0) {
                map.fitBounds(bounds, { padding: [20, 20] });
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\sibantar\resources\views/bengkel/dashboard/final-price.blade.php ENDPATH**/ ?>