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
                                type="number" 
                                id="harga_awal"
                                name="harga_awal" 
                                required
                                inputmode="numeric"
                                min="0"
                                max="1000000"
                                step="1"
                                class="w-full border border-neutral-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500"
                                oninput="sanitizeNumericInput(this); validatePriceField('harga_awal')"
                                onpaste="handlePasteNumeric(event, this)"
                                onkeydown="return allowOnlyDigits(event)"
                            >
                            <p id="harga_awal_error" class="mt-2 text-sm text-danger-600 hidden"></p>
                        </div>

                        <div class="flex-1">
                            <label class="block font-medium text-neutral-800 mb-1">Perkiraan Harga Tertinggi</label>
                            <input 
                                type="number" 
                                id="harga_akhir"
                                name="harga_akhir" 
                                required
                                inputmode="numeric"
                                min="0"
                                max="1000000"
                                step="1"
                                class="w-full border border-neutral-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500"
                                oninput="sanitizeNumericInput(this); validatePriceField('harga_akhir')"
                                onpaste="handlePasteNumeric(event, this)"
                                onkeydown="return allowOnlyDigits(event)"
                            >
                            <p id="harga_akhir_error" class="mt-2 text-sm text-danger-600 hidden"></p>
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
                        const MIN_PRICE = 1000; // minimal realist price (Rp 1.000)
                        const MAX_PRICE = 1000000; // maksimal harga layanan (Rp 1.000.000)
                        const MAX_PRICE_LENGTH = 7; // maks 7 karakter angka

                        function sanitizeNumericInput(el){
                            if(!el) return;
                            let only = el.value.replace(/[^0-9]/g, '');
                            if(only.length > MAX_PRICE_LENGTH) only = only.slice(0, MAX_PRICE_LENGTH);
                            el.value = only;
                        }

                        function handlePasteNumeric(e, el){
                            e.preventDefault();
                            const clip = (e.clipboardData || window.clipboardData).getData('text') || '';
                            const only = clip.replace(/[^0-9]/g, '').slice(0, MAX_PRICE_LENGTH);
                            el.value = only;
                            validatePriceField(el.id);
                        }

                        function allowOnlyDigits(e){
                            const allowed = [8,9,13,27,37,38,39,40,46];
                            if(allowed.indexOf(e.keyCode) !== -1) return true;
                            if((e.ctrlKey || e.metaKey) && ['a','c','v','x','z'].includes(String.fromCharCode(e.keyCode).toLowerCase())) return true;
                            if(e.key && /^[0-9]$/.test(e.key)) return true;
                            e.preventDefault();
                            return false;
                        }

                        function showError(fieldId, message){
                            const input = document.getElementById(fieldId);
                            const err = document.getElementById(fieldId + '_error');
                            if(err){
                                err.textContent = message;
                                err.classList.remove('hidden');
                            }
                            if(input){
                                input.classList.add('border-danger-600');
                            }
                        }

                        function clearError(fieldId){
                            const input = document.getElementById(fieldId);
                            const err = document.getElementById(fieldId + '_error');
                            if(err){
                                err.textContent = '';
                                err.classList.add('hidden');
                            }
                            if(input){
                                input.classList.remove('border-danger-600');
                            }
                        }

                        function validatePriceField(fieldId){
                            const input = document.getElementById(fieldId);
                            if(!input) return true;
                            const raw = (input.value || '').replace(/\D/g, '');
                            if(raw === '' ){
                                showError(fieldId, 'Harga wajib diisi.');
                                return false;
                            }
                            // reject values like "0" or "000000"
                            // reject values that are all zeros or that start with a leading zero
                            if(/^0+$/.test(raw)){
                                showError(fieldId, 'Harga tidak boleh 0/0 repetitif. Mohon masukkan nilai realistis.');
                                return false;
                            }
                            if(/^0/.test(raw)){
                                showError(fieldId, 'Harga tidak boleh diawali angka 0. Hapus angka 0 di depan.');
                                return false;
                            }
                            const val = parseInt(raw, 10);
                            if(isNaN(val) || val <= 0){
                                showError(fieldId, 'Harga tidak valid.');
                                return false;
                            }
                            if(val < MIN_PRICE){
                                showError(fieldId, 'Harga terlalu kecil. Minimal Rp ' + MIN_PRICE.toLocaleString('id-ID') + '.');
                                return false;
                            }
                            if(val > MAX_PRICE){
                                showError(fieldId, 'Harga maksimal Rp ' + MAX_PRICE.toLocaleString('id-ID') + '.');
                                return false;
                            }
                            clearError(fieldId);
                            return true;
                        }

                        function validateBothPrices(){
                            const okA = validatePriceField('harga_awal');
                            const okB = validatePriceField('harga_akhir');
                            if(!okA || !okB) return false;

                            const a = document.getElementById('harga_awal');
                            const b = document.getElementById('harga_akhir');
                            const va = parseInt((a.value || '').replace(/\D/g,''), 10) || 0;
                            const vb = parseInt((b.value || '').replace(/\D/g,''), 10) || 0;
                            if(va > vb){
                                // show both errors with a clear message
                                showError('harga_awal', 'Harga terendah tidak boleh lebih besar dari harga tertinggi.');
                                showError('harga_akhir', 'Periksa kembali nilai harga tertinggi.');
                                return false;
                            }
                            // all good
                            return true;
                        }

                        const form = document.getElementById('tambahLayananForm');
                        if(!form) return;

                        // attach input listeners (in case JS-inlined oninput didn't run)
                        const aInput = document.getElementById('harga_awal');
                        const bInput = document.getElementById('harga_akhir');
                        if(aInput){
                            aInput.addEventListener('blur', function(){ validatePriceField('harga_awal'); });
                        }
                        if(bInput){
                            bInput.addEventListener('blur', function(){ validatePriceField('harga_akhir'); });
                        }

                        form.addEventListener('submit', function(e){
                            // run validation for both fields
                            const valid = validateBothPrices();
                            if(!valid){
                                e.preventDefault();
                                e.stopPropagation();
                                // focus first visible error
                                const firstErr = document.querySelector('#harga_awal_error:not(.hidden), #harga_akhir_error:not(.hidden)');
                                if(firstErr){
                                    const fid = firstErr.id.replace('_error','');
                                    const el = document.getElementById(fid);
                                    if(el) el.focus();
                                }
                                return false;
                            }

                            // existing check: lowest must not exceed highest
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
