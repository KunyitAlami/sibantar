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
     <?php $__env->slot('title', null, []); ?> Masuk - SIBANTAR <?php $__env->endSlot(); ?>

    <section class="min-h-screen flex items-center justify-center py-8 sm:py-12 px-4 bg-neutral-50">
        <div class="w-full max-w-md">
            
            <!-- Logo & Title -->
            <div class="text-center mb-6 sm:mb-8">
                <div class="flex justify-center mb-3 sm:mb-4">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl flex items-center justify-center">
                        <img src="<?php echo e(asset('images/logo.png')); ?>" alt="SIBANTAR Logo" class="w-16 h-16 sm:w-16 sm:h-16 object-contain">
                    </div>
                </div>
                <h1 class="text-2xl sm:text-3xl font-bold text-neutral-900 mb-1 sm:mb-2">Selamat Datang</h1>
                <p class="text-sm sm:text-base text-neutral-600">Masuk ke akun SIBANTAR Anda</p>
            </div>

            <!-- Login Card -->
            <div class="card p-6 sm:p-8">

                <?php if(session('success')): ?>
                    <div class="mb-4 p-3 text-green-700 bg-green-100 rounded text-center font-semibold">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
                <form method="POST" action="<?php echo e(route('login.post')); ?>" class="space-y-4 sm:space-y-5">
                    <?php echo csrf_field(); ?>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-neutral-700 mb-2">
                            Email
                        </label>
                        <input 
                            type="text" 
                            id="email" 
                            name="email" 
                            class="input bg-white <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                            placeholder="Masukan Email"
                            value="<?php echo e(old('email')); ?>"
                            required 
                            autofocus
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
                                class="input bg-white <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                placeholder="Masukkan password"
                                required
                            >
                            <button 
                                type="button" 
                                onclick="togglePassword()" 
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-neutral-400 hover:text-neutral-600"
                            >
                                <svg id="eye-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg id="eye-closed" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

                    <!-- Forgot Password -->
                    <div class="flex items-center justify-between">
                        <a href="#" class="text-sm text-primary-700 hover:text-primary-800 font-medium">
                            Lupa password?
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit" class="btn btn-primary w-full btn-lg">
                            Masuk
                        </button>
                    </div>
                </form>
            </div>

            <!-- Register Link -->
            <p class="text-center mt-5 sm:mt-6 text-sm text-neutral-600">
                Belum punya akun?
                <a href="<?php echo e(route('register')); ?>" class="text-primary-700 hover:text-primary-800 font-semibold hover:underline">
                    Daftar sekarang
                </a>
            </p>
            <p class="text-center mt-5 sm:mt-6 text-sm text-neutral-600 ">
                Ingin Menjadi Mitra?
                <a href="<?php echo e(route('registerBengkel')); ?>" class="text-primary-700 hover:text-primary-800 font-semibold hover:underline">
                    Daftar menjadi Mitra SIBANTAR
                </a>
            </p>

        </div>
    </section>

    <?php $__env->startPush('scripts'); ?>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeOpen = document.getElementById('eye-open');
            const eyeClosed = document.getElementById('eye-closed');
            
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
<?php /**PATH C:\laragon\www\sibantar\resources\views/Auth/login.blade.php ENDPATH**/ ?>