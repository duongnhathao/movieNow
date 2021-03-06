@section('title', $movie->mov_title)
@section('add_css')
    <style>
        .star-cb-group {
            /* remove inline-block whitespace */
            font-size: 0;
            /* flip the order so we can use the + and ~ combinators */
            unicode-bidi: bidi-override;
            direction: rtl;
            /* the hidden clearer */
        }
        .star-cb-group * {
            font-size: 2rem;
        }
        .star-cb-group > input {
            display: none;
        }
        .star-cb-group > input + label {
            /* only enough room for the star */
            display: inline-block;
            overflow: hidden;
            text-indent: 9999px;
            width: 1em;
            white-space: nowrap;
            cursor: pointer;
        }
        .star-cb-group > input + label:before {
            display: inline-block;
            text-indent: -9999px;
            content: '\2606';
            color: #888;
        }
        .star-cb-group > input:checked ~ label:before, .star-cb-group > input + label:hover ~ label:before, .star-cb-group > input + label:hover:before {
            content: '\2605';
            color: #e52;
            text-shadow: 0 0 1px #333;
        }
        .star-cb-group > .star-cb-clear + label {
            text-indent: -9999px;
            width: 0.5em;
            margin-left: -0.5em;
        }
        .star-cb-group > .star-cb-clear + label:before {
            width: 0.5em;
        }
        .star-cb-group:hover > input + label:before {
            content: '\2606';
            color: #888;
            text-shadow: none;
        }
        .star-cb-group:hover > input + label:hover ~ label:before, .star-cb-group:hover > input + label:hover:before {
            content: '\2605';
            color: #e52;
            text-shadow: 0 0 1px #333;
        }


    </style>
    @endsection
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
                                        <span style="width:{{ \App\Http\Controllers\MovieController::getRatings($movie->mov_id)}}%"><strong class="rating">4.00</strong> out of 5</span></div>({{\App\Http\Controllers\MovieController::getNumRatings($movie->mov_id)}})
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
                            <form id="f" action="{{ route('rating-start') }}" method="POST">
                                @csrf
                                    <span class="star-cb-group">
                                      <input type="radio" style="font-size: larger" id="rating-5" onclick="submit()"  name="rating" value="5"/><label for="rating-5">5</label>
                                      <input type="radio" id="rating-4" onclick="submit()" name="rating" value="4" /><label for="rating-4">4</label>
                                      <input type="radio" id="rating-3" onclick="submit()"name="rating" value="3"/><label for="rating-3">3</label>
                                      <input type="radio" id="rating-2" onclick="submit()" name="rating" value="2"/><label for="rating-2">2</label>
                                      <input type="radio" id="rating-1" onclick="submit()" name="rating" value="1"/><label for="rating-1">1</label>
                                      <input type="radio" id="rating-0" onclick="submit()"name="rating" value="0" class="star-cb-clear"/><label for="rating-0">0</label>

                                    </span><input type="number" value="{{$movie->mov_id}}" name="id_movie" hidden/>
                            </form>
                        </div>

                    </div> <!-- .row -->

                </div>
            </div>
        </div> <!-- .container -->

    </main>
    <script type='text/javascript'>
       function submit() {
            document.getElementById("f").submit();
       }
    </script>
@endsection
