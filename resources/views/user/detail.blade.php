<x-layout-user>
    <x-slot:title>Detail Bengkel - SIBANTAR</x-slot:title>

    <!-- Bengkel Image -->
    <section class="relative mt-6">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="h-64 bg-neutral-200 relative overflow-hidden rounded-b-md">
                    <img src="{{ asset('images/bengkel.jpeg') }}" alt="Bengkel" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="bg-white">
        <div class="container mx-auto px-4 py-6">
            <div class="max-w-4xl mx-auto">
            <!-- Bengkel Title & Rating -->
            <div class="mb-6">
                <div class="flex gap-4 mt-4 mb-8">
                    <!-- Back Button -->
                    <a href="{{ $backUrl ?? url('/user/search') }}" class="flex-shrink-0 mt-2">
                        <svg class="w-6 h-6 text-neutral-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <h2 class="text-3xl font-bold text-neutral-900">{{ $bengkel->nama_bengkel }}</h2>
                </div>

                <div class="flex items-center gap-2 mb-3">
                    <div class="flex text-warning-500">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                    </div>
                    <span class="font-bold text-neutral-900">5.0</span>
                    <span class="text-neutral-600 text-sm">(124 Ulasan)</span>
                </div>
                
                <!-- Distance & Time -->
                <div class="flex items-center gap-4 text-sm text-neutral-600">
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>0.6 km</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>15 menit</span>
                    </div>
                </div>

                <!-- Price Range -->
                <div class="mt-3">
                    <p class="text-lg font-bold text-secondary-600">
                        Rp {{ number_format($layanan_bengkel->harga_awal, 0, ',', '.') }}
                        -
                        Rp {{ number_format($layanan_bengkel->harga_akhir, 0, ',', '.') }}
                    </p>
                    <p class="text-sm text-neutral-500">Estimasi Biaya untuk Layanan {{ $layanan_bengkel->nama_layanan}} Pada {{ $layanan_bengkel->kategori}}</p>
                </div>

                <!-- Description -->
                <div class="mt-4">
                    <h1 class="text-lg mt-2 mb-2">Tentang Layanan:</h1>
                    <p class="text-neutral-700 leading-relaxed">
                        {{ $layanan_bengkel->deskripsi}}
                    </p>
                </div>
            </div>

            <!-- Lokasi & Kontak Section -->
            <div class="border-t border-neutral-200 pt-6 mb-6">
                <h3 class="text-lg font-bold text-neutral-900 mb-4">Lokasi & Kontak</h3>
                
                <div class="space-y-4">
                    <!-- Alamat -->
                    <div class="flex gap-3">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="font-medium text-neutral-900">{{ $bengkel->alamat_lengkap}}</p>
                            <p class="text-sm text-neutral-600">Kecamatan {{ $bengkel->kecamatan}}, Kota Banjarmasin</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex gap-3">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="font-medium text-neutral-900">{{ $bengkel->user->wa_number }}</p>
                            <p class="text-sm text-neutral-600">Nomor WhatsApp Bengkel</p>
                        </div>
                    </div>

                    <!-- Jam Operasional -->
                    <div class="flex gap-3">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="font-medium text-neutral-900">{{ $bengkel->jam_operasional }} WITA</p>
                            <p class="text-sm text-neutral-600">Jam Operasional Bengkel</p>
                        </div>
                    </div>
                </div>

                <!-- Button Lihat Rute -->
                <a href="{{ $bengkel->link_gmaps }}" target="_blank" rel="noopener noreferrer">
                    <button class="w-full mt-6 bg-neutral-200 text-neutral-700 py-3 rounded-xl font-semibold hover:bg-neutral-300 transition">
                        Lihat Rute di Peta
                    </button>
                </a>
            </div>

            <!-- Layanan & Harga Section -->
            <div class="border-t border-neutral-200 pt-6 mb-6">
                <h3 class="text-lg font-bold text-neutral-900 mb-4">Layanan & Harga</h3>
                
                <div class="space-y-3">
                    <div class="flex justify-between items-start py-3 border-b border-neutral-100">
                        <div>
                            <h4 class="font-semibold text-neutral-900 mb-1">{{ $layanan_bengkel->nama_layanan }}</h4>
                            <p class="font-bold text-secondary-600">
                                    Rp {{ number_format($layanan_bengkel->harga_awal, 0, ',', '.') }} 
                                    - 
                                    Rp {{ number_format($layanan_bengkel->harga_akhir, 0, ',', '.') }}
                            </p>
                            <p class="text-sm text-neutral-600">{{ $layanan_bengkel->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ulasan Pelanggan Section -->
            <div class="border-t border-neutral-200 pt-6 mb-20">
                <h3 class="text-lg font-bold text-neutral-900 mb-4">Ulasan Pelanggan</h3>

                @if($reviews->count() > 0)
                <div class="space-y-4 max-h-96 overflow-y-auto">
                    @foreach($reviews as $review)
                    <div class="bg-white rounded-lg shadow-sm border border-neutral-200 p-4">
                        <div class="flex items-start justify-between mb-2">
                            <div>
                                <p class="font-semibold text-neutral-900">{{ $review->user->name ?? 'User' }}</p>
                                <div class="flex items-center gap-4 mt-1">
                                    {{-- Rating Bengkel --}}
                                    <div class="flex items-center gap-1">
                                        <span class="text-xs text-neutral-500">Bengkel:</span>
                                        <div class="flex">
                                            @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-4 h-4 {{ $i <= $review->ratingBengkel ? 'text-yellow-400' : 'text-neutral-300' }}" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                            </svg>
                                            @endfor
                                        </div>
                                    </div>

                                    {{-- Rating Layanan --}}
                                    <div class="flex items-center gap-1">
                                        <span class="text-xs text-neutral-500">Layanan:</span>
                                        <div class="flex">
                                            @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-4 h-4 {{ $i <= $review->ratingLayanan ? 'text-yellow-400' : 'text-neutral-300' }}" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                            </svg>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="text-xs text-neutral-500">{{ $review->created_at->diffForHumans() }}</span>
                        </div>

                        @if($review->comment)
                        <p class="text-neutral-700 text-sm mt-2">{{ $review->comment }}</p>
                        @endif
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-8 text-neutral-500">
                    <svg class="w-16 h-16 mx-auto mb-3 text-neutral-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                    <p>Belum ada review</p>
                </div>
                @endif
            </div>

            </div>
        </div>
    </section>

    <!-- Bottom Action Buttons -->
        <!-- Bottom Action Buttons -->
    <section class="fixed bottom-0 left-0 right-0 bg-white border-t border-neutral-200 py-4 z-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="flex justify-center">
                    <div class="w-full">
                        <a href="{{ route('user.bengkel.confirmation', [
                            'id_bengkel' => $bengkel->id_bengkel,
                            'id_layanan' => $layanan_bengkel->id_layanan_bengkel
                        ]) }}" class="btn btn-primary w-full px-3">
                            Pesan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout-user>