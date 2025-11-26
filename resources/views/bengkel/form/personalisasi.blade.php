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

            <form action="{{ route('bengkel.personalisasi.update', ['id_bengkel' => $bengkel->id_bengkel]) }}" method="POST">
                @csrf

                {{-- Nama Bengkel --}}
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Nama Bengkel</label>
                    <input type="text" name="nama_bengkel" required
                           class="input input-bordered w-full @error('nama_bengkel') input-error @enderror"
                           value="{{ old('nama_bengkel', $bengkel->nama_bengkel) }}">
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
                    <textarea name="alamat_lengkap" required
                              class="input input-bordered w-full resize-none h-40 @error('alamat_lengkap') input-error @enderror">{{ old('alamat_lengkap', $bengkel->alamat_lengkap) }}</textarea>
                    @error('alamat_lengkap')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Jam Buka / Tutup --}}
                <div class="flex gap-2 mt-4">
                    <div class="flex-1 flex flex-col gap-2">
                        <label class="font-semibold text-neutral-700">Jam Buka</label>
                        <input type="time" name="jam_buka" required
                               class="input input-bordered w-full @error('jam_buka') input-error @enderror"
                               value="{{ old('jam_buka', $bengkel->jam_buka) }}">
                        @error('jam_buka')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex-1 flex flex-col gap-2">
                        <label class="font-semibold text-neutral-700">Jam Tutup</label>
                        <input type="time" name="jam_tutup" required
                               class="input input-bordered w-full @error('jam_tutup') input-error @enderror"
                               value="{{ old('jam_tutup', $bengkel->jam_tutup) }}">
                        @error('jam_tutup')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Latitude & Longitude --}}
                <div class="flex gap-2 mt-4">
                    <div class="flex-1 flex flex-col gap-2">
                        <label class="font-semibold text-neutral-700">Latitude</label>
                        <input type="text" name="latitude" required
                               class="input input-bordered w-full @error('latitude') input-error @enderror"
                               value="{{ old('latitude', $bengkel->latitude) }}">
                        @error('latitude')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex-1 flex flex-col gap-2">
                        <label class="font-semibold text-neutral-700">Longitude</label>
                        <input type="text" name="longitude" required
                               class="input input-bordered w-full @error('longitude') input-error @enderror"
                               value="{{ old('longitude', $bengkel->longitude) }}">
                        @error('longitude')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- WA Number --}}
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Nomor WhatsApp</label>
                    <input type="text" name="wa_number" required
                           class="input input-bordered w-full @error('wa_number') input-error @enderror"
                           value="{{ old('wa_number', $bengkel->user->wa_number) }}">
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
            </form>
        </div>
    </section>
</x-layout-bengkel>