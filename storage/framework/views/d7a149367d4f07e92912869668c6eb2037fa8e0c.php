<?php $__env->startSection('link'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('container-fluid'); ?>
    <!-- DataTales movie -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Movie Data</h6>
        </div>

        <div class="card-body">
            <a href="add_movie" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                            
                <span class="text">Add Movie</span>
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" style="border-style: solid" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Year</th>
                        <th>Time</th>
                        <th>Language</th>
                        <th>Release date</th>
                        <th>Country</th>
                        <th>Description</th>
                        <th>Start</th>
                        <th></th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Year</th>
                        <th>Time</th>
                        <th>Language</th>
                        <th>Release date</th>
                        <th>Country</th>
                        <th>Description</th>
                        <th>Start</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($movie->mov_id); ?></td>
                            <td><?php echo e($movie->mov_title); ?></td>
                            <td><?php echo e($movie->mov_year); ?></td>
                            <td><?php echo e($movie->mov_time); ?></td>
                            <td><?php echo e($movie->mov_lang); ?></td>
                            <td><?php echo e($movie->mov_rel); ?></td>
                            <td><?php echo e($movie->mov_rel_country); ?></td>
                            <td><?php echo e($movie->mov_description); ?></td>
                            <td><?php echo e(\App\Http\Controllers\MovieController::getRatings($movie->mov_id)); ?></td>
                            
                            <td>
                                <form action="<?php echo e(url('edit-movie')); ?>" method="POST" role="form">
                                    <input name="mov_id" type="hidden" value="<?php echo e($movie->mov_id); ?>">
                                    <?php echo e(csrf_field()); ?>

                                    <button type="submit" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-info-circle"></i>
                    </span>
                                        <span class="text">Edit</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<!-- Page level plugins -->
<?php $__env->startSection('page-js-files'); ?>
    <script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>  " type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/demo/datatables-demo.js')); ?>" type="text/javascript" defer></script>

<?php $__env->stopSection(); ?>





<?php echo $__env->make('admin.admin_layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC ASUS\Desktop\CNPM-WEBSITE\movienow\movienow\resources\views/admin/table.blade.php ENDPATH**/ ?>