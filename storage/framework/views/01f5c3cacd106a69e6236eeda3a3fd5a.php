<?php if (isset($component)) { $__componentOriginal70339126620b9ce2988dbf7f78f02854 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal70339126620b9ce2988dbf7f78f02854 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout-bengkel','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout-bengkel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-50 mb-5">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="<?php echo e(route('bengkel.dashboard', ['id_bengkel' => $id_bengkel])); ?>"
                   class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <h1 class="font-bold text-lg text-neutral-900">Tambah Layanan</h1>
            </div>
        </div>
    </section>

    
    
    <section class="px-4">
        <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-sm mb-20">
            
            <form action="<?php echo e(route('bengkel.layanan.store', $id_bengkel)); ?>" method="POST" class="mt-10 mb-10 gap-5">
                <?php echo csrf_field(); ?>
                <div class="space-y-5">

                    
                    <div>
                        <label class="block font-medium text-neutral-800 mb-1">Nama Layanan</label>
                        <input type="text" name="nama_layanan" required
                            class="w-full border border-neutral-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500">
                    </div>

                    
                    <div class="flex flex-col md:flex-row gap-5">
                        <div class="flex-1">
                            <label class="block font-medium text-neutral-800 mb-1">Perkiraan Harga Terendah</label>
                            <input type="number" name="harga_awal" required
                                class="w-full border border-neutral-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500">
                        </div>

                        <div class="flex-1">
                            <label class="block font-medium text-neutral-800 mb-1">Perkiraan Harga Tertinggi</label>
                            <input type="number" name="harga_akhir" required
                                class="w-full border border-neutral-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500">
                        </div>
                    </div>

                    
                    <div class="flex flex-col md:flex-row gap-5">
                        <div class="flex-1">
                            <label class="block font-medium text-neutral-800 mb-1">Deskripsi</label>
                            <textarea name="deskripsi" rows="4" required
                                    class="w-full border border-neutral-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500"></textarea>
                        </div>

                        <div class="flex-1">
                            <label class="block font-medium text-neutral-800 mb-1">Kategori</label>
                            <select name="kategori" required
                                    class="w-full border border-neutral-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500">
                                <option value="">Pilih Kategori</option>
                                <option value="Motor">Motor</option>
                                <option value="Mobil">Mobil</option>
                                <option value="Truk">Truk</option>
                            </select>
                        </div>
                    </div>

                </div>

                
                <button type="submit"
                    class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 rounded-lg text-center mt-4">
                    Tambah Layanan
                </button>

                
                <input type="hidden" name="id_bengkel" value="<?php echo e($id_bengkel); ?>">
            </form>
        </div>
        
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal70339126620b9ce2988dbf7f78f02854)): ?>
<?php $attributes = $__attributesOriginal70339126620b9ce2988dbf7f78f02854; ?>
<?php unset($__attributesOriginal70339126620b9ce2988dbf7f78f02854); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal70339126620b9ce2988dbf7f78f02854)): ?>
<?php $component = $__componentOriginal70339126620b9ce2988dbf7f78f02854; ?>
<?php unset($__componentOriginal70339126620b9ce2988dbf7f78f02854); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\sibantar\resources\views/bengkel/form/tambahLayanan.blade.php ENDPATH**/ ?>