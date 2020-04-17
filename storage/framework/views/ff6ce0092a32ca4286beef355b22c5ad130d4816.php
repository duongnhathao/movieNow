<?php $__env->startSection('title', $movie->mov_title); ?>


<?php $__env->startSection('main-content'); ?>
    <main class="main-content">
        <div class="container">
            <div class="page">
                <div class="breadcrumbs">
                    <a href="/">Home</a>
                    <a href="/movie/<?php echo e($movie->mov_title); ?>">Movie Review</a>
                    <span><?php echo e($movie->mov_title); ?></span>
                </div>

                <div class="content">
                    <div class="row">
                        <div class="col-xl-9">
                            <video class="movie-video" width="100%" height="100%" controls controlsList="nodownload"
                                   autoplay>
                                <source src="<?php echo e(asset($chapter->chapter_link)); ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <br>








                            <br>
                            <br>
                            <div class="col-12 ">

                                <div class="movie-chapter"><?php echo e($chapter->chapter_name); ?></div>


                            </div>
                            <div class="col">
                                <?php $__currentLoopData = $all_chapter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $achapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($achapter->chapter_nums == $chapter->chapter_nums): ?>
                                        <a href="<?php echo e(url('movie/watch/'.$movie->mov_title.'/'.$achapter->chapter_nums)); ?>" class="chapter-button shadow animate red"><?php echo e($achapter->chapter_nums); ?></a>


                                    <?php else: ?>
                                        <a href="<?php echo e(url('movie/watch/'.$movie->mov_title.'/'.$achapter->chapter_nums)); ?>" class="chapter-button shadow animate red"><?php echo e($achapter->chapter_nums); ?></a>


                                    <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </main>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_v2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Desktop/movienow/resources/views/movie_v2/watch.blade.php ENDPATH**/ ?>