@extends('layouts_v2.master')
@section('current-home', 'current-menu-item')


@section('main-content')
    {{ session('status') }}
    <main class="main-content">
        <div class="container">
            <div class="page">
                <div class="row">
                    <div class="col-md-12">
                        <div class="slider">
                            <ul class="slides">
                                @foreach($mov as $movie)
                                    <li><a href="{{url('movie/'.$movie->mov_title)}}"><img src="{{asset($movie->mov_img)}}"
                                                                                        alt="Slide 1"></a></li>
                                @endforeach
                                <li><a href="#"><img src="{{ asset('dummy/slide-2.jpg')}}" alt="Slide 2"></a></li>
                                {{--										<li><a href="#"><img src="{{ asset('dummy/slide-3.jpg')}}" alt="Slide 3"></a></li>--}}
                            </ul>
                        </div>
                    </div>

                </div> <!-- .row -->
                <div class="row">
                    <h2 class="section-title">Suggestion View</h2>
{{--                    <div class="col-sm-6 col-md-3">--}}
{{--                        <div class="latest-movie">--}}
{{--                            <a href="#"><img src="{{ asset('dummy/thumb-3.jpg')}}" alt="Movie 3"></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-6 col-md-3">--}}
{{--                        <div class="latest-movie">--}}
{{--                            <a href="#"><img src="{{ asset('dummy/thumb-4.jpg')}}" alt="Movie 4"></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-6 col-md-3">--}}
{{--                        <div class="latest-movie">--}}
{{--                            <a href="#"><img src="{{ asset('dummy/thumb-5.jpg')}}" alt="Movie 5"></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-6 col-md-3">--}}
{{--                        <div class="latest-movie">--}}
{{--                            <a href="#"><img src="{{ asset('dummy/thumb-6.jpg')}}" alt="Movie 6"></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div> <!-- .row -->
                <div class="row">
                    <h2 class="section-title">Latest Movies</h2>
                    @foreach($top_10_movie as $top_lastest)
                    <div class="col-lg-2 col-sm-6 col-md-3">
                        <div class="latest-movie">
                            <a href="movie/{{$top_lastest->mov_title}}"><img src="{{ asset($top_lastest->mov_img)}}" alt="Movie 3"></a>
                        </div>
                    </div>
                    @endforeach


                </div> <!-- .row -->

{{--                <div class="row">--}}
{{--                    <div class="col-md-4">--}}
{{--                        <h2 class="section-title">December premiere</h2>--}}
{{--                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut--}}
{{--                            labore.</p>--}}
{{--                        <ul class="movie-schedule">--}}
{{--                            <li>--}}
{{--                                <div class="date">16/12</div>--}}
{{--                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="date">16/12</div>--}}
{{--                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="date">16/12</div>--}}
{{--                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="date">16/12</div>--}}
{{--                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>--}}
{{--                            </li>--}}
{{--                        </ul> <!-- .movie-schedule -->--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        <h2 class="section-title">November premiere</h2>--}}
{{--                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut--}}
{{--                            labore.</p>--}}
{{--                        <ul class="movie-schedule">--}}
{{--                            <li>--}}
{{--                                <div class="date">16/12</div>--}}
{{--                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="date">16/12</div>--}}
{{--                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="date">16/12</div>--}}
{{--                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="date">16/12</div>--}}
{{--                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>--}}
{{--                            </li>--}}
{{--                        </ul> <!-- .movie-schedule -->--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        <h2 class="section-title">October premiere</h2>--}}
{{--                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut--}}
{{--                            labore.</p>--}}
{{--                        <ul class="movie-schedule">--}}
{{--                            <li>--}}
{{--                                <div class="date">16/12</div>--}}
{{--                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="date">16/12</div>--}}
{{--                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="date">16/12</div>--}}
{{--                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="date">16/12</div>--}}
{{--                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>--}}
{{--                            </li>--}}
{{--                        </ul> <!-- .movie-schedule -->--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div> <!-- .container -->
    </main>
@endsection
