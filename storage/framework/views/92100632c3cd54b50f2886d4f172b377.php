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
    <!-- Header -->
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="<?php echo e(route('user.history')); ?>" class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="font-bold text-lg text-neutral-900">Buat Laporan</h1>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-6 pb-32">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto">
                
                <!-- Order Info Card -->
                <div class="card p-4 mb-4">
                    <h4 class="font-semibold text-neutral-900 mb-1">Bengkel Jaya Motor</h4>
                    <p class="text-sm text-neutral-600 mb-2">Order ID: #<?php echo e($bookingId ?? '12345'); ?></p>
                    <div class="flex items-center gap-2 text-sm text-neutral-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>14 Nov 2025, 21:45</span>
                    </div>
                </div>

                <!-- Report Form -->
                <form id="reportForm" action="<?php echo e(route('user.report.store')); ?>" method="POST" class="space-y-4">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="booking_id" value="<?php echo e($bookingId ?? ''); ?>">

                    <!-- Report Type -->
                    <div>
                        <label class="block text-sm font-semibold text-neutral-900 mb-2">Jenis Masalah <span class="text-error">*</span></label>
                        <select name="report_type" class="select select-bordered w-full text-sm bg-white !h-14 !min-h-0 !leading-normal" required>
                            <option value="">Pilih jenis masalah</option>
                            <option value="service">Masalah Layanan</option>
                            <option value="price">Masalah Harga</option>
                            <option value="mechanic">Masalah Mekanik</option>
                            <option value="communication">Komunikasi Buruk</option>
                            <option value="unprofessional">Tidak Profesional</option>
                            <option value="quality">Kualitas Pekerjaan</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>

                    <!-- Priority Level -->
                    <div>
                        <label class="block text-sm font-semibold text-neutral-900 mb-2">Tingkat Urgensi <span class="text-error">*</span></label>
                        <div class="grid grid-cols-3 gap-3">
                            <label class="cursor-pointer">
                                <input type="radio" name="priority" value="low" class="peer sr-only" required>
                                <div class="card p-3 text-center border-2 border-neutral-200 peer-checked:border-success peer-checked:bg-success-50 hover:border-neutral-300 transition-all">
                                    <div class="text-sm font-semibold text-neutral-700">Rendah</div>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="priority" value="medium" class="peer sr-only">
                                <div class="card p-3 text-center border-2 border-neutral-200 peer-checked:border-warning peer-checked:bg-warning-50 hover:border-neutral-300 transition-all">
                                    <div class="text-sm font-semibold text-neutral-700">Sedang</div>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="priority" value="high" class="peer sr-only">
                                <div class="card p-3 text-center border-2 border-neutral-200 peer-checked:border-error peer-checked:bg-error-50 hover:border-neutral-300 transition-all">
                                    <div class="text-sm font-semibold text-neutral-700">Tinggi</div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Subject -->
                    <div>
                        <label class="block text-sm font-semibold text-neutral-900 mb-2">Judul Laporan <span class="text-error">*</span></label>
                        <input 
                            type="text" 
                            name="subject" 
                            placeholder="Ringkasan masalah dalam satu kalimat" 
                            class="input input-bordered w-full text-sm" 
                            required 
                            maxlength="100">
                        <p class="text-xs text-neutral-500 mt-1">Maksimal 100 karakter</p>
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-semibold text-neutral-900 mb-2">Detail Laporan <span class="text-error">*</span></label>
                        <textarea 
                            name="description" 
                            placeholder="Jelaskan masalah yang Anda alami secara detail. Sertakan informasi seperti waktu kejadian, apa yang terjadi, dan dampaknya." 
                            class="input w-full text-sm" 
                            rows="4" 
                            required 
                            minlength="20"></textarea>
                        <p class="text-xs text-neutral-500 mt-1">Minimal 20 karakter</p>
                    </div>

                    <!-- Upload Evidence (Optional) -->
                    <div>
                        <label class="block text-sm font-semibold text-neutral-900 mb-2">Bukti Pendukung <span class="text-neutral-500 font-normal">(Opsional)</span></label>
                        <input 
                            type="file" 
                            name="evidence[]" 
                            class="file-input file-input-bordered w-full text-sm" 
                            accept="image/*" 
                            multiple>
                        <p class="text-xs text-neutral-500 mt-1">Format: JPG, PNG. Maksimal 5 foto</p>
                    </div>

                    <!-- Info Box -->
                    <div class="alert alert-info">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="text-xs">
                            <p class="font-semibold mb-1">Kebijakan Laporan</p>
                            <ul class="space-y-0.5">
                                <li>• Tim kami akan merespons dalam 1x24 jam</li>
                                <li>• Laporan akan ditinjau secara menyeluruh</li>
                                <li>• Identitas Anda dijamin kerahasiaan</li>
                            </ul>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </section>

    <!-- Bottom Action Buttons -->
    <section class="fixed bottom-0 left-0 right-0 bg-white border-t border-neutral-200 py-4 z-50">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto flex gap-3">
                <a href="<?php echo e(route('user.history')); ?>" class="flex-1 btn btn-outline text-center">
                    Batal
                </a>
                <button type="submit" form="reportForm" class="flex-1 btn btn-error">
                    Kirim Laporan
                </button>
            </div>
        </div>
    </section>

    <?php $__env->startPush('scripts'); ?>
    <script>
        // File input preview
        document.querySelector('input[type="file"]')?.addEventListener('change', function(e) {
            const files = e.target.files;
            if (files.length > 5) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Terlalu Banyak File',
                    text: 'Maksimal 5 foto yang dapat diunggah',
                    confirmButtonColor: '#0051BA'
                });
                e.target.value = '';
            }
        });

        // Form submission
        document.querySelector('form')?.addEventListener('submit', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'Kirim Laporan?',
                text: 'Pastikan informasi yang Anda berikan sudah benar',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#737373',
                confirmButtonText: 'Ya, Kirim',
                cancelButtonText: 'Periksa Lagi'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form (in real scenario)
                    // this.submit();
                    
                    // Show success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Laporan Terkirim!',
                        text: 'Tim kami akan meninjau laporan Anda segera',
                        confirmButtonColor: '#0051BA',
                        timer: 2000
                    }).then(() => {
                        window.location.href = '<?php echo e(route("user.history")); ?>';
                    });
                }
            });
        });
    </script>
    <?php $__env->stopPush(); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal066474d3ca90bb663733ba5d5a32c765)): ?>
<?php $attributes = $__attributesOriginal066474d3ca90bb663733ba5d5a32c765; ?>
<?php unset($__attributesOriginal066474d3ca90bb663733ba5d5a32c765); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal066474d3ca90bb663733ba5d5a32c765)): ?>
<?php $component = $__componentOriginal066474d3ca90bb663733ba5d5a32c765; ?>
<?php unset($__componentOriginal066474d3ca90bb663733ba5d5a32c765); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Asus\Downloads\Disk D\project\sibantar\resources\views/user/report.blade.php ENDPATH**/ ?>