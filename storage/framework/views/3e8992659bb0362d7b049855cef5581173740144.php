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
                        <div class="card-body">

                            <form action="<?php echo e(url('admin/add-chapter')); ?>" method="POST" role="form">
                                <input name="mov_id" type="hidden" value="<?php echo e($movie->mov_id); ?>">
                                    <?php echo e(csrf_field()); ?>

                                <button type="submit" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Add Chapter</span>
                                </button>
                            </form>

                            <!--<a href="add_chapter" id="buttonAddChapter" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Add Chapter</span>
                            </a>-->
                        </div>


                        <?php $__currentLoopData = $chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample<?php echo e($chapter->chapter_nums); ?>" class="d-block card-header py-3" data-toggle="collapse"
                                   role="button" aria-expanded="true" aria-controls="collapseCardExample<?php echo e($chapter->chapter_nums); ?>">
                                    <h6 class="m-0 font-weight-bold text-primary"><?php echo e($chapter->chapter_name); ?></h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse" id="collapseCardExample<?php echo e($chapter->chapter_nums); ?>" style="">
                                    <div class="card-body">
                                        
                                        
                                            
                                            
                                            
                                            
                                            
                                                
                                        

                                        
                                        
                                            
                                            
                                            
                                        

                                        <a href="admin/update-chapter/<?php echo e($movie->mov_id); ?>/<?php echo e($chapter->chapter_nums); ?>"  id="myBtn" class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                            <span class="text">Edits</span>
                                        </a>


                                        <?php if($chapter->chapter_nums==DB::table('movie_chapter')->where('mov_id','=',$movie->mov_id)->select('chapter_nums')->orderByDesc('chapter_nums')->first()->chapter_nums): ?>

                                        <a href= "/admin/delete_chapter/<?php echo e($movie->mov_id); ?>/<?php echo e($chapter->chapter_nums); ?>" id="buttonDelete"  class="btn btn-danger btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-ban"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </a>
                                                    <?php endif; ?>
                                        <!-- The Modal -->
                                        <div id="myModal" class="modal">

                                            <!-- Modal content -->
                                            <div class="modal-content">
                                                <span class="row">
                                                    <span class="col-11"></span>
                                                    <span class="col    close mr-0">X</span>
                                                </span>

                                                <div class="card-body p-0">
                                                    <!-- Nested Row within Card Body -->
                                                    <div class="row">
                                                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                                        <div class="col-lg-6">
                                                            <div class="p-5">
                                                                <div class="text-center">
                                                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                                                </div>
                                                                <form class="user">
                                                                    <div class="form-group">
                                                                        <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-checkbox small">
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                                                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                                                                        </div>
                                                                    </div>
                                                                    <a href="index.html" class="btn btn-primary btn-user btn-block">
                                                                        Login
                                                                    </a>
                                                                    <hr>
                                                                    <a href="index.html" class="btn btn-google btn-user btn-block">
                                                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                                                    </a>
                                                                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                                                    </a>
                                                                </form>
                                                                <hr>
                                                                <div class="text-center">
                                                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                                                </div>
                                                                <div class="text-center">
                                                                    <a class="small" href="register.html">Create an Account!</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                        

                            

                            
                            
                                
                            
                            

                            
                        


                    </div>
                </div>
            </div>

            <div class="col-lg-7 d-none d-lg-block "></div>

        </div>
    </div>

    <script>
        // Get the modal
        /*var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }


        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }


        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }*/

    </script>

<?php $__env->stopSection(); ?>
<!-- Page level plugins -->

<?php echo $__env->make('admin.admin_layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC ASUS\Desktop\CNPM-WEBSITE\movienow\movienow\resources\views/admin/edit_movie.blade.php ENDPATH**/ ?>