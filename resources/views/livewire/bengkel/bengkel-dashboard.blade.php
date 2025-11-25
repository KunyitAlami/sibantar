<div class="space-y-6">
    {{-- BUTTON PANEL --}}

    {{-- Mobile: use a compact dropdown instead of horizontal buttons --}}
    <div class="sm:hidden">
        <select wire:change="setPanel($event.target.value)" aria-label="Pilih panel" class="block w-full bg-white border border-neutral-200 rounded-full px-4 py-2 text-sm font-semibold" style="height: 55px;">
            <option value="order" @selected($activePanel === 'order')>Pesanan</option>
            <option value="layanan" @selected($activePanel === 'layanan')>Layanan</option>
            <option value="report" @selected($activePanel === 'report')>Lapor</option>
            <option value="about" @selected($activePanel === 'about')>Tentang</option>
        </select>
    </div>

    {{-- Desktop / tablet: horizontal buttons --}}
    <div class="hidden sm:flex gap-3">
        <button wire:click="setPanel('order')" 
            class="px-4 py-2 rounded-lg font-semibold 
                {{ $activePanel === 'order' ? 'bg-blue-700 text-white' : 'bg-neutral-200' }}">
            Pesanan
        </button>

        <button wire:click="setPanel('layanan')" 
            class="px-4 py-2 rounded-lg font-semibold 
                {{ $activePanel === 'layanan' ? 'bg-blue-700 text-white' : 'bg-neutral-200' }}">
            Layanan
        </button>

        <button wire:click="setPanel('report')" 
            class="px-4 py-2 rounded-lg font-semibold 
                {{ $activePanel === 'report' ? 'bg-blue-700 text-white' : 'bg-neutral-200' }}">
            Lapor
        </button>

        <button wire:click="setPanel('about')" 
            class="px-4 py-2 rounded-lg font-semibold 
                {{ $activePanel === 'about' ? 'bg-blue-700 text-white' : 'bg-neutral-200' }}">
            Tentang
        </button>
    </div>


    {{-- PANEL CONTENT --}}
    <div class="mt-6">

        {{-- ABOUT --}}
        @if($activePanel === 'about')
            <div class="card p-5 shadow-md mt-6">
                <h2 class="text-xl font-bold mb-3">Profil Bengkel</h2>
                <p class="text-neutral-700">Nama: <strong>{{ $bengkel->nama_bengkel }}</strong></p>
                <p class="text-neutral-700">Alamat: {{ $bengkel->alamat_lengkap }}</p>
                <p class="text-neutral-700">Kecamatan: {{ $bengkel->kecamatan }}</p>
                <p class="text-neutral-700">Jam: {{ $bengkel->jam_operasional }}</p>
            </div>
        @endif

        {{-- PESANAN --}}
        @if ($activePanel === 'order')
        <div wire:poll.keep-alive.1000ms="loadOrders">
            <div class="card p-5 shadow-md">
                <h2 class="text-xl font-bold mb-4">Daftar Pesanan</h2>
                @forelse($orders as $order)
                    @php
                        $statusColor = [
                            'pending' => 'bg-yellow-100 text-yellow-700',
                            'dibayar' => 'bg-green-100 text-green-700',
                            'diproses' => 'bg-blue-100 text-blue-700',
                            'selesai'  => 'bg-green-100 text-green-700',
                            'gagal'    => 'bg-red-100 text-red-700',
                            'ditolak'  => 'bg-red-100 text-red-700',
                            'dibatalkan' => 'bg-gray-100 text-gray-700',
                            'menunggu_konfirmasi' => 'bg-yellow-100 text-yellow-700',
                            'berhasil' => 'bg-green-100 text-green-700',
                        ];
                        $statusLabels = [
                            'menunggu_konfirmasi' => 'Menunggu Konfirmasi',
                            'pending' => 'Pending',
                            'dibayar' => 'Dibayar',
                            'diproses' => 'Diproses',
                            'selesai' => 'Selesai',
                            'ditolak' => 'Ditolak',
                            'dibatalkan' => 'Dibatalkan',
                            'gagal' => 'Gagal',
                            'berhasil' => 'Berhasil',
                        ];
                    @endphp

                    <div class="bg-white rounded-xl p-5 mb-4 shadow-sm border border-neutral-200 hover:shadow-md transition-all">
                        {{-- Header --}}
                        <div class="flex items-start justify-between mb-3">
                            <div>
                                <h3 class="font-bold text-lg text-neutral-900">{{ $order->user->username }}</h3>
                                
                                {{-- Jarak --}}
                                <div class="flex items-center gap-2 text-sm text-neutral-500 mt-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                    <span>
                                        @if(isset($order->distance_km) && $order->distance_km)
                                            {{ $order->distance_km }} km dari bengkel
                                        @else
                                            Jarak tidak tersedia
                                        @endif
                                    </span>
                                </div>

                                {{-- Kategori --}}
                                <div class="flex items-center gap-2 text-sm text-neutral-500 mt-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>
                                    <span>
                                        @if(isset($order->layananBengkel->kategori) && $order->layananBengkel->kategori)
                                            Kategori: {{ $order->layananBengkel->kategori }}
                                        @else
                                            Kategori tidak tersedia
                                        @endif
                                    </span>
                                </div>

                                {{-- Nama Layanan --}}
                                <div class="flex items-center gap-2 text-sm text-neutral-500 mt-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                    <span>
                                        @if(isset($order->layananBengkel->nama_layanan) && $order->layananBengkel->nama_layanan)
                                            Jenis Layanan: {{ $order->layananBengkel->nama_layanan }}
                                        @else
                                            Jenis Layanan tidak tersedia
                                        @endif
                                    </span>
                                </div>
                            </div>
                            
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $statusColor[$order->status] ?? 'bg-gray-100 text-gray-800' }}">
                                {{ $statusLabels[$order->status] ?? ucfirst($order->status) }}
                            </span>
                        </div>
                        
                        {{-- Body --}}
                        <div class="p-3 border-t border-b bg-neutral-50 rounded-lg">
                            <p class="text-sm text-neutral-600 mt-1">
                                Harga: <span class="font-medium">Rp {{ number_format($order->total_bayar ?? 0, 0, ',', '.') }}</span>
                            </p>
                        </div>

                        {{-- Footer --}}
                        <div class="mt-3 text-sm text-neutral-600"
                            x-data="{
                                countdown_ms: {{ $order->countdown_ms ?? 0 }},
                                now: 0,
                                diff: {{ $order->countdown_ms ?? 0 }},
                                isActive: {{ $order->countdown_active ? 'true' : 'false' }},
                                isConfirmed: '{{ $order->countDown?->status ?? '' }}' === 'terkonfirmasi',
                                orderStatus: '{{ $order->status }}',
                                autoRejectTriggered: false
                            }" 
                            x-init="
                                console.log('Order #{{ $order->id_order }}', {
                                    countdown_ms: countdown_ms,
                                    isActive: isActive,
                                    isConfirmed: isConfirmed,
                                    countDownStatus: '{{ $order->countDown?->status ?? 'NULL' }}',
                                    orderStatus: orderStatus
                                });
                                
                                if(isActive && !isConfirmed && countdown_ms > 0){
                                    let interval = setInterval(() => {
                                        now += 1000;
                                        diff = countdown_ms - now;
                                        
                                        // AUTO REJECT ketika timer habis
                                        if(diff <= 0 && !autoRejectTriggered){
                                            diff = 0;
                                            isActive = false;
                                            autoRejectTriggered = true;
                                            
                                            console.log('⏰ Timer habis! Auto-rejecting order #{{ $order->id_order }}');
                                            
                                            // Panggil method auto reject dari Livewire
                                            $wire.autoRejectOrder({{ $order->id_order }});
                                            
                                            clearInterval(interval);
                                        }
                                    }, 1000);
                                }
                            "
                        >
                            {{-- Countdown Display --}}
                            @if($order->countdown_ms !== null && $order->countdown_ms > 0 && $order->status !== 'ditolak')
                                <div class="mb-3">
                                    <span x-show="!isConfirmed && diff > 0"
                                        x-text="'Sisa waktu: ' + Math.floor(diff/60000).toString().padStart(2,'0') + ':' + Math.floor((diff%60000)/1000).toString().padStart(2,'0')"
                                        class="font-semibold text-red-600">
                                    </span>

                                    <span x-show="isConfirmed" class="font-semibold text-green-600">
                                        ✓ Pesanan sudah dikonfirmasi
                                    </span>

                                    {{-- Jika waktu habis --}}
                                    <span x-show="!isConfirmed && diff <= 0"
                                        class="font-semibold text-red-600">
                                        ⏰ Waktu habis - Menolak pesanan otomatis...
                                    </span>
                                </div>
                            @endif

                            {{-- Tombol Terima/Tolak --}}
                            @if($order->countDown?->status === 'tidak_dikonfirmasi' && !$order->countdown_confirmed && $order->status !== 'ditolak')
                                <div class="grid grid-cols-2 gap-2 mt-4" x-show="!isConfirmed && diff > 0">
                                    <button wire:click="rejectOrder({{ $order->id_order }})" 
                                            @click="isConfirmed = true; orderStatus = 'ditolak'; $el.disabled = true"
                                            class="py-2.5 text-sm font-semibold text-white bg-red-600 border border-red-700 rounded-lg hover:bg-red-700 transition-all disabled:opacity-50 disabled:cursor-not-allowed">
                                        Tolak Pesanan
                                    </button>
                                    <button wire:click="acceptOrder({{ $order->id_order }})" 
                                            @click="isConfirmed = true; orderStatus = 'pending'; $el.disabled = true"
                                            class="py-2.5 text-sm font-semibold text-white bg-green-600 border border-green-700 rounded-lg hover:bg-green-700 transition-all disabled:opacity-50 disabled:cursor-not-allowed">
                                        Terima Pesanan
                                    </button>
                                </div>
                            @endif

                            {{-- Tombol Lihat Detail - pending --}}
                            @if($order->status === 'pending' && $order->countDown->status === 'terkonfirmasi')
                                <div class="mt-4">
                                    <button 
                                        wire:click="gotoFinalPrice({{ $order->id_order }})"
                                        class="w-full py-2.5 text-sm font-semibold text-white bg-blue-600 border border-blue-700 rounded-lg hover:bg-blue-700 transition-all"
                                    >
                                        Lihat Detail & Tentukan Harga Final
                                    </button>
                                </div>
                            {{-- Tombol Lihat Detail - selesai --}}
                            @elseif($order->status === 'selesai' && $order->countDown?->status === 'terkonfirmasi')
                                <div class="space-y-2 mt-4 flex flex-col text-center">
                                    {{-- Tombol Cek Detail Pesanan --}}
                                    <a href="{{ route('bengkel.order-tracking', ['orderId' => $order->id_order]) }}"
                                    class="w-full py-2.5 text-sm font-semibold text-white bg-blue-600 border border-blue-700 rounded-lg hover:bg-blue-700 transition-all">
                                        Cek Detail Pesanan
                                    </a>

                                    {{-- Tombol Review --}}
                                    @if($order->has_review ?? false)
                                        <a href="{{ route('bengkel.cekReview.order', ['id_order' => $order->id_order]) }}"
                                        class="w-full py-2.5 text-sm font-semibold text-white bg-green-600 border border-green-700 rounded-lg hover:bg-green-700 transition-all disabled:opacity-50">
                                            Lihat Review Pelanggan
                                        </a>
                                    @else
                                        <button 
                                            disabled
                                            class="w-full py-2.5 text-sm font-semibold text-neutral-400 bg-neutral-200 border border-neutral-300 rounded-lg cursor-not-allowed"
                                        >
                                            Belum Ada Review dari Pelanggan
                                        </button>
                                    @endif
                                </div>
                            @endif

                            {{-- Info untuk order yang sudah ditolak --}}
                            @if($order->status === 'ditolak')
                                <div class="mt-4 p-3 bg-red-50 border border-red-200 rounded-lg">
                                    <p class="text-sm text-red-700">
                                        Pesanan ini telah ditolak
                                        @if($order->countDown?->status === 'tidak_dikonfirmasi')
                                            <span class="block mt-1">Waktu konfirmasi habis - ditolak otomatis</span>
                                        @endif
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-neutral-500">Belum ada pesanan.</p>
                @endforelse
            </div>
        </div>
        @endif



        {{-- LAYANAN --}}
        @if($activePanel === 'layanan')
            <div class="card p-4 sm:p-5 shadow-md">
                <h2 class="text-lg sm:text-xl font-bold mb-3">Daftar Layanan</h2>

                <div class="flex flex-col gap-2 mb-4">

                    <a href="{{ route('bengkel.tambahLayanan', ['id_bengkel' => $bengkel->id_bengkel]) }}" 
                    class="px-3 py-2 sm:px-4 sm:py-2 rounded-full font-semibold border border-blue-700 text-blue-700 hover:bg-blue-700 hover:text-white transition-all text-center">
                        Tambah Layanan Baru
                    </a>

                    {{-- <a href="{{ route('bengkel.tambahLayanan', ['id_bengkel' => $bengkel->id_bengkel]) }}" 
                    class="px-3 py-2 sm:px-4 sm:py-2 rounded-md font-semibold border border-yellow-600 text-yellow-500 hover:bg-yellow-600 hover:text-white transition-all text-center">
                        Edit Layanan
                    </a> --}}

                </div>


                @if($layanan->isEmpty())
                    <p class="text-neutral-500">Belum ada layanan.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[600px] mt-4">
                            <thead class="bg-neutral-100">
                                <tr class="text-center font-semibold text-neutral-700 text-xs sm:text-sm">
                                    <th class="px-3 py-2 sm:px-4 sm:py-3 uppercase tracking-wider">Nama Layanan</th>
                                    <th class="px-3 py-2 sm:px-4 sm:py-3 uppercase tracking-wider">Kategori</th>
                                    <th class="px-3 py-2 sm:px-4 sm:py-3 uppercase tracking-wider">Harga Terendah</th>
                                    <th class="px-3 py-2 sm:px-4 sm:py-3 uppercase tracking-wider">Harga Tertinggi</th>
                                    <th class="px-3 py-2 sm:px-4 sm:py-3 uppercase tracking-wider" colspan="2">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($layanan as $l)
                                <tr class="hover:bg-neutral-50 border-b text-center" wire:key="layanan-{{ $l->id_layanan_bengkel }}">
                                    <td class="px-3 py-2 sm:px-4 sm:py-3 text-sm sm:text-base font-medium text-neutral-900">
                                        {{ $l->nama_layanan }}
                                    </td>
                                    <td class="px-3 py-2 sm:px-4 sm:py-3 text-sm sm:text-base text-neutral-700">
                                        {{ $l->kategori }}
                                    </td>
                                    <td class="px-3 py-2 sm:px-4 sm:py-3 text-sm sm:text-base text-neutral-700">
                                        Rp {{ number_format($l->harga_awal, 0, ',', '.') }}
                                    </td>
                                    <td class="px-3 py-2 sm:px-4 sm:py-3 text-sm sm:text-base text-neutral-700">
                                        Rp {{ number_format($l->harga_akhir, 0, ',', '.') }}
                                    </td>
                                    <td class="px-3 py-2 sm:px-4 sm:py-3">
                                        <button onclick="confirmDelete(event, {{ $l->id_layanan_bengkel }}, '{{ $_instance->getId() }}')"
                                            wire:loading.attr="disabled"
                                            wire:target="hapusLayanan({{ $l->id_layanan_bengkel }})"
                                            class="px-3 py-1 sm:px-4 sm:py-2 rounded-full font-semibold border border-red-600 text-red-600 
                                                hover:bg-red-600 hover:text-white transition-all disabled:opacity-50 disabled:cursor-not-allowed">
                                            <span wire:loading.remove wire:target="hapusLayanan({{ $l->id_layanan_bengkel }})">Hapus</span>
                                            <span wire:loading wire:target="hapusLayanan({{ $l->id_layanan_bengkel }})">Hapus</span>
                                        </button>
                                    </td>
                                    <td class="p-2">
                                        <button wire:click="editLayanan({{ $l->id_layanan_bengkel }})"
                                            wire:loading.attr="disabled"
                                            wire:target="editLayanan({{ $l->id_layanan_bengkel }})"
                                            class="px-3 py-2 sm:px-4 sm:py-2 rounded-full font-semibold border border-yellow-600 text-yellow-500 hover:bg-yellow-600 hover:text-white transition-all text-center">
                                            <span wire:loading.remove wire:target="editLayanan({{ $l->id_layanan_bengkel }})">Edit</span>
                                            <span wire:loading wire:target="editLayanan({{ $l->id_layanan_bengkel }})">Edit</span>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        @endif



        {{-- REPORT --}}
        @if($activePanel === 'report')
            <div wire:poll.1000ms="loadOrders">
                <div class="card p-5 shadow-md">
                    <h2 class="text-xl font-bold mb-4">Daftar Pesanan</h2>
                    @forelse($orders as $order)
                        @php
                            // Dynamic status badge
                            $statusColor = match($order->status) {
                                'pending' => 'bg-yellow-100 text-yellow-700',
                                'dibayar' => 'bg-green-100 text-green-700',
                                'diproses' => 'bg-blue-100 text-blue-700',
                                'selesai'  => 'bg-green-100 text-green-700',
                                'gagal'    => 'bg-red-100 text-red-700',
                                'ditolak'  => 'bg-red-100 text-red-700',
                                'dibatalkan' => 'bg-gray-100 text-gray-700',
                                default    => 'bg-gray-100 text-gray-700',
                            };
                            $statusLabels = [
                                'menunggu_konfirmasi' => 'Menunggu Konfirmasi',
                                'pending' => 'Pending',
                                'dibayar' => 'Dibayar',
                                'diproses' => 'Diproses',
                                'selesai' => 'Selesai',
                                'ditolak' => 'Ditolak',
                                'dibatalkan' => 'Dibatalkan',
                            ];
                        @endphp
                        <div class="booking-card card p-4 hover:shadow-lg transition-shadow mb-6" data-status="in-progress">
                            <div class="flex items-start justify-between mb-2">
                                <div>
                                    <h3 class="font-bold text-neutral-900">{{ $order->user->username }}</h3>
                                    <p class="text-xs text-neutral-500 mt-2">Tanggal Order: {{ $order->created_at }}</p>
                                </div>
                                @if($order->status === 'ditolak')
                                    <span class="px-2.5 py-1 text-xs font-semibold rounded-full whitespace-nowrap bg-red-100 text-red-700">
                                        {{ $statusLabels[$order->status] ?? 'Ditolak' }}
                                    </span>
                                @elseif($order->status === 'selesai')
                                    <span class="px-2.5 py-1 text-xs font-semibold rounded-full whitespace-nowrap bg-green-100 text-green-700">
                                        {{ $statusLabels[$order->status] ?? 'Selesai' }}
                                    </span>
                                @elseif(isset($statusColor[$order->status]))
                                    <span class="px-2.5 py-1 text-xs font-semibold rounded-full whitespace-nowrap {{ $statusColor[$order->status] }}">
                                        {{ $statusLabels[$order->status] ?? ucfirst($order->status) }}
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 text-xs font-semibold rounded-full whitespace-nowrap bg-gray-100 text-gray-800">
                                        {{ $statusLabels[$order->status] ?? ucfirst($order->status) }}
                                    </span>
                                @endif
                            </div>

                            <div class="space-y-1 mb-3">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-neutral-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-sm text-neutral-600">Jenis Pelayanan: {{ $order->layananBengkel->nama_layanan }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-neutral-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-sm text-neutral-600">Jenis Kendaraaan: {{ $order->layananBengkel->kategori }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-neutral-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-sm text-neutral-600 truncate">{{ $order->bengkel->alamat_lengkap }}</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-3 border-t border-neutral-100">
                                <span class="font-bold text-xl text-primary-700">
                                    Rp {{ number_format($order->total_bayar, 0, ',', '.') }}
                                </span>
                                <div class="flex gap-2">
                                    <a href="{{ route('bengkel.report.order', $order->id_order) }}" class="btn btn-sm btn-outline btn-error">
                                        Lapor
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-neutral-500">Belum ada pesanan, anda tidak bisa melaporkan pesanan</p>
                    @endforelse
                </div>

            </div>

        @endif

    </div>
</div>

<script>
    function _showDeleteSwal(id, instanceId) {
        Swal.fire({
            title: 'Hapus layanan?',
            text: 'Layanan akan dihapus permanen. Lanjutkan?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            customClass: {
                actions: 'swal2-actions gap-3',
                confirmButton: 'rounded-full px-6 py-2 bg-red-600 text-white font-semibold hover:bg-red-700',
                cancelButton: 'rounded-full px-6 py-2 bg-gray-500 text-white font-semibold hover:bg-gray-600'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                try {
                    Livewire.find(instanceId).call('hapusLayanan', id);
                } catch (e) {
                    console.error('Livewire call failed', e);
                }
            }
        });
    }

    function confirmDelete(event, id, instanceId) {
        event.preventDefault();
        // load SweetAlert2 if not present
        if (typeof Swal === 'undefined') {
            const s = document.createElement('script');
            s.src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11';
            s.onload = function() { _showDeleteSwal(id, instanceId); };
            document.head.appendChild(s);
        } else {
            _showDeleteSwal(id, instanceId);
        }
    }
</script>
