<?php $__env->startSection('link'); ?>
    <!-- Custom styles for this page -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('container-fluid'); ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <h1 align="center"><font color="red">SUCCESSFULL! <?php echo e($movie->mov_id); ?></font></h1>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" borded="0">
                        <tr>
                            <td>
                                <a href="admin/dashboard" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                                
                                    <span class="text">Back to admin page</span>
                                </a>
                            </td>
                            <td>
                            <form action="<?php echo e(url('add-chapter')); ?>" method="POST" role="form">
                                <input name="mov_id" type="hidden" value="<?php echo e($movie->mov_id); ?>">
                                
                                    <?php echo e(csrf_field()); ?>

                                <button type="submit" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Previous page</span>
                                </button>
                            </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<!-- Page level plugins -->
<?php echo $__env->make('admin.admin_layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Desktop/movienow/resources/views/admin/add_chapter_successfull.blade.php ENDPATH**/ ?>