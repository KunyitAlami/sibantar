<div class="max-w-full">
    <!-- Quick Actions -->
    <div class="card p-6 mb-8">
        <h2 class="text-xl font-bold text-neutral-900 mb-4">Management</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
            <button wire:click="kelolaUser" class="btn btn-primary font-semibold">Kelola User</button>
            <button wire:click="kelolaBengkel" class="btn btn-outline font-semibold">Kelola Bengkel</button>
            <button wire:click="kelolaTransaksi" class="btn btn-outline font-semibold">Transaksi</button>
            <button wire:click="kelolaPengumuman" class="btn btn-outline font-semibold">Pengumuman</button>
            <button wire:click="kelolaLaporan" class="btn btn-outline font-semibold">Laporan</button>
            <button wire:click="kelolaSettings" class="btn btn-outline font-semibold">Settings</button>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="card p-6">
        <h2 class="text-xl font-bold text-neutral-900 mb-4">Aktivitas Terbaru</h2>

        <!--[if BLOCK]><![endif]--><?php if($activePanel === 'user'): ?>
            <div class="flex flex-wrap gap-2 mb-4">
                <button wire:click="setRoleFilter('all')"
                    class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300
                    <?php echo e($roleFilter === 'all' ? 'bg-primary-600 text-white shadow-md' : 'bg-neutral-100 text-neutral-600'); ?>">
                    Semua
                </button>

                <button wire:click="setRoleFilter('admin')"
                    class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300
                    <?php echo e($roleFilter === 'admin' ? 'bg-primary-600 text-white shadow-md' : 'bg-neutral-100 text-neutral-600'); ?>">
                    Admin
                </button>

                <button wire:click="setRoleFilter('bengkel')"
                    class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300
                    <?php echo e($roleFilter === 'bengkel' ? 'bg-primary-600 text-white shadow-md' : 'bg-neutral-100 text-neutral-600'); ?>">
                    Bengkel
                </button>

                <button wire:click="setRoleFilter('user')"
                    class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300
                    <?php echo e($roleFilter === 'user' ? 'bg-primary-600 text-white shadow-md' : 'bg-neutral-100 text-neutral-600'); ?>">
                    User
                </button>
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
                    <tbody>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-neutral-50">
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($user->id_user); ?></td>
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($user->username); ?></td>
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($user->email); ?></td>
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                <!--[if BLOCK]><![endif]--><?php if($user->role == 'admin'): ?>
                                    <span class="px-3 py-1 text-xs font-semibold text-primary-700 bg-primary-100 rounded-full">
                                        <?php echo e($user->role); ?>

                                    </span>
                                <?php elseif($user->role == 'bengkel'): ?>
                                    <span class="px-3 py-1 text-xs font-semibold text-secondary-700 bg-secondary-100 rounded-full">
                                        <?php echo e($user->role); ?>

                                    </span>
                                <?php else: ?>
                                    <span class="px-3 py-1 text-xs font-semibold text-success-700 bg-success-100 rounded-full">
                                        <?php echo e($user->role); ?>

                                    </span>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </td>
                            <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($user->wa_number); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
            </div>
        <?php elseif($activePanel === 'bengkel'): ?>
            <div class="overflow-x-auto">
                
                <div>
                    <div class="flex flex-col mb-8"> 
                        <h1 class="text-2xl font-bold text-black mb-4 mt-10">Daftar Calon Mitra Bengkel SIBANTAR</h1>
                        <p class="text-gray-500">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore temporibus pariatur.</p>
                    </div>

                    <?php
                        $belumDiterima = $calonbengkels->where('status', 'belum_diterima');
                    ?>

                    <!--[if BLOCK]><![endif]--><?php if($belumDiterima->isEmpty()): ?>
                        <div class="text-center py-12 text-neutral-500">
                            <p class="font-semibold">Belum ada calon Mitra baru</p> 
                            <p class="text-sm mt-1">Calon Mitra akan muncul di sini</p> 
                        </div>
                    <?php else: ?>
                        <div> 
                            <table class="w-full">
                                <thead>
                                    <tr class="text-left font-semibold text-neutral-700">
                                        <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">ID Bengkel</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Nama Bengkel</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Kecamatan</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Alamat</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Jam Operasional</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Aktivitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $belumDiterima; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="hover:bg-neutral-50">
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($b->id_calon_bengkel); ?></td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($b->nama_bengkel); ?></td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($b->kecamatan); ?></td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($b->alamat_lengkap ?? '-'); ?></td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                                <!--[if BLOCK]><![endif]--><?php if(!empty($b->jam_operasional)): ?>
                                                    <?php echo e($b->jam_operasional); ?>

                                                <?php else: ?>
                                                    <?php echo e($b->jam_buka); ?> - <?php echo e($b->jam_tutup); ?> WITA
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">Belum Diterima</td>
                                            <td class="px-4 py-2 border-b hover:underline hover:text-gray-700">
                                                <a href="<?php echo e(route('admin.calonBengkel.show', $b->id_calon_bengkel)); ?>" class="hover:text-gray-700">
                                                    Lebih Lanjut
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                
                <div>
                    <div class="flex flex-col mb-8"> 
                        <h1 class="text-2xl font-bold text-black mb-4 mt-10">Profile Mita Bengkel SIBANTAR</h1>
                        <p class="text-gray-500">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore temporibus pariatur.</p>
                    </div>
                    <div> 
                        <table>
                            <thead class="bg-neutral-100">
                                <tr class="text-left font-semibold text-neutral-700">
                                    <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">ID Bengkel</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">ID User</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Nama Bengkel</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Kecamatan</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Alamat</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Jam Operasional</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-neutral-700 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $bengkels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-neutral-50">
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($b->id_bengkel); ?></td>
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                        <!--[if BLOCK]><![endif]--><?php if($b->id_user): ?>
                                            <?php echo e($b->id_user); ?>

                                        <?php else: ?>
                                            <span class="italic text-gray-500">tidak ada id_user untuk bengkel ini</span>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($b->nama_bengkel); ?></td>
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($b->kecamatan); ?></td>
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($b->alamat_lengkap ?? '-'); ?></td>
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($b->jam_operasional); ?></td>
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($b->status); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="text-center py-12 text-neutral-500">
                <p class="font-semibold">Belum ada aktivitas</p>
                <p class="text-sm mt-1">Aktivitas akan muncul di sini</p>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div>
<?php /**PATH D:\laragon\www\sibantar\resources\views/livewire/create-management-buttons.blade.php ENDPATH**/ ?>