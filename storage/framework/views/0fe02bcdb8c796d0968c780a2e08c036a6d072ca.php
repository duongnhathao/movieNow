<!DOCTYPE html>
<html lang="en">
    <?php echo $__env->make("layouts_v2.head", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
<div id="site-content">
    <?php echo $__env->make("layouts_v2.navbar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('main-content'); ?>
    <?php echo $__env->make("layouts_v2.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make("layouts_v2.script", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
</body>

</html>
<?php /**PATH /Users/mac/Desktop/movienow/resources/views/layouts_v2/master.blade.php ENDPATH**/ ?>