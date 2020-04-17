<?php $__env->startSection('title', $movie->mov_title); ?>

<?php $__env->startSection('main-content'); ?>
    <main class="main-content">
        <div class="container">
            <div class="page">
                <div class="breadcrumbs">
                    <a href="/">Home</a>
                    <a href="/review">Movie Review</a>
                    <span><?php echo e($movie->mov_title); ?></span>
                </div>

                <div class="content">
                    <div class="row">
                        <div class="col-md-6" >
                            <div class="container-img">
                                <figure class="movie-poster" id="hoverposter"><img src='<?php echo e(asset($movie->mov_img)); ?>'
                                                                                   alt="#"></figure>
                                <div class="middle">
                                    <a href="watch/<?php echo e($movie->mov_title); ?>/1" class="action-button shadow animate red">Play</a>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h2 class="movie-title"><?php echo e($movie->mov_title); ?></h2>

                            <ul class="movie-meta">
                                <li><strong>Rating:</strong>
                                    <div class="star-rating" title="Rated 3.00 out of 5">
                                        <span style="width:<?php echo e(\App\Http\Controllers\MovieController::getRating($movie->mov_id)); ?>%"><strong class="rating">4.00</strong> out of 5</span></div>
                                </li>
                                <li><strong>Length:</strong> <?php echo e($movie->mov_time); ?> min</li>
                                <li><strong>Premiere:</strong> <?php echo e($movie->mov_rel); ?> (<?php echo e($movie->mov_rel_country); ?>)</li>
                                <li><strong>Category:</strong>
                                    <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $genress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href=""><?php echo e($genress->gen_title); ?></a>
                                        <?php if($key !== count( $genres ) -1): ?>
                                            <strong>/</strong>
                                        <?php endif; ?>


                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></li>
                            </ul>

                            <ul class="starring">
                                <li><strong>Directors:</strong>
                                    <?php $__currentLoopData = $dir; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $director): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href=""><?php echo e($director->dir_fname ." ".$director->dir_lname); ?></a>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></li>
                                
                                
                                <li><strong>Stars:</strong> <?php $__currentLoopData = $act; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$actor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <a href=""><?php echo e($actor->act_fname." ".$actor->act_lname); ?></a>.
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><br></li>

                            </ul>
                            <div class="movie-summary">
                                <p><?php echo e($movie->mov_description); ?></p>


                            </div>
                        </div>

                    </div> <!-- .row -->

                </div>
            </div>
        </div> <!-- .container -->
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_v2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC ASUS\Desktop\movienow\movienow\resources\views/movie_v2/single.blade.php ENDPATH**/ ?>