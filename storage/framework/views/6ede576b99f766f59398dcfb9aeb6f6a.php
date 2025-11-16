<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($title ?? 'SIBANTAR - Bantuan Darurat Kendaraan Terdekat'); ?></title>
    
    <!-- Vite Assets -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    
    <!-- Additional Styles -->
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-neutral-50">
    
    <!-- Main Content (No Header/Footer) -->
    <main>
        <?php echo e($slot); ?>

    </main>
    
    <!-- Scripts -->
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH D:\laragon\www\sibantar\resources\views/components/layout-simple.blade.php ENDPATH**/ ?>