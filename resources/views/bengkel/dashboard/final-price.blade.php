<x-layout-bengkel>
    <x-slot:title>Input Final Price - SIBANTAR</x-slot:title>
    @livewire('bengkel.order-tracking-bengkel', ['orderId' => $orderId])
</x-layout-bengkel>
@push('scripts')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // Ambil koordinat dari Livewire
            const userLat = {{ $tracking->order->user_latitude ?? 'null' }};
            const userLng = {{ $tracking->order->user_longitude ?? 'null' }};
            const bengkelLat = {{ $tracking->order->bengkel_latitude ?? 'null' }};
            const bengkelLng = {{ $tracking->order->bengkel_longitude ?? 'null' }};

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
@endpush
