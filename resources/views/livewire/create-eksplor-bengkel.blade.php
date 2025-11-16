<div class="max-w-7xl mx-auto px-4 py-6">
    <!-- Filter Kecamatan -->
    <div class="card p-6 mb-6">
        <h2 class="text-xl font-bold text-neutral-900 mb-4">Filter Bengkel per Kecamatan</h2>
        
        <div class="flex flex-wrap gap-3">
            <!-- Button Semua -->
            <button 
                wire:click="showAll" 
                class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300
                {{ $selectedKecamatan === 'all' ? 'bg-primary-600 text-white shadow-md' : 'bg-neutral-100 text-neutral-700 hover:bg-neutral-200' }}">
                Semua Kecamatan
            </button>

            <!-- Button per Kecamatan -->
            @foreach($kecamatanList as $kecamatan)
                <button 
                    wire:click="filterByKecamatan('{{ $kecamatan }}')" 
                    class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300
                    {{ $selectedKecamatan === $kecamatan ? 'bg-primary-600 text-white shadow-md' : 'bg-neutral-100 text-neutral-700 hover:bg-neutral-200' }}">
                    {{ $kecamatan }}
                </button>
            @endforeach
        </div>
    </div>

    <!-- Daftar Bengkel -->
    <div class="card p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-neutral-900">
                    @if($selectedKecamatan === 'all')
                        Semua Bengkel
                    @else
                        Bengkel di {{ $selectedKecamatan }}
                    @endif
                </h2>
                <p class="text-sm text-neutral-600 mt-1">
                    Ditemukan {{ count($bengkels) }} bengkel
                </p>
            </div>
        </div>

        @if(count($bengkels) > 0)
            <!-- Grid Bengkel Cards -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                @foreach($bengkels as $bengkel)
                    <div class="card p-4 hover:shadow-lg transition-all duration-300 cursor-pointer border border-neutral-200">
                        <div class="flex gap-4">
                            <!-- Bengkel Image -->
                            <div class="w-20 h-20 sm:w-24 sm:h-24 bg-neutral-200 rounded-xl flex-shrink-0 overflow-hidden">
                                <img src="{{ asset('images/bengkel.jpeg') }}" alt="{{ $bengkel->nama_bengkel }}" class="w-full h-full object-cover">
                            </div>

                            <!-- Bengkel Info -->
                            <div class="flex-1 min-w-0">
                                <h3 class="font-semibold text-lg text-neutral-900 mb-1 truncate">
                                    {{ $bengkel->nama_bengkel }}
                                </h3>
                                
                                <!-- Kecamatan Badge -->
                                <div class="mb-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-100 text-primary-800">
                                        {{ $bengkel->kecamatan }}
                                    </span>
                                </div>

                                <!-- Alamat -->
                                <p class="text-xs text-neutral-600 mb-2 line-clamp-2">
                                    {{ $bengkel->alamat_lengkap ?? 'Alamat tidak tersedia' }}
                                </p>

                                <!-- Jam Operasional -->
                                <div class="flex items-center gap-2 text-xs text-neutral-600 mb-3">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="font-medium">{{ $bengkel->jam_operasional }}</span>
                                </div>

                                <!-- Actions -->
                                <div class="flex gap-2">
                                    <a href="{{ route('user.dashboard', $bengkel->id_bengkel) }}" 
                                       class="btn btn-outline btn-sm flex-1 text-center">
                                        Detail
                                    </a>
                                    <a href="{{ route('user.dashboard', $bengkel->id_bengkel) }}" 
                                       class="btn btn-primary btn-sm flex-1 text-center">
                                        Pesan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <svg class="mx-auto h-16 w-16 text-neutral-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-lg font-semibold text-neutral-900 mb-1">
                    Belum Ada Bengkel
                </h3>
                <p class="text-sm text-neutral-600">
                    @if($selectedKecamatan === 'all')
                        Belum ada bengkel yang terdaftar
                    @else
                        Belum ada bengkel di {{ $selectedKecamatan }}
                    @endif
                </p>
            </div>
        @endif
    </div>
</div>