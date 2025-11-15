<!-- Header Component - Dynamic Navbar Based on Role -->
<?php if(auth()->guard()->check()): ?>
    <?php if(Auth::user()->role === 'admin'): ?>
        <?php if (isset($component)) { $__componentOriginalf2d127ec02acb2fe16e0bd0cf86744e3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2d127ec02acb2fe16e0bd0cf86744e3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar-admin','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar-admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf2d127ec02acb2fe16e0bd0cf86744e3)): ?>
<?php $attributes = $__attributesOriginalf2d127ec02acb2fe16e0bd0cf86744e3; ?>
<?php unset($__attributesOriginalf2d127ec02acb2fe16e0bd0cf86744e3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf2d127ec02acb2fe16e0bd0cf86744e3)): ?>
<?php $component = $__componentOriginalf2d127ec02acb2fe16e0bd0cf86744e3; ?>
<?php unset($__componentOriginalf2d127ec02acb2fe16e0bd0cf86744e3); ?>
<?php endif; ?>
    <?php elseif(Auth::user()->role === 'bengkel'): ?>
        <?php if (isset($component)) { $__componentOriginalf9516f3d9d396f5e52c22286badacc84 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf9516f3d9d396f5e52c22286badacc84 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar-bengkel','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar-bengkel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf9516f3d9d396f5e52c22286badacc84)): ?>
<?php $attributes = $__attributesOriginalf9516f3d9d396f5e52c22286badacc84; ?>
<?php unset($__attributesOriginalf9516f3d9d396f5e52c22286badacc84); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf9516f3d9d396f5e52c22286badacc84)): ?>
<?php $component = $__componentOriginalf9516f3d9d396f5e52c22286badacc84; ?>
<?php unset($__componentOriginalf9516f3d9d396f5e52c22286badacc84); ?>
<?php endif; ?>
    <?php elseif(Auth::user()->role === 'user'): ?>
        <?php if (isset($component)) { $__componentOriginal29abcdb9d086062ec34746c24e148452 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29abcdb9d086062ec34746c24e148452 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar-user','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar-user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal29abcdb9d086062ec34746c24e148452)): ?>
<?php $attributes = $__attributesOriginal29abcdb9d086062ec34746c24e148452; ?>
<?php unset($__attributesOriginal29abcdb9d086062ec34746c24e148452); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal29abcdb9d086062ec34746c24e148452)): ?>
<?php $component = $__componentOriginal29abcdb9d086062ec34746c24e148452; ?>
<?php unset($__componentOriginal29abcdb9d086062ec34746c24e148452); ?>
<?php endif; ?>
    <?php else: ?>
        <?php if (isset($component)) { $__componentOriginal6783b786fc2f7aecd7654ec5615e54d2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6783b786fc2f7aecd7654ec5615e54d2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar-guest','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar-guest'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6783b786fc2f7aecd7654ec5615e54d2)): ?>
<?php $attributes = $__attributesOriginal6783b786fc2f7aecd7654ec5615e54d2; ?>
<?php unset($__attributesOriginal6783b786fc2f7aecd7654ec5615e54d2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6783b786fc2f7aecd7654ec5615e54d2)): ?>
<?php $component = $__componentOriginal6783b786fc2f7aecd7654ec5615e54d2; ?>
<?php unset($__componentOriginal6783b786fc2f7aecd7654ec5615e54d2); ?>
<?php endif; ?>
    <?php endif; ?>
<?php else: ?>
    <?php if (isset($component)) { $__componentOriginal6783b786fc2f7aecd7654ec5615e54d2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6783b786fc2f7aecd7654ec5615e54d2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar-guest','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar-guest'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6783b786fc2f7aecd7654ec5615e54d2)): ?>
<?php $attributes = $__attributesOriginal6783b786fc2f7aecd7654ec5615e54d2; ?>
<?php unset($__attributesOriginal6783b786fc2f7aecd7654ec5615e54d2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6783b786fc2f7aecd7654ec5615e54d2)): ?>
<?php $component = $__componentOriginal6783b786fc2f7aecd7654ec5615e54d2; ?>
<?php unset($__componentOriginal6783b786fc2f7aecd7654ec5615e54d2); ?>
<?php endif; ?>
<?php endif; ?><?php /**PATH C:\Users\Asus\Downloads\Disk D\project\sibantar\resources\views/components/header.blade.php ENDPATH**/ ?>