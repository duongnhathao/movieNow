@section('title', 'Movie Review')
{{--@section('current-home', '')--}}
{{--@section('current-review', '')--}}
{{--@section('current-joinus', '')--}}
{{--@section('current-contact', '')--}}

@section('current-about', 'current-menu-item')
@extends('layouts_v2.master')
@section('main-content')
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="breadcrumbs">
							<a href="/">Home</a>
							<span>About us</span>
						</div>

						<div class="row">
							<div class="col-md-4">
								<figure><img src="dummy/figure.jpg" alt="figure image"></figure>
							</div>
							<div class="col-md-8">
								<p class="leading">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam.</p>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit consectetur adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam.</p>
							</div>
						</div>

						<div class="row">
							<div class="col-md-9">
								<h2 class="section-title">Vision &amp; Misssion</h2>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>

								<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit consectetur adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam dignissimos ducimus qui blanditiis praesentium voluptatum atque.</p>
							</div>
							<div class="col-md-3">
								<h2 class="section-title">Useful Links</h2>
								<ul class="arrow">
									<li><a href="#">Eiusmod tempor incididunt</a></li>
									<li><a href="#">Tenim ad minim venia</a></li>
									<li><a href="#">Quis nostrud exercitation</a></li>
									<li><a href="#">Ullamco laboris reprehenderit</a></li>
									<li><a href="#">Duis aute dolor voluptat</a></li>
									<li><a href="#">Velit esse cillum dolore</a></li>
									<li><a href="#">Excepteur sint occaeca</a></li>
								</ul>
							</div>
						</div> <!-- .row -->

						<h2 class="section-title">Our Team</h2>
						<div class="row">

							<div class="col-md-12">
								<div class="team">
									<figure class="team-image"><img src="{{asset('images/download.jpg')}}" alt=""></figure>
									<h2 class="team-name">Duong Nhat Hao</h2>
									<small class="team-title">Dev</small>
									<div class="social-links">
										<a href="https://www.facebook.com/haonhatt1712" class="facebook"><i class="fa fa-facebook"></i></a>
										<a href="https://twitter.com/DuongNhatHao4" class="twitter"><i class="fa fa-twitter"></i></a>
										<a href="mailto:duongnhathao001@gmail.com" class="google-plus"><i class="fa fa-google"></i></a>
{{--										<a href="" class="pinterest"><i class="fa fa-pinterest"></i></a>--}}
									</div>
								</div>
							</div>




						</div>
					</div>
				</div> <!-- .container -->
			</main>
			@endsection
