<div class="space-y-6">
    
    <div class="flex gap-3">
        <button wire:click="setPanel('about')" 
            class="px-4 py-2 rounded-lg font-semibold 
                <?php echo e($activePanel === 'about' ? 'bg-blue-700 text-white' : 'bg-neutral-200'); ?>">
            About Bengkel
        </button>

        <button wire:click="setPanel('order')" 
            class="px-4 py-2 rounded-lg font-semibold 
                <?php echo e($activePanel === 'order' ? 'bg-blue-700 text-white' : 'bg-neutral-200'); ?>">
            Daftar Pesanan
        </button>

        <button wire:click="setPanel('layanan')" 
            class="px-4 py-2 rounded-lg font-semibold 
                <?php echo e($activePanel === 'layanan' ? 'bg-blue-700 text-white' : 'bg-neutral-200'); ?>">
            Daftar Layanan
        </button>

        <button wire:click="setPanel('report')" 
            class="px-4 py-2 rounded-lg font-semibold 
                <?php echo e($activePanel === 'report' ? 'bg-blue-700 text-white' : 'bg-neutral-200'); ?>">
            Report
        </button>
    </div>


    
    <div class="mt-6">

        
        <!--[if BLOCK]><![endif]--><?php if($activePanel === 'about'): ?>
            <div class="card p-5 shadow-md">
                <h2 class="text-xl font-bold mb-3">Profil Bengkel</h2>
                <p class="text-neutral-700">Nama: <strong><?php echo e($bengkel->nama_bengkel); ?></strong></p>
                <p class="text-neutral-700">Alamat: <?php echo e($bengkel->alamat_lengkap); ?></p>
                <p class="text-neutral-700">Kecamatan: <?php echo e($bengkel->kecamatan); ?></p>
                <p class="text-neutral-700">Jam: <?php echo e($bengkel->jam_operasional); ?></p>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


        
        <!--[if BLOCK]><![endif]--><?php if($activePanel === 'order'): ?>
        <div wire:poll.1000ms="loadOrders">
            <div class="card p-5 shadow-md">
                <h2 class="text-xl font-bold mb-4">Daftar Pesanan</h2>
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        // Dynamic status badge
                        $statusColor = match($order->status) {
                            'pending' => 'bg-yellow-100 text-yellow-700',  // ← ubah dari 'menunggu' ke 'pending'
                            'dibayar' => 'bg-green-100 text-green-700',
                            'diproses' => 'bg-blue-100 text-blue-700',
                            'selesai'  => 'bg-green-100 text-green-700',
                            'gagal'    => 'bg-red-100 text-red-700',
                            'dibatalkan' => 'bg-gray-100 text-gray-700',
                            default    => 'bg-gray-100 text-gray-700',
                        };
                    ?>

                    <div class="bg-white rounded-xl p-5 mb-4 shadow-sm border border-neutral-200 hover:shadow-md transition-all">
                        
                        <div class="flex items-start justify-between mb-3">
                            <div>
                                <h3 class="font-bold text-lg text-neutral-900"><?php echo e($order->user->username); ?></h3>
                                
                                
                                <div class="flex items-center gap-2 text-sm text-neutral-500 mt-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                    
                                    
                                    <span>
                                        <!--[if BLOCK]><![endif]--><?php if(isset($order->distance_km) && $order->distance_km): ?>
                                            <?php echo e($order->distance_km); ?> km dari bengkel
                                        <?php else: ?>
                                            Jarak tidak tersedia (distance_km: <?php echo e(var_export($order->distance_km ?? 'null', true)); ?>)
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </span>
                                </div>
                                
                                <div class="flex items-center gap-2 text-sm text-neutral-500 mt-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                    
                                    
                                    <span>
                                        <!--[if BLOCK]><![endif]--><?php if(isset($order->layananBengkel->kategori) && $order->layananBengkel->kategori): ?>
                                            Kategori: <?php echo e($order->layananBengkel->kategori); ?>

                                        <?php else: ?>
                                            Kategori tidak tersedia
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </span>
                                </div>
                                
                                <div class="flex items-center gap-2 text-sm text-neutral-500 mt-1 ">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                    
                                    
                                    <span>
                                        <!--[if BLOCK]><![endif]--><?php if(isset($order->layananBengkel->nama_layanan) && $order->layananBengkel->nama_layanan): ?>
                                            Jenis Layanan: <?php echo e($order->layananBengkel->nama_layanan); ?>

                                        <?php else: ?>
                                            Jenis Layanan tidak tersedia
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </span>
                                </div>
                            </div>
                            
                            <span class="px-3 py-1 rounded-full text-xs font-semibold <?php echo e($statusColor); ?>">
                                <?php echo e(ucfirst($order->status)); ?>

                            </span>
                        </div>
                        
                        
                        <div class="p-3 border-t border-b bg-neutral-50 rounded-lg">
                            <p class="text-sm text-neutral-600 mt-1">
                                Harga: <span class="font-medium">Rp <?php echo e(number_format($order->total_bayar ?? 0, 0, ',', '.')); ?></span>
                            </p>
                            <p class="text-sm text-neutral-600">
                                Status: <span class="font-medium"><?php echo e(ucfirst($order->status)); ?></span>
                            </p>
                        </div>
                        
                        <div wire:poll.1000ms class="mt-3 text-sm text-neutral-600"
                            x-data="{
                                countdown_ms: <?php echo e($order->countdown_ms ?? 0); ?>,
                                now: 0,
                                diff: <?php echo e($order->countdown_ms ?? 0); ?>,
                                isActive: <?php echo e($order->countdown_active ? 'true' : 'false'); ?>,
                                isConfirmed: '<?php echo e($order->countDown?->status ?? ''); ?>' !== 'tidak_dikonfirmasi',
                                orderStatus: '<?php echo e($order->status); ?>'
                            }" 
                            x-init="
                                console.log('Order #<?php echo e($order->id_order); ?>', {
                                    countdown_ms: countdown_ms,
                                    isActive: isActive,
                                    isConfirmed: isConfirmed,
                                    countDownStatus: '<?php echo e($order->countDown?->status ?? 'NULL'); ?>',
                                    orderStatus: orderStatus
                                });
                                
                                if(isActive && !isConfirmed && countdown_ms > 0){
                                    let interval = setInterval(() => {
                                        now += 1000;
                                        diff = countdown_ms - now;
                                        if(diff <= 0){
                                            diff = 0;
                                            isActive = false;
                                            isConfirmed = true;
                                            $wire.handleCountdownAction(<?php echo e($order->id_order); ?>);
                                            clearInterval(interval);
                                        }
                                    }, 1000);
                                }
                            "
                        >
                        
                        <!--[if BLOCK]><![endif]--><?php if($order->countdown_ms !== null && $order->countdown_ms > 0): ?>
                            <div class="mb-3">
                                <span x-show="!isConfirmed && diff > 0"
                                    x-text="'Sisa waktu: ' + Math.floor(diff/60000).toString().padStart(2,'0') + ':' + Math.floor((diff%60000)/1000).toString().padStart(2,'0')"
                                    class="font-semibold text-red-600">
                                </span>

                                <span x-show="isConfirmed" class="font-semibold text-green-600">
                                    Pesanan sudah dikonfirmasi
                                </span>

                                
                                <span x-show="!isConfirmed && diff <= 0 && '<?php echo e($order->countDown?->status); ?>' === 'tidak_dikonfirmasi' && '<?php echo e($order->status); ?>' !== 'pending'"
                                    class="font-semibold text-red-600">
                                    Waktu habis - Order otomatis ditolak
                                </span>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        
                        <!--[if BLOCK]><![endif]--><?php if($order->countDown?->status === 'tidak_dikonfirmasi' && !$order->countdown_confirmed): ?>
                            <div class="grid grid-cols-2 gap-2 mt-4" x-show="!isConfirmed">
                                <button wire:click="rejectOrder(<?php echo e($order->id_order); ?>)" 
                                        @click="isConfirmed = true; orderStatus = 'ditolak'; $el.disabled = true"
                                        class="py-2.5 text-sm font-semibold text-white bg-red-600 border border-red-700 rounded-lg hover:bg-red-700 transition-all">
                                    Tolak Pesanan
                                </button>
                                <button wire:click="acceptOrder(<?php echo e($order->id_order); ?>)" 
                                        @click="isConfirmed = true; orderStatus = 'pending'; $el.disabled = true"
                                        class="py-2.5 text-sm font-semibold text-white bg-green-600 border border-green-700 rounded-lg hover:bg-green-700 transition-all">
                                    Terima Pesanan
                                </button>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        
                        <!--[if BLOCK]><![endif]--><?php if($order->status === 'pending' && $order->countDown?->status === 'terkonfirmasi'): ?>
                            <div class="mt-4">
                                <button 
                                    wire:click="gotoFinalPrice(<?php echo e($order->id_order); ?>)"
                                    class="w-full py-2.5 text-sm font-semibold text-white bg-blue-600 border border-blue-700 rounded-lg hover:bg-blue-700 transition-all"
                                >
                                    Lihat Detail & Tentukan Harga Final
                                </button>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        
                        <!--[if BLOCK]><![endif]--><?php if($order->status === 'ditolak'): ?>
                            <div class="mt-4 p-3 bg-red-50 border border-red-200 rounded-lg">
                                <p class="text-sm text-red-700">
                                    ❌ Pesanan ini telah ditolak
                                    <!--[if BLOCK]><![endif]--><?php if($order->countDown?->status === 'tidak_dikonfirmasi'): ?>
                                        (Waktu konfirmasi habis)
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </p>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-neutral-500">Belum ada pesanan.</p>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->



        
        <!--[if BLOCK]><![endif]--><?php if($activePanel === 'layanan'): ?>
            <div class="card p-5 shadow-md">
                <h2 class="text-xl font-bold mb-3">Daftar Layanan</h2>
                <button wire:click="setPanel('order')" 
                    class="px-4 py-2 rounded-md font-semibold border border-blue-700 text-blue-700 hover:bg-blue-700 hover:text-white transition-all">
                    Tambah Layanan Baru
                </button>
                <button wire:click="setPanel('order')" 
                    class="mt-4 px-4 py-2 rounded-md font-semibold border border-yellow-600 text-yellow-500 hover:bg-yellow-600 hover:text-white transition-all">
                    Edit Layanan
                </button>

                <!--[if BLOCK]><![endif]--><?php if($layanan->isEmpty()): ?>
                    <p class="text-neutral-500">Belum ada layanan.</p>
                <?php else: ?>
                    <table class="w-full mt-4">
                        <thead class="bg-neutral-100">
                            <tr class="text-left font-semibold text-neutral-700">
                                <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider">Nama Layanan</th>
                                <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider">Kategori</th>
                                <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider">Harga Awal</th>
                                <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider">Harga Akhir</th>
                                <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-neutral-50 border-b">
                                <td class="px-4 py-3 text-sm font-medium text-neutral-900">
                                    <?php echo e($l->nama_layanan); ?>

                                </td>

                                <td class="px-4 py-3 text-sm text-neutral-700">
                                    <?php echo e($l->kategori); ?>

                                </td>

                                <td class="px-4 py-3 text-sm text-neutral-700">
                                    Rp <?php echo e(number_format($l->harga_awal, 0, ',', '.')); ?>

                                </td>

                                <td class="px-4 py-3 text-sm text-neutral-700">
                                    Rp <?php echo e(number_format($l->harga_akhir, 0, ',', '.')); ?>

                                </td>

                                <td class="px-4 py-3">
                                    <button wire:click="hapusLayanan(<?php echo e($l->id_layanan); ?>)"
                                        class="px-4 py-2 rounded-md font-semibold border border-red-600 text-red-600 
                                            hover:bg-red-600 hover:text-white transition-all">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </tbody>
                    </table>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


        
        <!--[if BLOCK]><![endif]--><?php if($activePanel === 'report'): ?>
            <div class="card p-5 shadow-md">
                <h2 class="text-xl font-bold mb-3">Report</h2>
                <p>Total Pesanan: <?php echo e($orders->count()); ?></p>
                <p>Total Layanan: <?php echo e($layanan->count()); ?></p>
                <p>Total Pendapatan: Rp <?php echo e($orders->sum('harga')); ?></p>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    </div>
</div>
<?php /**PATH C:\laragon\www\sibantar\resources\views/livewire/bengkel/bengkel-dashboard.blade.php ENDPATH**/ ?>