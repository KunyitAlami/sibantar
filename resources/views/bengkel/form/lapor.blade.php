<x-layout-bengkel>
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-50 mb-5">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="{{ route('bengkel.dashboard', ['id_bengkel' => $order->id_bengkel]) }}"
                   class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <h1 class="font-bold text-lg text-neutral-900">Kembali ke Beranda</h1>
            </div>
        </div>
    </section>

    {{-- Form --}}
    
    <section class="px-4">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-sm mb-20">
            <div class="flex flex-col gap-4 justify-center text-center">
                <h1>Form Laporkan Pesanan</h1>
            </div>
            {{-- {{ route('bengkel.order.store', $order->id_order) }}--}}
            <form action="{{ route('bengkel.report.store', $order->id_order) }}"
                method="POST" enctype="multipart/form-data" class="mt-10 mb-10 gap-5">
                @csrf

                <div class="space-y-5">
                    <div>
                        <h1 class="font-semibold text-lg mb-2">Keterangan Order</h1>
                        <div class="space-y-1 text-sm text-neutral-700">

                            <p><span class="font-semibold">Pelanggan:</span> {{ $order->user->username }}</p>

                            <p><span class="font-semibold">Kategori:</span> {{ $order->layananBengkel->kategori ?? '-' }}</p>

                            <p><span class="font-semibold">Layanan:</span> {{ $order->layananBengkel->nama_layanan ?? '-' }}</p>

                            <p><span class="font-semibold">Dibuat pada:</span> 
                                {{ $order->created_at->format('d M Y, H:i') }}
                            </p>

                        </div>

                    </div>

                    <div>
                        <label class="font-semibold mb-3">Deskripsi Laporan</label>
                        <textarea name="deskripsi" rows="5"
                                class="w-full border rounded-lg p-3 mt-3"
                                placeholder="Tuliskan laporan lengkap mengenai kondisi pesanan..."></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 rounded-lg text-center mt-4">
                        Laporkan
                    </button>

                    <input type="hidden" name="id_order" value="{{ $order->id_order }}">
                    <input type="hidden" name="id_bengkel" value="{{ $order->id_bengkel }}">
                    <input type="hidden" name="id_user" value="{{ $order->id_user }}">
                </div>
            </form>

        </div>
        
    </section>
</x-layout-bengkel>
