<div class="max-w-7xl mx-auto px-4 py-6">
    <!-- Filter Kecamatan (dropdown) -->
    <div class="card p-6 mb-3">
        <h2 class="text-xl font-bold text-neutral-900 mb-4">Filter Bengkel per Kecamatan</h2>

        <div class="relative w-72">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none z-10">
                <svg class="w-4 h-4 text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10h18v10a1 1 0 01-1 1H4a1 1 0 01-1-1V10z"/>
                </svg>
            </span>
            <select wire:model="selectedKecamatan" wire:change="filterByKecamatan($event.target.value)" class="block w-full pl-10 pr-4 py-3 rounded-xl border border-neutral-200 bg-white text-neutral-900 focus:outline-none focus:ring-2 focus:ring-primary-200">
                <option value="all">Semua Kecamatan</option>
                @foreach($kecamatanList as $kecamatan)
                    <option value="{{ $kecamatan }}">{{ $kecamatan }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Daftar Bengkel -->
    <div class="card p-6">
        <div class="flex items-center justify-between mb-3">
            <div>
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