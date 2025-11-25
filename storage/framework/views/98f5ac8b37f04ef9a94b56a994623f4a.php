

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
     <?php $__env->slot('title', null, []); ?> Bengkel Terdekat denganmu - SIBANTAR <?php $__env->endSlot(); ?>

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
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="px-4 py-3 flex items-center gap-3">
            <a href="<?php echo e(route('user.dashboard')); ?>" class="flex-shrink-0">
                <svg class="w-6 h-6 text-neutral-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div class="flex-1 min-w-0">
                <h1 class="text-base font-bold text-neutral-900 truncate">Bengkel Terdekat</h1>
                <p class="text-xs text-neutral-600 truncate">
                    <span id="vehicle-type"><?php echo e($vehicleType); ?></span> - <span id="nama_layanan"><?php echo e($nama_layanan); ?></span>
                </p>
            </div>
        </div>
    </header>

    <!-- Map Section -->
    <section class="bg-neutral-50 py-6">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-xl shadow-sm p-4 relative">
                    <div id="map" class="rounded-lg overflow-hidden h-48 sm:h-64 lg:h-80 bg-neutral-200 w-full"></div>
                    
                    <div class="mt-4 w-full max-w-sm">
                        <label for="filterSelect" class="sr-only">Filter</label>
                        <select id="filterSelect" class="w-full px-4 py-3 h-12 rounded-full border border-neutral-200 bg-white text-neutral-900 text-sm shadow-sm">
                            <option value="terdekat">Terdekat</option>
                            <option value="rating">Rating Tertinggi</option>
                            <option value="harga">Harga</option>
                            <option value="buka">Buka Sekarang</option>
                        </select>
                    </div>

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
                </div>
            </div>
        </div>
    </section>

    <!-- Filter was moved into the map wrapper so they share one background -->
    
    <!-- Bengkel List -->
    <section class="bg-neutral-50 pb-2 mt-2">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto" id="bengkel-list">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <?php $__empty_1 = true; $__currentLoopData = $bengkelList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bengkel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $rating = $bengkel->average_rating;
                    $fullStars = floor($rating);
                    $hasHalfStar = ($rating - $fullStars) >= 0.5;
                ?>
                
                <div class="card p-4 hover:shadow-lg transition cursor-pointer bengkel-card" 
                    data-bengkel-id="<?php echo e($bengkel->id_bengkel); ?>" 
                    data-lat="<?php echo e($bengkel->latitude); ?>" 
                    data-lng="<?php echo e($bengkel->longitude); ?>"
                    data-distance="<?php echo e($bengkel->distance_km); ?>"
                    data-rating="<?php echo e($bengkel->average_rating); ?>"
                    data-price="<?php echo e($bengkel->relevant_layanan->harga_awal ?? 0); ?>">
                    <div class="flex gap-4">
                        <!-- Bengkel Image -->
                        <div class="w-20 h-20 sm:w-24 sm:h-24 bg-neutral-200 rounded-xl flex-shrink-0 overflow-hidden">
                           <img src="<?php echo e(asset('images/bengkel.jpeg')); ?>" alt="<?php echo e($bengkel->nama_bengkel); ?>" class="w-full h-full object-cover">
                        </div>

                        <!-- Bengkel Info -->
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-[18px] text-neutral-900 mb-1 truncate"><?php echo e($bengkel->nama_bengkel); ?></h3>
                            
                            <!-- Rating -->
                            <div class="flex items-center gap-1 mb-2">
                                <div class="flex text-warning-500">
                                    <?php for($i = 0; $i < 5; $i++): ?>
                                        <?php if($i < $fullStars): ?>
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                            </svg>
                                        <?php elseif($i == $fullStars && $hasHalfStar): ?>
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                <defs>
                                                    <linearGradient id="half-<?php echo e($bengkel->id_bengkel); ?>">
                                                        <stop offset="50%" stop-color="currentColor"/>
                                                        <stop offset="50%" stop-color="#d1d5db"/>
                                                    </linearGradient>
                                                </defs>
                                                <path fill="url(#half-<?php echo e($bengkel->id_bengkel); ?>)" d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                            </svg>
                                        <?php else: ?>
                                            <svg class="w-4 h-4 text-neutral-300 fill-current" viewBox="0 0 20 20">
                                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                            </svg>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </div>
                                <span class="text-sm font-semibold text-neutral-900"><?php echo e(number_format($bengkel->average_rating, 1)); ?></span>
                                <span class="text-xs text-neutral-500">(<?php echo e($bengkel->total_reviews); ?> Ulasan)</span>
                            </div>

                            <!-- Distance & Time -->
                            <div class="flex items-center gap-3 text-xs text-neutral-600 mb-2">
                                <div class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                    <span><?php echo e($bengkel->distance_text); ?></span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span><?php echo e($bengkel->estimated_time); ?></span>
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="mb-3">
                                <p class="text-sm font-bold text-secondary-600"><?php echo e($bengkel->estimasi_harga_display); ?></p>
                                <p class="text-xs text-neutral-500">Estimasi Biaya - <?php echo e($bengkel->relevant_layanan->nama_layanan ?? 'Layanan Umum'); ?></p>
                            </div>

                            <!-- Actions -->
                            <div class="flex gap-2">
                                <a href="<?php echo e(route('user.bengkel.detail', [
                                    'id_bengkel' => $bengkel->id_bengkel,
                                    'id_layanan' => $bengkel->relevant_layanan->id_layanan_bengkel,
                                    'back' => request()->fullUrl()
                                ])); ?>" class="btn btn-outline btn-sm flex-1">
                                    Detail
                                </a>

                                <a href="<?php echo e(route('user.bengkel.confirmation', [
                                    'id_bengkel'=> $bengkel->id_bengkel,
                                    'id_layanan'=> $bengkel->relevant_layanan->id_layanan_bengkel,
                                ])); ?>" class="btn btn-primary btn-sm flex-1">
                                    Pesan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-1 md:col-span-2">
                    <div class="card p-8 text-center">
                    <svg class="w-16 h-16 text-neutral-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="text-lg font-semibold text-neutral-900 mb-2">Tidak Ada Bengkel Tersedia</h3>
                    <p class="text-sm text-neutral-600 mb-4">Maaf, tidak ada bengkel yang tersedia di sekitar lokasi Anda saat ini.</p>
                    <a href="/" class="btn btn-primary">Kembali ke Beranda</a>
                    </div>
                </div>
            <?php endif; ?>

            </div>
            </div>
        </div>
    </section>


    <?php $__env->startPush('scripts'); ?>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        const bengkelData = <?php echo json_encode($bengkelDataJs, 15, 512) ?>;
        const userLat = <?php echo e($latitude); ?>;
        const userLng = <?php echo e($longitude); ?>;

        let map;
        let userMarker;
        let bengkelMarkers = [];

        function initMap() {
            document.getElementById('map-loading').style.display = 'none';

            map = L.map('map').setView([userLat, userLng], 14);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                maxZoom: 19
            }).addTo(map);

            const userIcon = L.divIcon({
                className: 'user-marker',
                iconSize: [20, 20],
                iconAnchor: [10, 10]
            });

            userMarker = L.marker([userLat, userLng], { icon: userIcon })
                .addTo(map)
                .bindPopup('<b>Lokasi Anda</b>')
                .openPopup();

            bengkelData.forEach(bengkel => {
                if (!bengkel.lat || !bengkel.lng) {
                    console.warn(`Bengkel ${bengkel.name} tidak memiliki koordinat yang valid`);
                    return;
                }

                const bengkelIcon = L.divIcon({
                    className: 'bengkel-marker',
                    iconSize: [24, 24],
                    iconAnchor: [12, 24],
                    popupAnchor: [0, -24]
                });

                const marker = L.marker([bengkel.lat, bengkel.lng], { icon: bengkelIcon })
                    .addTo(map)
                    .bindPopup(`
                        <div class="text-sm">
                            <h3 class="font-bold text-neutral-900 mb-1">${bengkel.name}</h3>
                            <div class="flex items-center gap-1 mb-2">
                                <span class="text-warning-500">★</span>
                                <span class="font-semibold">${bengkel.rating.toFixed(1)}</span>
                                <span class="text-neutral-500">(${bengkel.reviews})</span>
                            </div>
                            <p class="text-xs text-neutral-600 mb-2">${bengkel.distance} dari Anda</p>
                            <p class="text-xs text-neutral-500 mb-2">${bengkel.layanan}</p>
                            <p class="text-xs font-semibold text-secondary-600">${bengkel.price}</p>
                        </div>
                    `);

                bengkelMarkers.push({ id: bengkel.id, marker: marker });

                const card = document.querySelector(`[data-bengkel-id="${bengkel.id}"]`);
                if (card) {
                    card.addEventListener('click', () => {
                        map.setView([bengkel.lat, bengkel.lng], 16);
                        marker.openPopup();
                    });
                }
            });

            if (bengkelData.length > 0) {
                const validBengkel = bengkelData.filter(b => b.lat && b.lng);
                if (validBengkel.length > 0) {
                    const bounds = L.latLngBounds([
                        [userLat, userLng],
                        ...validBengkel.map(b => [b.lat, b.lng])
                    ]);
                    map.fitBounds(bounds, { padding: [50, 50] });
                }
            }
        }

        // Filter functionality (select dropdown)
        const filterSelect = document.getElementById('filterSelect');
        if (filterSelect) {
            filterSelect.addEventListener('change', () => {
                const filterType = filterSelect.value;
                applyFilter(filterType);
            });
        }

        function applyFilter(filterType) {
            const bengkelCards = document.querySelectorAll('.bengkel-card');
            const cardsArray = Array.from(bengkelCards);
            const container = bengkelCards[0]?.parentElement;
            
            if (!container) return;
            
            switch(filterType) {
                case 'terdekat':
                    cardsArray.sort((a, b) => {
                        return parseFloat(a.dataset.distance) - parseFloat(b.dataset.distance);
                    });
                    break;
                    
                case 'rating':
                    cardsArray.sort((a, b) => {
                        return parseFloat(b.dataset.rating) - parseFloat(a.dataset.rating);
                    });
                    break;
                    
                case 'harga':
                    cardsArray.sort((a, b) => {
                        return parseInt(a.dataset.price) - parseInt(b.dataset.price);
                    });
                    break;
                    
                case 'buka':
                    const now = new Date();
                    const currentTime = now.getHours() * 60 + now.getMinutes();
                    
                    cardsArray.forEach(card => {
                        // Placeholder - nanti bisa dikembangkan dengan jam operasional real
                        const isOpen = Math.random() > 0.3; // 70% chance bengkel buka
                        if (!isOpen) {
                            card.style.opacity = '0.5';
                        } else {
                            card.style.opacity = '1';
                        }
                    });
                    
                    cardsArray.sort((a, b) => {
                        const aOpacity = parseFloat(a.style.opacity || 1);
                        const bOpacity = parseFloat(b.style.opacity || 1);
                        return bOpacity - aOpacity;
                    });
                    break;
            }
            
            cardsArray.forEach(card => container.appendChild(card));
        }

        // Initialize map when page loads
        if (bengkelData.length > 0) {
            initMap();
        } else {
            document.getElementById('map-loading').innerHTML = `
                <div class="text-center">
                    <svg class="w-16 h-16 text-neutral-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-sm text-neutral-600">Tidak ada bengkel untuk ditampilkan</p>
                </div>
            `;
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
<?php endif; ?><?php /**PATH C:\laragon\www\sibantar\resources\views/user/search.blade.php ENDPATH**/ ?>