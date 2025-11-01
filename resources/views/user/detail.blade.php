<x-layout-simple>
    <x-slot:title>Bengkel Jaya Motor - SIBANTAR</x-slot:title>

    <!-- Hero Image Section -->
    <section class="relative">
        <!-- Back Button -->
        <div class="absolute top-4 left-4 z-10">
            <a href="/bengkel/search" class="w-10 h-10 bg-white rounded-full shadow-lg flex items-center justify-center hover:bg-neutral-50 transition">
                <svg class="w-5 h-5 text-neutral-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
        </div>

        <!-- Bengkel Image -->
        <div class="h-64 sm:h-80 bg-neutral-200 relative overflow-hidden">
             <img src="{{ asset('images/bengkel.jpeg') }}" alt="Bengkel" class="w-full h-full object-cover">
            
            <!-- Badge Buka/Tutup -->
            <div class="absolute bottom-4 right-4">
                <span class="bg-success-500 text-white px-3 py-1.5 rounded-full text-sm font-medium shadow-lg">
                    <span class="inline-block w-2 h-2 bg-white rounded-full mr-1.5 animate-pulse"></span>
                    Buka Sekarang
                </span>
            </div>
        </div>
    </section>

    <!-- Bengkel Info Section -->
    <section class="bg-white border-b border-neutral-200">
        <div class="container mx-auto px-4 py-6">
            <div class="max-w-4xl mx-auto">
            <!-- Title & Rating -->
            <div class="mb-4">
                <h1 class="text-2xl sm:text-3xl font-bold text-neutral-900 mb-2">Bengkel Jaya Motor</h1>
                <div class="flex items-center gap-2 mb-3">
                    <div class="flex text-warning-500">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                    </div>
                    <span class="text-lg font-bold text-neutral-900">5.0</span>
                    <span class="text-neutral-500">(124 Ulasan)</span>
                </div>
                <p class="text-neutral-600 text-sm">Spesialis Motor - Ban Bocor, Aki, Servis Rutin</p>
            </div>

            <!-- Quick Info Cards -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-6">
                <!-- Distance -->
                <div class="bg-neutral-50 rounded-xl p-3 text-center">
                    <svg class="w-6 h-6 text-primary-700 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    </svg>
                    <p class="text-xs text-neutral-500">Jarak</p>
                    <p class="font-bold text-neutral-900">0.6 km</p>
                </div>

                <!-- Time -->
                <div class="bg-neutral-50 rounded-xl p-3 text-center">
                    <svg class="w-6 h-6 text-primary-700 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-xs text-neutral-500">Waktu</p>
                    <p class="font-bold text-neutral-900">15 menit</p>
                </div>

                <!-- Price Range -->
                <div class="bg-neutral-50 rounded-xl p-3 text-center col-span-2 sm:col-span-2">
                    <svg class="w-6 h-6 text-primary-700 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-xs text-neutral-500">Estimasi Biaya</p>
                    <p class="font-bold text-secondary-600">Rp 25.000 - Rp 50.000</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="grid grid-cols-2 gap-3">
                <a href="https://wa.me/628123456789?text=Halo%20Bengkel%20Jaya%20Motor,%20saya%20butuh%20bantuan" target="_blank" class="btn btn-outline flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                    Hubungi
                </a>
                <button id="btnPesan" class="btn btn-primary flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Pesan Sekarang
                </button>
            </div>
            </div>
        </div>
    </section>

    <!-- Tabs Section -->
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-40">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
            <div class="flex gap-6 overflow-x-auto">
                <button class="tab-btn active py-4 border-b-2 border-primary-700 text-primary-700 font-medium whitespace-nowrap" data-tab="info">
                    Informasi
                </button>
                <button class="tab-btn py-4 border-b-2 border-transparent text-neutral-600 font-medium whitespace-nowrap hover:text-primary-700" data-tab="layanan">
                    Layanan
                </button>
                <button class="tab-btn py-4 border-b-2 border-transparent text-neutral-600 font-medium whitespace-nowrap hover:text-primary-700" data-tab="ulasan">
                    Ulasan
                </button>
                <button class="tab-btn py-4 border-b-2 border-transparent text-neutral-600 font-medium whitespace-nowrap hover:text-primary-700" data-tab="lokasi">
                    Lokasi
                </button>
            </div>
            </div>
        </div>
    </section>

    <!-- Tab Content -->
    <section class="bg-neutral-50 py-6">
        <div class="container mx-auto px-4 space-y-4">

            <!-- Tab: Informasi -->
            <div id="tab-info" class="tab-content">
                <!-- Jam Operasional -->
                <div class="card p-6 mb-4">
                    <h3 class="font-bold text-lg mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Jam Operasional
                    </h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between"><span>Senin - Jumat</span><span class="font-medium">08:00 - 17:00</span></div>
                        <div class="flex justify-between"><span>Sabtu</span><span class="font-medium">08:00 - 15:00</span></div>
                        <div class="flex justify-between"><span>Minggu</span><span class="font-medium text-danger-600">Tutup</span></div>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="card p-6">
                    <h3 class="font-bold text-lg mb-3">Tentang Bengkel</h3>
                    <p class="text-neutral-600 text-sm leading-relaxed">
                        Bengkel Jaya Motor adalah bengkel motor terpercaya yang telah berpengalaman lebih dari 10 tahun. 
                        Kami melayani berbagai jenis perbaikan motor mulai dari servis rutin, ganti ban, aki, hingga perbaikan mesin. 
                        Tim mekanik kami profesional dan berpengalaman.
                    </p>
                </div>
            </div>

            <!-- Tab: Layanan -->
            <div id="tab-layanan" class="tab-content hidden">
                <div class="card p-6">
                    <h3 class="font-bold text-lg mb-4">Daftar Layanan</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center py-3 border-b border-neutral-200">
                            <div>
                                <p class="font-medium">Ganti Ban</p>
                                <p class="text-xs text-neutral-500">Ban tubeless & ban dalam</p>
                            </div>
                            <span class="text-secondary-600 font-bold">Rp 25.000</span>
                        </div>
                        <div class="flex justify-between items-center py-3 border-b border-neutral-200">
                            <div>
                                <p class="font-medium">Ganti Aki</p>
                                <p class="text-xs text-neutral-500">Berbagai merk tersedia</p>
                            </div>
                            <span class="text-secondary-600 font-bold">Rp 150.000</span>
                        </div>
                        <div class="flex justify-between items-center py-3 border-b border-neutral-200">
                            <div>
                                <p class="font-medium">Servis Rutin</p>
                                <p class="text-xs text-neutral-500">Ganti oli & tune up</p>
                            </div>
                            <span class="text-secondary-600 font-bold">Rp 50.000</span>
                        </div>
                        <div class="flex justify-between items-center py-3">
                            <div>
                                <p class="font-medium">Perbaikan Mesin</p>
                                <p class="text-xs text-neutral-500">Konsultasi gratis</p>
                            </div>
                            <span class="text-secondary-600 font-bold">Varies</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab: Ulasan -->
            <div id="tab-ulasan" class="tab-content hidden">
                <div class="space-y-4">
                    <!-- Review Card -->
                    <div class="card p-6">
                        <div class="flex items-start gap-3 mb-3">
                            <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-primary-700 font-bold">A</span>
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold text-neutral-900">Ahmad Hidayat</p>
                                <div class="flex items-center gap-2 mt-1">
                                    <div class="flex text-warning-500">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    </div>
                                    <span class="text-xs text-neutral-500">2 hari lalu</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-neutral-600">
                            Pelayanan cepat dan mekaniknya ramah. Ban motor saya bocor dan langsung diperbaiki dalam 15 menit. 
                            Harga juga terjangkau. Recommended!
                        </p>
                    </div>

                    <!-- More reviews... -->
                    <div class="card p-6">
                        <div class="flex items-start gap-3 mb-3">
                            <div class="w-10 h-10 bg-secondary-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-secondary-700 font-bold">B</span>
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold text-neutral-900">Budi Santoso</p>
                                <div class="flex items-center gap-2 mt-1">
                                    <div class="flex text-warning-500">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    </div>
                                    <span class="text-xs text-neutral-500">1 minggu lalu</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-neutral-600">
                            Bengkel langganan saya. Sudah beberapa kali servis disini dan selalu puas dengan hasilnya. 
                            Mekaniknya jujur dan tidak mengada-ada.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tab: Lokasi -->
            <div id="tab-lokasi" class="tab-content hidden">
                <div class="card p-6">
                    <h3 class="font-bold text-lg mb-4">Alamat</h3>
                    <p class="text-neutral-600 mb-4">
                        Jl. Raya Bogor No. 123, Cibinong, Kabupaten Bogor, Jawa Barat 16914
                    </p>
                    
                    <!-- Map Placeholder -->
                    <div class="h-64 bg-neutral-200 rounded-xl mb-4">
                        <div class="flex items-center justify-center h-full text-neutral-500">
                            <div class="text-center">
                                <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                                <p>Map akan tampil disini</p>
                            </div>
                        </div>
                    </div>

                    <a href="https://maps.google.com" target="_blank" class="btn btn-primary w-full">
                        Buka di Google Maps
                    </a>
                </div>
            </div>
            </div>

        </div>
    </section>

    <!-- Confirmation Modal -->
    <div id="confirmationModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-md w-full shadow-xl">
            <!-- Modal Header -->
            <div class="p-6 border-b border-neutral-200">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold text-neutral-900">Konfirmasi Pesanan</h3>
                    <button id="closeModal" class="text-neutral-400 hover:text-neutral-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="p-6 space-y-4">
                <!-- Service Info -->
                <div class="bg-neutral-50 rounded-xl p-4">
                    <p class="text-sm text-neutral-600 mb-1">Layanan</p>
                    <p id="serviceName" class="font-bold text-neutral-900">Ganti Ban</p>
                </div>

                <!-- Price Breakdown -->
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-neutral-600">Harga Layanan</span>
                        <span id="servicePrice" class="font-semibold text-neutral-900">Rp 100.000</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-neutral-600">Ongkos Datang</span>
                        <span id="deliveryFee" class="font-semibold text-neutral-900">Rp 20.000</span>
                    </div>
                    <div id="nightFeeRow" class="flex justify-between items-center hidden">
                        <span class="text-neutral-600">Biaya Malam <span class="text-xs">(20:00-06:00)</span></span>
                        <span id="nightFee" class="font-semibold text-secondary-600">Rp 30.000</span>
                    </div>
                    
                    <div class="border-t border-neutral-200 pt-3 mt-3">
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-neutral-900">Total</span>
                            <span id="totalPrice" class="font-bold text-xl text-primary-700">Rp 120.000</span>
                        </div>
                    </div>
                </div>

                <!-- Note -->
                <div class="bg-warning-50 border border-warning-200 rounded-lg p-3">
                    <p class="text-xs text-warning-800">
                        <strong>Catatan:</strong> Harga final dapat berbeda tergantung kondisi kendaraan setelah diperiksa mekanik.
                    </p>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="p-6 border-t border-neutral-200">
                <div class="grid grid-cols-2 gap-3">
                    <button id="cancelBtn" class="btn btn-outline">Batal</button>
                    <button id="confirmBtn" class="btn btn-primary">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Tab functionality
        const tabButtons = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetTab = button.dataset.tab;

                // Remove active class from all buttons
                tabButtons.forEach(btn => {
                    btn.classList.remove('active', 'border-primary-700', 'text-primary-700');
                    btn.classList.add('border-transparent', 'text-neutral-600');
                });

                // Add active class to clicked button
                button.classList.add('active', 'border-primary-700', 'text-primary-700');
                button.classList.remove('border-transparent', 'text-neutral-600');

                // Hide all tab contents
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });

                // Show target tab content
                document.getElementById(`tab-${targetTab}`).classList.remove('hidden');
            });
        });

        // Confirmation Modal functionality
        const btnPesan = document.getElementById('btnPesan');
        const confirmationModal = document.getElementById('confirmationModal');
        const closeModal = document.getElementById('closeModal');
        const cancelBtn = document.getElementById('cancelBtn');
        const confirmBtn = document.getElementById('confirmBtn');

        // Function to check if current time is night (20:00 - 06:00)
        function isNightTime() {
            const now = new Date();
            const hour = now.getHours();
            return hour >= 20 || hour < 6;
        }

        // Function to calculate total price
        function calculateTotal() {
            const servicePrice = 100000; // Contoh harga layanan
            const deliveryFee = 20000; // Ongkos datang
            const nightFee = isNightTime() ? 30000 : 0; // Biaya malam jika berlaku

            return {
                servicePrice,
                deliveryFee,
                nightFee,
                total: servicePrice + deliveryFee + nightFee
            };
        }

        // Function to format currency
        function formatCurrency(amount) {
            return 'Rp ' + amount.toLocaleString('id-ID');
        }

        // Show modal when "Pesan Sekarang" clicked
        btnPesan.addEventListener('click', () => {
            const prices = calculateTotal();
            
            // Update modal content
            document.getElementById('serviceName').textContent = 'Ganti Ban'; // Bisa diganti sesuai layanan yang dipilih
            document.getElementById('servicePrice').textContent = formatCurrency(prices.servicePrice);
            document.getElementById('deliveryFee').textContent = formatCurrency(prices.deliveryFee);
            document.getElementById('totalPrice').textContent = formatCurrency(prices.total);

            // Show/hide night fee based on time
            const nightFeeRow = document.getElementById('nightFeeRow');
            if (prices.nightFee > 0) {
                nightFeeRow.classList.remove('hidden');
                document.getElementById('nightFee').textContent = formatCurrency(prices.nightFee);
            } else {
                nightFeeRow.classList.add('hidden');
            }

            // Show modal
            confirmationModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        });

        // Close modal functions
        function hideModal() {
            confirmationModal.classList.add('hidden');
            document.body.style.overflow = 'auto'; // Restore scrolling
        }

        closeModal.addEventListener('click', hideModal);
        cancelBtn.addEventListener('click', hideModal);

        // Close modal when clicking outside
        confirmationModal.addEventListener('click', (e) => {
            if (e.target === confirmationModal) {
                hideModal();
            }
        });

        // Confirm button action
        confirmBtn.addEventListener('click', () => {
            // Redirect ke halaman waiting confirmation
            window.location.href = '{{ url("/bengkel/waiting-confirmation") }}';
        });
    </script>
    @endpush

</x-layout-simple>
