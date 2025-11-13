<!-- Header Component - Dynamic Navbar Based on Role -->
@auth
    @if(Auth::user()->role === 'admin')
        <x-navbar-admin />
    @elseif(Auth::user()->role === 'bengkel')
        <x-navbar-bengkel />
    @elseif(Auth::user()->role === 'user')
        <x-navbar-user />
    @else
        <x-navbar-guest />
    @endif
@else
    <x-navbar-guest />
@endauth