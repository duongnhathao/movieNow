@section('title', $movie->mov_title)
@extends('layouts_v2.master')
@section('main-content')
    <main class="main-content">
        <div class="container">
            <div class="page">
                <div class="breadcrumbs">
                    <a href="/">Home</a>
                    <a href="/review">Movie Review</a>
                    <span>{{$movie->mov_title}}</span>
                </div>

                <div class="content">
                    <div class="row">
                        <div class="col-md-6" >
                            <div class="container-img">
                                <figure class="movie-poster" id="hoverposter"><img src='{{asset($movie->mov_img)}}'
                                                                                   alt="#"></figure>
                                <div class="middle">
                                    <a href="watch/{{$movie->mov_title}}/1" class="action-button shadow animate red">Play</a>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h2 class="movie-title">{{$movie->mov_title}}</h2>

                            <ul class="movie-meta">
                                <li><strong>Rating:</strong>
                                    <div class="star-rating" title="Rated 3.00 out of 5">
                                        <span style="width:{{ \App\Http\Controllers\MovieController::getRating($movie->mov_id)}}%"><strong class="rating">4.00</strong> out of 5</span></div>
                                </li>
                                <li><strong>Length:</strong> {{$movie->mov_time}} min</li>
                                <li><strong>Premiere:</strong> {{$movie->mov_rel}} ({{$movie->mov_rel_country}})</li>
                                <li><strong>Category:</strong>
                                    @foreach($genres as $key=> $genress)
                                        <a href="">{{$genress->gen_title}}</a>
                                        @if($key !== count( $genres ) -1)
                                            <strong>/</strong>
                                        @endif


                                    @endforeach</li>
                            </ul>

                            <ul class="starring">
                                <li><strong>Directors:</strong>
                                    @foreach($dir as $director)
                                        <a href="">{{$director->dir_fname ." ".$director->dir_lname }}</a>

                                    @endforeach</li>
                                {{--                                <li><strong>Writers:</strong> Chris Sanders (screenplay), Kirk De Micco (screenplay)--}}
                                {{--                                </li>--}}
                                <li><strong>Stars:</strong> @foreach($act as $key=>$actor)

                                        <a href="">{{$actor->act_fname." ".$actor->act_lname}}</a>.
                                    @endforeach<br></li>

                            </ul>
                            <div class="movie-summary">
                                <p>{{$movie->mov_description}}</p>


                            </div>
                        </div>

                    </div> <!-- .row -->

                </div>
            </div>
        </div> <!-- .container -->
    </main>
@endsection
