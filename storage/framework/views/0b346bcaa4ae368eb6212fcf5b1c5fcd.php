<?php if (isset($component)) { $__componentOriginal2e6fb18f75884c4fed4e10444e669251 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2e6fb18f75884c4fed4e10444e669251 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout-admin','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout-admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> Kelola User - Admin SIBANTAR <?php $__env->endSlot(); ?>

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-primary-700 via-primary-600 to-primary-800 text-white py-4 md:py-4">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="flex items-center gap-3">
                    <a href="/admin/dashboard" class="hover:bg-white/10 p-2 rounded-lg transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-2xl sm:text-2xl md:text-2xl font-bold">Kelola Akun</h1>
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
                    <div class="flex flex-col gap-4">
                        <!-- Filter Dropdown -->
                        <div class="flex items-center gap-2">
                            <label for="filterSelect" class="sr-only">Filter role</label>
                            <select id="filterSelect" class="select select-bordered w-full sm:w-64 h-12">
                                <option value="all">Semua</option>
                                <option value="admin">Admin</option>
                                <option value="bengkel">Bengkel</option>
                                <option value="user">User</option>
                            </select>
                        </div>

                        <!-- Search Bar -->
                        <div class="relative w-full">
                            <input type="text" id="searchInput" placeholder="Cari user..." class="w-full pl-10 pr-4 py-3 border-2 border-neutral-200 rounded-xl focus:border-primary-500 focus:outline-none transition-colors">
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
                                    <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Whatsapp</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="userTableBody" class="divide-y divide-neutral-200">
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="user-row hover:bg-neutral-50 transition-colors" data-role="<?php echo e($user->role); ?>" data-username="<?php echo e($user->username); ?>" data-email="<?php echo e($user->email); ?>">
                                        <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($user->id_user); ?></td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full flex items-center justify-center text-white font-bold">
                                                    <?php echo e(strtoupper(substr($user->username ?? '', 0, 1))); ?>

                                                </div>
                                                <span class="text-sm font-semibold text-neutral-900"><?php echo e($user->username); ?></span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-neutral-600"><?php echo e($user->email); ?></td>
                                        <td class="px-6 py-4">
                                            <?php
                                                $r = strtolower($user->role ?? '');
                                                $badge = '';
                                                if ($r === 'admin') {
                                                    $badge = 'text-primary-700 bg-primary-100 border-primary-200';
                                                } elseif ($r === 'bengkel') {
                                                    $badge = 'text-secondary-700 bg-secondary-100 border-secondary-200';
                                                } elseif ($r === 'user') {
                                                    $badge = 'text-success-700 bg-success-100 border-success-200';
                                                } else {
                                                    $badge = 'text-neutral-700 bg-neutral-100 border-neutral-200';
                                                }
                                            ?>
                                            <span class="px-3 py-1.5 text-xs font-bold rounded-full border <?php echo e($badge); ?>"><?php echo e(strtoupper($user->role)); ?></span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-neutral-600"><?php echo e($user->wa_number); ?></td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-2">
                                                    <a href="<?php echo e(route('admin.edit-user', $user->id_user)); ?>" class="px-3 py-1.5 text-sm font-medium rounded-full border border-yellow-300 text-yellow-700 bg-yellow-50 hover:bg-yellow-100 transition-colors" title="Edit">
                                                        Edit
                                                    </a>

                                                    <form method="POST" action="<?php echo e(route('admin.users.delete', $user->id_user)); ?>" class="swal-delete-form" data-username="<?php echo e($user->username); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <button type="submit" class="ml-2 px-3 py-1.5 text-sm font-medium rounded-full border border-red-300 text-red-700 bg-red-50 hover:bg-red-100 transition-colors" title="Hapus">
                                                            Hapus
                                                        </button>
                                                    </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

        // Filter function using select control
        function filterUsers(role) {
            currentFilter = role;
            const rows = document.querySelectorAll('.user-row');
            let visibleCount = 0;

            rows.forEach(row => {
                const rowRole = row.getAttribute('data-role');
                if (role === 'all' || rowRole === role) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            document.getElementById('emptyState').classList.toggle('hidden', visibleCount > 0);
        }

        // Hook up select change
        const filterSelect = document.getElementById('filterSelect');
        if (filterSelect) {
            filterSelect.addEventListener('change', function(e) {
                filterUsers(e.target.value);
            });
        }

        // Search functionality (respects currentFilter)
        const searchInput = document.getElementById('searchInput');
        if (searchInput) {
            searchInput.addEventListener('input', function(e) {
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

                document.getElementById('emptyState').classList.toggle('hidden', visibleCount > 0);
            });
        }

        // Initialize
        filterUsers('all');
    </script>

    <style>
        /* Hide profile avatar circles in the users table */
        #userTableBody .w-10.h-10 { display: none !important; }

        /* Optional: reduce gap left by removed avatars */
        #userTableBody td > div.flex.items-center.gap-3 { gap: 0.5rem; }
    </style>

    <script>
        // Lazy-load SweetAlert2 and attach to delete forms
        (function(){
            const loadSwal = () => new Promise((resolve, reject) => {
                if (window.Swal) return resolve(window.Swal);
                const s = document.createElement('script');
                s.src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11';
                s.onload = () => resolve(window.Swal);
                s.onerror = reject;
                document.head.appendChild(s);
            });

            function showDeleteConfirm(form) {
                const username = form.dataset.username || 'user ini';
                loadSwal().then(Swal => {
                    Swal.fire({
                        title: `Hapus ${username}?`,
                        text: 'Aksi ini akan menghapus akun secara permanen.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal',
                        focusCancel: true,
                        reverseButtons: true,
                        confirmButtonColor: '#ef4444', // red-500 (destructive)
                        cancelButtonColor: '#6b7280'   // gray-500
                    }).then(result => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                }).catch(() => {
                    // fallback to native confirm
                    if (confirm(`Yakin ingin menghapus ${username}?`)) form.submit();
                });
            }

            document.addEventListener('DOMContentLoaded', function(){
                document.querySelectorAll('.swal-delete-form').forEach(form => {
                    form.addEventListener('submit', function(e){
                        e.preventDefault();
                        showDeleteConfirm(form);
                    });
                });
            });
        })();
    </script>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2e6fb18f75884c4fed4e10444e669251)): ?>
<?php $attributes = $__attributesOriginal2e6fb18f75884c4fed4e10444e669251; ?>
<?php unset($__attributesOriginal2e6fb18f75884c4fed4e10444e669251); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2e6fb18f75884c4fed4e10444e669251)): ?>
<?php $component = $__componentOriginal2e6fb18f75884c4fed4e10444e669251; ?>
<?php unset($__componentOriginal2e6fb18f75884c4fed4e10444e669251); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\sibantar\resources\views/admin/users/index.blade.php ENDPATH**/ ?>