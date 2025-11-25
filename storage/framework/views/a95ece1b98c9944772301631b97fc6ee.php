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
    
    <section class="bg-white border-b border-neutral-200 sticky top-0 z-50 mb-5">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 py-4">
                <a href="<?php echo e(route('admin.users.index')); ?>"
                   class="text-neutral-700 hover:text-primary-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <h1 class="font-bold text-lg text-neutral-900">Kembali</h1>
            </div>
        </div>
    </section>

    
    <section class="px-4">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-sm mb-20">
            <div class="flex flex-col gap-4 justify-center text-center">
                <h1>Form Edit Detail User</h1>
                <p>Kelola informasi pengguna melalui formulir berikut untuk memastikan data tetap akurat dan terbarui.</p>
            </div>
            
            <form action="<?php echo e(route('admin.update-user')); ?>" autocomplete="off" method="POST" class="mt-10 mb-10 gap-5">
                <?php echo csrf_field(); ?>
                
                <input type="text" name="dummy_username" autocomplete="off" style="display:none;">
                <input type="password" name="dummy_password" autocomplete="new-password" style="display:none;">
                <input type="hidden" name="id_user" value="<?php echo e($user->id_user); ?>">

                

                
                <div class="flex flex-col gap-2">
                    <label class="font-semibold text-neutral-700">Username</label>
                    <input autocomplete="off" type="text" name="username" required
                        class="input input-bordered w-full"
                        value="<?php echo e($user->username); ?>">
                </div>

                
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Email</label>
                    <input autocomplete="off" type="email" name="email" required
                        class="input input-bordered w-full"
                        value="<?php echo e($user->email); ?>">
                </div>

                
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Password</label>
                    <input autocomplete="new-password" type="password" name="password" class="input input-bordered w-full" placeholder="Masukkan password">
                </div>

                
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Role</label>
                        <select name="role" class="select select-bordered w-full !h-14 !min-h-0 !leading-normal" required>
                            <option value="user" <?php echo e(isset($user) && $user->role == 'user' ? 'selected' : ''); ?>>User</option>
                            <option value="admin" <?php echo e(isset($user) && $user->role == 'admin' ? 'selected' : ''); ?>>Admin</option>
                            <option value="bengkel" <?php echo e(isset($user) && $user->role == 'bengkel' ? 'selected' : ''); ?>>Bengkel</option>
                        </select>
                </div>


                
                <div class="flex flex-col gap-2 mt-4">
                    <label class="font-semibold text-neutral-700">Nomor WhatsApp</label>
                    <input type="text" name="wa_number" required
                        class="input input-bordered w-full"
                        value="<?php echo e($user->wa_number); ?>">
                </div>

                
                <button type="submit"
                    class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 rounded-lg text-center mt-8">
                    Update User
                </button>

            </form>

        </div>
        
    </section>
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
<?php /**PATH D:\laragon\www\sibantar\resources\views/admin/form/editUser.blade.php ENDPATH**/ ?>