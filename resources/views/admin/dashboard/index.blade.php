<x-layout>
    <x-slot:title>Admin Dashboard - SIBANTAR</x-slot:title>

    <!-- Hero Section with Gradient -->
    <section class="bg-gradient-to-br from-primary-700 via-primary-600 to-primary-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h1 class="text-4xl font-bold mb-2">Admin Dashboard</h1>
                <p class="text-primary-100 text-lg">Kelola seluruh sistem SIBANTAR</p>
            </div>
        </div>
    </section>

    <!-- Stats Cards with Modern Design -->
    <section class="py-8 bg-gradient-to-b from-neutral-50 to-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 -mt-20 mb-12">
                    <!-- Total Users -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-neutral-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-sm text-neutral-600 mb-1">Total User</p>
                        <p class="text-3xl font-bold text-neutral-900 mb-2">1,234</p>
                        <p class="text-xs text-success-600 font-medium">↑ 12% dari bulan lalu</p>
                    </div>

                    <!-- Total Bengkel -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-neutral-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-secondary-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-secondary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-sm text-neutral-600 mb-1">Total Bengkel</p>
                        <p class="text-3xl font-bold text-neutral-900 mb-2">89</p>
                        <p class="text-xs text-success-600 font-medium">↑ 5 bengkel baru</p>
                    </div>

                    <!-- Total Transaksi -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-neutral-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-success-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-success-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-sm text-neutral-600 mb-1">Transaksi</p>
                        <p class="text-3xl font-bold text-neutral-900 mb-2">456</p>
                        <p class="text-xs text-neutral-500 font-medium">Bulan ini</p>
                    </div>

                    <!-- Revenue -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-neutral-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-warning-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-warning-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-sm text-neutral-600 mb-1">Revenue</p>
                        <p class="text-3xl font-bold text-neutral-900 mb-2">Rp 125jt</p>
                        <p class="text-xs text-neutral-500 font-medium">Bulan ini</p>
                    </div>
                </div>

                <livewire:create-management-buttons />
                <br> <br>

                <!-- Management Section -->
                <div class="bg-white rounded-2xl p-8 shadow-lg mb-8 border border-neutral-100">
                    <h2 class="text-2xl font-bold text-neutral-900 mb-6">Management</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                        <a href="/admin/users" class="bg-primary-600 hover:bg-primary-700 text-white text-center py-3 px-4 rounded-xl font-semibold transition-all duration-300 shadow-md hover:shadow-lg">
                            Kelola User
                        </a>
                        <a href="/admin/bengkel" class="bg-white hover:bg-primary-50 text-primary-700 border-2 border-primary-300 text-center py-3 px-4 rounded-xl font-semibold transition-all duration-300">
                            Kelola Bengkel
                        </a>
                        <a href="/admin/transactions" class="bg-white hover:bg-primary-50 text-primary-700 border-2 border-primary-300 text-center py-3 px-4 rounded-xl font-semibold transition-all duration-300">
                            Transaksi
                        </a>
                        <a href="/admin/announcements" class="bg-white hover:bg-primary-50 text-primary-700 border-2 border-primary-300 text-center py-3 px-4 rounded-xl font-semibold transition-all duration-300">
                            Pengumuman
                        </a>
                        <a href="/admin/reports" class="bg-white hover:bg-primary-50 text-primary-700 border-2 border-primary-300 text-center py-3 px-4 rounded-xl font-semibold transition-all duration-300">
                            Laporan
                        </a>
                        <a href="/admin/settings" class="bg-white hover:bg-primary-50 text-primary-700 border-2 border-primary-300 text-center py-3 px-4 rounded-xl font-semibold transition-all duration-300">
                            Settings
                        </a>
                    </div>
                </div>

                <!-- Aktivitas Terbaru -->
                <div class="bg-white rounded-2xl shadow-lg border border-neutral-100 overflow-hidden">
                    <div class="p-8 border-b border-neutral-200">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                            <h2 class="text-2xl font-bold text-neutral-900">Aktivitas Terbaru</h2>
                            
                            <!-- Filter Tabs -->
                            <div class="flex flex-wrap gap-2">
                                <button onclick="filterUsers('all')" id="filter-all" class="filter-btn active px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300">
                                    Semua
                                </button>
                                <button onclick="filterUsers('admin')" id="filter-admin" class="filter-btn px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300">
                                    Admin
                                </button>
                                <button onclick="filterUsers('bengkel')" id="filter-bengkel" class="filter-btn px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300">
                                    Bengkel
                                </button>
                                <button onclick="filterUsers('user')" id="filter-user" class="filter-btn px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300">
                                    User
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-neutral-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Username</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Role</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">WA Number</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-200">
                                <tr class="user-row hover:bg-neutral-50 transition-colors" data-role="admin">
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">1</td>
                                    <td class="px-6 py-4 text-sm font-semibold text-neutral-900">randyfebrian</td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">2310817110013@mhs.ulm.ac.id</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 text-xs font-semibold text-primary-700 bg-primary-100 rounded-full">admin</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">0000</td>
                                </tr>
                                <tr class="user-row hover:bg-neutral-50 transition-colors" data-role="admin">
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">2</td>
                                    <td class="px-6 py-4 text-sm font-semibold text-neutral-900">muhammadrizky</td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">2310817310011@mhs.ulm.ac.id</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 text-xs font-semibold text-primary-700 bg-primary-100 rounded-full">admin</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">0000</td>
                                </tr>
                                <tr class="user-row hover:bg-neutral-50 transition-colors" data-role="admin">
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">3</td>
                                    <td class="px-6 py-4 text-sm font-semibold text-neutral-900">zahranabila</td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">2310817110011@mhs.ulm.ac.id</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 text-xs font-semibold text-primary-700 bg-primary-100 rounded-full">admin</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">0000</td>
                                </tr>
                                <tr class="user-row hover:bg-neutral-50 transition-colors" data-role="admin">
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">4</td>
                                    <td class="px-6 py-4 text-sm font-semibold text-neutral-900">ghanimudzakir</td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">2310817320007@mhs.ulm.ac.id</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 text-xs font-semibold text-primary-700 bg-primary-100 rounded-full">admin</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">0000</td>
                                </tr>
                                <tr class="user-row hover:bg-neutral-50 transition-colors" data-role="admin">
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">5</td>
                                    <td class="px-6 py-4 text-sm font-semibold text-neutral-900">erikamaulidiya</td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">erikamaulidiya@admin</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 text-xs font-semibold text-primary-700 bg-primary-100 rounded-full">admin</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">0000</td>
                                </tr>
                                
                                <!-- Bengkel Users (Dummy) -->
                                <tr class="user-row hover:bg-neutral-50 transition-colors" data-role="bengkel">
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">6</td>
                                    <td class="px-6 py-4 text-sm font-semibold text-neutral-900">bengkeljaya</td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">jaya@bengkel.com</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 text-xs font-semibold text-secondary-700 bg-secondary-100 rounded-full">bengkel</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">081234567890</td>
                                </tr>
                                <tr class="user-row hover:bg-neutral-50 transition-colors" data-role="bengkel">
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">7</td>
                                    <td class="px-6 py-4 text-sm font-semibold text-neutral-900">bengkelmaju</td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">maju@bengkel.com</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 text-xs font-semibold text-secondary-700 bg-secondary-100 rounded-full">bengkel</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">081234567891</td>
                                </tr>
                                
                                <!-- Regular Users (Dummy) -->
                                <tr class="user-row hover:bg-neutral-50 transition-colors" data-role="user">
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">8</td>
                                    <td class="px-6 py-4 text-sm font-semibold text-neutral-900">johndoe</td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">john@user.com</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 text-xs font-semibold text-success-700 bg-success-100 rounded-full">user</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">081298765432</td>
                                </tr>
                                <tr class="user-row hover:bg-neutral-50 transition-colors" data-role="user">
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">9</td>
                                    <td class="px-6 py-4 text-sm font-semibold text-neutral-900">janedoe</td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">jane@user.com</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 text-xs font-semibold text-success-700 bg-success-100 rounded-full">user</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-neutral-600">081298765433</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        // Filter functionality
        function filterUsers(role) {
            const rows = document.querySelectorAll('.user-row');
            const filterBtns = document.querySelectorAll('.filter-btn');

            // Update active button
            filterBtns.forEach(btn => {
                btn.classList.remove('active', 'bg-primary-600', 'text-white', 'shadow-md');
                btn.classList.add('bg-neutral-100', 'text-neutral-600');
            });
            
            const activeBtn = document.getElementById(`filter-${role}`);
            activeBtn.classList.remove('bg-neutral-100', 'text-neutral-600');
            activeBtn.classList.add('active', 'bg-primary-600', 'text-white', 'shadow-md');

            // Filter rows
            rows.forEach(row => {
                const rowRole = row.getAttribute('data-role');
                if (role === 'all' || rowRole === role) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Initialize with 'all' filter
        filterUsers('all');
    </script>

    <style>
        .filter-btn {
            background: #f5f5f5;
            color: #666;
        }
        .filter-btn:hover {
            background: #e5e5e5;
        }
        .filter-btn.active {
            background: linear-gradient(135deg, #0066cc 0%, #0052a3 100%);
            color: white;
            box-shadow: 0 4px 6px rgba(0, 102, 204, 0.3);
        }
    </style>

</x-layout>
