<x-layout-bengkel>
    {{-- Navbar back --}}
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-50 mb-5">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="{{ route('bengkel.dashboard', ['id_bengkel' => $id_bengkel]) }}"
                   class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <h1 class="font-bold text-lg text-neutral-900">Tambah Layanan</h1>
            </div>
        </div>
    </section>

    {{-- Form --}}
    
    <section class="px-6">
        <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-sm mb-20">
            {{-- action="{{ route('bengkel.layanan.store') }}" --}}
            <form id="tambahLayananForm" action="{{ route('bengkel.layanan.store', $id_bengkel) }}" method="POST" class="mt-10 mb-10 gap-5 p-6">
                @csrf
                <div class="space-y-5">
                    @if ($errors->any())
                        <div class="mb-4 text-danger-600">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- NAMA LAYANAN --}}
                    <div>
                        <label class="block font-medium text-neutral-800 mb-1">Nama Layanan</label>
                        <input 
                            type="text" 
                            name="nama_layanan"
                            id="nama_layanan"
                            required
                            maxlength="50"
                            pattern="^[A-Za-z\s]{1,50}$"
                            title="Hanya huruf dan spasi, maksimal 50 karakter"
                            class="w-full border border-neutral-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500"
                            oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')"
                        >
                    </div>

                    {{-- HARGA --}}
                    <div class="flex flex-col md:flex-row gap-5">
                        <div class="flex-1">
                            <label class="block font-medium text-neutral-800 mb-1">Perkiraan Harga Terendah</label>
                            <input 
                                type="text" 
                                id="harga_awal"
                                name="harga_awal" 
                                required
                                inputmode="numeric"
                                maxlength="15"
                                class="w-full border border-neutral-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                            >
                        </div>

                        <div class="flex-1">
                            <label class="block font-medium text-neutral-800 mb-1">Perkiraan Harga Tertinggi</label>
                            <input 
                                type="text" 
                                id="harga_akhir"
                                name="harga_akhir" 
                                required
                                inputmode="numeric"
                                maxlength="15"
                                class="w-full border border-neutral-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                            >
                        </div>
                    </div>

                    {{-- DESKRIPSI & KATEGORI --}}
                    <div class="flex flex-col md:flex-row gap-5">
                        <div class="flex-1">
                            <label class="block font-medium text-neutral-800 mb-1">Deskripsi</label>
                            <textarea name="deskripsi" rows="4" required maxlength="500"
                                    class="w-full border border-neutral-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500"></textarea>
                        </div>

                        <div class="flex-1">
                            <label class="block font-medium text-neutral-800 mb-1">Kategori</label>
                            <select name="kategori" required
                                    class="w-full border border-neutral-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500">
                                <option value="">Pilih Kategori</option>
                                <option value="Motor">Motor</option>
                                <option value="Mobil">Mobil</option>
                                <option value="Truk">Truk</option>
                            </select>
                        </div>
                    </div>

                </div>

                {{-- SUBMIT BUTTON --}}
                <button type="submit"
                    class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 rounded-full text-center mt-4">
                    Tambah Layanan
                </button>

                <script>
                    (function(){
                        const form = document.getElementById('tambahLayananForm');
                        if(!form) return;

                        form.addEventListener('submit', function(e){
                            const a = document.getElementById('harga_awal');
                            const b = document.getElementById('harga_akhir');
                            if(!a || !b) return;
                            const va = parseInt(a.value.replace(/\D/g,'')) || 0;
                            const vb = parseInt(b.value.replace(/\D/g,'')) || 0;
                            if(va > vb){
                                e.preventDefault();
                                e.stopPropagation();
                                const showSwal = () => {
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Periksa Harga',
                                        text: 'Harga terendah tidak boleh melebihi harga tertinggi. Mohon periksa kembali.',
                                        confirmButtonColor: '#0051BA'
                                    }).then(() => { a.focus(); });
                                };

                                if (typeof Swal !== 'undefined') {
                                    showSwal();
                                } else {
                                    const s = document.createElement('script');
                                    s.src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11';
                                    s.onload = showSwal;
                                    document.head.appendChild(s);
                                }

                                return false;
                            }
                        });
                    })();
                </script>

                {{-- HIDDEN INPUT --}}
                <input type="hidden" name="id_bengkel" value="{{ $id_bengkel }}">
            </form>
        </div>
        
    </section>
</x-layout-bengkel>
