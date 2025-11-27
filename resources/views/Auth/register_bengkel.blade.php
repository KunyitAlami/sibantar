<x-layout>
    <x-slot:title>Daftar - SIBANTAR</x-slot:title>

    <section class="min-h-screen flex items-center justify-center py-8 sm:py-12 px-4 bg-neutral-50">
        <div class="w-full max-w-5xl mx-auto">
            
            <!-- Logo & Title -->
            <div class="text-center mb-6 sm:mb-8">
                <h1 class="text-2xl sm:text-3xl font-bold text-neutral-900 mb-1 sm:mb-2">Buat Akun Bengkel Baru</h1>
                <p class="text-sm sm:text-base text-neutral-600">Daftar untuk menjadi mitra SIBANTAR</p>
            </div>

            <!-- Register Card -->
            <div class="card p-6 sm:p-8 w-full max-w-4xl mx-auto">
                <form method="POST" action="{{ route('registerBengkel.post') }}" class="space-y-8" onsubmit="return validateRegisterBengkelForm(event)">
                    @csrf

                    {{-- Errors are shown inline under each field using @error('field') blocks --}}

                    {{-- <input type="text" name="faketext" style="display:none" value=" " tabindex="-1">
                        <input type="password" name="fakepassword" style="display:none" value=" " tabindex="-1"> --}}


                    {{-- bagian pertama itu buat table user --}}
                    {{-- bagian kedua itu buat table calon_bengkel yang nanti kalo udah diacc bakal dikirim ke table bengkel --}}
                    {{-- bagian pertama --}}
                    <div>
                        {{-- baris pertama (tiga pertanyaan) --}}
                        <div class="mb-8">
                            <h1 class="text-xl sm:text-2xl font-bold text-black mb-2">Profile Pemilik Bengkel</h1>
                            <p class="text-gray-500 text-sm">Lengkapi data pemilik bengkel di bawah ini.</p>
                        </div>
                        <div class="flex flex-col gap-4">
                            <!-- Username -->
                            <div>
                                <label for="username" class="block text-sm font-medium text-neutral-700 mb-2">Username</label>
                                <input type="text" id="username" name="username" class="input @error('username') border-danger-500 @enderror" placeholder="Masukkan username" value="{{ old('username') }}" required autofocus>
                                @error('username')<p class="mt-1 text-sm text-danger-600" autocomplete="off">{{ $message }}</p>@enderror
                            </div>
                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-neutral-700 mb-2">Email</label>
                                <input type="text" id="email" name="email" class="input @error('email') border-danger-500 @enderror" placeholder="email@gmail.com" value="{{ old('email') }}" required>
                                <p id="emailError" class="mt-1 text-sm text-danger-600 hidden"></p>
                                @error('email')<p class="mt-1 text-sm text-danger-600">{{ $message }}</p>@enderror
                            </div>
                            <!-- Nomor Telepon -->
                            <div>
                                <label for="wa_number" class="block text-sm font-medium text-neutral-700 mb-2">Nomor Telepon</label>
                                <input 
                                    type="text"
                                    id="wa_number"
                                    name="wa_number"
                                    class="input @error('wa_number') border-danger-500 @enderror"
                                    placeholder="08123456789"
                                    inputmode="numeric"
                                    maxlength="12"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,12)"
                                    required
                                >
                                <p id="waError" class="mt-1 text-sm text-danger-600 hidden"></p>
                                @error('wa_number')<p class="mt-1 text-sm text-danger-600">{{ $message }}</p>@enderror
                            </div>
                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-neutral-700 mb-2">Password</label>
                                <div class="relative">
                                    <input autocomplete="off" type="password" id="password" name="password" class="input @error('password') border-danger-500 @enderror" placeholder="Masukkan password" required>
                                    <button type="button" onclick="togglePassword('password', 'eye-password-open', 'eye-password-closed')" class="absolute right-3 top-1/2 -translate-y-1/2 text-neutral-400 hover:text-neutral-600">
                                        <svg id="eye-password-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <svg id="eye-password-closed" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                        </svg>
                                    </button>
                                </div>
                                <div id="passwordRequirements" class="mt-2 text-sm">
                                    <ul class="space-y-1">
                                        <li id="req-length" class="text-neutral-500">• Minimal 8 karakter</li>
                                        <li id="req-lower" class="text-neutral-500">• Mengandung huruf kecil (a-z)</li>
                                        <li id="req-upper" class="text-neutral-500">• Mengandung huruf besar (A-Z)</li>
                                        <li id="req-number" class="text-neutral-500">• Mengandung angka (0-9)</li>
                                        <li id="req-symbol" class="text-neutral-500">• Mengandung simbol (mis. !@#$%)</li>
                                    </ul>
                                </div>
                                @error('password')<p class="mt-1 text-sm text-danger-600">{{ $message }}</p>@enderror
                            </div>
                            <!-- Konfirmasi Password -->
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-neutral-700 mb-2">Konfirmasi Password</label>
                                <div class="relative">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="input" placeholder="Ulangi password" required>
                                    <button type="button" onclick="togglePassword('password_confirmation', 'eye-confirm-open', 'eye-confirm-closed')" class="absolute right-3 top-1/2 -translate-y-1/2 text-neutral-400 hover:text-neutral-600">
                                        <svg id="eye-confirm-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <svg id="eye-confirm-closed" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                        </svg>
                                    </button>
                                </div>
                                <p id="passwordMatchError" class="mt-1 text-sm text-danger-600 hidden"></p>
                            </div>
                        </div>
                    </div>

                    {{-- bagian kedua --}}
                    <div class="mt-12">
                        <div class="mb-8">
                            <h1 class="text-xl sm:text-2xl font-bold text-black mb-2 mt-8">Profile Bengkel</h1>
                            <p class="text-gray-500 text-sm">Lengkapi data bengkel di bawah ini.</p>
                        </div>
                        <div class="flex flex-col gap-4">
                            <!-- Nama Bengkel -->
                            <div>
                                <label for="nama_bengkel" class="block text-sm font-medium text-neutral-700 mb-2">
                                    Nama Bengkel Anda
                                </label>
                                <input 
                                    type="text" 
                                    id="nama_bengkel" 
                                    name="nama_bengkel" 
                                    class="input @error('nama_bengkel') border-danger-500 @enderror" 
                                    placeholder="Masukkan Nama Bengkel"
                                    value="{{ old('nama_bengkel') }}"
                                    required 
                                    autofocus
                                >
                                @error('nama_bengkel')
                                    <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Link Gmaps -->
                            <div>
                                <label for="link_gmaps" class="block text-sm font-medium text-neutral-700 mb-2">
                                    Link Google Maps Bengkel Anda
                                </label>
                                <input 
                                    type="text" 
                                    id="link_gmaps" 
                                    name="link_gmaps" 
                                    class="input @error('link_gmaps') border-danger-500 @enderror" 
                                    placeholder="Link Google Maps"
                                    value="{{ old('link_gmaps') }}"
                                    required 
                                    autofocus
                                >
                                @error('link_gmaps')
                                    <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex-1">
                                <!-- kecamatan -->
                                <div>
                                    <label for="kecamatan" class="block text-sm font-medium text-neutral-700 mb-2">
                                        Kecamatan Bengkel Anda
                                    </label>
                                    <select 
                                        id="kecamatan" 
                                        name="kecamatan" 
                                        class="input @error('kecamatan') border-danger-500 @enderror"
                                        style="height: 50px;"
                                        required
                                    >
                                        <option value="">Pilih Kecamatan</option>
                                        <option value="Banjarmasin Selatan" {{ old('kecamatan') == 'Banjarmasin Selatan' ? 'selected' : '' }}>Banjarmasin Selatan</option>
                                        <option value="Banjarmasin Timur"    {{ old('kecamatan') == 'Banjarmasin Timur' ? 'selected' : '' }}>Banjarmasin Timur</option>
                                        <option value="Banjarmasin Barat"    {{ old('kecamatan') == 'Banjarmasin Barat' ? 'selected' : '' }}>Banjarmasin Barat</option>
                                        <option value="Banjarmasin Tengah"   {{ old('kecamatan') == 'Banjarmasin Tengah' ? 'selected' : '' }}>Banjarmasin Tengah</option>
                                        <option value="Banjarmasin Utara"    {{ old('kecamatan') == 'Banjarmasin Utara' ? 'selected' : '' }}>Banjarmasin Utara</option>
                                    </select>
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
                                    <label for="jam_buka" class="block text-sm font-medium text-neutral-700 mb-2">Jam Buka Bengkel (WITA)</label>
                                    <input type="time" step="60" id="jam_buka" name="jam_buka" class="input @error('jam_buka') border-danger-500 @enderror" placeholder="08.00" value="{{ old('jam_buka') }}" required autofocus min="0" max="23.99" step="0.01">
                                    @error('jam_buka')<p class="mt-1 text-sm text-danger-600">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="flex-1"> 
                                <div>
                                    <label for="jam_tutup" class="block text-sm font-medium text-neutral-700 mb-2">Jam Tutup Bengkel (WITA)</label>
                                    <input type="time" step="60" id="jam_tutup" name="jam_tutup" class="input @error('jam_tutup') border-danger-500 @enderror" placeholder="23.59" value="{{ old('jam_tutup') }}" required autofocus min="0" max="23.99" step="0.01">
                                    <p id="jamTutupError" class="mt-1 text-sm text-danger-600 hidden"></p>
                                    @error('jam_tutup')<p class="mt-1 text-sm text-danger-600">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>
                        {{-- baris ketiga (dua pertanyaan) --}}
                        <div class="flex flex-col gap-4 mt-4">
                            <!-- alamat_lengkap -->
                            <div>
                                <label for="alamat_lengkap" class="block text-sm font-medium text-neutral-700 mb-2 ">
                                    Alamat Lengkap Bengkel
                                </label>
                                <textarea
                                    id="alamat_lengkap"
                                    name="alamat_lengkap"
                                    class="input @error('alamat_lengkap') border-danger-500 @enderror h-[8rem]"
                                    placeholder="Masukkan Alamat Lengkap Bengkel"
                                    required
                                >{{ old('alamat_lengkap') }}</textarea>
                                @error('alamat_lengkap')
                                    <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="penjelasan_bengkel" class="block text-sm font-medium text-neutral-700 mb-2 ">
                                    Deskripsi Bengkel
                                </label>
                                <textarea
                                    id="penjelasan_bengkel"
                                    name="penjelasan_bengkel"
                                    class="input @error('penjelasan_bengkel') border-danger-500 @enderror h-[8rem]"
                                    placeholder="Masukkan Penjelasan Bengkel Anda "
                                    required
                                >{{ old('penjelasan_bengkel') }}</textarea>
                                @error('penjelasan_bengkel')
                                    <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit" class="btn btn-primary w-full btn-lg rounded-full rounded-full">
                            Daftar Sekarang
                        </button>
                    </div>
                </form>
            </div>

            <!-- Login Link -->
            <p class="text-center mt-5 sm:mt-6 text-sm text-neutral-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-primary-700 hover:text-primary-800 font-semibold">
                    Masuk sekarang
                </a>
            </p>

        </div>
    </section>

    @push('scripts')
    <script>
        document.getElementById('wa_number').addEventListener('beforeinput', function(e) {
            if (e.data && !/^[0-9]+$/.test(e.data)) {
                e.preventDefault();
            }
        });
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

        function validateRegisterBengkelForm(e) {
            // Jam buka/tutup validation (client-side)
            var jamBuka = document.getElementById('jam_buka').value;
            var jamTutup = document.getElementById('jam_tutup').value;
            var jamTutupError = document.getElementById('jamTutupError');
            if (jamBuka && jamTutup) {
                try {
                    var partsA = jamBuka.split(':');
                    var partsB = jamTutup.split(':');
                    var dtA = new Date(); dtA.setHours(parseInt(partsA[0],10), parseInt(partsA[1]||0,10),0,0);
                    var dtB = new Date(); dtB.setHours(parseInt(partsB[0],10), parseInt(partsB[1]||0,10),0,0);
                    var diffMs = dtB - dtA;
                    if (isNaN(diffMs) || diffMs <= 0 || diffMs < (60*60*1000)) {
                        jamTutupError.textContent = 'Jam tutup harus minimal 1 jam setelah jam buka.';
                        jamTutupError.classList.remove('hidden');
                        valid = false;
                    } else {
                        jamTutupError.textContent = '';
                        jamTutupError.classList.add('hidden');
                    }
                } catch(err) {
                    // ignore parse errors and let server validate
                }
            }
            var email = document.getElementById('email').value.trim();
            var wa = document.getElementById('wa_number').value.trim();
            var password = document.getElementById('password').value;
            var passwordConfirm = document.getElementById('password_confirmation').value;
            var emailError = document.getElementById('emailError');
            var waError = document.getElementById('waError');
            var passwordMatchError = document.getElementById('passwordMatchError');
            var valid = true;

            // Reset error
            emailError.textContent = '';
            emailError.classList.add('hidden');
            waError.textContent = '';
            waError.classList.add('hidden');
            passwordMatchError.textContent = '';
            passwordMatchError.classList.add('hidden');

            // Email validation
            var gmailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
            if (!email) {
                emailError.textContent = 'Email wajib diisi.';
                emailError.classList.remove('hidden');
                valid = false;
            } else if (!gmailPattern.test(email)) {
                emailError.textContent = 'Format email harus @gmail.com.';
                emailError.classList.remove('hidden');
                valid = false;
            }

            // WA number validation (max 12 digits)
            var waPattern = /^[0-9]+$/;
            if (!wa) {
                waError.textContent = 'Nomor telepon wajib diisi.';
                waError.classList.remove('hidden');
                valid = false;
            } else if (!waPattern.test(wa)) {
                waError.textContent = 'Nomor telepon hanya boleh angka.';
                waError.classList.remove('hidden');
                valid = false;
            } else if (wa.length > 12) {
                waError.textContent = 'Nomor telepon maksimal 12 karakter.';
                waError.classList.remove('hidden');
                valid = false;
            }

            // Password complexity checks + match
            var missing = [];
            var hasLower = /[a-z]/.test(password);
            var hasUpper = /[A-Z]/.test(password);
            var hasNumber = /[0-9]/.test(password);
            var hasSymbol = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>\/?]/.test(password);
            if (password.length < 8) missing.push('Minimal 8 karakter');
            if (!hasLower) missing.push('Huruf kecil (a-z)');
            if (!hasUpper) missing.push('Huruf besar (A-Z)');
            if (!hasNumber) missing.push('Angka (0-9)');
            if (!hasSymbol) missing.push('Simbol (mis. !@#$%)');

            // Update visible checklist colors
            toggleChecklistState('req-length', password.length >= 8);
            toggleChecklistState('req-lower', hasLower);
            toggleChecklistState('req-upper', hasUpper);
            toggleChecklistState('req-number', hasNumber);
            toggleChecklistState('req-symbol', hasSymbol);

            if (missing.length > 0) {
                passwordMatchError.textContent = 'Password harus memenuhi: ' + missing.join(', ') + '.';
                passwordMatchError.classList.remove('hidden');
                valid = false;
            }

            if (password !== passwordConfirm) {
                passwordMatchError.textContent = (passwordMatchError.classList.contains('hidden') ? '' : passwordMatchError.textContent + ' ') + 'Password dan konfirmasi password tidak sama.';
                passwordMatchError.classList.remove('hidden');
                valid = false;
            }

            if (!valid) {
                e.preventDefault();
            }
            return valid;
        }
        document.querySelector('form[action="{{ route('registerBengkel.post') }}"]')?.addEventListener('submit', validateRegisterBengkelForm);

        // Client-side Google Maps URL validation helper
        function isValidGoogleMapsUrl(val) {
            if (!val) return false;
            // Require starting prefix exactly (case-insensitive)
            var required = 'https://maps.app.goo.gl/';
            return val.toLowerCase().indexOf(required) === 0;
        }

        // Hook into submission flow to validate link_gmaps client-side and show inline error
        var linkInput = document.getElementById('link_gmaps');
        var linkErrorEl = null;
        if (linkInput) {
            // create inline error element if not already
            linkErrorEl = document.getElementById('linkGmapsError');
            if (!linkErrorEl) {
                linkErrorEl = document.createElement('p');
                linkErrorEl.id = 'linkGmapsError';
                linkErrorEl.className = 'mt-1 text-sm text-danger-600 hidden';
                linkInput.insertAdjacentElement('afterend', linkErrorEl);
            }
        }

        // enhance validate function to check maps link
        const originalValidate = validateRegisterBengkelForm;
        document.querySelector('form[action="{{ route('registerBengkel.post') }}"]')?.removeEventListener('submit', validateRegisterBengkelForm);
        document.querySelector('form[action="{{ route('registerBengkel.post') }}"]')?.addEventListener('submit', function(e){
            var ok = originalValidate(e);
            if (!ok) return false;
            if (linkInput) {
                var val = linkInput.value.trim();
                if (!isValidGoogleMapsUrl(val)) {
                    if (linkErrorEl) {
                        linkErrorEl.textContent = 'Link Google Maps harus format URL Maps yang valid.';
                        linkErrorEl.classList.remove('hidden');
                    }
                    e.preventDefault();
                    return false;
                } else if (linkErrorEl) {
                    linkErrorEl.textContent = '';
                    linkErrorEl.classList.add('hidden');
                }
            }
            return true;
        });
        
        // Password checklist helpers and live updates
        function toggleChecklistState(id, ok) {
            var el = document.getElementById(id);
            if (!el) return;
            if (ok) {
                el.classList.remove('text-neutral-500');
                el.classList.add('text-success-600');
            } else {
                el.classList.remove('text-success-600');
                el.classList.add('text-neutral-500');
            }
        }

        var passwordInput = document.getElementById('password');
        var passwordConfirmInput = document.getElementById('password_confirmation');
        var passwordMatchError = document.getElementById('passwordMatchError');

        function updatePasswordChecklist() {
            var pwd = passwordInput.value;
            var hasLower = /[a-z]/.test(pwd);
            var hasUpper = /[A-Z]/.test(pwd);
            var hasNumber = /[0-9]/.test(pwd);
            var hasSymbol = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>\/?]/.test(pwd);
            toggleChecklistState('req-length', pwd.length >= 8);
            toggleChecklistState('req-lower', hasLower);
            toggleChecklistState('req-upper', hasUpper);
            toggleChecklistState('req-number', hasNumber);
            toggleChecklistState('req-symbol', hasSymbol);

            if (passwordMatchError) {
                passwordMatchError.textContent = '';
                passwordMatchError.classList.add('hidden');
            }
        }

        function updatePasswordMatch() {
            if (!passwordMatchError) return;
            if (passwordConfirmInput.value && passwordInput.value !== passwordConfirmInput.value) {
                passwordMatchError.textContent = 'Password dan konfirmasi tidak sama.';
                passwordMatchError.classList.remove('hidden');
            } else {
                passwordMatchError.textContent = '';
                passwordMatchError.classList.add('hidden');
            }
        }

        passwordInput?.addEventListener('input', updatePasswordChecklist);
        passwordConfirmInput?.addEventListener('input', updatePasswordMatch);
    </script>
    @endpush

</x-layout>
