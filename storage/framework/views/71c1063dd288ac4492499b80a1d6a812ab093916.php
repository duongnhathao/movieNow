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
                    style="background-image: url(<?php echo e(asset($movie->mov_img)); ?> )">
                </div>

                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <th colspan="2">Movie Details</th>
                                </tr>
                                <tr>
                                    <td>ID:</td>
                                    <td><?php echo e($movie->mov_id); ?></td>
                                </tr>
                                <?php $__currentLoopData = $chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>Name chapter: </td>
                                    <td><?php echo e($chapter->chapter_name); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <th colspan="2">Add chapter</th>
                                </tr>
                                <form action="<?php echo e(url('add-chapter-successfull')); ?>" method="POST" enctype="multipart/form-data">
                                    <input name="mov_id" type="hidden" value="<?php echo e($movie->mov_id); ?>">
                                    <?php echo e(csrf_field()); ?>

                                    <tr>
                                        <td>Name:</td>
                                        <td><input name="nameChapter" type="text"></td>
                                    </tr>
                                    <tr>
                                        <td>Chapter numbers:</td>
                                        <td><input name="chapterNumbers" type="text"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="file" name="myFile"></td>
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<!-- Page level plugins -->
<?php echo $__env->make('admin.admin_layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Desktop/movienow/resources/views/admin/add_chapter.blade.php ENDPATH**/ ?>