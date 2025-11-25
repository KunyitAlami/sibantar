<!-- Navbar untuk Bengkel - DaisyUI -->
<div class="bg-base-100 shadow-md sticky top-0 z-[9999]">
    <div class="navbar container mx-auto">
        <!-- Navbar Start - Logo -->
        <div class="navbar-start">
            <!-- Logo -->
            <a href="{{ route('bengkel.dashboard', ['id_bengkel' => Auth::user()->bengkel->first()->id_bengkel]) }}" class="btn btn-ghost text-xl px-2 lg:px-4">
                <img src="{{ asset('images/logo.png') }}" alt="SIBANTAR Logo" class="w-8 h-8 lg:w-10 lg:h-10 object-contain">
                <span class="font-bold text-primary">SIBANTAR</span>
            </a>
        </div>
        
        <!-- Navbar Center - Desktop Menu -->
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li>
                    <a href="{{ route('bengkel.dashboard', ['id_bengkel' => Auth::user()->bengkel->first()->id_bengkel]) }}" 
                       class="font-medium {{ request()->routeIs('bengkel.dashboard') ? 'active' : '' }}">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('bengkel.dashboard', ['id_bengkel' => Auth::user()->bengkel->first()->id_bengkel]) }}?panel=about" 
                       class="font-medium {{ request()->routeIs('bengkel.dashboard') ? 'active' : '' }}">
                        Profile Bengkel
                    </a>
                </li>
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
        
        <!-- Navbar End - Mobile Menu & Bengkel Profile -->
        <div class="navbar-end gap-2">
            <!-- Mobile Dropdown Menu -->
            <div class="dropdown dropdown-end lg:hidden">
                <div tabindex="0" role="button" class="btn btn-ghost btn-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li><a href="{{ route('bengkel.dashboard', ['id_bengkel' => Auth::user()->bengkel->first()->id_bengkel]) }}">Dashboard</a></li>
                    <li><a href="{{ route('bengkel.dashboard', ['id_bengkel' => Auth::user()->bengkel->first()->id_bengkel]) }}?panel=about">Profile Bengkel</a></li>
                    <li>
                        <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();" class="text-error font-medium">Log out</a>
                    </li>
                </ul>
            </div>
            
            <!-- Bengkel Profile Dropdown -->
            <div class="dropdown dropdown-end hidden lg:block">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full bg-warning text-white flex items-center justify-center">
                        <span class="text-lg font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li class="menu-title">
                        <span>{{ Auth::user()->name }} (Bengkel)</span>
                    </li>
                    <li><a href="{{ route('bengkel.dashboard', ['id_bengkel' => Auth::user()->bengkel->first()->id_bengkel]) }}">Dashboard</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
