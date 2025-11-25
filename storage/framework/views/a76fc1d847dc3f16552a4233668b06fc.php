<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function(){
    try {
        const notyf = new Notyf({ duration: 4000, position: { x: 'right', y: 'top' } });
        <?php if(session('success')): ?>
            notyf.success(<?php echo json_encode(session('success'), 15, 512) ?>);
        <?php endif; ?>
        <?php if(session('error')): ?>
            notyf.error(<?php echo json_encode(session('error'), 15, 512) ?>);
        <?php endif; ?>
    } catch (e) {
        // If Notyf fails to load, silently ignore
        console.warn('Notyf init failed', e);
    }
});
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\sibantar\resources\views/components/notyf.blade.php ENDPATH**/ ?>