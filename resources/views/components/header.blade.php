<!-- Header Component -->
<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <!-- Logo -->
        <a href="/" class="flex items-center gap-2">
            <!-- Jika pakai gambar -->
            <img src="{{ asset('images/logo.png') }}" alt="SIBANTAR Logo" class="w-10 h-10 object-contain">
            <span class="text-xl font-bold text-primary-700">SIBANTAR</span>
        </a>
        
        <!-- Hamburger Menu -->
        <button id="menuToggle" class="lg:hidden">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex items-center gap-6">
            <a href="/" class="text-neutral-700 hover:text-primary-700 transition font-medium">Beranda</a>
            <a href="#" class="text-neutral-700 hover:text-primary-700 transition font-medium">Tentang</a>
            <a href="#" class="text-neutral-700 hover:text-primary-700 transition font-medium">Kontak</a>
            <a href="/login" class="btn btn-primary">Masuk</a>
        </nav>
    </div>

    <!-- Mobile Menu -->
    <nav id="mobileMenu" class="hidden lg:hidden bg-white border-t border-neutral-200">
        <div class="container mx-auto px-4 py-4 flex flex-col gap-3">
            <a href="/" class="text-neutral-700 hover:text-primary-700 py-2 transition font-medium">Beranda</a>
            <a href="#" class="text-neutral-700 hover:text-primary-700 py-2 transition font-medium">Tentang</a>
            <a href="#" class="text-neutral-700 hover:text-primary-700 py-2 transition font-medium">Kontak</a>
            <a href="/login" class="btn btn-primary text-center">Masuk</a>
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