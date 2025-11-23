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
     <?php $__env->slot('title', null, []); ?> Bengkel Terdekat - SIBANTAR <?php $__env->endSlot(); ?>

    <?php $__env->startPush('styles'); ?>
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
    <?php $__env->stopPush(); ?>

    <!-- Header: Back Button + Search Info -->
    <header class="bg-white shadow-sm flex sticky top-0 z-50">
        <!-- Back Button -->
        <a  href="<?php echo e(route('user.dashboard')); ?>" class="flex-shrink-0 mt-4 ml-12">
            <svg class="w-6 h-6 text-neutral-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <div class="px-4 py-3 flex items-center justify-center gap-3">
            <!-- Search Info -->
            <div class="flex-1 min-w-0 justify-center">
                <h1 class="text-2xl font-bold text-neutral-900 truncate">Cari Bengkel</h1>
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
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('create-eksplor-bengkel', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-699995047-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </section>




    <!-- Filter & Sort Section -->
    
    
    <!-- Bengkel List -->
    

    <?php $__env->startPush('scripts'); ?>
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
<?php /**PATH C:\laragon\www\sibantar\resources\views/user/eksplor_bengkel.blade.php ENDPATH**/ ?>