<?php if (isset($component)) { $__componentOriginal066474d3ca90bb663733ba5d5a32c765 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal066474d3ca90bb663733ba5d5a32c765 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout-user','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout-user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!-- Main Content -->
    <section class="py-6 pb-32">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto">
                
                <!-- Page Title -->
                <div class="mb-6 text-center">
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
                        <select id="serviceSelect" onchange="calculateTotal()" class="select w-full text-sm h-12" required>
                            <option value="">Jenis Layanan</option>
                            <option value="15000">Tambal Ban</option>
                            <option value="50000">Service Ringan</option>
                        </select>
                    </div>

                    <!-- Lokasi Anda -->
                    <div>
                        <label class="block text-sm font-semibold text-neutral-900 mb-2">Lokasi Anda</label>
                        <div class="relative">
                            <!-- Map Container -->
                            <div id="map" class="w-full h-36 rounded-xl overflow-hidden bg-neutral-200"></div>
                            <!-- Address Display -->
                            <div class="mt-2 p-3 bg-neutral-50 rounded-lg border border-neutral-200">
                                <p class="text-xs">Alamat</p>
                                <p class="text-xs text-neutral-600" id="userAddress">Mendeteksi lokasi Anda...</p>
                            </div>
                            <input type="hidden" id="userLatitude">
                            <input type="hidden" id="userLongitude">
                        </div>
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
                <a href="<?php echo e(url()->previous()); ?>" class="flex-1 btn btn-outline text-center">
                    Batal
                </a>
                <button onclick="confirmOrder()" class="flex-1 btn btn-primary">
                    Konfirmasi
                </button>
            </div>
        </div>
    </section>

    <?php $__env->startPush('scripts'); ?>
    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        let userCoordinates = null;
        let ongkirRate = 10000; // Rp 10.000 per km
        let map = null;
        let userMarker = null;

        // Auto-detect location when page loads
        window.addEventListener('DOMContentLoaded', function() {
            initMap();
            getUserLocation();
        });

        function initMap() {
            // Initialize map with default center (Banjarmasin)
            map = L.map('map').setView([-3.3186, 114.5942], 13);
            
            // Add OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                maxZoom: 19
            }).addTo(map);
        }

        function getUserLocation() {
            const addressDisplay = document.getElementById('userAddress');
            const latInput = document.getElementById('userLatitude');
            const lonInput = document.getElementById('userLongitude');

            if (!navigator.geolocation) {
                addressDisplay.textContent = 'Browser Anda tidak mendukung geolokasi';
                return;
            }

            addressDisplay.textContent = 'Mendeteksi lokasi Anda...';
            
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                    
                    latInput.value = lat;
                    lonInput.value = lon;
                    userCoordinates = { lat, lon };

                    // Update map view and add marker
                    map.setView([lat, lon], 16);
                    
                    // Remove old marker if exists
                    if (userMarker) {
                        map.removeLayer(userMarker);
                    }
                    
                    // Add new marker with custom icon
                    const userIcon = L.divIcon({
                        className: 'custom-marker',
                        html: '<div style="background-color: #0051BA; width: 20px; height: 20px; border-radius: 50%; border: 3px solid white; box-shadow: 0 2px 8px rgba(0,0,0,0.3);"></div>',
                        iconSize: [20, 20],
                        iconAnchor: [10, 10]
                    });
                    
                    userMarker = L.marker([lat, lon], { icon: userIcon }).addTo(map);

                    // Reverse geocoding menggunakan Nominatim (OpenStreetMap)
                    fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&zoom=18&addressdetails=1`)
                        .then(response => response.json())
                        .then(data => {
                            const address = data.display_name || `${lat.toFixed(6)}, ${lon.toFixed(6)}`;
                            addressDisplay.textContent = address;
                            
                            // Hitung ulang jarak dan ongkir
                            calculateDistance(lat, lon);
                        })
                        .catch(error => {
                            console.error('Error getting address:', error);
                            addressDisplay.textContent = `Koordinat: ${lat.toFixed(6)}, ${lon.toFixed(6)}`;
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
                    addressDisplay.textContent = errorMessage;
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
            const addressDisplay = document.getElementById('userAddress');
            const location = addressDisplay.textContent;
            const notes = document.getElementById('orderNotes').value;

            if (!service.value) {
                notyf.open({
                    type: 'warning',
                    message: 'Silakan pilih layanan terlebih dahulu'
                });
                return;
            }

            if (!userCoordinates || location === 'Mendeteksi lokasi Anda...') {
                notyf.open({
                    type: 'warning',
                    message: 'Silakan izinkan akses lokasi Anda'
                });
                return;
            }

            // Show SweetAlert2 confirmation
            Swal.fire({
                title: 'Konfirmasi Pesanan',
                html: `
                    <div class="text-left">
                        <p class="text-sm text-gray-600 mb-3">Pastikan data pesanan Anda sudah benar:</p>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Layanan:</span>
                                <span class="font-medium">${service.options[service.selectedIndex].text}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Total:</span>
                                <span class="font-semibold text-blue-600">${document.getElementById('totalPrice').textContent}</span>
                            </div>
                        </div>
                    </div>
                `,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Pesan Sekarang',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#0051BA',
                cancelButtonColor: '#737373',
                reverseButtons: true,
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'px-6 py-2.5 rounded-lg font-medium',
                    cancelButton: 'px-6 py-2.5 rounded-lg font-medium'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading
                    Swal.fire({
                        title: 'Memproses pesanan...',
                        html: 'Mohon tunggu sebentar',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Simulate processing
                    setTimeout(() => {
                        Swal.close();
                        console.log('Redirecting to waiting-confirmation page...');
                        // Redirect ke halaman waiting confirmation dengan timer 2 menit
                        window.location.replace('/user/waiting-confirmation');
                    }, 1500);
                }
            });
        }
    </script>
    <?php $__env->stopPush(); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal066474d3ca90bb663733ba5d5a32c765)): ?>
<?php $attributes = $__attributesOriginal066474d3ca90bb663733ba5d5a32c765; ?>
<?php unset($__attributesOriginal066474d3ca90bb663733ba5d5a32c765); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal066474d3ca90bb663733ba5d5a32c765)): ?>
<?php $component = $__componentOriginal066474d3ca90bb663733ba5d5a32c765; ?>
<?php unset($__componentOriginal066474d3ca90bb663733ba5d5a32c765); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Asus\Downloads\Disk D\project\sibantar\resources\views/user/confirmation.blade.php ENDPATH**/ ?>