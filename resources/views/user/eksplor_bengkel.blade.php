<x-layout-user>
    <x-slot:title>Bengkel Terdekat - SIBANTAR</x-slot:title>

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

    <!-- Header: Back Button + Search Info -->
    <header class="bg-white shadow-sm flex sticky top-0 z-50">
        <!-- Back Button -->
        <a  href="{{ route('user.dashboard') }}" class="flex-shrink-0 mt-4 ml-12">
            <svg class="w-6 h-6 text-neutral-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <div class="px-4 py-3 flex items-center justify-center gap-3">
            <!-- Search Info -->
            <div class="flex-1 min-w-0 justify-center">
                <h1 class="text-2xl font-bold text-neutral-900 truncate">Ayo Eksplorasi Bengkel di Kota Banjarmasin</h1>
            </div>
        </div>
    </header>

    <!-- Map Section -->
    <section class="bg-white">
        <div class="relative">
            <!-- Map Container -->
            <div id="map" class="h-48 sm:h-64 lg:h-80 bg-neutral-200 relative overflow-hidden z-10">
                <!-- Leaflet Map will render here -->
            </div>
            
            <!-- Loading Overlay -->
            <div id="map-loading" class="absolute inset-0 bg-white bg-opacity-90 flex items-center justify-center z-20">
                <div class="text-center">
                    <svg class="animate-spin h-10 w-10 text-primary-700 mx-auto mb-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <p class="text-sm text-neutral-600">Memuat peta...</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Daftar Bengkel Section -->
    <section class="bg-white">
        <livewire:create-eksplor-bengkel />
    </section>




    <!-- Filter & Sort Section -->
    {{-- <section class="bg-white border-b border-neutral-200 sticky top-[57px] z-40 shadow-sm">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center gap-2 overflow-x-auto hide-scrollbar">
                <!-- Filter Jarak -->
                <button data-filter="terdekat" class="filter-btn btn btn-sm btn-primary whitespace-nowrap">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    </svg>
                    Terdekat
                </button>

                <!-- Filter Rating -->
                <button data-filter="rating" class="filter-btn btn btn-sm btn-outline whitespace-nowrap">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                    Rating Tertinggi
                </button>

                <!-- Filter Harga -->
                <button data-filter="harga" class="filter-btn btn btn-sm btn-outline whitespace-nowrap">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Harga
                </button>

                <!-- Filter Buka Sekarang -->
                <button data-filter="buka" class="filter-btn btn btn-sm btn-outline whitespace-nowrap">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Buka Sekarang
                </button>
            </div>
        </div>
    </section> --}}
    
    <!-- Bengkel List -->
    {{-- <section class="bg-neutral-50 pb-6">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto space-y-4">
            
            <!-- Bengkel Card 1 -->
            <div class="card p-4 hover:shadow-lg transition cursor-pointer" data-bengkel-id="1" data-lat="-3.3186" data-lng="114.5942">
                <div class="flex gap-4">
                    <!-- Bengkel Image -->
                    <div class="w-20 h-20 sm:w-24 sm:h-24 bg-neutral-200 rounded-xl flex-shrink-0 overflow-hidden">
                       <img src="{{ asset('images/bengkel.jpeg') }}" alt="Bengkel" class="w-full h-full object-cover">
                    </div>

                    <!-- Bengkel Info -->
                    <div class="flex-1 min-w-0">
                        <h3 class="font-semibold text-[18px] text-neutral-900 mb-1 truncate">Bengkel Jaya Motor</h3>
                        
                        <!-- Rating -->
                        <div class="flex items-center gap-1 mb-2">
                            <div class="flex text-warning-500">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </div>
                            <span class="text-sm font-semibold text-neutral-900">5.0</span>
                            <span class="text-xs text-neutral-500">(124 Ulasan)</span>
                        </div>

                        <!-- Distance & Time -->
                        <div class="flex items-center gap-3 text-xs text-neutral-600 mb-2">
                            <div class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                                <span>0.6 km</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>15 menit</span>
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="mb-3">
                            <p class="text-sm font-bold text-secondary-600">Rp 25.000 - Rp 50.000</p>
                            <p class="text-xs text-neutral-500">Estimasi Biaya</p>
                        </div>

                        <!-- Actions -->
                        <div class="flex gap-2">
                            <a href="{{ route('user.bengkel.detail', 1) }}" class="btn btn-outline btn-sm flex-1">
                                Detail
                            </a>
                            <a href="{{ route('user.bengkel.confirmation', 1) }}" class="btn btn-primary btn-sm flex-1">
                                Pesan
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bengkel Card 2 -->
            <div class="card p-4 hover:shadow-lg transition cursor-pointer" data-bengkel-id="2" data-lat="-3.3210" data-lng="114.5980">
                <div class="flex gap-4">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 bg-neutral-200 rounded-xl flex-shrink-0 overflow-hidden">
                         <img src="{{ asset('images/bengkel.jpeg') }}" alt="Bengkel" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-semibold text-[18px] text-neutral-900 mb-1 truncate">Bengkel Maju Motor</h3>
                        <div class="flex items-center gap-1 mb-2">
                            <div class="flex text-warning-500">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 text-neutral-300 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </div>
                            <span class="text-sm font-semibold text-neutral-900">4.8</span>
                            <span class="text-xs text-neutral-500">(89 Ulasan)</span>
                        </div>
                        <div class="flex items-center gap-3 text-xs text-neutral-600 mb-2">
                            <div class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                                <span>1.2 km</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>20 menit</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="text-sm font-bold text-secondary-600">Rp 30.000 - Rp 60.000</p>
                            <p class="text-xs text-neutral-500">Estimasi Biaya</p>
                        </div>
                        <div class="flex gap-2 mt-3">
                            <a href="{{ route('user.bengkel.detail', 1) }}" class="btn btn-outline btn-sm flex-1">Detail</a>
                            <a href="{{ route('user.bengkel.confirmation', 1) }}" class="btn btn-primary btn-sm flex-1">Pesan</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bengkel Card 3 -->
            <div class="card p-4 hover:shadow-lg transition cursor-pointer" data-bengkel-id="3" data-lat="-3.3160" data-lng="114.5910">
                <div class="flex gap-4">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 bg-neutral-200 rounded-xl flex-shrink-0 overflow-hidden">
                        <img src="{{ asset('images/bengkel.jpeg') }}" alt="Bengkel" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-semibold text-[18px] text-neutral-900 mb-1 truncate">Service Center Motor</h3>
                        <div class="flex items-center gap-1 mb-2">
                            <div class="flex text-warning-500">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            </div>
                            <span class="text-sm font-semibold text-neutral-900">5.0</span>
                            <span class="text-xs text-neutral-500">(201 Ulasan)</span>
                        </div>
                        <div class="flex items-center gap-3 text-xs text-neutral-600 mb-2">
                            <div class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                                <span>1.8 km</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>25 menit</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="text-sm font-bold text-secondary-600">Rp 35.000 - Rp 75.000</p>
                            <p class="text-xs text-neutral-500">Estimasi Biaya</p>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('user.bengkel.detail', 3) }}" class="btn btn-outline btn-sm flex-1">Detail</a>
                            <button class="btn btn-primary btn-sm flex-1">Pesan</button>
                        </div>
                    </div>
                </div>
            </div>

            </div>

        </div>
    </section> --}}

    @push('scripts')
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Get search params dari URL
        // const urlParams = new URLSearchParams(window.location.search);
        // const vehicleType = urlParams.get('vehicle_type') || 'Motor';
        // const problemType = urlParams.get('problem_type') || 'Ban Bocor';
        
        // Update display
        // document.getElementById('vehicle-type').textContent = vehicleType;
        // document.getElementById('problem-type').textContent = problemType;

        // Initialize Map
        let map;
        let userMarker;
        let bengkelMarkers = [];

        // Data bengkel (nanti dari backend/API)
        // const bengkelData = [
        //     { id: 1, name: 'Bengkel Jaya Motor', lat: -3.3186, lng: 114.5942, rating: 5.0, reviews: 124, distance: '0.6 km' },
        //     { id: 2, name: 'Bengkel Maju Motor', lat: -3.3210, lng: 114.5980, rating: 4.8, reviews: 89, distance: '1.2 km' },
        //     { id: 3, name: 'Service Center Motor', lat: -3.3160, lng: 114.5910, rating: 5.0, reviews: 201, distance: '1.8 km' }
        // ];

        function initMap(userLat, userLng) {
            // Hide loading
            document.getElementById('map-loading').style.display = 'none';

            // Initialize map centered on user location
            map = L.map('map').setView([userLat, userLng], 14);

            // Add tile layer (OpenStreetMap)
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                maxZoom: 19
            }).addTo(map);

            // Add user marker (blue circle)
            const userIcon = L.divIcon({
                className: 'user-marker',
                iconSize: [20, 20],
                iconAnchor: [10, 10]
            });

            userMarker = L.marker([userLat, userLng], { icon: userIcon })
                .addTo(map)
                .bindPopup('<b>Apakah Benar Ini Lokasi Anda?</b>')
                .openPopup();

            // Add bengkel markers (orange pins)
            // bengkelData.forEach(bengkel => {
            //     const bengkelIcon = L.divIcon({
            //         className: 'bengkel-marker',
            //         iconSize: [24, 24],
            //         iconAnchor: [12, 24],
            //         popupAnchor: [0, -24]
            //     });

            //     const marker = L.marker([bengkel.lat, bengkel.lng], { icon: bengkelIcon })
            //         .addTo(map)
            //         .bindPopup(`
            //             <div class="text-sm">
            //                 <h3 class="font-bold text-neutral-900 mb-1">${bengkel.name}</h3>
            //                 <div class="flex items-center gap-1 mb-2">
            //                     <span class="text-warning-500">★</span>
            //                     <span class="font-semibold">${bengkel.rating}</span>
            //                     <span class="text-neutral-500">(${bengkel.reviews})</span>
            //                 </div>
            //                 <p class="text-xs text-neutral-600 mb-2">${bengkel.distance} dari Anda</p>
            //                 <a href="/user/bengkel/${bengkel.id}" class="text-primary-700 font-medium hover:underline">Lihat Detail →</a>
            //             </div>
            //         `);

            //     bengkelMarkers.push({ id: bengkel.id, marker: marker });

            //     // Click card to show marker popup
            //     const card = document.querySelector(`[data-bengkel-id="${bengkel.id}"]`);
            //     if (card) {
            //         card.addEventListener('click', () => {
            //             map.setView([bengkel.lat, bengkel.lng], 16);
            //             marker.openPopup();
            //         });
            //     }
            // });

            // Fit bounds to show all markers
            // const bounds = L.latLngBounds([
            //     [userLat, userLng],
            //     ...bengkelData.map(b => [b.lat, b.lng])
            // ]);
            // map.fitBounds(bounds, { padding: [50, 50] });
        }

        // Filter functionality
        // let currentFilter = 'terdekat';
        // const filterButtons = document.querySelectorAll('.filter-btn');
        
        // filterButtons.forEach(button => {
        //     button.addEventListener('click', () => {
        //         const filterType = button.getAttribute('data-filter');
                
        //         // Update active button
        //         filterButtons.forEach(btn => {
        //             btn.classList.remove('btn-primary');
        //             btn.classList.add('btn-outline');
        //         });
        //         button.classList.remove('btn-outline');
        //         button.classList.add('btn-primary');
                
        //         // Apply filter
        //         currentFilter = filterType;
        //         applyFilter(filterType);
        //     });
        // });

        // function applyFilter(filterType) {
        //     const bengkelCards = document.querySelectorAll('[data-bengkel-id]');
            
        //     // Convert NodeList to Array for sorting
        //     const cardsArray = Array.from(bengkelCards);
        //     const container = bengkelCards[0].parentElement;
            
        //     // Sort based on filter type
        //     switch(filterType) {
        //         case 'terdekat':
        //             // Sort by distance (already sorted by default)
        //             console.log('Filter: Terdekat');
        //             // Bisa tambahkan actual distance calculation nanti
        //             break;
                    
        //         case 'rating':
        //             // Sort by rating (descending)
        //             console.log('Filter: Rating Tertinggi');
        //             cardsArray.sort((a, b) => {
        //                 const ratingA = parseFloat(a.querySelector('.text-sm.font-semibold').textContent);
        //                 const ratingB = parseFloat(b.querySelector('.text-sm.font-semibold').textContent);
        //                 return ratingB - ratingA;
        //             });
                    
        //             // Re-append sorted cards
        //             cardsArray.forEach(card => container.insertBefore(card, container.lastElementChild));
        //             break;
                    
        //         case 'harga':
        //             // Sort by price (ascending)
        //             console.log('Filter: Harga Termurah');
        //             cardsArray.sort((a, b) => {
        //                 const priceA = parseInt(a.querySelector('.text-secondary-600').textContent.match(/\d+/)[0]);
        //                 const priceB = parseInt(b.querySelector('.text-secondary-600').textContent.match(/\d+/)[0]);
        //                 return priceA - priceB;
        //             });
                    
        //             // Re-append sorted cards
        //             cardsArray.forEach(card => container.insertBefore(card, container.lastElementChild));
        //             break;
                    
        //         case 'buka':
        //             // Filter only open bengkel
        //             console.log('Filter: Buka Sekarang');
        //             // For now, show all (nanti integrate dengan jam operasional dari backend)
        //             alert('Menampilkan bengkel yang buka sekarang (fitur akan aktif setelah integrasi backend)');
        //             break;
        //     }
            
        //     // Remove auto-scroll - keep screen position
        //     // document.querySelector('.bg-neutral-50.py-3').scrollIntoView({ behavior: 'smooth' });
        // }

        // Get user location
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const userLat = position.coords.latitude;
                    const userLng = position.coords.longitude;
                    
                    // Initialize map with user location
                    initMap(userLat, userLng);
                },
                (error) => {
                    console.error('Error getting location:', error);
                    // Fallback: use Banjarmasin coordinates
                    initMap(-3.3186, 114.5942);
                    alert('Tidak dapat mengakses lokasi Anda. Menggunakan lokasi default Banjarmasin.');
                }
            );
        } else {
            // Browser doesn't support geolocation
            initMap(-3.3186, 114.5942);
            alert('Browser Anda tidak mendukung geolocation. Menggunakan lokasi default Banjarmasin.');
        }
    </script>
    @endpush

</x-layout-user>
