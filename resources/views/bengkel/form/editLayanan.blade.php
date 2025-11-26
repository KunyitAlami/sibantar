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
            <form id="editLayananForm" action="{{ route('bengkel.layanan.update', $id_layanan_bengkel) }}" method="POST" class="mt-4 mb-10">
                @csrf
                <div class="space-y-5">
                    <div class="flex-1">
                        <label class="block font-medium text-neutral-800 mb-1">ID Layanan Bengkel</label>
                        <input type="number" value="{{ $layanan_bengkel->id_layanan_bengkel }}" disabled
                                class="w-full border border-neutral-300 rounded-lg px-3 py-2">


                    </div>
                    {{-- NAMA LAYANAN --}}
                    <div>
                        <label class="block font-medium text-neutral-800 mb-1">Nama Layanan</label>
                        <input 
                            value="{{ old('nama_layanan', $layanan_bengkel->nama_layanan) }}"
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
                            <label class="block font-medium text-neutral-800 mb-1">Harga Terendah</label>
                            <input 
                                type="text" 
                                id="harga_awal"
                                name="harga_awal" 
                                required
                                inputmode="numeric"
                                maxlength="15"
                                class="w-full border border-neutral-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                value="{{ old('harga_awal', $layanan_bengkel->harga_awal) }}"
                            >
                        </div>

                        <div class="flex-1">
                            <label class="block font-medium text-neutral-800 mb-1">Harga Tertinggi</label>
                            <input 
                                type="text" 
                                id="harga_akhir"
                                name="harga_akhir" 
                                required
                                inputmode="numeric"
                                maxlength="15"
                                class="w-full border border-neutral-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                value="{{ old('harga_akhir', $layanan_bengkel->harga_akhir) }}"
                            >
                        </div>
                    </div>

                    {{-- DESKRIPSI & KATEGORI --}}
                    <div class="flex flex-col md:flex-row gap-5">
                        <div class="flex-1">
                            <label class="block font-medium text-neutral-800 mb-1">Deskripsi</label>
                            <textarea name="deskripsi" rows="4" required maxlength="500" class="w-full border border-neutral-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500">{{ old('deskripsi', $layanan_bengkel->deskripsi) }}</textarea>
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
                    class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 rounded-full text-center mt-4">
                    Perbarui Layanan
                </button>

                <script>
                    (function(){
                        const form = document.getElementById('editLayananForm');
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

                    (function(){
                        const form = document.getElementById('editLayananForm');
                        if(!form) return;

                        const existingNames = @json($existingNames);
                        const oldName = "{{ $layanan_bengkel->nama_layanan }}";

                        form.addEventListener('submit', function(e){
                            const nameInput = document.getElementById('nama_layanan');
                            const newName = nameInput.value.trim();

                            // Cek nama layanan duplikat
                            if(newName !== oldName && existingNames.includes(newName)){
                                e.preventDefault();
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Nama Layanan Duplikat',
                                    text: 'Nama layanan ini sudah ada di bengkel Anda. Gunakan nama lain.',
                                    confirmButtonColor: '#0051BA'
                                }).then(() => nameInput.focus());
                                return false;
                            }
                        });
                    })();
                </script>

                <script>
                (function(){
                    const form = document.getElementById('editLayananForm');
                    if(!form) return;

                    const existingNames = @json($existingNames);
                    const oldName = "{{ $layanan_bengkel->nama_layanan }}";

                    form.addEventListener('submit', function(e){
                        const nameInput = document.getElementById('nama_layanan');
                        const newName = nameInput.value.trim();

                        // Cek nama layanan duplikat
                        if(newName !== oldName && existingNames.includes(newName)){
                            e.preventDefault();
                            Swal.fire({
                                icon: 'warning',
                                title: 'Nama Layanan Duplikat',
                                text: 'Nama layanan ini sudah ada di bengkel Anda. Gunakan nama lain.',
                                confirmButtonColor: '#0051BA'
                            }).then(() => nameInput.focus());
                            return false;
                        }
                    });
                })();
                </script>


                {{-- HIDDEN INPUT --}}
                <input type="hidden" name="id_bengkel" value="{{ $layanan_bengkel->id_bengkel }}">
            </form>
        </div>
        
    </section>
</x-layout-bengkel>
