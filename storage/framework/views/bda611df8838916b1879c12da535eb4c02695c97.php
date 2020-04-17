<?php $__env->startSection('current-home', 'current-menu-item'); ?>


<?php $__env->startSection('main-content'); ?>
    <?php echo e(session('status')); ?>

    <main class="main-content">
        <div class="container">
            <div class="page">
                <div class="row">
                    <div class="col-md-12">
                        <div class="slider">
                            <ul class="slides">
                                <?php $__currentLoopData = $mov; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(url('movie/'.$movie->mov_title)); ?>"><img src="<?php echo e(asset($movie->mov_img)); ?>"
                                                                                        alt="Slide 1"></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="#"><img src="<?php echo e(asset('dummy/slide-2.jpg')); ?>" alt="Slide 2"></a></li>
                                
                            </ul>
                        </div>
                    </div>

                </div> <!-- .row -->
                <div class="row">
                    <h2 class="section-title">Suggestion View</h2>




















                </div> <!-- .row -->
                <div class="row">
                    <h2 class="section-title">Latest Movies</h2>
                    <?php $__currentLoopData = $top_10_movie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top_lastest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-2 col-sm-6 col-md-3">
                        <div class="latest-movie">
                            <a href="movie/<?php echo e($top_lastest->mov_title); ?>"><img src="<?php echo e(asset($top_lastest->mov_img)); ?>" alt="Movie 3"></a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div> <!-- .row -->








































































            </div>
        </div> <!-- .container -->
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_v2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC ASUS\Desktop\movienow\movienow\resources\views/movie_v2/index.blade.php ENDPATH**/ ?>