<?php $__env->startSection('link'); ?>
    <!-- Custom styles for this page -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('container-fluid'); ?>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Detail of Member : <?php echo e($user->name); ?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-7">
                    <div class="p-5">
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-7 d-none d-lg-block "></div>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<!-- Page level plugins -->
<?php echo $__env->make('admin.admin_layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Desktop/movienow/resources/views/admin/edit_users.blade.php ENDPATH**/ ?>