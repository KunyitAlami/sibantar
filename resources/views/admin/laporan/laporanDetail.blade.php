<x-layout-admin>
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-50 shadow-sm">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="{{ route('admin.laporan.index') }}"
                   class="text-neutral-600 hover:text-primary-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <h1 class="font-bold text-xl text-neutral-900">Detail Laporan</h1>
            </div>
        </div>
    </section>

    <div class="container mx-auto px-4 py-6">
        <div class="max-w-4xl mx-auto">
            <!-- Jenis Laporan Badge -->
            <div class="mb-6">
                @if($type === 'user')
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-700 rounded-full text-sm font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Laporan dari User ke Bengkel
                    </span>
                @else
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-amber-50 text-amber-700 rounded-full text-sm font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        Laporan dari Bengkel ke User
                    </span>
                @endif
            </div>

            <!-- Card Informasi Pihak Terlibat -->
            <div class="bg-white shadow-md rounded-xl overflow-hidden mb-6">
                <div class="bg-gradient-to-r from-neutral-50 to-neutral-100 px-6 py-4 border-b border-neutral-200">
                    <h2 class="font-semibold text-lg text-neutral-800">Informasi Pihak Terlibat</h2>
                </div>
                <div class="p-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Pelapor -->
                        <div class="space-y-3">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-neutral-500 font-medium uppercase tracking-wide">Pelapor</p>
                                    <p class="text-base font-semibold text-neutral-900 mt-1">{{ $report->user->username ?? '-' }}</p>
                                    @if($report->user && $report->user->email)
                                        <p class="text-sm text-neutral-600 mt-0.5">{{ $report->user->email }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Bengkel -->
                        <div class="space-y-3">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-neutral-500 font-medium uppercase tracking-wide">Bengkel Terlapor</p>
                                    <p class="text-base font-semibold text-neutral-900 mt-1">{{ $report->bengkel->nama_bengkel ?? '-' }}</p>
                                    @if($report->bengkel && $report->bengkel->alamat_lengkap)
                                        <p class="text-sm text-neutral-600 mt-0.5">{{ Str::limit($report->bengkel->alamat_lengkap, 50) }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order ID -->
                    <div class="mt-6 pt-6 border-t border-neutral-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-neutral-500 font-medium uppercase tracking-wide">ID Order</p>
                                <p class="text-base font-semibold text-neutral-900 mt-1">#{{ $report->order->id_order ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Deskripsi Laporan -->
            <div class="bg-white shadow-md rounded-xl overflow-hidden mb-6">
                <div class="bg-gradient-to-r from-red-50 to-orange-50 px-6 py-4 border-b border-red-100">
                    <h2 class="font-semibold text-lg text-neutral-800 flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        Deskripsi Laporan
                    </h2>
                </div>
                <div class="p-6">
                    <p class="text-neutral-700 leading-relaxed whitespace-pre-line">{{ $report->deskripsi }}</p>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="bg-white shadow-md rounded-xl p-6">
                <h2 class="font-semibold text-lg text-neutral-800 mb-4">Tindakan Admin</h2>
                <div class="flex flex-wrap gap-3 w-full justify-center">
                    <!-- Hubungi Pelapor (User) -->
                    @if($report->user && $report->user->wa_number)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $report->user->wa_number) }}" 
                           target="_blank"
                           class="px-6 py-2.5 bg-green-500 hover:bg-green-600 text-white font-medium rounded-lg transition-colors flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            Hubungi Pelapor
                        </a>
                    @endif

                    <!-- Hubungi Bengkel (via user bengkel) -->
                    @if($report->bengkel && $report->bengkel->user && $report->bengkel->user->wa_number)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $report->bengkel->user->wa_number) }}" 
                           target="_blank"
                           class="px-6 py-2.5 bg-amber-500 hover:bg-amber-600 text-white font-medium rounded-lg transition-colors flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            Hubungi Bengkel
                        </a>
                    @endif

                    <!-- Hapus Laporan -->
                    <form action="{{ route('admin.laporan.hapus', ['type' => $type, 'id' => $report->getKey()]) }}" 
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                        @csrf
                        @method('DELETE')

                        <button 
                            class="px-6 py-2.5 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg transition-colors flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Hapus Laporan
                        </button>
                    </form>

                </div>
        </div>
    </div>
</x-layout-admin>