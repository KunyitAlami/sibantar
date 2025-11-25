<div class="max-w-full">
    <!-- Quick Actions -->
    <div class="card p-6 mb-8">
        <h2 class="text-xl font-bold text-neutral-900 mb-4">Management</h2>
        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-4 gap-5">
            <button wire:click="kelolaUser"
                class="btn font-semibold transition-all
                <?php echo e($activePanel === 'user' ? 'btn-primary text-white' : 'btn-outline'); ?>">
                Kelola User
            </button>
            <button wire:click="kelolaBengkel"
                class="btn font-semibold transition-all
                <?php echo e($activePanel === 'bengkel' ? 'btn-primary text-white' : 'btn-outline'); ?>">
                Kelola Bengkel
            </button>
            <button wire:click="kelolaLaporan"
                class="btn font-semibold transition-all
                <?php echo e($activePanel === 'laporan' ? 'btn-primary text-white' : 'btn-outline'); ?>">
                Laporan
            </button>
            <button wire:click="kelolaPemblokiran"
                class="btn font-semibold transition-all
                <?php echo e($activePanel === 'pemblokiran' ? 'btn-primary text-white' : 'btn-outline'); ?>">
                Pemblokiran
            </button>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="card p-6">
        <h2 class="text-xl font-bold text-neutral-900 mb-4">Aktivitas Terbaru</h2>

        <!--[if BLOCK]><![endif]--><?php if($activePanel === 'user'): ?>
            
            <a href="<?php echo e(route('admin.tambah-user')); ?>" 
            class="mb-6 px-3 py-2 sm:px-4 sm:py-2 rounded-md font-semibold border border-blue-700 text-blue-700 hover:bg-blue-700 hover:text-white transition-all text-center">
                Tambah User Manual
            </a>
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

            <div class="overflow-x-auto" wire:poll.4s.keep-alive>
                <table class="w-full text-center">
                    <thead class="bg-neutral-200">
                        <tr>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">ID User</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Username</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Role</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">WA Number</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider" colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-neutral-50" wire:key="user-<?php echo e($user->id_user); ?>">
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
                            <td class="px-4 py-2">
                                <a href="<?php echo e(route('admin.edit-user', ['id_user' => $user->id_user])); ?>" 
                                class="px-3 py-1.5 text-sm font-medium rounded-md border border-yellow-500 text-yellow-500 
                                            hover:bg-yellow-500 hover:text-white transition">
                                    Edit
                                </a>
                            </td>

                            <td class="px-3 py-2 sm:px-4 sm:py-3">
                                <button wire:click="hapusUser(<?php echo e($user->id_user); ?>)"
                                        wire:loading.attr="disabled"
                                        wire:target="hapusUser(<?php echo e($user->id_user); ?>)"
                                        class="px-3 py-1.5 text-sm font-medium rounded-md text-red-500 border border-red-500
                                            hover:bg-red-500 hover:text-white transition disabled:opacity-50 disabled:cursor-not-allowed">

                                    <span wire:loading.remove wire:target="hapusUser(<?php echo e($user->id_user); ?>)">Hapus</span>
                                    <span wire:loading wire:target="hapusUser(<?php echo e($user->id_user); ?>)">Menghapus...</span>
                                </button>
                            </td>
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
                        <p class="text-gray-500">Ini adalah daftar calon daftar mitra bengkel SIBANTAR</p>
                    </div>

                    <?php
                        $belumDiterima = $calonbengkels->where('status', 'belum_diterima');
                    ?>

                    <!--[if BLOCK]><![endif]--><?php if($belumDiterima->isEmpty()): ?>
                        <div class="text-center py-12 text-neutral-500">
                            <p class="font-semibold">Belum ada calon Mitra baru</p> 
                            <p class="text-sm mt-1">Calon Mitra SIBANTAR akan muncul di sini</p> 
                        </div>
                    <?php else: ?>
                        <div> 
                            <table class="w-full text-center">
                                <thead>
                                    <tr class="text-left font-semibold bg-neutral-200">
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">ID Bengkel</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Nama Bengkel</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Kecamatan</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Alamat</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Jam Operasional</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Aktivitas</th>
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
                        <table class="text-center">
                            <thead class="bg-neutral-200">
                                <tr class="text-left font-semibold text-neutral-700">
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">ID Bengkel</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">ID User</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Nama Bengkel</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Kecamatan</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Alamat</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Jam Operasional</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Aktivitas</th>
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
                                    <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                        <a href="<?php echo e(route('admin.cekAktivitas', $b->id_bengkel)); ?>" class="border border-yellow-600 text-yellow-600 hover:bg-yellow-600 hover:text-white px-4 py-2 rounded-md">
                                            Cek
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
        <?php elseif($activePanel === 'laporan'): ?>
            <div class="overflow-x-auto">
                
                <div>
                    <div class="flex flex-col mb-8"> 
                        <h1 class="text-2xl font-bold text-black mb-4 mt-10">Daftar Laporan dari Mitra Bengkel SIBANTAR</h1>
                        <p class="text-gray-500">Ini adalah daftar laporan yang dikirimkan oleh mitra bengkel SIBANTAR</p>
                    </div>

                    <!--[if BLOCK]><![endif]--><?php if($reportBengkel->isEmpty()): ?>
                        <div class="text-center py-12 text-neutral-500">
                            <p class="font-semibold">Belum ada laporan dari Mitra Bengkel</p> 
                            <p class="text-sm mt-1">Laporan dari Mitra Bengkel akan muncul di sini</p> 
                        </div>
                    <?php else: ?>
                        <div> 
                            <table class="w-full text-center">
                                <thead>
                                    <tr class="text-left font-semibold bg-neutral-200">
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">ID Report</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">ID Order</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Nama Bengkel</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Nama User</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Deskripsi</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Tanggal Laporan</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Aktivitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $reportBengkel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="hover:bg-neutral-50">
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($rb->id_report_from_bengkel); ?></td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($rb->id_order); ?></td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                                <?php echo e($rb->bengkel->nama_bengkel ?? '-'); ?>

                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                                <?php echo e($rb->user->username ?? '-'); ?>

                                            </td>
                                            <td class="px-6 py-4 text-sm text-neutral-900">
                                                <?php echo e(Str::limit($rb->deskripsi, 50) ?? '-'); ?>

                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                                <?php echo e($rb->created_at->format('d/m/Y H:i')); ?>

                                            </td>
                                            <td class="px-4 py-2 border-b hover:underline hover:text-gray-700">
                                                <a href="#" class="hover:text-gray-700">
                                                    Detail
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                
                <div class="mt-12">
                    <div class="flex flex-col mb-8"> 
                        <h1 class="text-2xl font-bold text-black mb-4 mt-10">Daftar Laporan dari User SIBANTAR</h1>
                        <p class="text-gray-500">Ini adalah daftar laporan yang dikirimkan oleh user SIBANTAR</p>
                    </div>

                    <!--[if BLOCK]><![endif]--><?php if($reportUser->isEmpty()): ?>
                        <div class="text-center py-12 text-neutral-500">
                            <p class="font-semibold">Belum ada laporan dari User</p> 
                            <p class="text-sm mt-1">Laporan dari User akan muncul di sini</p> 
                        </div>
                    <?php else: ?>
                        <div> 
                            <table class="w-full text-center">
                                <thead class="bg-neutral-200">
                                    <tr class="text-left font-semibold text-neutral-700">
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">ID Report</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">ID Order</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Nama User</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Nama Bengkel</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Deskripsi</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Tanggal Laporan</th>
                                        <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Aktivitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $reportUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="hover:bg-neutral-50">
                                        <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($ru->id_report_from_user); ?></td>
                                        <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($ru->id_order); ?></td>
                                        <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                            <?php echo e($ru->user->username ?? '-'); ?>

                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                            <?php echo e($ru->bengkel->nama_bengkel ?? '-'); ?>

                                        </td>
                                        <td class="px-6 py-4 text-sm text-neutral-900">
                                            <?php echo e(Str::limit($ru->deskripsi, 50) ?? '-'); ?>

                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                            <?php echo e($ru->created_at->format('d/m/Y H:i')); ?>

                                        </td>
                                        <td class="px-4 py-2 border-b hover:underline hover:text-gray-700">
                                            <a href="#" class="hover:text-gray-700">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        
        <?php elseif($activePanel === 'pemblokiran'): ?>
            <div class="overflow-x-auto">
                <!--[if BLOCK]><![endif]--><?php if(session()->has('success')): ?>
                    <div class="p-2 mb-2 text-green-800 bg-green-200 rounded">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <table class="w-full text-center">
                    <thead class="bg-neutral-200">
                        <tr>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">ID User</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Username</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">WA Number</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Skor</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-neutral-700 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="<?php echo e($skors[$user->id_user] > 3 ? 'bg-red-100' : ''); ?> hover:bg-neutral-50">
                                <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($user->id_user); ?></td>
                                <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($user->username); ?></td>
                                <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($user->email); ?></td>
                                <td class="px-6 py-4 text-sm font-medium text-neutral-900"><?php echo e($user->wa_number); ?></td>
                                <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                    <input type="number" min="0" max="10" wire:model.defer="skors.<?php echo e($user->id_user); ?>">
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-neutral-900">
                                    <button class="px-3 py-1.5 text-sm font-medium rounded-md border border-yellow-500 text-yellow-500 
                                            hover:bg-yellow-500 hover:text-white transition" wire:click="updateSkor(<?php echo e($user->id_user); ?>)">
                                        Update Skor
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="text-center py-12 text-neutral-500">
                <p class="font-semibold">Belum ada aktivitas</p>
                <p class="text-sm mt-1">Aktivitas muncul di sini jika sudah memilih menu</p>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    </div>
</div>
<?php /**PATH D:\laragon\www\sibantar\resources\views/livewire/create-management-buttons.blade.php ENDPATH**/ ?>