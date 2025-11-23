<x-layout-admin>
    <x-slot:title>Daftar - SIBANTAR</x-slot:title>

    <section class="min-h-screen flex items-center justify-center py-8 sm:py-12 px-4 bg-neutral-50">
        <div class="w-full max-w-screen">
            
            <!-- Logo & Title -->
            <div class="text-center mb-6 sm:mb-8">
                <div class="flex justify-center mb-3 sm:mb-4">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl flex items-center justify-center">
                        <img src="{{ asset('images/logo.png') }}" alt="SIBANTAR Logo" class="w-16 h-16 sm:w-16 sm:h-16 object-contain">
                    </div>
                </div>
                <!-- Judul dan ringkasan dihapus sesuai permintaan -->
            </div>

            <!-- Register Card -->
            <div class="card p-6 sm:p-8 w-full max-w-4xl mx-auto">
                    <form method="POST" action="{{ route('admin.calonBengkel.approve', $calonBengkel->id_calon_bengkel) }}" class="space-y-4 sm:space-y-5">
                    @csrf

                    @if ($errors->any())
                        <div class="mb-4 text-danger-600">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    {{-- bagian pertama itu buat table user --}}
                    {{-- bagian kedua itu buat table calon_bengkel yang nanti kalo udah diacc bakal dikirim ke table bengkel --}}
                    {{-- bagian pertama --}}
                    <div>
                        {{-- baris pertama (tiga pertanyaan) --}}
                        <div class="flex flex-col mb-8"> 
                            <h1 class="text-2xl font-bold text-black mb-4">Profile Pemilik Bengkel</h1>
                            <p class="text-gray-500">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore temporibus pariatur.</p>
                        </div>
                        <div class="flex gap-10 ">
                            <!-- Username -->
                            <div>
                                <label for="username" class="block text-sm font-medium text-neutral-700 mb-2">
                                    Username
                                </label>
                                <input 
                                    type="text" 
                                    id="username" 
                                    name="username" 
                                    class="input @error('username') border-danger-500 @enderror" 
                                    placeholder="Masukkan username"
                                    value="{{ old('username', $calonBengkel->username) }}"
                                    required 
                                    autofocus
                                    readonly
                                >
                                @error('username')
                                    <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-neutral-700 mb-2">
                                    Email
                                </label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    class="input @error('email') border-danger-500 @enderror" 
                                    placeholder="email@example.com"
                                    value="{{ old('email', $calonBengkel->email) }}"
                                    required
                                    readonly
                                >
                                @error('email')
                                    <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nomor Telepon -->
                            <div>
                                <label for="wa_number" class="block text-sm font-medium text-neutral-700 mb-2">
                                    Nomor Telepon
                                </label>
                                <input 
                                    type="tel" 
                                    id="wa_number" 
                                    name="wa_number" 
                                    class="input @error('wa_number') border-danger-500 @enderror" 
                                    placeholder="08123456789"
                                    value="{{ old('wa_number', $calonBengkel->wa_number) }}"
                                    required
                                    readonly
                                >
                                @error('wa_number')
                                    <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- baris kedua (dua pertanyaan) --}}
                        {{-- <div class="flex gap-10 mt-7">
                            <div class="flex-1"> 
                                <!-- Password -->
                                <div>
                                    <label for="password" class="block text-sm font-medium text-neutral-700 mb-2">
                                        Password
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="password" 
                                            id="password" 
                                            name="password" 
                                            class="input @error('password') border-danger-500 @enderror" 
                                            placeholder="Minimal 8 karakter"
                                            required
                                        >
                                        <button 
                                            type="button" 
                                            onclick="togglePassword('password', 'eye-password-open', 'eye-password-closed')" 
                                            class="absolute right-3 top-1/2 -translate-y-1/2 text-neutral-400 hover:text-neutral-600"
                                        >
                                            <svg id="eye-password-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            <svg id="eye-password-closed" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                            </svg>
                                        </button>
                                    </div>
                                    @error('password')
                                        <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex-1"> 
                                <!-- Konfirmasi Password -->
                                <div>
                                    <label for="password_confirmation" class="block text-sm font-medium text-neutral-700 mb-2">
                                        Konfirmasi Password
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="password" 
                                            id="password_confirmation" 
                                            name="password_confirmation" 
                                            class="input" 
                                            placeholder="Ulangi password"
                                            required
                                        >
                                        <button 
                                            type="button" 
                                            onclick="togglePassword('password_confirmation', 'eye-confirm-open', 'eye-confirm-closed')" 
                                            class="absolute right-3 top-1/2 -translate-y-1/2 text-neutral-400 hover:text-neutral-600"
                                        >
                                            <svg id="eye-confirm-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            <svg id="eye-confirm-closed" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>



                        </div> --}}
                    </div>

                    {{-- bagian kedua --}}
                    <div class="mt-12">
                        <div class="flex flex-col mb-8"> 
                            <h1 class="text-2xl font-bold text-black mb-4 mt-10">Profile Bengkel</h1>
                            <p class="text-gray-500">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore temporibus pariatur.</p>
                        </div>
                        {{-- baris pertama (tiga pertanyaan) --}}
                        <div class="flex gap-10">
                            <div class="flex-1">
                                <!-- Nama Bengkel -->
                                <div>
                                    <label for="nama_bengkel" class="block text-sm font-medium text-neutral-700 mb-2">
                                        Nama Bengkel 
                                    </label>
                                    <input 
                                        type="text" 
                                        id="nama_bengkel" 
                                        name="nama_bengkel" 
                                        class="input @error('nama_bengkel') border-danger-500 @enderror" 
                                        placeholder="Masukkan Nama Bengkel"
                                        value="{{ old('nama_bengkel', $calonBengkel->nama_bengkel) }}"
                                        required 
                                        autofocus
                                        readonly
                                    >
                                    @error('nama_bengkel')
                                        <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex-1">
                                <!-- Link Gmaps -->
                                <div>
                                    <label for="link_gmaps" class="block text-sm font-medium text-neutral-700 mb-2">
                                        Link Google Maps Bengkel 
                                    </label>
                                    <input 
                                        type="text" 
                                        id="link_gmaps" 
                                        name="link_gmaps" 
                                        class="input @error('link_gmaps') border-danger-500 @enderror" 
                                        placeholder="Link Google Maps"
                                        value="{{ old('link_gmaps', $calonBengkel->link_gmaps) }}"
                                        required 
                                        autofocus
                                        readonly
                                    >
                                    @error('link_gmaps')
                                        <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex-1">
                                <!-- kecamatan -->
                                <div>
                                    <label for="kecamatan" class="block text-sm font-medium text-neutral-700 mb-2">
                                        Kecamatan Bengkel 
                                    </label>
                                    <input 
                                        type="text" 
                                        id="kecamatan" 
                                        name="kecamatan" 
                                        class="input @error('kecamatan') border-danger-500 @enderror" 
                                        placeholder="Link Google Maps"
                                        value="{{ old('kecamatan', $calonBengkel->kecamatan) }}"
                                        readonly
                                    >
                                    @error('kecamatan')
                                        <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- baris kedua (dua pertanyaan) --}}
                        <div class="flex gap-10 mt-7">
                            <div class="flex-1"> 
                                <div>
                                    <label for="jam_buka" class="block text-sm font-medium text-neutral-700 mb-2">
                                        Jam Buka Bengkel  (WITA)
                                    </label>
                                    <input 
                                        type="text" 
                                        id="jam_buka" 
                                        name="jam_buka" 
                                        class="input @error('jam_buka') border-danger-500 @enderror" 
                                        placeholder="Contoh: 08.00 "
                                        value="{{ old('jam_buka', $calonBengkel->jam_buka) }}"
                                        readonly
                                        required 
                                        autofocus
                                    >
                                    @error('jam_buka')
                                        <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex-1"> 
                                <div>
                                    <label for="jam_tutup" class="block text-sm font-medium text-neutral-700 mb-2 ml-5">
                                        Jam Tutup Bengkel  (WITA)
                                    </label>
                                    <input 
                                        type="text" 
                                        id="jam_tutup" 
                                        name="jam_tutup" 
                                        class=" ml-3 input @error('jam_tutup') border-danger-500 @enderror" 
                                        placeholder="Contoh: 23.59 "
                                        value="{{ old('jam_tutup', $calonBengkel->jam_tutup) }}"
                                        readonly
                                        required 
                                        autofocus
                                    >
                                    @error('jam_tutup')
                                        <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- baris ketiga (dua pertanyaan) --}}
                        <div class="flex gap-10 mt-7 w-full">
                            <div class="flex-1"> 
                                <!-- alamat_lengkap -->
                                <div>
                                    <label for="alamat_lengkap" class="block text-sm font-medium text-neutral-700 mb-2 ">
                                        Alamat Lengkap Bengkel 
                                    </label>
                                    <textarea
                                        id="alamat_lengkap"
                                        name="alamat_lengkap"
                                        class="input @error('alamat_lengkap') border-danger-500 @enderror h-[12rem]"
                                        placeholder="Masukkan Alamat Lengkap Bengkel"
                                        required
                                        readonly
                                    >{{ old('alamat_lengkap', $calonBengkel->alamat_lengkap) }}</textarea>
                                    @error('alamat_lengkap')
                                        <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex-1"> 
                                <!-- penjelasan_bengkel -->
                                <div>
                                    <label for="penjelasan_bengkel" class="block text-sm font-medium text-neutral-700 mb-2 ">
                                        Penjelasan Bengkel 
                                    </label>
                                    <textarea
                                        id="penjelasan_bengkel"
                                        name="penjelasan_bengkel"
                                        class="input @error('penjelasan_bengkel') border-danger-500 @enderror h-[12rem]"
                                        placeholder="Masukkan Penjelasan Bengkel  "
                                        required
                                        readonly
                                    >{{ old('penjelasan_bengkel', $calonBengkel->penjelasan_bengkel) }}</textarea>
                                    @error('penjelasan_bengkel')
                                        <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit" class="btn btn-primary w-full btn-lg">
                            Terima Permintaan 
                        </button>
                    </div>
                </form>
                <a href="{{ route('admin.dashboard.index') }}" class="bg-gray-400 rounded-lg w-full btn-lg mt-6 hover:bg-gray-600 text-center block">
                    <span class="text-white">Kembali</span>
                </a>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        function togglePassword(inputId, eyeOpenId, eyeClosedId) {
            const passwordInput = document.getElementById(inputId);
            const eyeOpen = document.getElementById(eyeOpenId);
            const eyeClosed = document.getElementById(eyeClosedId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            }
        }
    </script>
    @endpush

</x-layout-admin>
