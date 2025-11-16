<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> Kelola User - Admin SIBANTAR <?php $__env->endSlot(); ?>

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-primary-700 via-primary-600 to-primary-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="flex items-center gap-3 mb-4">
                    <a href="/admin/dashboard" class="hover:bg-white/10 p-2 rounded-lg transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-4xl font-bold">Kelola User</h1>
                        <p class="text-primary-100 text-lg mt-1">Manajemen pengguna sistem SIBANTAR</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-8 bg-gradient-to-b from-neutral-50 to-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                
                <!-- Filter & Search -->
                <div class="bg-white rounded-2xl p-6 shadow-lg mb-6 border border-neutral-100">
                    <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between">
                        <!-- Filter Tabs -->
                        <div class="flex flex-wrap gap-2">
                            <button onclick="filterUsers('all')" id="filter-all" class="filter-btn active px-6 py-2.5 rounded-xl font-semibold transition-all duration-300">
                                Semua (15)
                            </button>
                            <button onclick="filterUsers('admin')" id="filter-admin" class="filter-btn px-6 py-2.5 rounded-xl font-semibold transition-all duration-300">
                                Admin (5)
                            </button>
                            <button onclick="filterUsers('bengkel')" id="filter-bengkel" class="filter-btn px-6 py-2.5 rounded-xl font-semibold transition-all duration-300">
                                Bengkel (7)
                            </button>
                            <button onclick="filterUsers('user')" id="filter-user" class="filter-btn px-6 py-2.5 rounded-xl font-semibold transition-all duration-300">
                                User (3)
                            </button>
                        </div>

                        <!-- Search Bar -->
                        <div class="relative w-full sm:w-auto">
                            <input type="text" id="searchInput" placeholder="Cari user..." class="w-full sm:w-64 pl-10 pr-4 py-2.5 border-2 border-neutral-200 rounded-xl focus:border-primary-500 focus:outline-none transition-colors">
                            <svg class="w-5 h-5 absolute left-3 top-3.5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Users Table -->
                <div class="bg-white rounded-2xl shadow-lg border border-neutral-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-neutral-50 to-neutral-100">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Username</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Role</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">WA Number</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="userTableBody" class="divide-y divide-neutral-200">
                                <!-- Admin Users -->
                                <tr class="user-row hover:bg-neutral-50 transition-colors" data-role="admin" data-username="randyfebrian" data-email="2310817110013@mhs.ulm.ac.id">
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">1</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full flex items-center justify-center text-white font-bold">
                                                R
                                            </div>
                                            <span class="text-sm font-semibold text-neutral-900">randyfebrian</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">2310817110013@mhs.ulm.ac.id</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1.5 text-xs font-bold text-primary-700 bg-primary-100 rounded-full border border-primary-200">ADMIN</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">0000</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <button class="p-2 hover:bg-primary-50 rounded-lg transition-colors" title="Edit">
                                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                            <button class="p-2 hover:bg-error-50 rounded-lg transition-colors" title="Hapus">
                                                <svg class="w-5 h-5 text-error-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="user-row hover:bg-neutral-50 transition-colors" data-role="admin" data-username="muhammadrizky" data-email="2310817310011@mhs.ulm.ac.id">
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">2</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full flex items-center justify-center text-white font-bold">
                                                M
                                            </div>
                                            <span class="text-sm font-semibold text-neutral-900">muhammadrizky</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">2310817310011@mhs.ulm.ac.id</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1.5 text-xs font-bold text-primary-700 bg-primary-100 rounded-full border border-primary-200">ADMIN</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">0000</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <button class="p-2 hover:bg-primary-50 rounded-lg transition-colors" title="Edit">
                                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                            <button class="p-2 hover:bg-error-50 rounded-lg transition-colors" title="Hapus">
                                                <svg class="w-5 h-5 text-error-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="user-row hover:bg-neutral-50 transition-colors" data-role="admin" data-username="zahranabila" data-email="2310817110011@mhs.ulm.ac.id">
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">3</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full flex items-center justify-center text-white font-bold">
                                                Z
                                            </div>
                                            <span class="text-sm font-semibold text-neutral-900">zahranabila</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">2310817110011@mhs.ulm.ac.id</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1.5 text-xs font-bold text-primary-700 bg-primary-100 rounded-full border border-primary-200">ADMIN</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">0000</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <button class="p-2 hover:bg-primary-50 rounded-lg transition-colors" title="Edit">
                                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                            <button class="p-2 hover:bg-error-50 rounded-lg transition-colors" title="Hapus">
                                                <svg class="w-5 h-5 text-error-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="user-row hover:bg-neutral-50 transition-colors" data-role="admin" data-username="ghanimudzakir" data-email="2310817320007@mhs.ulm.ac.id">
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">4</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full flex items-center justify-center text-white font-bold">
                                                G
                                            </div>
                                            <span class="text-sm font-semibold text-neutral-900">ghanimudzakir</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">2310817320007@mhs.ulm.ac.id</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1.5 text-xs font-bold text-primary-700 bg-primary-100 rounded-full border border-primary-200">ADMIN</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">0000</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <button class="p-2 hover:bg-primary-50 rounded-lg transition-colors" title="Edit">
                                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                            <button class="p-2 hover:bg-error-50 rounded-lg transition-colors" title="Hapus">
                                                <svg class="w-5 h-5 text-error-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="user-row hover:bg-neutral-50 transition-colors" data-role="admin" data-username="erikamaulidiya" data-email="erikamaulidiya@admin">
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">5</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full flex items-center justify-center text-white font-bold">
                                                E
                                            </div>
                                            <span class="text-sm font-semibold text-neutral-900">erikamaulidiya</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">erikamaulidiya@admin</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1.5 text-xs font-bold text-primary-700 bg-primary-100 rounded-full border border-primary-200">ADMIN</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">0000</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <button class="p-2 hover:bg-primary-50 rounded-lg transition-colors" title="Edit">
                                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                            <button class="p-2 hover:bg-error-50 rounded-lg transition-colors" title="Hapus">
                                                <svg class="w-5 h-5 text-error-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Bengkel Users (Dummy) -->
                                <tr class="user-row hover:bg-neutral-50 transition-colors" data-role="bengkel" data-username="bengkeljaya" data-email="jaya@bengkel.com">
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">6</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-gradient-to-br from-secondary-500 to-secondary-600 rounded-full flex items-center justify-center text-white font-bold">
                                                B
                                            </div>
                                            <span class="text-sm font-semibold text-neutral-900">bengkeljaya</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">jaya@bengkel.com</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1.5 text-xs font-bold text-secondary-700 bg-secondary-100 rounded-full border border-secondary-200">BENGKEL</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">081234567890</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <button class="p-2 hover:bg-primary-50 rounded-lg transition-colors" title="Edit">
                                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                            <button class="p-2 hover:bg-error-50 rounded-lg transition-colors" title="Hapus">
                                                <svg class="w-5 h-5 text-error-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Regular Users (Dummy) -->
                                <tr class="user-row hover:bg-neutral-50 transition-colors" data-role="user" data-username="johndoe" data-email="john@user.com">
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">7</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-gradient-to-br from-success-500 to-success-600 rounded-full flex items-center justify-center text-white font-bold">
                                                J
                                            </div>
                                            <span class="text-sm font-semibold text-neutral-900">johndoe</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">john@user.com</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1.5 text-xs font-bold text-success-700 bg-success-100 rounded-full border border-success-200">USER</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">081298765432</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <button class="p-2 hover:bg-primary-50 rounded-lg transition-colors" title="Edit">
                                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                            <button class="p-2 hover:bg-error-50 rounded-lg transition-colors" title="Hapus">
                                                <svg class="w-5 h-5 text-error-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Empty State -->
                    <div id="emptyState" class="hidden p-12 text-center">
                        <svg class="w-16 h-16 mx-auto text-neutral-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <p class="text-neutral-500 font-medium">Tidak ada user ditemukan</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        let currentFilter = 'all';

        // Filter functionality
        function filterUsers(role) {
            currentFilter = role;
            const rows = document.querySelectorAll('.user-row');
            const filterBtns = document.querySelectorAll('.filter-btn');
            let visibleCount = 0;

            // Update active button
            filterBtns.forEach(btn => {
                btn.classList.remove('active', 'bg-primary-600', 'text-white', 'shadow-md');
                btn.classList.add('bg-neutral-100', 'text-neutral-600', 'hover:bg-neutral-200');
            });
            
            const activeBtn = document.getElementById(`filter-${role}`);
            activeBtn.classList.remove('bg-neutral-100', 'text-neutral-600', 'hover:bg-neutral-200');
            activeBtn.classList.add('active', 'bg-primary-600', 'text-white', 'shadow-md');

            // Filter rows
            rows.forEach(row => {
                const rowRole = row.getAttribute('data-role');
                if (role === 'all' || rowRole === role) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Show/hide empty state
            document.getElementById('emptyState').classList.toggle('hidden', visibleCount > 0);
        }

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('.user-row');
            let visibleCount = 0;

            rows.forEach(row => {
                const username = row.getAttribute('data-username').toLowerCase();
                const email = row.getAttribute('data-email').toLowerCase();
                const role = row.getAttribute('data-role');
                
                const matchesSearch = username.includes(searchTerm) || email.includes(searchTerm);
                const matchesFilter = currentFilter === 'all' || role === currentFilter;
                
                if (matchesSearch && matchesFilter) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Show/hide empty state
            document.getElementById('emptyState').classList.toggle('hidden', visibleCount > 0);
        });

        // Initialize with 'all' filter
        filterUsers('all');
    </script>

    <style>
        .filter-btn {
            background: #f5f5f5;
            color: #666;
        }
        .filter-btn.active {
            background: linear-gradient(135deg, #0066cc 0%, #0052a3 100%);
            color: white;
            box-shadow: 0 4px 6px rgba(0, 102, 204, 0.3);
        }
    </style>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php /**PATH D:\laragon\www\sibantar\resources\views/admin/users/index.blade.php ENDPATH**/ ?>