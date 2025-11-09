<x-layout>
    <x-slot:title>Masuk - SIBANTAR</x-slot:title>

    <section class="min-h-screen flex items-center justify-center py-8 sm:py-12 px-4 bg-neutral-50">
        <div class="w-full max-w-md">
            
            <!-- Logo & Title -->
            <div class="text-center mb-6 sm:mb-8">
                <div class="flex justify-center mb-3 sm:mb-4">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl flex items-center justify-center">
                        <img src="{{ asset('images/logo.png') }}" alt="SIBANTAR Logo" class="w-16 h-16 sm:w-16 sm:h-16 object-contain">
                    </div>
                </div>
                <h1 class="text-2xl sm:text-3xl font-bold text-neutral-900 mb-1 sm:mb-2">Selamat Datang</h1>
                <p class="text-sm sm:text-base text-neutral-600">Masuk ke akun SIBANTAR Anda [ini di Folder AUTH]</p>
            </div>

            <!-- Login Card -->
            <div class="card p-6 sm:p-8">

                @if(session('success'))
                    <div class="mb-4 p-3 text-green-700 bg-green-100 rounded text-center font-semibold">
                        {{ session('success') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('login.post') }}" class="space-y-4 sm:space-y-5">
                    @csrf

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
                            placeholder="Masukan Email"
                            value="{{ old('email') }}"
                            required 
                            autofocus
                        >
                        @error('email')
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
                                placeholder="Masukkan password"
                                required
                            >
                            <button 
                                type="button" 
                                onclick="togglePassword()" 
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-neutral-400 hover:text-neutral-600"
                            >
                                <svg id="eye-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg id="eye-closed" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Forgot Password -->
                    <div class="flex items-center justify-between">
                        <a href="#" class="text-sm text-primary-700 hover:text-primary-800 font-medium">
                            Lupa password?
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit" class="btn btn-primary w-full btn-lg">
                            Masuk
                        </button>
                    </div>
                </form>
            </div>

            <!-- Register Link -->
            <p class="text-center mt-5 sm:mt-6 text-sm text-neutral-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-primary-700 hover:text-primary-800 font-semibold hover:underline">
                    Daftar sekarang
                </a>
            </p>
            <p class="text-center mt-5 sm:mt-6 text-sm text-neutral-600 ">
                Ingin Menjadi Mitra?
                <a href="{{ route('registerBengkel') }}" class="text-primary-700 hover:text-primary-800 font-semibold hover:underline">
                    Daftar menjadi Mitra SIBANTAR
                </a>
            </p>

        </div>
    </section>

    @push('scripts')
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeOpen = document.getElementById('eye-open');
            const eyeClosed = document.getElementById('eye-closed');
            
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
