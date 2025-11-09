<x-layout>
    <x-slot:title>Daftar - SIBANTAR</x-slot:title>

    <section class="min-h-screen flex items-center justify-center py-8 sm:py-12 px-4 bg-neutral-50">
        <div class="w-full max-w-md">
            
            <!-- Logo & Title -->
            <div class="text-center mb-6 sm:mb-8">
                <div class="flex justify-center mb-3 sm:mb-4">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 bg-primary-700 rounded-2xl flex items-center justify-center">
                        <img src="{{ asset('images/logo.png') }}" alt="SIBANTAR Logo" class="w-8 h-8 sm:w-10 sm:h-10 object-contain">
                    </div>
                </div>
                <h1 class="text-2xl sm:text-3xl font-bold text-neutral-900 mb-1 sm:mb-2">Buat Akun Baru</h1>
                <p class="text-sm sm:text-base text-neutral-600">Daftar untuk mulai menggunakan SIBANTAR</p>
            </div>

            <!-- Register Card -->
            <div class="card p-6 sm:p-8">
                <form method="POST" action="{{ route('register.post') }}" class="space-y-4 sm:space-y-5">
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
                            value="{{ old('email') }}"
                            required
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
                            value="{{ old('wa_number') }}"
                            required
                        >
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
                        <button type="submit" class="btn btn-primary w-full btn-lg">
                            Daftar Sekarang
                        </button>
                    </div>

                    <!-- Divider -->
                    {{-- <div class="relative py-4"> --}}
                        {{-- <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-neutral-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-3 bg-white text-neutral-500">Atau daftar dengan</span>
                        </div>
                    </div> --}}

                    <!-- Social Login -->
                    {{-- <div class="grid grid-cols-2 gap-3 pt-1">
                        <button type="button" class="btn btn-outline flex items-center justify-center gap-2 text-sm sm:text-base py-2.5 sm:py-2">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="currentColor" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="currentColor" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path fill="currentColor" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                            <span class="hidden sm:inline">Google</span>
                            <span class="sm:hidden">Google</span>
                        </button>
                        <button type="button" class="btn btn-outline flex items-center justify-center gap-2 text-sm sm:text-base py-2.5 sm:py-2">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-[#1877F2]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            <span class="hidden sm:inline">Facebook</span>
                            <span class="sm:hidden">Facebook</span>
                        </button>
                    </div> --}}
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

</x-layout>
