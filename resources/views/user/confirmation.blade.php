<x-layout-user>
    <!-- Main Content -->
    <section class="py-6 pb-32">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto">
                
                <!-- Page Title -->
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-neutral-900">Konfirmasi Pesanan</h1>
                    <p class="text-sm text-neutral-600 mt-1">Lengkapi data pemesanan Anda</p>
                </div>

                <!-- Bengkel Info -->
                <div class="card p-4 mb-4">
                    <h4 class="font-semibold text-neutral-900 mb-1">Bengkel Jaya Motor</h4>
                    <p class="text-sm text-neutral-600">Jl. Raya No. 23, Banjarmasin</p>
                    <div class="flex items-center gap-2 mt-2">
                        <div class="flex text-warning-500">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        </div>
                        <span class="text-sm text-neutral-600">4.8</span>
                        <span class="text-neutral-400">•</span>
                        <span class="text-sm text-neutral-600">0.6 km • 15 menit</span>
                    </div>
                </div>

                <!-- Form -->
                <form id="orderForm" class="space-y-4">
                    
                    <!-- Pilih Layanan -->
                    <div>
                        <label class="block text-sm font-semibold text-neutral-900 mb-2">Pilih Layanan</label>
                        <select id="serviceSelect" onchange="calculateTotal()" class="select w-full text-sm" required>
                            <option value="">-- Pilih Layanan --</option>
                            <option value="15000">Tambal Ban - Rp 15.000</option>
                            <option value="50000">Service Ringan - Rp 50.000</option>
                        </select>
                    </div>

                    <!-- Lokasi Anda -->
                    <div>
                        <label class="block text-sm font-semibold text-neutral-900 mb-2">Lokasi Anda</label>
                        <div class="relative">
                            <input type="text" id="userLocation" placeholder="Mendeteksi lokasi..." class="input w-full pr-12 text-xs" readonly required>
                            <button type="button" onclick="getUserLocation()" class="absolute right-2 top-1/2 -translate-y-1/2 text-primary-600 hover:text-primary-700 p-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        </div>
                        <input type="hidden" id="userLatitude">
                        <input type="hidden" id="userLongitude">
                        <p class="text-xs text-neutral-500 mt-1">Tekan ikon untuk mendapatkan lokasi saat ini</p>
                    </div>

                    <!-- Catatan -->
                    <div>
                        <label class="block text-sm font-semibold text-neutral-900 mb-2">Catatan (Opsional)</label>
                        <textarea id="orderNotes" placeholder="Tambahkan catatan untuk bengkel..." class="input w-full text-sm" rows="3"></textarea>
                    </div>

                    <!-- Rincian Biaya -->
                    <div class="card p-4 bg-neutral-50">
                        <h5 class="font-semibold text-neutral-900 mb-3">Rincian Biaya</h5>
                        <div class="space-y-2">
                            <div class="flex justify-between text-sm">
                                <span class="text-neutral-600">Biaya Layanan</span>
                                <span class="font-medium text-neutral-900" id="servicePrice">Rp 0</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-neutral-600" id="ongkirLabel">Ongkir (0.6 km)</span>
                                <span class="font-medium text-neutral-900" id="ongkirPrice">Rp 6.000</span>
                            </div>
                            <div class="border-t border-neutral-200 pt-2 mt-2">
                                <div class="flex justify-between">
                                    <span class="font-semibold text-neutral-900">Total</span>
                                    <span class="font-bold text-primary-700 text-lg" id="totalPrice">Rp 6.000</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </section>

    <!-- Bottom Action Buttons -->
    <section class="fixed bottom-0 left-0 right-0 bg-white border-t border-neutral-200 py-4 z-50">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto flex gap-3">
                <a href="{{ url()->previous() }}" class="flex-1 btn btn-outline text-center">
                    Batal
                </a>
                <button onclick="confirmOrder()" class="flex-1 btn btn-primary">
                    Konfirmasi Pesanan
                </button>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        let userCoordinates = null;
        let ongkirRate = 10000; // Rp 10.000 per km

        // Auto-detect location when page loads
        window.addEventListener('DOMContentLoaded', function() {
            getUserLocation();
        });

        function getUserLocation() {
            const locationInput = document.getElementById('userLocation');
            const latInput = document.getElementById('userLatitude');
            const lonInput = document.getElementById('userLongitude');

            if (!navigator.geolocation) {
                alert('Browser Anda tidak mendukung geolokasi');
                return;
            }

            locationInput.value = 'Mendeteksi lokasi...';
            
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                    
                    latInput.value = lat;
                    lonInput.value = lon;
                    userCoordinates = { lat, lon };

                    // Reverse geocoding menggunakan Nominatim (OpenStreetMap)
                    fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&zoom=18&addressdetails=1`)
                        .then(response => response.json())
                        .then(data => {
                            const address = data.display_name || `${lat}, ${lon}`;
                            locationInput.value = address;
                            
                            // Hitung ulang jarak dan ongkir
                            calculateDistance(lat, lon);
                        })
                        .catch(error => {
                            console.error('Error getting address:', error);
                            locationInput.value = `Koordinat: ${lat.toFixed(6)}, ${lon.toFixed(6)}`;
                            calculateDistance(lat, lon);
                        });
                },
                function(error) {
                    let errorMessage = 'Gagal mendapatkan lokasi';
                    switch(error.code) {
                        case error.PERMISSION_DENIED:
                            errorMessage = 'Izin lokasi ditolak. Aktifkan izin lokasi di browser Anda.';
                            break;
                        case error.POSITION_UNAVAILABLE:
                            errorMessage = 'Informasi lokasi tidak tersedia';
                            break;
                        case error.TIMEOUT:
                            errorMessage = 'Waktu permintaan lokasi habis';
                            break;
                    }
                    alert(errorMessage);
                    locationInput.value = '';
                }
            );
        }

        function calculateDistance(userLat, userLon) {
            // Koordinat bengkel (contoh: -3.316694, 114.590111)
            const bengkelLat = -3.316694;
            const bengkelLon = 114.590111;

            // Haversine formula untuk menghitung jarak
            const R = 6371; // Radius bumi dalam km
            const dLat = (userLat - bengkelLat) * Math.PI / 180;
            const dLon = (userLon - bengkelLon) * Math.PI / 180;
            const a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                      Math.cos(bengkelLat * Math.PI / 180) * Math.cos(userLat * Math.PI / 180) *
                      Math.sin(dLon/2) * Math.sin(dLon/2);
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
            const distance = R * c;

            // Update ongkir berdasarkan jarak
            const ongkir = Math.ceil(distance * ongkirRate);
            document.getElementById('ongkirLabel').textContent = `Ongkir (${distance.toFixed(1)} km)`;
            
            // Update total
            calculateTotal(ongkir, distance);
        }

        function calculateTotal(customOngkir = 6000, distance = 0.6) {
            const serviceSelect = document.getElementById('serviceSelect');
            const servicePrice = parseInt(serviceSelect.value) || 0;
            const ongkir = customOngkir;
            const total = servicePrice + ongkir;

            document.getElementById('servicePrice').textContent = 'Rp ' + servicePrice.toLocaleString('id-ID');
            document.getElementById('ongkirPrice').textContent = 'Rp ' + ongkir.toLocaleString('id-ID');
            document.getElementById('totalPrice').textContent = 'Rp ' + total.toLocaleString('id-ID');

            // Update label if distance changed
            if (distance !== 0.6) {
                document.getElementById('ongkirLabel').textContent = `Ongkir (${distance.toFixed(1)} km)`;
            }
        }

        function confirmOrder() {
            const service = document.getElementById('serviceSelect');
            const location = document.getElementById('userLocation').value;
            const notes = document.getElementById('orderNotes').value;

            if (!service.value) {
                alert('Silakan pilih layanan terlebih dahulu');
                return;
            }

            if (!location) {
                alert('Silakan izinkan akses lokasi Anda');
                return;
            }

            // Simulasi konfirmasi - nanti redirect ke waiting-confirmation
            alert('Pesanan berhasil dibuat! Menunggu konfirmasi dari bengkel.');
            
            // Redirect ke halaman waiting confirmation
            window.location.href = '{{ route('user.waiting-confirmation') }}';
        }
    </script>
    @endpush

</x-layout-user>
