<!DOCTYPE html>
<html lang="en">
<head>
    <title>MovieNow || Admin</title><?php echo $__env->make("admin.admin_layouts.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
    <link rel="icon" href="<?php echo e(asset('/image/circle-cropped.png')); ?>">
    <?php echo $__env->yieldContent('link'); ?>
</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

        <?php echo $__env->make("admin.admin_layouts.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
        <?php echo $__env->make("admin.admin_layouts.navbar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <!-- Begin Page Content -->
            <div class="container-fluid">
                <?php echo $__env->yieldContent('container-fluid'); ?>

            </div>
            <?php echo $__env->make("admin.admin_layouts.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
    </div>
</div>

<?php echo $__env->make("admin.admin_layouts.button_scroll", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make("admin.admin_layouts.script", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>
<?php echo $__env->yieldContent('page-js-files'); ?>
<?php echo $__env->yieldContent('page-js-script'); ?>
</html>
<?php /**PATH C:\Users\PC ASUS\Desktop\CNPM-WEBSITE\movienow\movienow\resources\views/admin/admin_layouts/master.blade.php ENDPATH**/ ?>