<?php $__env->startSection('title', 'Movie Review'); ?>





<?php $__env->startSection('current-about', 'current-menu-item'); ?>

<?php $__env->startSection('main-content'); ?>
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="breadcrumbs">
							<a href="/">Home</a>
							<span>About us</span>
						</div>

						<div class="row">
							<div class="col-md-4">
                                <video autoplay loop width="300" >
                                    <source src="<?php echo e(asset('/movies/Laravel - The PHP Framework For Web Artisans.mp4')); ?>" type="video/mp4">
                                    Your browser does not support HTML5 video.
                                </video>
							</div>
							<div class="col-md-8">
								<p class="leading">This product has developed and accomplished for the purpose of Software engineering subject</p>
								<p>&#8226; We using laravel framework for this product</p>
								<p>&#8226; Modify the themplate movie designed by <a href="https://www.themezy.com/free-website-templates/10-movie-reviews-responsive-template">Themezy</a></p>
								<p>&#8226; Modify the themplate movie designed by <a href="https://startbootstrap.com/themes/sb-admin-2/">Boostrap</a></p>

                            </div>
						</div>


						<h2 class="section-title">Our Team</h2>
						<div class="row">
                            <div class="col-md-3"></div>
							<div class="col-md-3">
								<div class="team">
									<figure class="team-image"><img src="https://pbs.twimg.com/profile_images/1145467025445314561/KtZKls3L_400x400.jpg" alt=""></figure>
									<h1 class="team-name">Duong Nhat Hao</h1>
									<small class="team-title">51703077 - Developer</small>
									<div class="social-links">
										<a href="https://www.facebook.com/haonhatt1712" class="facebook"><i class="fa fa-facebook"></i></a>
										<a href="https://twitter.com/DuongNhatHao4" class="twitter"><i class="fa fa-twitter"></i></a>
										<a href="mailto:duongnhathao001@gmail.com" class="google-plus"><i class="fa fa-google"></i></a>
									</div>
								</div>
							</div>
                            <div class="col-md-3">
								<div class="team">
									<figure class="team-image"><img src="https://scontent.fsgn3-1.fna.fbcdn.net/v/t1.0-9/86999423_901010923689073_573030288909664256_n.jpg?_nc_cat=111&_nc_sid=85a577&_nc_ohc=w3aNyETRlQUAX_XNyji&_nc_ht=scontent.fsgn3-1.fna&oh=c6c87751835032213d0554513a244408&oe=5EC0E565" alt=""></figure>
									<h1 class="team-name">Ngo Quang Truong</h1>
									<small class="team-title">51703213 - Developer</small>
									<div class="social-links">
										<a href="https://www.facebook.com/profile.php?id=100013405204846" class="facebook"><i class="fa fa-facebook"></i></a>
										<a href="" class="twitter"><i class="fa fa-twitter"></i></a>
										<a href="mailto:hideonbush0512@gmail.com" class="google-plus"><i class="fa fa-google"></i></a>

									</div>
								</div>
							</div>
                            <div class="col-md-3"></div>





                        </div>
					</div>
				</div> <!-- .container -->
			</main>
			<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_v2.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PC ASUS\Desktop\CNPM-WEBSITE\movienow\movienow\resources\views/movie_v2/about.blade.php ENDPATH**/ ?>