<?php $__env->startSection('link'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet"> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container-fluid'); ?>
    <!-- DataTales movie -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add a new movie</h6>
        </div>
        
        <div class="card-body">
            <div class="container-fluid"> 
                <div class="row-fluid"> 
                    <div class="col-md-offset-4 col-md-4" id="box"> 
                        <?php if(count($errors)>0): ?>
                            <div class="alert alert-danger">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($err); ?><br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>

                        <?php if(session('thongbao')): ?> 
                            <div class="alert alert-success">
                                <?php echo e(session('thongbao')); ?>

                            </div>
                        <?php endif; ?>
                        <h2>Add movie</h2> 
                        <hr> 
                        <form class="form-horizontal" action="add_movie" method="POST" id="login_form" enctype="multipart/form-data"> 
                            
                            <?php echo e(csrf_field()); ?>

                            <fieldset> 
                                <table class="table table-bordered" id="movieDataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <td>Movie Title:</td>
                                        <td><input name="movieTitle" type="text" placeholder="Movie Title"></td>
                                    </tr>
                                    <tr>
                                        <td>Year of manufacture:</td>
                                        <td><input type="text" name="year"></td>
                                    </tr>
                                    <tr>
                                        <td>Run time (m)</td>
                                        <td><input type="number" name="time"min="0" max="180"></td>
                                    </tr>
                                    <tr>
                                        <td>Language:</td>
                                        <td><input type="text" name="language"></td>
                                    </tr>
                                    <tr>
                                        <td>Year of manufacture:</td>
                                        <td><input type="date" name="yearManufacture" ></td>
                                    </tr>
                                    <tr>
                                        <td>Movie release country</td>
                                        <td><input type="text" name="releaseCountry"></td>
                                    </tr>
                                    <tr>
                                        <td>Images:</td>
                                        <td><input type="file" name="moviePicture"></td>
                                    </tr>
                                    <tr>
                                        <td>Movie description:</td>
                                        <td><input type="text" name="movieDescription"></td>
                                    </tr>
                                    <tr>
                                        <td>Movie rating:</td>
                                        <td><input type="number" name="movieDescription" min="0" max="5"></td>
                                    </tr>
                                </table>

                                <div class="card-body">
                                    <button type="submit" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">Submit</span>
                                    </button>
                                    </div>
                            </fieldset> 
                        </form> 
                    </div> 
                </div>
            </div>   
        </div>
    </div>

<?php $__env->stopSection(); ?>
<!-- Page level plugins -->
<?php $__env->startSection('page-js-files'); ?>
    <script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>  " type="text/javascript"></script>
    <script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/demo/datatables-demo.js')); ?>" type="text/javascript" defer></script>
    <!--<script src="js/jquery-1.11.1.min.js"></script>-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC ASUS\Desktop\CNPM-WEBSITE\movienow\movienow\resources\views/admin/add_movie.blade.php ENDPATH**/ ?>