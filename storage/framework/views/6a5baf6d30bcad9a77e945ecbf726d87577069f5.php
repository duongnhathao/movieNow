<?php $__env->startSection('title', 'Movie Review'); ?>





<?php $__env->startSection('current-review', 'current-menu-item'); ?>

<?php $__env->startSection('main-content'); ?>
    <main class="main-content">
        <div class="container">
            <div class="page">
                <div class="breadcrumbs">
                    <a href="/">Home</a>
                    <span>Movie Review</span>
                </div>

                <div class="filters">
                    <select name="#" id="#" placeholder="Choose Category"
                            onchange="location = '/genres/'+   this.value;">

                        <option>All</option>

                        <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e(\App\Http\Controllers\MovieController::check_selected($genre->gen_title,$genre_select)); ?>><?php echo e($genre->gen_title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                    
                    
                    
                    
                    
                    
                </div>
                <div class="movie-list">
                    <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="movie">
                            <figure class="movie-poster"><a href="/movie/<?php echo e($movie->mov_title); ?>"><img
                                        src="<?php echo e(asset($movie->mov_img)); ?>" alt="#"></a></figure>
                            <div class="movie-title">
                                <div class="star-rating" title="Rated 3.00 out of 5">
                                    <span
                                        style="width:<?php echo e(\App\Http\Controllers\MovieController::getRating($movie->mov_id)); ?>%"><strong
                                            class="rating">4.00</strong> out of 5</span></div>
                                <br>
                                <a href="/movie/<?php echo e($movie->mov_title); ?>"><?php echo e($movie->mov_title); ?></a></div>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div> <!-- .movie-list -->
                <?php echo e($movies->links()); ?>


            </div>
        </div> <!-- .container -->
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_v2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC ASUS\Desktop\movienow\movienow\resources\views/movie_v2/review.blade.php ENDPATH**/ ?>