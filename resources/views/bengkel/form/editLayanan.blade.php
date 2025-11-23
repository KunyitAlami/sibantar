<x-layout-bengkel>
    {{-- Navbar back --}}
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-50 mb-5">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="{{ route('bengkel.dashboard', ['id_bengkel' => $layanan_bengkel->id_bengkel]) }}"
                   class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <h1 class="font-bold text-lg text-neutral-900">Edit Layanan</h1>
            </div>
        </div>
    </section>

    {{-- Form --}}
    
    <section class="px-4">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-sm mb-20">
            {{-- action="{{ route('bengkel.layanan.store') }}" --}}
            <form action="{{ route('bengkel.layanan.update', $id_layanan_bengkel) }}" method="POST" class="mt-10 mb-10 gap-5">
                @csrf
                <div class="space-y-5">
                    <div class="flex-1">
                        <label class="block font-medium text-neutral-800 mb-1">ID Layanan Bengkel</label>
                        <input type="number" name="harga_awal" required value="{{ $layanan_bengkel->id_layanan_bengkel }}" disabled
                            class="w-full border border-neutral-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500">
                    </div>
                    {{-- NAMA LAYANAN --}}
                    <div>
                        <label class="block font-medium text-neutral-800 mb-1">Nama Layanan</label>
                        <input type="text" name="nama_layanan" required value="{{ $layanan_bengkel->nama_layanan }}"
                            class="w-full border border-neutral-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500">
                    </div>

                    {{-- HARGA --}}
                    <div class="flex flex-col md:flex-row gap-5">
                        <div class="flex-1">
                            <label class="block font-medium text-neutral-800 mb-1">Perkiraan Harga Terendah</label>
                            <input type="number" name="harga_awal" required value="{{ $layanan_bengkel->harga_awal }}"
                                class="w-full border border-neutral-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500">
                        </div>



                        <div class="flex-1">
                            <label class="block font-medium text-neutral-800 mb-1">Perkiraan Harga Tertinggi</label>
                            <input type="number" name="harga_akhir" required value="{{ $layanan_bengkel->harga_akhir }}"
                                class="w-full border border-neutral-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500">
                        </div>
                    </div>

                    {{-- DESKRIPSI & KATEGORI --}}
                    <div class="flex flex-col md:flex-row gap-5">
                        <div class="flex-1">
                            <label class="block font-medium text-neutral-800 mb-1">Deskripsi</label>
                            <textarea name="deskripsi" rows="4" required class="w-full border border-neutral-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500">{{ old('deskripsi', $layanan_bengkel->deskripsi) }}</textarea>
                        </div>


                        <div class="flex-1">
                            <label class="block font-medium text-neutral-800 mb-1">Kategori</label>
                                <select name="kategori" required
                                    class="w-full border border-neutral-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500">

                                    <option value="">Pilih Kategori</option>

                                    <option value="Motor" {{ $layanan_bengkel->kategori == 'Motor' ? 'selected' : '' }}>Motor</option>
                                    <option value="Mobil" {{ $layanan_bengkel->kategori == 'Mobil' ? 'selected' : '' }}>Mobil</option>
                                    <option value="Truk"  {{ $layanan_bengkel->kategori == 'Truk' ? 'selected' : '' }}>Truk</option>
                                </select>

                        </div>
                    </div>

                </div>

                {{-- SUBMIT BUTTON --}}
                <button type="submit"
                    class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 rounded-lg text-center mt-4">
                    Update Layanan
                </button>

                {{-- HIDDEN INPUT --}}
                <input type="hidden" name="id_bengkel" value="{{ $layanan_bengkel->id_bengkel }}">
            </form>
        </div>
        
    </section>
</x-layout-bengkel>
