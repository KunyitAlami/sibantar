<!-- Navbar untuk Admin - DaisyUI -->
<div class="bg-base-100 shadow-md sticky top-0 z-[9999]">
    <div class="navbar container mx-auto">
        <!-- Navbar Start - Logo -->
        <div class="navbar-start">
            <!-- Logo -->
            <a href="<?php echo e(route('admin.dashboard.index')); ?>" class="btn btn-ghost text-xl px-2 lg:px-4">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="SIBANTAR Logo" class="w-8 h-8 lg:w-10 lg:h-10 object-contain">
                <span class="font-bold text-primary">SIBANTAR</span>
            </a>
        </div>
        
        <!-- Navbar Center - Desktop Menu -->
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href="<?php echo e(route('admin.dashboard.index')); ?>" class="font-medium <?php echo e(request()->routeIs('admin.dashboard.index') ? 'active' : ''); ?>">Dashboard</a></li>
                <li><a href="<?php echo e(route('admin.users.index')); ?>" class="font-medium <?php echo e(request()->routeIs('admin.users.index') ? 'active' : ''); ?>">Kelola User</a></li>
                <li><a href="<?php echo e(route('admin.bengkel.index')); ?>" class="font-medium <?php echo e(request()->routeIs('admin.bengkel.*') ? 'active' : ''); ?>">Kelola Bengkel</a></li>
                <li><a href="<?php echo e(route('admin.laporan.index')); ?>" class="font-medium <?php echo e(request()->routeIs('admin.laporan.*') ? 'active' : ''); ?>">Laporan</a></li>
                <li>
                    <form id="logout-form-nav" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-nav').submit();" 
                    class="font-medium text-error">
                        Log out
                    </a>
                </li>
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
                    <li><a href="<?php echo e(route('admin.dashboard.index')); ?>" class="font-medium">Dashboard</a></li>
                    <li><a href="<?php echo e(route('admin.users.index')); ?>" class="font-medium">Kelola User</a></li>
                    <li><a href="<?php echo e(route('admin.bengkel.index')); ?>" class="font-medium">Kelola Bengkel</a></li>
                    <li><a href="<?php echo e(route('admin.laporan.index')); ?>" class="font-medium">Laporan</a></li>
                    <li>
                        <form id="logout-form-mobile" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();" class="text-error font-medium">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\laragon\www\sibantar\resources\views/components/navbar-admin.blade.php ENDPATH**/ ?>