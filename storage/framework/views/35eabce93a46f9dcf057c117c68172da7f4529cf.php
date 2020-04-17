<?php $__env->startSection('link'); ?>
    <!-- Custom styles for this page -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('container-fluid'); ?>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Detail of Movie : <?php echo e($movie->mov_title); ?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-movie-image"
                     style="background-image: url(<?php echo e(asset($movie->mov_img)); ?> )"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <?php $__currentLoopData = $chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                   role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary"><?php echo e($chapter->chapter_name); ?></h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardExample" style="">
                                    <div class="card-body">
                                        <strong>Link : </strong><?php echo e($chapter->chapter_link); ?>





                                        <form method="POST" action = "<?php echo e(route('replaceFilm')); ?>" enctype="multipart/form-data" >
                                            <?php echo csrf_field(); ?>
                                            <input name="MovieID" type="hidden" value=" <?php echo e($movie->mov_id); ?>">

                                            <input name="directory" type="hidden" value=" <?php echo e((explode("/",$chapter->chapter_link )[0])."/".(explode("/",$chapter->chapter_link )[1])); ?>">
                                            <input name="name" type="hidden" value=" <?php echo e((explode("/",$chapter->chapter_link )[2])); ?>">
                                            <input type="file" name="myFile" id="myFile" >
                                            <button type="submit">Upload</button>
                                        </form>
                                        <strong>Time upload : </strong><?php echo e($chapter->chapter_time_upload); ?><br>
                                        <form method="POST" action = "<?php echo e(route('replaceFilm')); ?>" enctype="multipart/form-data" >
                                            <?php echo csrf_field(); ?>
                                            <input name="MovieID" type="hidden" value=" <?php echo e($movie->mov_id); ?>">

                                          <button type="submit">Upload</button>
                                        </form>
                                        <a href="#" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                                            <span class="text">Delete</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <form method="POST" action = "<?php echo e(route('replaceFilm')); ?>" enctype="multipart/form-data" >
                                <?php echo csrf_field(); ?>
                                <input name="MovieID" type="hidden" value=" <?php echo e($movie->mov_id); ?>">

                                <input name="directory" type="hidden" value=" <?php echo e((explode("/",$chapter->chapter_link )[0])."/".(explode("/",$chapter->chapter_link )[1])); ?>">
                                <input name="name" type="hidden" value=" <?php echo e((explode("/",$chapter->chapter_link )[2])); ?>">
                                <input type="file" name="myFile" id="myFile" >
                                <button type="submit">Upload</button>
                            </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4"><?php echo e($movie->mov_title); ?> </h1>
                        </div>
                        <form class="user">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                           placeholder="First Name">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                           placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                       placeholder="Email Address">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user"
                                           id="exampleInputPassword" placeholder="Password">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                           id="exampleRepeatPassword" placeholder="Repeat Password">
                                </div>
                            </div>
                            <a href="login.html" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </a>
                            <hr>
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="login.html">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block "></div>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<!-- Page level plugins -->






<?php echo $__env->make('admin.admin_layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC ASUS\Desktop\movienow\movienow\resources\views/admin/edit_movie.blade.php ENDPATH**/ ?>