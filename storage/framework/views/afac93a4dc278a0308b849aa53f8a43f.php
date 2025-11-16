<?php if (isset($component)) { $__componentOriginal066474d3ca90bb663733ba5d5a32c765 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal066474d3ca90bb663733ba5d5a32c765 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout-user','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout-user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> Detail Bengkel - SIBANTAR <?php $__env->endSlot(); ?>

    <!-- Bengkel Image -->
    <section class="relative">
        <div class="h-64 bg-neutral-200 relative overflow-hidden">
            <img src="<?php echo e(asset('images/bengkel.jpeg')); ?>" alt="Bengkel" class="w-full h-full object-cover">
        </div>
    </section>

    <!-- Main Content -->
    <section class="bg-white">
        <div class="container mx-auto px-4 py-6">
            <!-- Bengkel Title & Rating -->
            <div class="mb-6">
                <div class="flex gap-4 mt-4 mb-8">
                    <!-- Back Button -->
                    <a href="<?php echo e($backUrl ?? url('/user/search')); ?>" class="flex-shrink-0 mt-2">
                        <svg class="w-6 h-6 text-neutral-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <h2 class="text-3xl font-bold text-neutral-900"><?php echo e($bengkel->nama_bengkel); ?></h2>
                </div>

                <div class="flex items-center gap-2 mb-3">
                    <div class="flex text-warning-500">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                    </div>
                    <span class="font-bold text-neutral-900">5.0</span>
                    <span class="text-neutral-600 text-sm">(124 Ulasan)</span>
                </div>
                
                <!-- Distance & Time -->
                <div class="flex items-center gap-4 text-sm text-neutral-600">
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>0.6 km</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>15 menit</span>
                    </div>
                </div>

                <!-- Price Range -->
                <div class="mt-3">
                    <p class="text-lg font-bold text-secondary-600">
                        Rp <?php echo e(number_format($layanan_bengkel->harga_awal, 0, ',', '.')); ?>

                        -
                        Rp <?php echo e(number_format($layanan_bengkel->harga_akhir, 0, ',', '.')); ?>

                    </p>
                    <p class="text-sm text-neutral-500">Estimasi Biaya untuk Layanan <?php echo e($layanan_bengkel->nama_layanan); ?> Pada <?php echo e($layanan_bengkel->kategori); ?></p>
                </div>

                <!-- Description -->
                <div class="mt-4">
                    <h1 class="text-lg mt-2 mb-2">Tentang Layanan:</h1>
                    <p class="text-neutral-700 leading-relaxed">
                        <?php echo e($layanan_bengkel->deskripsi); ?>

                    </p>
                </div>
            </div>

            <!-- Lokasi & Kontak Section -->
            <div class="border-t border-neutral-200 pt-6 mb-6">
                <h3 class="text-lg font-bold text-neutral-900 mb-4">Lokasi & Kontak</h3>
                
                <div class="space-y-4">
                    <!-- Alamat -->
                    <div class="flex gap-3">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="font-medium text-neutral-900"><?php echo e($bengkel->alamat_lengkap); ?></p>
                            <p class="text-sm text-neutral-600">Kecamatan <?php echo e($bengkel->kecamatan); ?>, Kota Banjarmasin</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex gap-3">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="font-medium text-neutral-900"><?php echo e($bengkel->user->wa_number); ?></p>
                            <p class="text-sm text-neutral-600">Nomor WhatsApp Bengkel</p>
                        </div>
                    </div>

                    <!-- Jam Operasional -->
                    <div class="flex gap-3">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="font-medium text-neutral-900"><?php echo e($bengkel->jam_operasional); ?> WITA</p>
                            <p class="text-sm text-neutral-600">Jam Operasional Bengkel</p>
                        </div>
                    </div>
                </div>

                <!-- Button Lihat Rute -->
                <button class="w-full mt-6 bg-neutral-200 text-neutral-700 py-3 rounded-xl font-semibold hover:bg-neutral-300 transition">
                    Lihat Rute di Peta
                </button>
            </div>

            <!-- Layanan & Harga Section -->
            <div class="border-t border-neutral-200 pt-6 mb-6">
                <h3 class="text-lg font-bold text-neutral-900 mb-4">Layanan & Harga</h3>
                
                <div class="space-y-3">
                    <div class="flex justify-between items-start py-3 border-b border-neutral-100">
                        <div>
                            <h4 class="font-semibold text-neutral-900 mb-1"><?php echo e($layanan_bengkel->nama_layanan); ?></h4>
                            <p class="font-bold text-secondary-600">
                                    Rp <?php echo e(number_format($layanan_bengkel->harga_awal, 0, ',', '.')); ?> 
                                    - 
                                    Rp <?php echo e(number_format($layanan_bengkel->harga_akhir, 0, ',', '.')); ?>

                            </p>
                            <p class="text-sm text-neutral-600"><?php echo e($layanan_bengkel->deskripsi); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ulasan Pelanggan Section -->
            <div class="border-t border-neutral-200 pt-6 mb-20">
                
                
                
                <h3 class="text-lg font-bold text-neutral-900 mb-4">Ulasan Pelanggan</h3>
                <p class="text-gray-400 text-sm leading-relaxed italic justify-center text-center">
                    Belum ada ulasan yang ditemukan.
                </p>
            </div>
        </div>
    </section>

    <!-- Bottom Action Buttons -->
        <!-- Bottom Action Buttons -->
    <section class="fixed bottom-0 left-0 right-0 bg-white border-t border-neutral-200 py-4 z-50">
        <div class="container mx-auto px-4">
            <div class="flex gap-3">
                <a href="https://wa.me/6281263321241?text=Halo%20Bengkel%20Jaya%20Motor%2C%20saya%20ingin%20bertanya" target="_blank" class="flex-1 btn btn-outline text-center flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    WhatsApp
                </a>
                <a href="<?php echo e(route('user.bengkel.confirmation', ['id' => 1])); ?>" class="flex-1 btn btn-primary">
                    Pesan
                </a>
            </div>
        </div>
    </section>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal066474d3ca90bb663733ba5d5a32c765)): ?>
<?php $attributes = $__attributesOriginal066474d3ca90bb663733ba5d5a32c765; ?>
<?php unset($__attributesOriginal066474d3ca90bb663733ba5d5a32c765); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal066474d3ca90bb663733ba5d5a32c765)): ?>
<?php $component = $__componentOriginal066474d3ca90bb663733ba5d5a32c765; ?>
<?php unset($__componentOriginal066474d3ca90bb663733ba5d5a32c765); ?>
<?php endif; ?><?php /**PATH D:\laragon\www\sibantar\resources\views/user/detail.blade.php ENDPATH**/ ?>