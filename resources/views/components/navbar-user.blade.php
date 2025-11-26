<!-- Navbar untuk User - DaisyUI -->
<div id="main-navbar-user" class="bg-base-100 shadow-md sticky top-0 z-[9999]">
    <div class="navbar container mx-auto">
        <!-- Navbar Start - Logo -->
        <div class="navbar-start">
            <!-- Logo -->
            <a href="{{ route('user.dashboard') }}" class="btn btn-ghost text-xl px-2 lg:px-4">
                <img src="{{ asset('images/logo.png') }}" alt="SIBANTAR Logo" class="w-8 h-8 lg:w-10 lg:h-10 object-contain">
                <span class="font-bold text-primary">SIBANTAR</span>
            </a>
        </div>
        
        <!-- Navbar Center - Desktop Menu -->
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href="{{ route('user.dashboard') }}" class="font-medium {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">Beranda</a></li>
                <li><a href="{{ route('user.eksplor_bengkel') }}" class="font-medium {{ request()->routeIs('user.eksplor_bengkel') ? 'active' : '' }}">Cari Bengkel</a></li>
                <li>
                    <a href="{{ route('user.history', Auth::id()) }}" class="font-medium {{ request()->routeIs('user.history') ? 'active' : '' }}">
                        Riwayat
                    </a>
                </li>
                <li><a href="{{ route('about_us') }}" class="font-medium {{ request()->routeIs('about_us') ? 'active' : '' }}">Tentang Kami</a></li>
                <li>
                    <form id="logout-form-nav" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-nav').submit();" 
                    class="font-medium text-error">
                        Log out
                    </a>
                </li>

            </ul>
        </div>
        
        <!-- Navbar End - Mobile Menu & User Profile -->
        <div class="navbar-end gap-2">
            <!-- Mobile Dropdown Menu -->
            <div class="dropdown dropdown-end lg:hidden">
                <div tabindex="0" role="button" class="btn btn-ghost btn-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li><a href="{{ route('user.dashboard') }}" class="font-medium">Beranda</a></li>
                    <li><a href="{{ route('user.eksplor_bengkel') }}" class="font-medium">Cari Bengkel</a></li>
                    <li>
                        <a href="{{ route('user.history', Auth::id()) }}" class="font-medium">
                            Riwayat
                        </a>
                    </li>
                    <li><a href="{{ route('about_us') }}" class="font-medium">Tentang Kami</a></li>
                    <div class="divider my-1"></div>
                    <li>
                        <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();" class="text-error font-medium">Logout</a>
                    </li>
                </ul>
            </div>
            
            <!-- User Profile Dropdown -->
            <div class="dropdown dropdown-end hidden lg:block">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full bg-primary text-white flex items-center justify-center">
                        <span class="text-lg font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li class="menu-title">
                        <span>{{ Auth::user()->name }}</span>
                    </li>
                    <li><a href="{{ route('user.dashboard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Beranda
                    </a></li>
                    <li><a href="{{ route('user.eksplor_bengkel') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Cari Bengkel
                    </a></li>
                    <li><a href="{{ route('user.history', Auth::id()) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Riwayat Pesanan
                    </a></li>
                    <li><a href="{{ route('about_us') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Tentang Kami
                    </a></li>
                    <div class="divider my-1"></div>
                    <li>
                        <form id="logout-form-desktop" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-desktop').submit();" class="text-error">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
