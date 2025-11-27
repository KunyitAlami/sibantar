<x-layout-bengkel>
    <section class="px-4 mt-10">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-sm">
            <div class="text-center mb-6">
                <h1 class="text-xl font-bold">Edit Bengkel</h1>
                <p>Silahkan update data bengkel Anda</p>
            </div>

            @if(session('success'))
                <p class="text-green-500 text-center mb-4">{{ session('success') }}</p>
            @endif

            <form id="personalisasiForm" action="{{ route('bengkel.personalisasi.update', ['id_bengkel' => $bengkel->id_bengkel]) }}" method="POST">
                @csrf

                {{-- Nama Bengkel --}}
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Nama Bengkel</label>
                    <input id="nama_bengkel" type="text" name="nama_bengkel" required maxlength="55"
                           class="input input-bordered w-full @error('nama_bengkel') input-error @enderror"
                           value="{{ old('nama_bengkel', $bengkel->nama_bengkel) }}"
                           oninput="this.value = this.value.slice(0,55); validateNamaBengkel();">
                    <p id="nama_bengkel_error" class="mt-2 text-sm text-red-500 hidden"></p>
                    @error('nama_bengkel')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kecamatan --}}
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Kecamatan</label>
                    <select name="kecamatan" required
                            class="input input-bordered w-full @error('kecamatan') input-error @enderror h-full">
                        @php
                            $daftarKecamatan = ['Banjarmasin Utara','Banjarmasin Tengah','Banjarmasin Timur','Banjarmasin Barat','Banjarmasin Selatan'];
                        @endphp
                        @foreach($daftarKecamatan as $kec)
                            <option value="{{ $kec }}" {{ old('kecamatan', $bengkel->kecamatan) == $kec ? 'selected' : '' }}>
                                {{ $kec }}
                            </option>
                        @endforeach
                    </select>
                    @error('kecamatan')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Alamat Lengkap --}}
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Alamat Lengkap</label>
                    <textarea id="alamat_lengkap" name="alamat_lengkap" required
                              class="input input-bordered w-full resize-none h-40 @error('alamat_lengkap') input-error @enderror"
                              onblur="validateAlamat()">{{ old('alamat_lengkap', $bengkel->alamat_lengkap) }}</textarea>
                    <p id="alamat_lengkap_error" class="mt-2 text-sm text-red-500 hidden"></p>
                    @error('alamat_lengkap')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Jam Buka / Tutup --}}
                <div class="flex gap-2 mt-4">
                    <div class="flex-1 flex flex-col gap-2">
                           <label class="font-semibold text-neutral-700">Jam Buka</label>
                           <input id="jam_buka" type="time" name="jam_buka" required
                               class="input input-bordered w-full @error('jam_buka') input-error @enderror"
                               value="{{ old('jam_buka', $bengkel->jam_buka) }}"
                               onchange="validateJam()">
                        @error('jam_buka')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex-1 flex flex-col gap-2">
                           <label class="font-semibold text-neutral-700">Jam Tutup</label>
                           <input id="jam_tutup" type="time" name="jam_tutup" required
                               class="input input-bordered w-full @error('jam_tutup') input-error @enderror"
                               value="{{ old('jam_tutup', $bengkel->jam_tutup) }}"
                               onchange="validateJam()">
                           <p id="jam_error" class="mt-2 text-sm text-red-500 hidden"></p>
                        @error('jam_tutup')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Latitude & Longitude --}}
                <div class="flex gap-2 mt-4">
                    <div class="flex-1 flex flex-col gap-2">
                           <label class="font-semibold text-neutral-700">Latitude</label>
                           <input id="latitude" type="text" name="latitude" required
                               class="input input-bordered w-full @error('latitude') input-error @enderror"
                               value="{{ old('latitude', $bengkel->latitude) }}"
                               oninput="sanitizeLatLong(this); validateLatLong()">
                           <p id="latitude_error" class="mt-2 text-sm text-red-500 hidden"></p>
                        @error('latitude')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex-1 flex flex-col gap-2">
                           <label class="font-semibold text-neutral-700">Longitude</label>
                           <input id="longitude" type="text" name="longitude" required
                               class="input input-bordered w-full @error('longitude') input-error @enderror"
                               value="{{ old('longitude', $bengkel->longitude) }}"
                               oninput="sanitizeLatLong(this); validateLatLong()">
                           <p id="longitude_error" class="mt-2 text-sm text-red-500 hidden"></p>
                        @error('longitude')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- WA Number --}}
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Nomor WhatsApp</label>
                    <input id="wa_number" type="text" name="wa_number" required maxlength="12"
                           class="input input-bordered w-full @error('wa_number') input-error @enderror"
                           value="{{ old('wa_number', $bengkel->user->wa_number) }}"
                           oninput="this.value = this.value.replace(/[^0-9]/g,'').slice(0,12); validateWa()">
                    <p id="wa_number_error" class="mt-2 text-sm text-red-500 hidden"></p>
                    @error('wa_number')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Link Google Maps --}}
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Link Google Maps</label>
                    <input type="url" name="link_gmaps" required
                           class="input input-bordered w-full @error('link_gmaps') input-error @enderror"
                           value="{{ old('link_gmaps', $bengkel->link_gmaps) }}">
                    @error('link_gmaps')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit --}}
                <button type="submit"
                        class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 rounded-lg mt-6">
                    Update Bengkel
                </button>

                <script>
                    (function(){
                        function showError(id, msg){
                            const err = document.getElementById(id + '_error');
                            const el = document.getElementById(id);
                            if(err){ err.textContent = msg; err.classList.remove('hidden'); }
                            if(el){ el.classList.add('input-error'); }
                        }
                        function clearError(id){
                            const err = document.getElementById(id + '_error');
                            const el = document.getElementById(id);
                            if(err){ err.textContent = ''; err.classList.add('hidden'); }
                            if(el){ el.classList.remove('input-error'); }
                        }

                        // 1. Nama Bengkel: max 55 chars (client-side enforced via maxlength)
                        window.validateNamaBengkel = function(){
                            const id = 'nama_bengkel';
                            const el = document.getElementById(id);
                            if(!el) return true;
                            clearError(id);
                            if(el.value.trim().length === 0){ showError(id, 'Nama bengkel wajib diisi.'); return false; }
                            if(el.value.trim().length > 55){ showError(id, 'Nama bengkel maksimal 55 karakter.'); return false; }
                            return true;
                        };

                        // 2. Alamat minimal 20 kata
                        window.validateAlamat = function(){
                            const id = 'alamat_lengkap';
                            const el = document.getElementById(id);
                            if(!el) return true;
                            clearError(id);
                            const words = (el.value || '').trim().split(/\s+/).filter(w => w.length>0);
                            if(words.length < 5){
                                showError(id, 'Alamat terlalu singkat. Masukkan setidaknya 5 kata untuk membantu pelanggan menemukan lokasi. (Saat ini: ' + words.length +')');
                                return false;
                            }
                            return true;
                        };

                        // 3. Jam buka/tutup harus berjarak minimal 1 jam (mengizinkan lewat tengah malam)
                        window.validateJam = function(){
                            const id = 'jam_error';
                            clearError('jam'); // clear generic
                            const bukaEl = document.getElementById('jam_buka');
                            const tutupEl = document.getElementById('jam_tutup');
                            if(!bukaEl || !tutupEl) return true;
                            const buka = bukaEl.value; const tutup = tutupEl.value;
                            if(!buka || !tutup){ showError('jam', 'Jam buka dan tutup wajib diisi.'); return false; }
                            const parse = s => { const [h,m] = s.split(':').map(x=>parseInt(x,10)||0); return h*60 + m; };
                            let b = parse(buka), t = parse(tutup);
                            // compute difference allowing crossing midnight
                            let diff = (t - b + 24*60) % (24*60);
                            if(diff < 60){
                                showError('jam', 'Jam tutup harus setidaknya 1 jam setelah jam buka.');
                                return false;
                            }
                            clearError('jam');
                            return true;
                        };

                        // helpers for lat/long
                        window.sanitizeLatLong = function(el){
                            if(!el) return;
                            // allow digits, dot, minus
                            let v = el.value.replace(/[^0-9.\-]/g, '');
                            // remove extra dots
                            const parts = v.split('.');
                            if(parts.length>2){ v = parts.shift() + '.' + parts.join(''); }
                            // ensure single leading minus only
                            v = v.replace(/\-+/g, '-');
                            if(v.indexOf('-') > 0){ v = v.replace(/\-/g, ''); }
                            el.value = v;
                        };

                        // 4. Latitude/Longitude validation: not all zeros, numeric, within valid ranges
                        window.validateLatLong = function(){
                            let ok = true;
                            const latEl = document.getElementById('latitude');
                            const lonEl = document.getElementById('longitude');
                            clearError('latitude'); clearError('longitude');
                            if(!latEl || !lonEl) return true;
                            const latRaw = (latEl.value || '').trim();
                            const lonRaw = (lonEl.value || '').trim();
                            const normalize = s => s.replace(/[^0-9]/g, '');
                            if(!latRaw){ showError('latitude', 'Latitude wajib diisi.'); ok = false; }
                            else if(/^0+$/.test(normalize(latRaw))){ showError('latitude', 'Latitude tidak boleh 0 atau 000000.'); ok = false; }
                            if(!lonRaw){ showError('longitude', 'Longitude wajib diisi.'); ok = false; }
                            else if(/^0+$/.test(normalize(lonRaw))){ showError('longitude', 'Longitude tidak boleh 0 atau 000000.'); ok = false; }
                            const lat = parseFloat(latRaw.replace(',', '.'));
                            const lon = parseFloat(lonRaw.replace(',', '.'));
                            if(isNaN(lat) || Math.abs(lat) > 90){ showError('latitude', 'Latitude tidak valid. Nilai antara -90 dan 90.'); ok = false; }
                            if(isNaN(lon) || Math.abs(lon) > 180){ showError('longitude', 'Longitude tidak valid. Nilai antara -180 dan 180.'); ok = false; }
                            // also reject near-zero exact
                            if(!isNaN(lat) && Math.abs(lat) < 0.000001){ showError('latitude', 'Latitude terlalu mendekati 0. Mohon masukkan koordinat yang benar.'); ok = false; }
                            if(!isNaN(lon) && Math.abs(lon) < 0.000001){ showError('longitude', 'Longitude terlalu mendekati 0. Mohon masukkan koordinat yang benar.'); ok = false; }
                            return ok;
                        };

                        // 5. WA number: digits only, starts with 08, max 12 chars
                        window.validateWa = function(){
                            const id = 'wa_number';
                            const el = document.getElementById(id);
                            if(!el) return true;
                            clearError(id);
                            const v = (el.value || '').trim();
                            if(!/^08[0-9]*$/.test(v)){
                                showError(id, 'Nomor WA harus berupa angka dan diawali dengan 08.');
                                return false;
                            }
                            if(v.length > 12){ showError(id, 'Nomor WA maksimal 12 angka.'); return false; }
                            return true;
                        };

                        // attach listeners
                        document.addEventListener('DOMContentLoaded', function(){
                            const form = document.getElementById('personalisasiForm') || document.querySelector('form');
                            if(!form) return;

                            const nama = document.getElementById('nama_bengkel'); if(nama) nama.addEventListener('blur', validateNamaBengkel);
                            const alamat = document.getElementById('alamat_lengkap'); if(alamat) alamat.addEventListener('blur', validateAlamat);
                            const jamB = document.getElementById('jam_buka'); const jamT = document.getElementById('jam_tutup');
                            if(jamB) jamB.addEventListener('change', validateJam); if(jamT) jamT.addEventListener('change', validateJam);
                            const lat = document.getElementById('latitude'); const lon = document.getElementById('longitude');
                            if(lat) lat.addEventListener('blur', validateLatLong); if(lon) lon.addEventListener('blur', validateLatLong);
                            const wa = document.getElementById('wa_number'); if(wa) wa.addEventListener('blur', validateWa);

                            form.addEventListener('submit', function(e){
                                // run all validators
                                const v1 = validateNamaBengkel();
                                const v2 = validateAlamat();
                                const v3 = validateJam();
                                const v4 = validateLatLong();
                                const v5 = validateWa();
                                if(!(v1 && v2 && v3 && v4 && v5)){
                                    e.preventDefault(); e.stopPropagation();
                                    // focus first visible error
                                    const first = document.querySelector('p[id$="_error"]:not(.hidden)');
                                    if(first){
                                        const fid = first.id.replace('_error','');
                                        const el = document.getElementById(fid);
                                        if(el) el.focus();
                                    }
                                    return false;
                                }
                            });
                        });
                    })();
                </script>
            </form>
        </div>
    </section>
</x-layout-bengkel>