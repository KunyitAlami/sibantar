<div class="max-w-full">
    <!-- Quick Actions + Recent Activity (single card, side-by-side) -->
    <div class="card p-6 mb-8">
        <div>
            <div class="w-full mb-6">
                <h2 class="text-xl font-bold text-neutral-900 mb-4">Management</h2>
                <div class="flex flex-wrap items-center gap-3">
                    <button wire:click="kelolaUser"
                        class="px-4 py-2 rounded-full text-sm font-semibold transition-all duration-300 focus:outline-none
                        <?php echo e(($activePanel ?? 'user') === 'user' ? 'bg-primary-600 text-white shadow-md' : 'bg-white text-primary-600 border-2 border-primary-600'); ?>">
                        Kelola Akun
                    </button>

                    <button wire:click="kelolaBengkel"
                        class="px-4 py-2 rounded-full text-sm font-semibold transition-all duration-300 focus:outline-none
                        <?php echo e(($activePanel ?? 'user') === 'bengkel' ? 'bg-primary-600 text-white shadow-md' : 'bg-white text-primary-600 border-2 border-primary-600'); ?>">
                        Kelola Bengkel
                    </button>

                    <button wire:click="kelolaTransaksi"
                        class="px-4 py-2 rounded-full text-sm font-semibold transition-all duration-300 focus:outline-none
                        <?php echo e(($activePanel ?? 'user') === 'transaksi' ? 'bg-primary-600 text-white shadow-md' : 'bg-white text-primary-600 border-2 border-primary-600'); ?>">
                        Transaksi
                    </button>

                    <button wire:click="kelolaLaporan"
                        class="px-4 py-2 rounded-full text-sm font-semibold transition-all duration-300 focus:outline-none
                        <?php echo e(($activePanel ?? 'user') === 'laporan' ? 'bg-primary-600 text-white shadow-md' : 'bg-white text-primary-600 border-2 border-primary-600'); ?>">
                        Laporan
                    </button>
                </div>
                </div>
            </div>

            <div class="w-full">
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
                        <table class="min-w-full divide-y divide-neutral-200">
                            <thead class="bg-neutral-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-700 uppercase tracking-wide">ID</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-700 uppercase tracking-wide">Username</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-700 uppercase tracking-wide">Email</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-700 uppercase tracking-wide">Role</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-700 uppercase tracking-wide">WA Number</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-neutral-100">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-neutral-50">
                                    <td class="px-4 py-3 text-sm font-medium text-neutral-900"><?php echo e($user->id_user); ?></td>
                                    <td class="px-4 py-3 text-sm font-medium text-neutral-900"><?php echo e($user->username); ?></td>
                                    <td class="px-4 py-3 text-sm text-neutral-700"><?php echo e($user->email); ?></td>
                                    <td class="px-4 py-3 text-sm font-medium text-neutral-900">
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
                        
                        <div class="flex flex-wrap gap-2 mb-4">
                            <button wire:click="setBengkelTab('calon')"
                                class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300
                                <?php echo e(($bengkelTab ?? 'calon') === 'calon' ? 'bg-primary-600 text-white shadow-md' : 'bg-neutral-100 text-neutral-600'); ?>">
                                Calon Bengkel
                            </button>

                            <button wire:click="setBengkelTab('daftar')"
                                class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-300
                                <?php echo e(($bengkelTab ?? 'calon') === 'daftar' ? 'bg-primary-600 text-white shadow-md' : 'bg-neutral-100 text-neutral-600'); ?>">
                                Bengkel Terdaftar
                            </button>
                        </div>

                        
                        <div>
                                
                                <div class="flex flex-col mb-2"> 
                                    <!-- Judul daftar calon bengkel dihapus -->
                                </div>

                            <?php
                                $belumDiterima = $calonbengkels->where('status', 'belum_diterima');
                            ?>

                            <!--[if BLOCK]><![endif]--><?php if(($bengkelTab ?? 'calon') === 'calon'): ?>
                                <!--[if BLOCK]><![endif]--><?php if($belumDiterima->isEmpty()): ?>
                                <div class="text-center py-12 text-neutral-500">
                                    <p class="font-semibold">Belum ada calon Mitra baru</p> 
                                    <p class="text-sm mt-1">Calon Mitra akan muncul di sini</p> 
                                </div>
                                <?php else: ?>
                                <div> 
                                    <table class="min-w-full divide-y divide-neutral-200">
                                        <thead class="bg-neutral-100">
                                            <tr class="text-left font-semibold text-neutral-700">
                                                <th class="w-24 px-4 py-3 text-left text-xs font-semibold text-neutral-700 uppercase tracking-wide">ID Calon Bengkel</th>
                                                <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-700 uppercase tracking-wide">Nama Bengkel</th>
                                                <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-700 uppercase tracking-wide">Kecamatan</th>
                                                <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-700 uppercase tracking-wide">Alamat</th>
                                                <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-700 uppercase tracking-wide">Jam Operasional</th>
                                                <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-700 uppercase tracking-wide">Status</th>
                                                <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-700 uppercase tracking-wide">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-neutral-100">
                                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $belumDiterima; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="hover:bg-neutral-50">
                                                    <td class="w-24 px-4 py-3 text-sm font-medium text-neutral-900"><?php echo e($b->id_calon_bengkel); ?></td>
                                                    <td class="px-4 py-3 text-sm font-medium text-neutral-900"><?php echo e($b->nama_bengkel); ?></td>
                                                    <td class="px-4 py-3 text-sm font-medium text-neutral-900"><?php echo e($b->kecamatan); ?></td>
                                                    <td class="px-4 py-3 text-sm text-neutral-700"><?php echo e($b->alamat_lengkap ?? '-'); ?></td>
                                                    <td class="px-4 py-3 text-sm font-medium text-neutral-900">
                                                        <!--[if BLOCK]><![endif]--><?php if(!empty($b->jam_operasional)): ?>
                                                            <?php echo e($b->jam_operasional); ?>

                                                        <?php else: ?>
                                                            <?php echo e($b->jam_buka); ?> - <?php echo e($b->jam_tutup); ?> WITA
                                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                    </td>
                                                    <td class="px-4 py-3 text-sm font-medium text-neutral-900">Belum Diterima</td>
                                                    <td class="px-4 py-3">
                                                        <button type="button" onclick="window.location='<?php echo e(route('admin.calonBengkel.show', $b->id_calon_bengkel)); ?>'" class="px-3 py-1.5 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition">
                                                            Detail
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                        </tbody>
                                    </table>
                                </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>

                        
                        <div>
                            <?php if(($bengkelTab ?? 'calon') === 'daftar'): ?>
                            
                            <div class="flex flex-col mb-2"> 
                                <!-- Judul profile mita bengkel dihapus -->
                            </div>
                            <div> 
                                <table class="min-w-full divide-y divide-neutral-200">
                                    <thead class="bg-neutral-100">
                                        <tr class="text-left font-semibold text-neutral-700">
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-700 uppercase tracking-wide">ID Bengkel</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-700 uppercase tracking-wide">ID User</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-700 uppercase tracking-wide">Nama Bengkel</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-700 uppercase tracking-wide">Kecamatan</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-700 uppercase tracking-wide">Alamat</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-700 uppercase tracking-wide">Jam Operasional</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold text-neutral-700 uppercase tracking-wide">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-neutral-100">
                                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $bengkels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="hover:bg-neutral-50">
                                            <td class="px-4 py-3 text-sm font-medium text-neutral-900"><?php echo e($b->id_bengkel); ?></td>
                                            <td class="px-4 py-3 text-sm font-medium text-neutral-900">
                                                <!--[if BLOCK]><![endif]--><?php if($b->id_user): ?>
                                                    <?php echo e($b->id_user); ?>

                                                <?php else: ?>
                                                    <span class="italic text-gray-500">tidak ada id_user untuk bengkel ini</span>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </td>
                                            <td class="px-4 py-3 text-sm font-medium text-neutral-900"><?php echo e($b->nama_bengkel); ?></td>
                                            <td class="px-4 py-3 text-sm font-medium text-neutral-900"><?php echo e($b->kecamatan); ?></td>
                                            <td class="px-4 py-3 text-sm text-neutral-700"><?php echo e($b->alamat_lengkap ?? '-'); ?></td>
                                            <td class="px-4 py-3 text-sm font-medium text-neutral-900"><?php echo e($b->jam_operasional); ?></td>
                                            <td class="px-4 py-3 text-sm font-medium text-neutral-900"><?php echo e($b->status); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                    </tbody>
                                </table>
                            </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
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
    </div>
</div>
<?php /**PATH C:\laragon\www\sibantar\resources\views/livewire/create-management-buttons.blade.php ENDPATH**/ ?>