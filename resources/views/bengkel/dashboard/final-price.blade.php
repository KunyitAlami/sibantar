<x-layout-bengkel>
    <x-slot:title>Input Final Price - SIBANTAR</x-slot:title>
    {{-- <section class="bg-white border-b border-neutral-200 sticky top-0 z-50 mt-4">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="{{ route('bengkel.dashboard', ['id_bengkel' => $orderId]) }}" class="text-neutral-700 hover:text-primary-700">
                    Kembali ke Dashboard
                </a>
            </div>
        </div>
         --}}
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="{{ route('bengkel.dashboard', ['id_bengkel' => $order->id_bengkel]) }}" class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="font-bold text-lg text-neutral-900">Riwayat Pesanan</h1>
            </div>
        </div>
    </section>
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
