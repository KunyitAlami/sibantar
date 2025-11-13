<!-- Navbar untuk User -->
<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <!-- Back Button (hanya muncul di halaman detail) & Logo -->
        <div class="flex items-center gap-2">
            @if(Request::is('user/bengkel/*'))
                <a href="{{ route('user.search') }}" class="w-10 h-10 rounded-full flex items-center justify-center hover:bg-neutral-100 transition">
                    <svg class="w-6 h-6 text-neutral-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
            @endif
            <a href="{{ route('user.search') }}" class="flex items-center gap-2">
                <img src="{{ asset('images/logo.png') }}" alt="SIBANTAR Logo" class="w-10 h-10 object-contain">
                <span class="text-xl font-bold text-primary-700">SIBANTAR</span>
            </a>
        </div>
        
        <!-- Hamburger Menu -->
        <button id="menuToggle" class="lg:hidden">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex items-center gap-6">
            <a href="{{ route('user.search') }}" class="text-neutral-700 hover:text-primary-700 transition font-medium">
                Cari Bengkel
            </a>
            <a href="{{ route('user.waiting-confirmation') }}" class="text-neutral-700 hover:text-primary-700 transition font-medium">
                Booking Saya
            </a>
            <a href="/about_us" class="text-neutral-700 hover:text-primary-700 transition font-medium">Tentang</a>
            
            <!-- User Menu Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center gap-2 text-neutral-700 hover:text-primary-700 transition font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>{{ Auth::user()->username }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                
                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                    <a href="{{ route('user.search') }}" class="block px-4 py-2 text-sm text-neutral-700 hover:bg-neutral-50 transition">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            Cari Bengkel
                        </div>
                    </a>
                    <hr class="my-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-danger-600 hover:bg-neutral-50 transition">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Logout
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <!-- Mobile Menu -->
    <nav id="mobileMenu" class="hidden lg:hidden bg-white border-t border-neutral-200">
        <div class="container mx-auto px-4 py-4 flex flex-col gap-3">
            <a href="{{ route('user.search') }}" class="text-neutral-700 hover:text-primary-700 py-2 transition font-medium">Cari Bengkel</a>
            <a href="{{ route('user.waiting-confirmation') }}" class="text-neutral-700 hover:text-primary-700 py-2 transition font-medium">Booking Saya</a>
            <a href="/about_us" class="text-neutral-700 hover:text-primary-700 py-2 transition font-medium">Tentang</a>
            
            <hr class="my-2">
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left text-danger-600 hover:text-danger-700 py-2 transition font-medium">
                    Logout
                </button>
            </form>
        </div>
    </nav>
</header>

<!-- Mobile Menu Toggle Script -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');

        if (menuToggle && mobileMenu) {
            menuToggle.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    });
</script>
@endpush
