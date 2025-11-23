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
                    <h4 class="font-semibold text-neutral-900 mb-1"><?php echo e($bengkel->nama_bengkel); ?></h4>
                    <p class="text-sm text-neutral-600"><?php echo e($bengkel->alamat_lengkap); ?></p>
                    <div class="flex items-center gap-2 mt-2">
                        <div class="flex text-warning-500">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        </div>
                        <span class="text-sm text-neutral-600">4.8</span>
                        <span class="text-neutral-400">•</span>
                        <span class="text-sm text-neutral-600" id="distanceDisplay">Menghitung jarak...</span>
                    </div>
                </div>

                <!-- Form -->
                <form id="orderForm" action="<?php echo e(route('user.order_store')); ?>" method="POST" class="space-y-4">
                    <?php echo csrf_field(); ?>
                    <!-- Hidden inputs for bengkel coordinates -->
                    <input type="hidden" name="client_timezone" id="client_timezone">
                    <input type="hidden" id="bengkelLatitude" name="bengkel_latitude" value="<?php echo e($bengkel->latitude ?? ''); ?>">
                    <input type="hidden" id="bengkelLongitude" name="bengkel_longitude" value="<?php echo e($bengkel->longitude ?? ''); ?>">
                    <input type="hidden" id="idBengkel" name="id_bengkel" value="<?php echo e($bengkel->id_bengkel ?? ''); ?>">
                    <input type="hidden" id="idLayanan" name="id_layanan_bengkel" value="<?php echo e($layanan_bengkel->id_layanan_bengkel ?? ''); ?>">
                    <input type="hidden" id="idUser" name="id_user" value="<?php echo e($id_user->id_user ?? ''); ?>">
                    <input type="hidden" id="status" name="status" value="pending">
                    <input type="hidden" id="estimasiHarga"  name="estimasi_harga" value="<?php echo e($layanan_bengkel->harga_akhir ?? ''); ?>">
                    <input type="hidden" id="totalBayar" name="total_bayar" id="totalBayar" value="">

                    <!-- Lokasi Anda -->
                    <div>
                        <label class="block text-sm font-semibold text-neutral-900 mb-2">Lokasi Anda</label>
                        <div class="alert alert-info mb-2 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="text-xs">Geser pin untuk menyesuaikan lokasi Anda</span>
                        </div>
                        <div class="relative">
                            <!-- Map Container -->
                            <div id="map" class="w-full h-48 rounded-xl overflow-hidden bg-neutral-200 border-2 border-primary-200"></div>
                            <!-- Address Display -->
                            <div class="mt-2 p-3 bg-neutral-50 rounded-lg border border-neutral-200">
                                <p class="text-xs font-medium text-neutral-700">Alamat</p>
                                <p class="text-xs text-neutral-600" id="userAddress">Mendeteksi lokasi Anda...</p>
                            </div>
                            <input type="hidden" id="userLatitude" name="user_latitude">
                            <input type="hidden" id="userLongitude" name="user_longitude">
                        </div>
                    </div>

                    <!-- Catatan -->
                    <div>
                        <label class="block text-sm font-semibold text-neutral-900 mb-2">Catatan (Opsional)</label>
                        
                        <textarea 
                            id="orderNotes" 
                            name="notes"
                            placeholder="Tambahkan catatan untuk bengkel..." 
                            class="textarea textarea-bordered w-full text-sm p-2" 
                            rows="3"></textarea>
                    </div>

                    <!-- Rincian Biaya -->
                    <div class="card p-4 bg-neutral-50 mb-10 border border-black">
                        <h5 class="font-semibold text-neutral-900 mb-3">Rincian Biaya</h5>
                        <div class="space-y-2">
                            <div class="flex justify-between text-sm">
                                <span class="text-neutral-600">Biaya Layanan</span>
                                <span class="font-medium text-neutral-900" id="servicePrice">
                                    Rp <?php echo e(number_format($layanan_bengkel->harga_akhir, 0, ',', '.')); ?>

                                </span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-neutral-600" id="ongkirLabel">Ongkir (Menghitung...)</span>
                                <span class="font-medium text-neutral-900" id="ongkirPrice">Rp 0</span>
                            </div>
                            <div class="border-t border-neutral-200 pt-2 mt-2">
                                <div class="flex justify-between">
                                    <span class="font-semibold text-neutral-900">Total</span>
                                    <span class="font-bold text-primary-700 text-lg" id="totalPrice">Rp <?php echo e(number_format($layanan_bengkel->harga_akhir, 0, ',', '.')); ?></span>
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
                <button type="button" onclick="confirmOrder()" class="flex-1 btn btn-primary">
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
    document.getElementById('client_timezone').value = Intl.DateTimeFormat().resolvedOptions().timeZone;
    </script>

    <script>
        // Configuration
        const ONGKIR_PER_KM = 15000; // Rp 15.000 per km
        const SERVICE_PRICE = <?php echo e($layanan_bengkel->harga_akhir); ?>;
        
        // Get bengkel coordinates from backend
        const bengkelLat = parseFloat(document.getElementById('bengkelLatitude').value) || null;
        const bengkelLng = parseFloat(document.getElementById('bengkelLongitude').value) || null;

        let userCoordinates = null;
        let map = null;
        let userMarker = null;
        let bengkelMarker = null;
        let routeLine = null;

        window.addEventListener('DOMContentLoaded', function() {
            initMap();
            getUserLocation();
        });

        function initMap() {
            // Initialize map with default center (Banjarmasin)
            const defaultLat = bengkelLat || -3.3186;
            const defaultLng = bengkelLng || 114.5942;
            
            map = L.map('map').setView([defaultLat, defaultLng], 13);
            
            // Add OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                maxZoom: 19
            }).addTo(map);

            // Add bengkel marker if coordinates exist
            if (bengkelLat && bengkelLng) {
                const bengkelIcon = L.divIcon({
                    className: 'bengkel-marker',
                    html: `
                        <div style="background-color: #FF9800; width: 24px; height: 24px; border-radius: 50% 50% 50% 0; border: 3px solid white; box-shadow: 0 2px 12px rgba(255,152,0,0.4); transform: rotate(-45deg);"></div>
                    `,
                    iconSize: [24, 24],
                    iconAnchor: [12, 24]
                });
                
                bengkelMarker = L.marker([bengkelLat, bengkelLng], { icon: bengkelIcon })
                    .addTo(map)
                    .bindPopup('<b><?php echo e($bengkel->nama_bengkel); ?></b><br><?php echo e($bengkel->alamat_lengkap); ?>');
            }
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

                    map.setView([lat, lon], 15);

                    if (userMarker) {
                        map.removeLayer(userMarker);
                    }
       
                    const userIcon = L.divIcon({
                        className: 'custom-marker',
                        html: `
                            <div style="position: relative;">
                                <div style="background-color: #0051BA; width: 24px; height: 24px; border-radius: 50%; border: 3px solid white; box-shadow: 0 2px 12px rgba(0,81,186,0.4); cursor: move;"></div>
                                <div style="position: absolute; top: 24px; left: 50%; transform: translateX(-50%); width: 0; height: 0; border-left: 6px solid transparent; border-right: 6px solid transparent; border-top: 8px solid #0051BA;"></div>
                            </div>
                        `,
                        iconSize: [24, 32],
                        iconAnchor: [12, 32]
                    });
                    
                    userMarker = L.marker([lat, lon], { 
                        icon: userIcon,
                        draggable: true
                    }).addTo(map);

                    const pulseCircle = L.circle([lat, lon], {
                        radius: 50,
                        color: '#0051BA',
                        fillColor: '#0051BA',
                        fillOpacity: 0.1,
                        weight: 1
                    }).addTo(map);

                    userMarker.on('dragend', function(event) {
                        const marker = event.target;
                        const position = marker.getLatLng();
                        const newLat = position.lat;
                        const newLon = position.lng;

                        latInput.value = newLat;
                        lonInput.value = newLon;
                        userCoordinates = { lat: newLat, lon: newLon };

                        pulseCircle.setLatLng([newLat, newLon]);
                        addressDisplay.textContent = 'Memperbarui alamat...';

                        reverseGeocode(newLat, newLon);
                        calculateDistanceAndOngkir(newLat, newLon);
                        drawRouteLine(newLat, newLon);
                    });

                    userMarker.bindTooltip("Geser pin ini untuk menyesuaikan lokasi", {
                        permanent: false,
                        direction: 'top'
                    });

                    reverseGeocode(lat, lon);
                   
                    calculateDistanceAndOngkir(lat, lon);
                    
                    drawRouteLine(lat, lon);
                    
                    if (bengkelLat && bengkelLng) {
                        const bounds = L.latLngBounds([
                            [lat, lon],
                            [bengkelLat, bengkelLng]
                        ]);
                        map.fitBounds(bounds, { padding: [50, 50] });
                    }
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

        function reverseGeocode(lat, lon) {
            fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&zoom=18&addressdetails=1`)
                .then(response => response.json())
                .then(data => {
                    const address = data.display_name || `${lat.toFixed(6)}, ${lon.toFixed(6)}`;
                    document.getElementById('userAddress').textContent = address;
                })
                .catch(error => {
                    console.error('Error getting address:', error);
                    document.getElementById('userAddress').textContent = `Koordinat: ${lat.toFixed(6)}, ${lon.toFixed(6)}`;
                });
        }

        function calculateDistanceAndOngkir(userLat, userLon) {
            if (!bengkelLat || !bengkelLng) return;

            const url = `https://router.project-osrm.org/route/v1/driving/${userLon},${userLat};${bengkelLng},${bengkelLat}?overview=false`;
            
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.routes && data.routes[0]) {
                        const distance = data.routes[0].distance / 1000;
                        const duration = data.routes[0].duration / 60;
                        updateUI(distance, duration);
                    } else {
                        const distance = calculateStraightLineDistance(userLat, userLon);
                        const timeMinutes = Math.round((distance / 30) * 60);
                        updateUI(distance, timeMinutes);
                    }
                })
                .catch(() => {
                    const distance = calculateStraightLineDistance(userLat, userLon);
                    const timeMinutes = Math.round((distance / 30) * 60);
                    updateUI(distance, timeMinutes);
                });
        }

        function calculateStraightLineDistance(userLat, userLon) {
            const R = 6371;
            const dLat = deg2rad(bengkelLat - userLat);
            const dLon = deg2rad(bengkelLng - userLon);
            const a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                    Math.cos(deg2rad(userLat)) * Math.cos(deg2rad(bengkelLat)) *
                    Math.sin(dLon/2) * Math.sin(dLon/2);
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
            return R * c;
        }

        function updateUI(distance, timeMinutes) {
            const ongkir = Math.ceil(distance * ONGKIR_PER_KM);
            const total = SERVICE_PRICE + ongkir;
            const timeText = timeMinutes < 60 
                ? `${Math.round(timeMinutes)} menit`
                : `${Math.floor(timeMinutes / 60)} jam ${Math.round(timeMinutes % 60)} menit`;

            document.getElementById('distanceDisplay').textContent = `${distance.toFixed(1)} km • ${timeText}`;
            document.getElementById('ongkirLabel').textContent = `Ongkir (${distance.toFixed(1)} km)`;
            document.getElementById('ongkirPrice').textContent = formatRupiah(ongkir);
            document.getElementById('totalPrice').textContent = formatRupiah(total);
            document.getElementById('totalBayar').value = total;
        }


        function drawRouteLine(userLat, userLon) {
            if (!bengkelLat || !bengkelLng) return;
            
            if (routeLine) {
                map.removeLayer(routeLine);
            }
            
            const url = `https://router.project-osrm.org/route/v1/driving/${userLon},${userLat};${bengkelLng},${bengkelLat}?overview=full&geometries=geojson`;
            
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.routes && data.routes[0] && data.routes[0].geometry) {
                        const routeCoordinates = data.routes[0].geometry.coordinates;
                        const leafletCoordinates = routeCoordinates.map(coord => [coord[1], coord[0]]);

                        routeLine = L.polyline(leafletCoordinates, {
                            color: '#0051BA',
                            weight: 5,
                            opacity: 0.8,
                            lineJoin: 'round',
                            lineCap: 'round',
                            className: 'route-line'
                        }).addTo(map);
                        
                        // Add animated overlay
                        const animatedLine = L.polyline(leafletCoordinates, {
                            color: '#FFFFFF',
                            weight: 3,
                            opacity: 0.6,
                            dashArray: '10, 20',
                            dashOffset: '0',
                            lineJoin: 'round',
                            lineCap: 'round'
                        }).addTo(map);
                        
                        // Animate the dashed line
                        let offset = 0;
                        setInterval(() => {
                            offset += 1;
                            if (offset > 30) offset = 0;
                            animatedLine.setStyle({ dashOffset: -offset });
                        }, 50);
                        
                        // Add start and end markers
                        L.circleMarker([userLat, userLon], {
                            radius: 6,
                            color: '#FFFFFF',
                            fillColor: '#0051BA',
                            fillOpacity: 1,
                            weight: 2
                        }).addTo(map).bindTooltip('Start', { permanent: false });
                        
                        const endPoint = leafletCoordinates[leafletCoordinates.length - 1];
                        L.circleMarker(endPoint, {
                            radius: 6,
                            color: '#FFFFFF',
                            fillColor: '#FF9800',
                            fillOpacity: 1,
                            weight: 2
                        }).addTo(map).bindTooltip('Bengkel', { permanent: false });
                        
                    } else {
                        drawStraightLine(userLat, userLon);
                    }
                })
                .catch(error => {
                    console.warn('OSRM error:', error);
                    drawStraightLine(userLat, userLon);
                });
        }

        function drawStraightLine(userLat, userLon) {
            routeLine = L.polyline([
                [userLat, userLon],
                [bengkelLat, bengkelLng]
            ], {
                color: '#FF9800',
                weight: 3,
                opacity: 0.6,
                dashArray: '10, 10'
            }).addTo(map);
        }

        function deg2rad(deg) {
            return deg * (Math.PI/180);
        }

        function formatRupiah(amount) {
            return 'Rp ' + amount.toLocaleString('id-ID');
        }

        window.confirmOrder = function() {
            const addressDisplay = document.getElementById('userAddress');
            const location = addressDisplay.textContent;
            const notes = document.getElementById('orderNotes').value;
            const userLat = document.getElementById('userLatitude').value;
            const userLng = document.getElementById('userLongitude').value;
            const client_timezone = document.getElementById('client_timezone').value = Intl.DateTimeFormat().resolvedOptions().timeZone;

            const bengkelLat = document.getElementById('bengkelLatitude').value;
            const bengkelLng = document.getElementById('bengkelLongitude').value;
            const idBengkel = document.getElementById('idBengkel').value;
            const idLayanan = document.getElementById('idLayanan').value;
            const idUser = document.getElementById('idUser').value;
            const estimasiHarga = document.getElementById('estimasiHarga').value;
            const totalBayar = document.getElementById('totalBayar').value;

            if (!userLat || !userLng || location === 'Mendeteksi lokasi Anda...' || location.includes('Gagal')) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Lokasi Diperlukan',
                    text: 'Silakan izinkan akses lokasi Anda',
                    confirmButtonColor: '#0051BA'
                });
                return;
            }

            if (!totalBayar || isNaN(totalBayar) || totalBayar <= 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Terjadi kesalahan dalam menghitung total harga',
                    confirmButtonColor: '#0051BA'
                });
                return;
            }

            // Format total untuk ditampilkan
            const totalText = formatRupiah(parseInt(totalBayar));

            Swal.fire({
                title: 'Konfirmasi Pesanan',
                html: `
                    <div class="text-left">
                        <p class="text-sm text-gray-600 mb-3">Pastikan data pesanan Anda sudah benar:</p>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Nama Bengkel:</span>
                                <span class="font-medium"><?php echo e($bengkel->nama_bengkel); ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Layanan:</span>
                                <span class="font-medium"><?php echo e($layanan_bengkel->nama_layanan); ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Total:</span>
                                <span class="font-semibold text-blue-600">${totalText}</span>
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
                    Swal.fire({
                        title: 'Memproses pesanan...',
                        html: 'Mohon tunggu sebentar',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        didOpen: () => Swal.showLoading()
                    });

                    axios.post("<?php echo e(route('user.order_store')); ?>", {
                        id_bengkel: idBengkel,
                        id_layanan_bengkel: idLayanan,
                        user_latitude: userLat,
                        user_longitude: userLng,
                        bengkel_latitude: bengkelLat,
                        bengkel_longitude: bengkelLng,
                        estimasi_harga: estimasiHarga,
                        total_bayar: totalBayar,
                        notes: notes,
                        client_timezone :client_timezone
                    })
                    .then(response => {
                        const data = response.data;

                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Pesanan Berhasil!',
                                text: 'Pesanan Anda sedang diproses',
                                confirmButtonColor: '#0051BA',
                                timer: 2000,
                                timerProgressBar: true
                            }).then(() => {
                                window.location.href = data.redirect_url;
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: data.message || 'Kesalahan tak dikenal',
                                confirmButtonColor: '#0051BA'
                            });
                        }
                    })
                    .catch(error => {

                        if (error.response && error.response.status === 422) {
                            const errors = error.response.data.errors;
                            let msg = '';
                            Object.values(errors).forEach(arr => arr.forEach(e => msg += `• ${e}\n`));

                            Swal.fire({
                                icon: 'warning',
                                title: 'Data Tidak Valid',
                                text: msg,
                                confirmButtonColor: '#0051BA'
                            });
                            return;
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: (error.response?.data?.message) || error.message,
                            confirmButtonColor: '#0051BA'
                        });
                    });
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
<?php endif; ?><?php /**PATH C:\laragon\www\sibantar\resources\views/user/confirmation.blade.php ENDPATH**/ ?>