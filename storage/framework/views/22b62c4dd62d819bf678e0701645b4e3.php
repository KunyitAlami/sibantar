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
        <div class="w-full max-w-md">
            
            <!-- Logo & Title -->
            <div class="text-center mb-6 sm:mb-8">
                <h1 class="text-2xl sm:text-3xl font-bold text-neutral-900 mb-1 sm:mb-2">Buat Akun Baru</h1>
                <p class="text-sm sm:text-base text-neutral-600">Daftar untuk mulai menggunakan SIBANTAR</p>
            </div>

            <!-- Register Card -->
            <div class="card p-6 sm:p-8">
                <form method="POST" action="<?php echo e(route('register.post')); ?>" class="space-y-4 sm:space-y-5">
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

                    <!-- Nama Lengkap -->
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
                            value="<?php echo e(old('username')); ?>"
                            required 
                            autofocus
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
                            type="text" 
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
                            placeholder="email@gmail.com"
                            value="<?php echo e(old('email')); ?>"
                            required
                        >
                        <p id="emailError" class="mt-1 text-sm text-danger-600 hidden"></p>
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
                            value="<?php echo e(old('wa_number')); ?>"
                            required
                            inputmode="numeric"
                        >
                        <p id="waError" class="mt-1 text-sm text-danger-600 hidden"></p>
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

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-neutral-700 mb-2">
                            Password
                        </label>
                        <div class="relative">
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                class="input <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                placeholder="Minimal 8 karakter"
                                required
                            >
                            <button 
                                type="button" 
                                onclick="togglePassword('password', 'eye-password-open', 'eye-password-closed')" 
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-neutral-400 hover:text-neutral-600"
                            >
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
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-danger-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-neutral-700 mb-2">
                            Konfirmasi Password
                        </label>
                        <div class="relative">
                            <input 
                                type="password" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                class="input" 
                                placeholder="Ulangi password"
                                required
                            >
                            <button 
                                type="button" 
                                onclick="togglePassword('password_confirmation', 'eye-confirm-open', 'eye-confirm-closed')" 
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-neutral-400 hover:text-neutral-600"
                            >
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

                    <!-- Terms & Conditions -->
                    

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit" class="btn btn-primary w-full btn-lg rounded-full">
                            Daftar Sekarang
                        </button>
                    </div>
                    
                    <script>
                    function validateRegisterForm(e) {
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
                    document.querySelector('form[action="<?php echo e(route('register.post')); ?>"]')?.addEventListener('submit', validateRegisterForm);
                    </script>
                    <script>
                    function validateRegisterForm(e) {
                        var email = document.getElementById('email').value.trim();
                        var wa = document.getElementById('wa_number').value.trim();
                        var emailError = document.getElementById('emailError');
                        var waError = document.getElementById('waError');
                        var valid = true;

                        // Reset error
                        emailError.textContent = '';
                        emailError.classList.add('hidden');
                        waError.textContent = '';
                        waError.classList.add('hidden');

                        // Email validation
                        var gmailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
                        if (!email) {
                            emailError.textContent = 'Email wajib diisi.';
                            emailError.classList.remove('hidden');
                            valid = false;
                        } else if (!gmailPattern.test(email)) {
                            emailError.textContent = 'Email harus menggunakan domain @gmail.com.';
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
                            waError.textContent = 'Nomor telepon hanya boleh angka.';
                            waError.classList.remove('hidden');
                            valid = false;
                        }

                        if (!valid) {
                            e.preventDefault();
                        }
                        return valid;
                    }
                    document.querySelector('form[action="<?php echo e(route('register.post')); ?>"]')?.addEventListener('submit', validateRegisterForm);
                    </script>
                </form>
            </div>

            <!-- Login Link -->
            <p class="text-center mt-5 sm:mt-6 text-sm text-neutral-600">
                Sudah punya akun?
                <a href="<?php echo e(route('login')); ?>" class="text-primary-700 hover:text-primary-800 font-semibold">
                    Masuk sekarang
                </a>
            </p>

            <p class="text-center mt-2 sm:mt-2 text-sm text-neutral-600 ">
                Ingin Menjadi Mitra?
                <a href="<?php echo e(route('registerBengkel')); ?>" class="text-primary-700 hover:text-primary-800 font-semibold">
                    Daftar menjadi Mitra SIBANTAR
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
<?php /**PATH C:\laragon\www\sibantar\resources\views/Auth/register.blade.php ENDPATH**/ ?>