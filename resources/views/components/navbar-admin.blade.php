<!-- Navbar untuk Admin - DaisyUI -->
<div class="bg-base-100 shadow-md sticky top-0 z-[9999]">
    <div class="navbar container mx-auto">
        <!-- Navbar Start - Logo -->
        <div class="navbar-start">
            <!-- Logo -->
            <a href="{{ route('admin.dashboard.index') }}" class="btn btn-ghost text-xl px-2 lg:px-4">
                <img src="{{ asset('images/logo.png') }}" alt="SIBANTAR Logo" class="w-8 h-8 lg:w-10 lg:h-10 object-contain">
                <span class="font-bold text-primary">SIBANTAR</span>
                <span class="text-sm text-error hidden sm:inline">Admin</span>
            </a>
        </div>
        
        <!-- Navbar Center - Desktop Menu -->
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href="{{ route('admin.dashboard.index') }}" class="font-medium {{ request()->routeIs('admin.dashboard.index') ? 'active' : '' }}">Dashboard</a></li>
                <li><a href="{{ route('admin.users.index') }}" class="font-medium {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">Kelola User</a></li>
            </ul>
        </div>
        
        <!-- Navbar End - Mobile Menu & Admin Profile -->
        <div class="navbar-end gap-2">
            <!-- Mobile Dropdown Menu -->
            <div class="dropdown dropdown-end lg:hidden">
                <div tabindex="0" role="button" class="btn btn-ghost btn-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li><a href="{{ route('admin.dashboard.index') }}" class="font-medium">Dashboard</a></li>
                    <li><a href="{{ route('admin.users.index') }}" class="font-medium">Kelola User</a></li>
                </ul>
            </div>
            
            <!-- Admin Profile Dropdown -->
            <div class="dropdown dropdown-end hidden lg:block">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full bg-error text-white flex items-center justify-center">
                        <span class="text-lg font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li class="menu-title">
                        <span>{{ Auth::user()->name }} (Admin)</span>
                    </li>
                    <li><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
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
