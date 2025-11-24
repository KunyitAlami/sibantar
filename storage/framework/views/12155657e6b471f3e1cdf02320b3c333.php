<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> Daftar - SIBANTAR <?php $__env->endSlot(); ?>

    <section class="min-h-screen flex items-center justify-center py-8 sm:py-12 px-4 bg-neutral-50">
        <div class="w-full max-w-5xl mx-auto">
            
            <!-- Logo & Title -->
            <div class="text-center mb-6 sm:mb-8">
                <h1 class="text-2xl sm:text-3xl font-bold text-neutral-900 mb-1 sm:mb-2">Buat Akun Bengkel Baru</h1>
                <p class="text-sm sm:text-base text-neutral-600">Daftar untuk menjadi mitra SIBANTAR</p>
            </div>

            <!-- Register Card -->
            <div class="card p-6 sm:p-8 w-full max-w-4xl mx-auto">
                <form method="POST" action="<?php echo e(route('registerBengkel.post')); ?>" class="space-y-8">
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
                        
                        <div class="mb-8">
                            <h1 class="text-xl sm:text-2xl font-bold text-black mb-2">Profile Pemilik Bengkel</h1>
                            <p class="text-gray-500 text-sm">Lengkapi data pemilik bengkel di bawah ini.</p>
                        </div>
                        <div class="flex flex-col gap-4">
                            <!-- Username -->
                            <div>
                                <label for="username" class="block text-sm font-medium text-neutral-700 mb-2">Username</label>
                                <input type="text" id="username" name="username" class="input <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan username" value="<?php echo e(old('username')); ?>" required autofocus>
                                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-sm text-danger-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-neutral-700 mb-2">Email</label>
                                <input type="text" id="email" name="email" class="input <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="email@gmail.com" value="<?php echo e(old('email')); ?>" required>
                                <p id="emailError" class="mt-1 text-sm text-danger-600 hidden"></p>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-sm text-danger-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <!-- Nomor Telepon -->
                            <div>
                                <label for="wa_number" class="block text-sm font-medium text-neutral-700 mb-2">Nomor Telepon</label>
                                <input type="tel" id="wa_number" name="wa_number" class="input <?php $__errorArgs = ['wa_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="08123456789" value="<?php echo e(old('wa_number')); ?>" required>
                                <p id="waError" class="mt-1 text-sm text-danger-600 hidden"></p>
                                <?php $__errorArgs = ['wa_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-sm text-danger-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-neutral-700 mb-2">Password</label>
                                <div class="relative">
                                    <input type="password" id="password" name="password" class="input <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan password" required>
                                    <button type="button" onclick="togglePassword('password', 'eye-password-open', 'eye-password-closed')" class="absolute right-3 top-1/2 -translate-y-1/2 text-neutral-400 hover:text-neutral-600">
                                        <svg id="eye-password-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <svg id="eye-password-closed" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                        </svg>
                                    </button>
                                </div>
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-sm text-danger-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <!-- Konfirmasi Password -->
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-neutral-700 mb-2">Konfirmasi Password</label>
                                <div class="relative">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="input" placeholder="Ulangi password" required>
                                    <button type="button" onclick="togglePassword('password_confirmation', 'eye-confirm-open', 'eye-confirm-closed')" class="absolute right-3 top-1/2 -translate-y-1/2 text-neutral-400 hover:text-neutral-600">
                                        <svg id="eye-confirm-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <svg id="eye-confirm-closed" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                        </svg>
                                    </button>
                                </div>
                                <p id="passwordMatchError" class="mt-1 text-sm text-danger-600 hidden"></p>
                            </div>
                        </div>
                    </div>

                    
                    <div class="mt-12">
                        <div class="mb-8">
                            <h1 class="text-xl sm:text-2xl font-bold text-black mb-2 mt-8">Profile Bengkel</h1>
                            <p class="text-gray-500 text-sm">Lengkapi data bengkel di bawah ini.</p>
                        </div>
                        <div class="flex flex-col gap-4">
                            <!-- Nama Bengkel -->
                            <div>
                                <label for="nama_bengkel" class="block text-sm font-medium text-neutral-700 mb-2">
                                    Nama Bengkel Anda
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
                                    value="<?php echo e(old('nama_bengkel')); ?>"
                                    required 
                                    autofocus
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
                            <!-- Link Gmaps -->
                            <div>
                                <label for="link_gmaps" class="block text-sm font-medium text-neutral-700 mb-2">
                                    Link Google Maps Bengkel Anda
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
                                    value="<?php echo e(old('link_gmaps')); ?>"
                                    required 
                                    autofocus
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

                            <div class="flex-1">
                                <!-- kecamatan -->
                                <div>
                                    <label for="kecamatan" class="block text-sm font-medium text-neutral-700 mb-2">
                                        Kecamatan Bengkel Anda
                                    </label>
                                    <select 
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
                                        style="height: 50px;"
                                        required
                                    >
                                        <option value="">Pilih Kecamatan</option>
                                        <option value="Banjarmasin Selatan" <?php echo e(old('kecamatan') == 'Banjarmasin Selatan' ? 'selected' : ''); ?>>Banjarmasin Selatan</option>
                                        <option value="Banjarmasin Timur"    <?php echo e(old('kecamatan') == 'Banjarmasin Timur' ? 'selected' : ''); ?>>Banjarmasin Timur</option>
                                        <option value="Banjarmasin Barat"    <?php echo e(old('kecamatan') == 'Banjarmasin Barat' ? 'selected' : ''); ?>>Banjarmasin Barat</option>
                                        <option value="Banjarmasin Tengah"   <?php echo e(old('kecamatan') == 'Banjarmasin Tengah' ? 'selected' : ''); ?>>Banjarmasin Tengah</option>
                                        <option value="Banjarmasin Utara"    <?php echo e(old('kecamatan') == 'Banjarmasin Utara' ? 'selected' : ''); ?>>Banjarmasin Utara</option>
                                    </select>
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

                        
                        <div class="flex gap-10 mt-7">
                            <div class="flex-1"> 
                                <div>
                                    <label for="jam_buka" class="block text-sm font-medium text-neutral-700 mb-2">Jam Buka Bengkel (WITA)</label>
                                    <input type="number" id="jam_buka" name="jam_buka" class="input <?php $__errorArgs = ['jam_buka'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="08.00" value="<?php echo e(old('jam_buka')); ?>" required autofocus min="0" max="23.99" step="0.01">
                                    <?php $__errorArgs = ['jam_buka'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-sm text-danger-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="flex-1"> 
                                <div>
                                    <label for="jam_tutup" class="block text-sm font-medium text-neutral-700 mb-2">Jam Tutup Bengkel (WITA)</label>
                                    <input type="number" id="jam_tutup" name="jam_tutup" class="input <?php $__errorArgs = ['jam_tutup'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="23.59" value="<?php echo e(old('jam_tutup')); ?>" required autofocus min="0" max="23.99" step="0.01">
                                    <?php $__errorArgs = ['jam_tutup'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-sm text-danger-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex flex-col gap-4 mt-4">
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
unset($__errorArgs, $__bag); ?> h-[8rem]"
                                    placeholder="Masukkan Alamat Lengkap Bengkel"
                                    required
                                ><?php echo e(old('alamat_lengkap')); ?></textarea>
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
                            <div>
                                <label for="penjelasan_bengkel" class="block text-sm font-medium text-neutral-700 mb-2 ">
                                    Deskripsi Bengkel
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
unset($__errorArgs, $__bag); ?> h-[8rem]"
                                    placeholder="Masukkan Penjelasan Bengkel Anda "
                                    required
                                ><?php echo e(old('penjelasan_bengkel')); ?></textarea>
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
                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit" class="btn btn-primary w-full btn-lg rounded-full rounded-full">
                            Daftar Sekarang
                        </button>
                    </div>
                </form>
            </div>

            <!-- Login Link -->
            <p class="text-center mt-5 sm:mt-6 text-sm text-neutral-600">
                Sudah punya akun?
                <a href="<?php echo e(route('login')); ?>" class="text-primary-700 hover:text-primary-800 font-semibold">
                    Masuk sekarang
                </a>
            </p>

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

        function validateRegisterBengkelForm(e) {
            var email = document.getElementById('email').value.trim();
            var wa = document.getElementById('wa_number').value.trim();
            var password = document.getElementById('password').value;
            var passwordConfirm = document.getElementById('password_confirmation').value;
            var emailError = document.getElementById('emailError');
            var waError = document.getElementById('waError');
            var passwordMatchError = document.getElementById('passwordMatchError');
            var valid = true;

            // Reset error
            emailError.textContent = '';
            emailError.classList.add('hidden');
            waError.textContent = '';
            waError.classList.add('hidden');
            passwordMatchError.textContent = '';
            passwordMatchError.classList.add('hidden');

            // Email validation
            var gmailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
            if (!email) {
                emailError.textContent = 'Email wajib diisi.';
                emailError.classList.remove('hidden');
                valid = false;
            } else if (!gmailPattern.test(email)) {
                emailError.textContent = 'Format email harus @gmail.com.';
                emailError.classList.remove('hidden');
                valid = false;
            }

            // WA number validation
            var waPattern = /^[0-9]+$/;
            if (!wa) {
                waError.textContent = 'Nomor telepon wajib diisi.';
                waError.classList.remove('hidden');
                valid = false;
            } else if (!waPattern.test(wa)) {
                waError.textContent = 'Nomor telepon hanya boleh angka saja.';
                waError.classList.remove('hidden');
                valid = false;
            }

            // Password match validation
            if (password !== passwordConfirm) {
                passwordMatchError.textContent = 'Password dan konfirmasi password tidak sama.';
                passwordMatchError.classList.remove('hidden');
                valid = false;
            }

            if (!valid) {
                e.preventDefault();
            }
            return valid;
        }
        document.querySelector('form[action="<?php echo e(route('registerBengkel.post')); ?>"]')?.addEventListener('submit', validateRegisterBengkelForm);
    </script>
    <?php $__env->stopPush(); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\sibantar\resources\views/Auth/register_bengkel.blade.php ENDPATH**/ ?>