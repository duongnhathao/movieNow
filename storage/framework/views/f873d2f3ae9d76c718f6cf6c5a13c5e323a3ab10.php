<?php $__env->startSection('container-fluid'); ?>

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="/admin/print" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="col">
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Num Of Movie
                                        (ALL)
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($movieNumber); ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-film fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Num Of Genres</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($genresNumber); ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total member
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($memberNumber); ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-address-card fa-2x text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Movie Deleted
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($deleted); ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-ban fa-2x text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Earnings (Monthly) Card Example -->


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Total number of movie in <?php echo e(Carbon\Carbon::now()->format('Y')); ?></h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                 aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="myAreaChart" style="display: block; height: 320px; width: 629px;" width="1258"
                                    height="640" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Genres (%)</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                 aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="myPieChart" width="562" height="490" class="chartjs-render-monitor"
                                    style="display: block; height: 245px; width: 281px;"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle " style="color:#4e73df "></i> Thriller (<?php echo e($arrayPercent[0]); ?>%)
                    </span>
                            <span class="mr-2">
                      <i class="fas fa-circle " style="color:#1cc88a "></i> Romance (<?php echo e($arrayPercent[1]); ?>%)
                    </span>

                            <span class="mr-2">
                      <i class="fas fa-circle " style="color:#36b9cc "></i> Mystery (<?php echo e($arrayPercent[2]); ?>%)
                    </span>
                            <span class="mr-2">
                      <i class="fas fa-circle " style="color:#a86032 "></i> Novel (<?php echo e($arrayPercent[3]); ?>%)
                    </span>
                            <span class="mr-2">
                      <i class="fas fa-circle " style="color:#78b030 "></i> Action (<?php echo e($arrayPercent[4]); ?>%)
                    </span>
                            <span class="mr-2">
                      <i class="fas fa-circle " style="color:#f245f5 "></i> Film series (<?php echo e($arrayPercent[5]); ?>%)
                    </span>
                            <span class="mr-2">
                      <i class="fas fa-circle " style="color:#1c09ed "></i> Drama (<?php echo e($arrayPercent[6]); ?>%)
                    </span>
                            <span class="mr-2">
                      <i class="fas fa-circle " style="color:#e02f4a "></i> Sci (<?php echo e($arrayPercent[7]); ?>%)
                    </span>
                            <span class="mr-2">
                      <i class="fas fa-circle " style="color:#ffb545 "></i> Adventure (<?php echo e($arrayPercent[8]); ?>%)
                    </span>
                            <span class="mr-2">
                      <i class="fas fa-circle " style="color:#f1ff29 "></i> Fantasy (<?php echo e($arrayPercent[9]); ?>%)
                    </span>
                            <span class="mr-2">
                      <i class="fas fa-circle " style="color:#e1e3c8 "></i> Cartoon (<?php echo e($arrayPercent[10]); ?>%)
                    </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Top 5 Movie (<?php echo e(Carbon\Carbon::now()->format('m/Y')); ?>)</h6>
                    </div>
                    <div class="card-body">
                        <?php $__currentLoopData = $top5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <h4 class="small font-weight-bold"><?php echo e(\App\Http\Controllers\MovieController::getName($top->mov_id)); ?>

                             <span class="float-right text-reset">
                                   (+<?php echo e(\App\Http\Controllers\MovieController::getStart($top->mov_id) - \App\Http\Controllers\admin\AdminController::getNumberRatingByDate(Carbon\Carbon::now()->subMonth()->endOfMonth(),$top->mov_id)); ?>)

                             </span>
                             <span class="float-right"> <?php echo e(\App\Http\Controllers\MovieController::getStart($top->mov_id)); ?>



                             </span>

                         </h4>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
                <!-- Project Card Example -->





































                <!-- Color System -->


            </div>

            <div class="col-lg-6 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Information</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                 src="<?php echo e(asset('image/undraw_spreadsheet_69ax.svg')); ?>" alt="">
                        </div>
                        <p>We have total <?php echo e($movieNumber); ?> movies with <?php echo e(\App\Http\Controllers\MovieController::getNumofChapter()); ?> chapters</p>
                        <p>Number of movie was deleted or block is <?php echo e($deleted); ?> </p>
                        <p>Number of member is <?php echo e($memberNumber); ?> </p>

                    </div>
                </div>

                <!-- Approach -->


            </div>
        </div>
        <div id="dom-target" style="display: none;">
            <?php
            $output = "42"; //Again, do some operation, get the output.

            echo htmlspecialchars($output); /* You have to escape because the result
                                           will not be valid HTML otherwise. */
            ?>
        </div>
    </div>
    <!-- Page level plugins -->
    <script type='text/javascript'>
        <?php

        $js_array = json_encode($value);
        echo "var valueArr = " . $js_array . ";\n";
        ?>       <?php

        $arrayPercent = json_encode($arrayPercent);
        echo "var arrayPercent = " . $arrayPercent . ";\n";
        ?>
    </script>
    <script src="<?php echo e(asset('/vendor/chart.js/Chart.min.js')); ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo e(asset('/js/demo/chart-area-demo.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/demo/chart-pie-demo.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.admin_layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC ASUS\Desktop\CNPM-WEBSITE\movienow\movienow\resources\views/admin/index.blade.php ENDPATH**/ ?>