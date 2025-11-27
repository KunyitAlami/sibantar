<x-layout>
    <x-slot:title>Daftar - SIBANTAR</x-slot:title>

    <section class="min-h-screen flex items-center justify-center py-8 sm:py-12 px-4 bg-neutral-50">
        <div class="w-full max-w-md">
            
            <!-- Logo & Title -->
            <div class="text-center mb-6 sm:mb-8">
                <h1 class="text-2xl sm:text-3xl font-bold text-neutral-900 mb-1 sm:mb-2">Buat Akun Baru</h1>
                <p class="text-sm sm:text-base text-neutral-600">Daftar untuk mulai menggunakan SIBANTAR</p>
            </div>

            <!-- Register Card -->
            <div class="card p-6 sm:p-8">
                <form method="POST" action="{{ route('register.post') }}" class="space-y-4 sm:space-y-5" novalidate>
                    @csrf

                    @if ($errors->any())
                        <!-- <div class="mb-4 text-danger-600">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div> -->
                    @endif

                    <!-- Nama Lengkap -->
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
                            value="{{ old('username') }}"
                            required 
                            autofocus
                            maxlength="25"
                            onkeydown="return /^[A-Za-z\s]$/.test(event.key) || event.key === 'Backspace' || event.key === 'Delete' || event.key === 'ArrowLeft' || event.key === 'ArrowRight' || event.key === 'Tab';"
                        />
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
                            type="text" 
                            id="email" 
                            name="email" 
                            class="input @error('email') border-danger-500 @enderror" 
                            placeholder="email@gmail.com"
                            value="{{ old('email') }}"
                            required
                            pattern="^[a-zA-Z0-9._%+-]+@gmail\.com$"
                        >
                        <p id="emailError" class="mt-1 text-sm text-danger-600 hidden"></p>
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
                            type="text"
                            id="wa_number"
                            name="wa_number"
                            class="input"
                            placeholder="08123456789"
                            maxlength="12"
                            inputmode="numeric"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,12)"
                        >

                        <p id="waError" class="mt-1 text-sm text-danger-600 hidden"></p>
                        @error('wa_number')
                            <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                        @enderror
                    </div>

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
                                placeholder="Minimal 8 karakter (huruf + angka)"
                                required
                                minlength="8"
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
                        <div id="passwordRequirements" class="mt-2 text-sm">
                            <ul class="space-y-1">
                                <li id="req-length" class="text-neutral-500">• Minimal 8 karakter</li>
                                <li id="req-lower" class="text-neutral-500">• Mengandung huruf kecil (a-z)</li>
                                <li id="req-upper" class="text-neutral-500">• Mengandung huruf besar (A-Z)</li>
                                <li id="req-number" class="text-neutral-500">• Mengandung angka (0-9)</li>
                                <li id="req-symbol" class="text-neutral-500">• Mengandung simbol (mis. !@#$%)</li>
                            </ul>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                        @enderror
                    </div>

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
                        <p id="passwordMatchError" class="mt-1 text-sm text-danger-600 hidden"></p>
                    </div>

                    <!-- Terms & Conditions -->
                    {{-- <div class="flex items-start pt-1">
                        <input 
                            type="checkbox" 
                            id="terms" 
                            name="terms" 
                            class="w-4 h-4 mt-0.5 text-primary-700 border-neutral-300 rounded focus:ring-primary-500 flex-shrink-0"
                            required
                        >
                        <label for="terms" class="ml-2 text-xs sm:text-sm text-neutral-700 leading-tight">
                            Saya setuju dengan 
                            <a href="#" class="text-primary-700 hover:text-primary-800 font-medium">Syarat & Ketentuan</a> 
                            dan 
                            <a href="#" class="text-primary-700 hover:text-primary-800 font-medium">Kebijakan Privasi</a>
                        </label>
                    </div> --}}

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit" class="btn btn-primary w-full btn-lg rounded-full">
                            Daftar Sekarang
                        </button>
                    </div>


                    
                    <script>
                    function validateRegisterForm(e) {
                        var username = document.getElementById('username').value.trim();
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

                        // Username length
                        if (username.length > 25) {
                            alert('Username maksimal 25 karakter.');
                            valid = false;
                        }

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

                        // WA number validation
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

                        // Password complexity checks
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
                            passwordMatchError.textContent = (passwordMatchError.classList.contains('hidden') ? '' : passwordMatchError.textContent + ' ') + 'Password dan konfirmasi tidak sama.';
                            passwordMatchError.classList.remove('hidden');
                            valid = false;
                        }

                        if (!valid) {
                            e.preventDefault();
                        }
                        return valid;
                    }

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

                    // Live update for password field
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

                        // Clear match error while typing
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

                    document.querySelector('form[action="{{ route('register.post') }}"]')?.addEventListener('submit', validateRegisterForm);
                    </script>
                </form>
            </div>

            <!-- Login Link -->
            <p class="text-center mt-5 sm:mt-6 text-sm text-neutral-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-primary-700 hover:text-primary-800 font-semibold">
                    Masuk sekarang
                </a>
            </p>

            <p class="text-center mt-2 sm:mt-2 text-sm text-neutral-600 ">
                Ingin Menjadi Mitra?
                <a href="{{ route('registerBengkel') }}" class="text-primary-700 hover:text-primary-800 font-semibold">
                    Daftar menjadi Mitra SIBANTAR
                </a>
            </p>

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

    <script>
    const usernameInput = document.getElementById('username');

    usernameInput.addEventListener('keydown', function(e) {
        // Allow: letters, space, backspace, delete, arrows, tab
        if (!e.key.match(/^[A-Za-z\s]$/) && !['Backspace','Delete','ArrowLeft','ArrowRight','Tab'].includes(e.key)) {
            e.preventDefault();
        }
    });

    // Handle paste / autofill / input changes
    usernameInput.addEventListener('input', function(e) {
        this.value = this.value.replace(/[^A-Za-z\s]/g, '');
    });
    </script>
    @endpush



</x-layout>
