<!-- Navbar untuk Guest (Belum Login) - DaisyUI -->
<div class="bg-base-100 shadow-md sticky top-0 z-[9999]">
    <div class="navbar container mx-auto">
        <!-- Navbar Start - Logo -->
        <div class="navbar-start">
            <!-- Logo -->
            <a href="{{ route('landing_page') }}" class="btn btn-ghost text-xl px-2 lg:px-4">
                <img src="{{ asset('images/logo.png') }}" alt="SIBANTAR Logo" class="w-8 h-8 lg:w-10 lg:h-10 object-contain">
                <span class="font-bold text-primary">SIBANTAR</span>
            </a>
        </div>
        
        <!-- Navbar Center - Desktop Menu -->
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href="{{ route('landing_page') }}" class="font-medium {{ request()->routeIs('landing_page') ? 'active' : '' }}">Beranda</a></li>
                <li><a href="{{ route('about_us') }}" class="font-medium {{ request()->routeIs('about_us') ? 'active' : '' }}">Tentang Kami</a></li>
            </ul>
        </div>
        
        <!-- Navbar End - Auth Buttons & Mobile Menu -->
        <div class="navbar-end gap-2">
            <a href="{{ route('login') }}" class="btn btn-ghost btn-sm lg:btn-md font-medium hidden sm:flex">
                Masuk
            </a>
            <a href="{{ route('register') }}" class="btn btn-primary btn-sm lg:btn-md hidden sm:flex">
                Daftar
            </a>
            
            <!-- Mobile Dropdown Menu -->
            <div class="dropdown dropdown-end lg:hidden">
                <div tabindex="0" role="button" class="btn btn-ghost btn-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li><a href="{{ route('landing_page') }}" class="font-medium">Beranda</a></li>
                    <li><a href="{{ route('about_us') }}" class="font-medium">Tentang Kami</a></li>
                    <li><a href="{{ route('login') }}" class="font-medium">Masuk</a></li>
                    <li><a href="{{ route('register') }}" class="font-medium">Daftar</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
