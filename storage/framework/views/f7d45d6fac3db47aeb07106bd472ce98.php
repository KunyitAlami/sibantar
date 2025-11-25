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
     <?php $__env->slot('title', null, []); ?> Daftar - SIBANTAR <?php $__env->endSlot(); ?>

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
                        <h1 class="text-2xl sm:text-2xl md:text-2xl font-bold">Calon Bengkel</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="min-h-screen flex items-center justify-center py-8 sm:py-12 px-4 bg-neutral-50">
        <div class="w-full max-w-screen">
            <!-- Register Card -->
            <div class="card p-6 sm:p-8 w-full max-w-3xl mx-auto">
                    <form method="POST" action="<?php echo e(route('admin.calonBengkel.approve', $calonBengkel->id_calon_bengkel)); ?>" class="space-y-4 sm:space-y-5">
                    <?php echo csrf_field(); ?>

                    <?php if($errors->any()): ?>
                        <div class="mb-4 text-danger-600">
                            <ul class="list-disc pl-5">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>


                    
                    
                    
                    <div>
                        
                        <div class="flex flex-col mb-8"> 
                            <h1 class="text-2xl font-bold text-black mb-4">Profile Pemilik Bengkel</h1>
                        </div>
                        <div class="flex flex-col gap-4">
                            <!-- Username -->
                            <div>
                                <label for="username" class="block text-sm font-medium text-neutral-700 mb-2">
                                    Username
                                </label>
                                <input  
                                    type="text" 
                                    id="username" 
                                    name="username" 
                                    class="input <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    placeholder="Masukkan username"
                                    value="<?php echo e(old('username', $calonBengkel->username)); ?>"
                                    required 
                                    autofocus
                                    readonly
                                >
                                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-1 text-sm text-danger-600"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-neutral-700 mb-2">
                                    Email
                                </label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    class="input <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    placeholder="email@example.com"
                                    value="<?php echo e(old('email', $calonBengkel->email)); ?>"
                                    required
                                    readonly
                                >
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-1 text-sm text-danger-600"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <!-- Nomor Telepon -->
                            <div>
                                <label for="wa_number" class="block text-sm font-medium text-neutral-700 mb-2">
                                    Nomor Telepon
                                </label>
                                <input 
                                    type="tel" 
                                    id="wa_number" 
                                    name="wa_number" 
                                    class="input <?php $__errorArgs = ['wa_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    placeholder="08123456789"
                                    value="<?php echo e(old('wa_number', $calonBengkel->wa_number)); ?>"
                                    required
                                    readonly
                                >
                                <?php $__errorArgs = ['wa_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-1 text-sm text-danger-600"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    
                    <div class="mt-12">
                        <div class="flex flex-col mb-8"> 
                            <h1 class="text-2xl font-bold text-black mb-4 mt-10">Profile Bengkel</h1>
                        </div>
                        
                        <div class="flex flex-col gap-4">
                            <div class="flex-1">
                                <!-- Nama Bengkel -->
                                <div>
                                    <label for="nama_bengkel" class="block text-sm font-medium text-neutral-700 mb-2">
                                        Nama Bengkel 
                                    </label>
                                    <input 
                                        type="text" 
                                        id="nama_bengkel" 
                                        name="nama_bengkel" 
                                        class="input <?php $__errorArgs = ['nama_bengkel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                        placeholder="Masukkan Nama Bengkel"
                                        value="<?php echo e(old('nama_bengkel', $calonBengkel->nama_bengkel)); ?>"
                                        required 
                                        autofocus
                                        readonly
                                    >
                                    <?php $__errorArgs = ['nama_bengkel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="mt-1 text-sm text-danger-600"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="flex-1">
                                <!-- Link Gmaps -->
                                <div>
                                    <label for="link_gmaps" class="block text-sm font-medium text-neutral-700 mb-2">
                                        Link Google Maps Bengkel 
                                    </label>
                                    <input 
                                        type="text" 
                                        id="link_gmaps" 
                                        name="link_gmaps" 
                                        class="input <?php $__errorArgs = ['link_gmaps'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                        placeholder="Link Google Maps"
                                        value="<?php echo e(old('link_gmaps', $calonBengkel->link_gmaps)); ?>"
                                        required 
                                        autofocus
                                        readonly
                                    >
                                    <?php $__errorArgs = ['link_gmaps'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="mt-1 text-sm text-danger-600"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="flex-1">
                                <!-- kecamatan -->
                                <div>
                                    <label for="kecamatan" class="block text-sm font-medium text-neutral-700 mb-2">
                                        Kecamatan Bengkel 
                                    </label>
                                    <input 
                                        type="text" 
                                        id="kecamatan" 
                                        name="kecamatan" 
                                        class="input <?php $__errorArgs = ['kecamatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                        placeholder="Link Google Maps"
                                        value="<?php echo e(old('kecamatan', $calonBengkel->kecamatan)); ?>"
                                        readonly
                                    >
                                    <?php $__errorArgs = ['kecamatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="mt-1 text-sm text-danger-600"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        
                        <div class="flex flex-col gap-4 mt-7">
                            <div class="w-full"> 
                                <div>
                                    <label for="jam_buka" class="block text-sm font-medium text-neutral-700 mb-2">
                                        Jam Buka Bengkel  (WITA)
                                    </label>
                                    <input 
                                        type="text" 
                                        id="jam_buka" 
                                        name="jam_buka" 
                                        class="input <?php $__errorArgs = ['jam_buka'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                        placeholder="Contoh: 08.00 "
                                        value="<?php echo e(old('jam_buka', $calonBengkel->jam_buka)); ?>"
                                        readonly
                                        required 
                                        autofocus
                                    >
                                    <?php $__errorArgs = ['jam_buka'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="mt-1 text-sm text-danger-600"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="w-full"> 
                                <div>
                                    <label for="jam_tutup" class="block text-sm font-medium text-neutral-700 mb-2">
                                        Jam Tutup Bengkel  (WITA)
                                    </label>
                                    <input 
                                        type="text" 
                                        id="jam_tutup" 
                                        name="jam_tutup" 
                                        class="input <?php $__errorArgs = ['jam_tutup'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                        placeholder="Contoh: 23.59 "
                                        value="<?php echo e(old('jam_tutup', $calonBengkel->jam_tutup)); ?>"
                                        readonly
                                        required 
                                        autofocus
                                    >
                                    <?php $__errorArgs = ['jam_tutup'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="mt-1 text-sm text-danger-600"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex flex-col gap-4 mt-7 w-full">
                            <div class="w-full"> 
                                <!-- alamat_lengkap -->
                                <div>
                                    <label for="alamat_lengkap" class="block text-sm font-medium text-neutral-700 mb-2 ">
                                        Alamat Lengkap Bengkel 
                                    </label>
                                    <textarea
                                        id="alamat_lengkap"
                                        name="alamat_lengkap"
                                        class="input <?php $__errorArgs = ['alamat_lengkap'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> h-[12rem]"
                                        placeholder="Masukkan Alamat Lengkap Bengkel"
                                        required
                                        readonly
                                    ><?php echo e(old('alamat_lengkap', $calonBengkel->alamat_lengkap)); ?></textarea>
                                    <?php $__errorArgs = ['alamat_lengkap'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="mt-1 text-sm text-danger-600"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="w-full"> 
                                <!-- penjelasan_bengkel -->
                                <div>
                                    <label for="penjelasan_bengkel" class="block text-sm font-medium text-neutral-700 mb-2 ">
                                        Penjelasan Bengkel 
                                    </label>
                                    <textarea
                                        id="penjelasan_bengkel"
                                        name="penjelasan_bengkel"
                                        class="input <?php $__errorArgs = ['penjelasan_bengkel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> h-[12rem]"
                                        placeholder="Masukkan Penjelasan Bengkel  "
                                        required
                                        readonly
                                    ><?php echo e(old('penjelasan_bengkel', $calonBengkel->penjelasan_bengkel)); ?></textarea>
                                    <?php $__errorArgs = ['penjelasan_bengkel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="mt-1 text-sm text-danger-600"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit" class="btn btn-primary w-full btn-lg rounded-full">
                            Terima Permintaan 
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php $__env->startPush('scripts'); ?>
    <script>
        function togglePassword(inputId, eyeOpenId, eyeClosedId) {
            const passwordInput = document.getElementById(inputId);
            const eyeOpen = document.getElementById(eyeOpenId);
            const eyeClosed = document.getElementById(eyeClosedId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            }
        }
    </script>
    <?php $__env->stopPush(); ?>

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
<?php /**PATH C:\laragon\www\sibantar\resources\views/admin/calon bengkel/showCalonBengkel.blade.php ENDPATH**/ ?>