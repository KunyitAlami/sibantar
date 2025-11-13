<!-- Navbar untuk Bengkel -->
<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ route('bengkel.dashboard') }}" class="flex items-center gap-2">
            <img src="{{ asset('images/logo.png') }}" alt="SIBANTAR Logo" class="w-10 h-10 object-contain">
            <div class="flex items-center gap-2">
                <span class="text-xl font-bold text-primary-700">SIBANTAR</span>
                <span class="text-xs bg-secondary-100 text-secondary-700 px-2 py-1 rounded font-semibold">Bengkel</span>
            </div>
        </a>
        
        <!-- Hamburger Menu -->
        <button id="menuToggle" class="lg:hidden">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex items-center gap-6">
            <a href="{{ route('bengkel.dashboard') }}" class="text-neutral-700 hover:text-primary-700 transition font-medium">
                Dashboard
            </a>
            <a href="{{ route('bengkel.dashboard') }}" class="text-neutral-700 hover:text-primary-700 transition font-medium">
                Pesanan
            </a>
            <a href="/about_us" class="text-neutral-700 hover:text-primary-700 transition font-medium">Tentang</a>
            
            <!-- Bengkel Menu Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center gap-2 text-neutral-700 hover:text-primary-700 transition font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <span>{{ Auth::user()->username }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                
                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                    <a href="{{ route('bengkel.dashboard') }}" class="block px-4 py-2 text-sm text-neutral-700 hover:bg-neutral-50 transition">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Dashboard
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
            <a href="{{ route('bengkel.dashboard') }}" class="text-neutral-700 hover:text-primary-700 py-2 transition font-medium">Dashboard</a>
            <a href="{{ route('bengkel.dashboard') }}" class="text-neutral-700 hover:text-primary-700 py-2 transition font-medium">Pesanan</a>
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
