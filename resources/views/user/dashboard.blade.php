<x-layout>
    <x-slot:title>SIBANTAR - Bantuan Darurat Kendaraan Terdekat</x-slot:title>

    @push('styles')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        /* Custom marker styling */
        .user-marker {
            background-color: #0051BA;
            border: 3px solid white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }
        
        .bengkel-marker {
            background-color: #FF9800;
            border: 3px solid white;
            border-radius: 50% 50% 50% 0;
            transform: rotate(-45deg);
            width: 24px;
            height: 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }
        
        /* Leaflet popup custom */
        .leaflet-popup-content-wrapper {
            border-radius: 12px;
        }
    </style>
    @endpush

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-primary-700 to-primary-900 text-white">
        <div class="container mx-auto px-4 py-12 lg:py-20">
            <div class="max-w-2xl mx-auto text-center">
                <h1 class="mb-4">
                    Selamat Datang di <span class="text-orange-400">SIBANTAR</span>
                </h1>
                <p class="text-primary-100 text-sm lg:text-base mb-8">
                    Temukan bengkel terdekat dengan cepat dan aman<br class="hidden lg:block">
                    saat kendaraan Anda bermasalah
                </p>

                <!-- Search Form Card -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 lg:p-8 shadow-xl text-left">
                    <form action="{{ route('user.search') }}" method="GET" class="space-y-6">
                        <!-- Jenis Kendaraan -->
                        <div class="form-control w-full">
                            <label class="label justify-start">
                                <span class="label-text text-white font-medium text-base">Jenis Kendaraan</span>
                            </label>
                            <select id="vehicle_type" name="vehicle_type" class="select select-bordered w-full bg-white text-neutral-700 text-base !h-14 !min-h-0 !leading-normal" required>
                                <option disabled selected value="">Pilih jenis kendaraan</option>
                                <option value="Motor">Motor</option>
                                <option value="Mobil">Mobil</option>
                                <option value="Truk">Truk</option>
                            </select>
                        </div>

                        <!-- Jenis Masalah -->
                        <div class="form-control w-full">
                            <label class="label justify-start">
                                <span class="label-text text-white font-medium text-base">Jenis Kerusakan</span>
                            </label>
                            <select id="nama_layanan" name="nama_layanan" class="select select-bordered w-full bg-white text-neutral-700 text-base !h-14 !min-h-0 !leading-normal" required>
                                <option disabled selected value="">Pilih jenis kerusakan</option>
                                <option value="Ban Bocor">Ban Bocor</option>
                                <option value="Aki Tekor">Aki Soak</option>
                                <option value="Mesin Mati">Mesin Mati</option>
                                <option value="Kecelakaan">Kecelakaan</option>
                                <!-- <option value="Lainnya">Lainnya</option> -->
                            </select>
                        </div>

                        <!-- Lokasi Anda -->
                        <div class="text-left">
                            <label class="label justify-start mb-4">
                                <span class="label-text text-white font-medium text-base">Lokasi anda sekarang:</span>
                            </label>

                            <div id="map" class="rounded-xl border-2 border-white/20" style="height: 200px; width: 100%;"></div>
                            <input type="hidden" name="latitude" id="latitude">
                            <input type="hidden" name="longitude" id="longitude">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-secondary w-full btn-lg shadow-lg hover:shadow-xl">
                            Cari Bengkel Terdekat
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-12 lg:py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-center mb-8 lg:mb-12">
                Mengapa Pilih SIBANTAR?
            </h2>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 max-w-5xl mx-auto">
                
                <!-- Feature 1: Respon Cepat -->
                <div class="card p-6 text-center">
                    <div class="w-16 h-16 bg-primary-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-neutral-900 mb-2">Respon Cepat</h3>
                    <p class="text-sm text-neutral-600">Respon bengkel dalam 2 menit</p>
                </div>

                <!-- Feature 2: Bengkel Terpercaya -->
                <div class="card p-6 text-center">
                    <div class="w-16 h-16 bg-warning-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-warning-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-neutral-900 mb-2">Bengkel Terpercaya</h3>
                    <p class="text-sm text-neutral-600">Rating Asli</p>
                </div>

                <!-- Feature 3: Live Status -->
                <div class="card p-6 text-center">
                    <div class="w-16 h-16 bg-success-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-neutral-900 mb-2">Live Status</h3>
                    <p class="text-sm text-neutral-600">Pantau status realtime</p>
                </div>

                <!-- Feature 4: Pembayaran Mudah -->
                <div class="card p-6 text-center">
                    <div class="w-16 h-16 bg-info-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-info-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-neutral-900 mb-2">Pembayaran Mudah</h3>
                    <p class="text-sm text-neutral-600">Bayar dengan metode Cashless</p>
                </div>

            </div>
        </div>
    </section>

    @push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    @endpush

    @push('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        let map, userMarker;

        const userIcon = L.divIcon({
            className: 'user-marker',
            iconSize: [20, 20],
            iconAnchor: [10, 10]
        });

        function initMap(lat, lng) {
            map = L.map('map').setView([lat, lng], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                maxZoom: 21
            }).addTo(map);

            userMarker = L.marker([lat, lng], {
                draggable: true,
                icon: userIcon
            }).addTo(map)
            .bindPopup('<b>Apakah Benar Ini Lokasi Anda?</b>');

            updateForm(lat, lng);

            userMarker.on('dragend', () => {
                const pos = userMarker.getLatLng();
                updateForm(pos.lat, pos.lng);
            });

            map.on('click', (e) => {
                userMarker.setLatLng(e.latlng);
                updateForm(e.latlng.lat, e.latlng.lng);
            });

            map.fitBounds([
                [lat + 0.0008, lng + 0.0008],
                [lat - 0.0008, lng - 0.0008]
            ], { padding: [20, 20] });

            map.whenReady(() => {
                userMarker.openPopup();
            });
        }

        function updateForm(lat, lng) {
            document.getElementById('latitude').value = lat.toFixed(6);
            document.getElementById('longitude').value = lng.toFixed(6);
        }

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const userLat = position.coords.latitude;
                    const userLng = position.coords.longitude;
                    
                    console.log('GPS berhasil:', userLat, userLng);
                    initMap(userLat, userLng);
                },
                (error) => {
                    console.error('Error GPS:', error);
                    initMap(-3.3186, 114.5942);
                    alert('Tidak dapat mengakses lokasi Anda. Menggunakan lokasi default Banjarmasin.');
                }
            );
        } else {
            initMap(-3.3186, 114.5942);
            alert('Browser Anda tidak mendukung geolocation. Menggunakan lokasi default Banjarmasin.');
        }
    </script>
    <script>
        // Persist select inputs so user doesn't need to re-enter when navigating
        (function() {
            const vehicleKey = 'sibantar.vehicle_type';
            const layananKey = 'sibantar.nama_layanan';

            const vehicleSelect = document.getElementById('vehicle_type');
            const layananSelect = document.getElementById('nama_layanan');

            // Restore saved values if present
            try {
                const savedVehicle = localStorage.getItem(vehicleKey);
                const savedLayanan = localStorage.getItem(layananKey);
                if (vehicleSelect && savedVehicle) {
                    // only set if option exists
                    const opt = Array.from(vehicleSelect.options).find(o => o.value === savedVehicle);
                    if (opt) vehicleSelect.value = savedVehicle;
                }
                if (layananSelect && savedLayanan) {
                    const opt2 = Array.from(layananSelect.options).find(o => o.value === savedLayanan);
                    if (opt2) layananSelect.value = savedLayanan;
                }
            } catch (e) {
                console.warn('Error restoring saved selects', e);
            }

            // Save on change
            if (vehicleSelect) {
                vehicleSelect.addEventListener('change', () => {
                    try { localStorage.setItem(vehicleKey, vehicleSelect.value); } catch(e){}
                });
            }

            if (layananSelect) {
                layananSelect.addEventListener('change', () => {
                    try { localStorage.setItem(layananKey, layananSelect.value); } catch(e){}
                });
            }

            // Optional: clear saved values when form is successfully submitted (so it won't persist forever)
            const searchForm = document.querySelector('form[action="{{ route('user.search') }}"]');
            if (searchForm) {
                searchForm.addEventListener('submit', () => {
                    try {
                        // keep stored values so user returning still sees them; comment out if you prefer clearing
                        // localStorage.removeItem(vehicleKey);
                        // localStorage.removeItem(layananKey);
                    } catch (e) {}
                });
            }
        })();
    </script>
    @endpush
</x-layout>