@extends('layouts.master')
@section('title','MovieNow - '.$movie->mov_title)

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-8 col-md-12" id="table-movie">
                <div class="row">
                    <div class="col-xl-8 col-lg-6 col-md-12">
                        <div class="movie-card-info">

                            <img class="movie-poster" src='{{asset($movie->mov_img)}}' alt="">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12">
                        <div class="movie-card-info">
                            <div class="movie-title">{{$movie->mov_title}}</div>
                            <div class="movie-info">
                                <strong>Year : </strong> <a href="">{{$movie->mov_year}}</a> <br>
                                <strong>Time : </strong> {{$movie->mov_time}} minutes<br>
                                <strong>Language : </strong> {{$movie->mov_lang}}<br>
                                <strong>Release date : </strong> {{$movie->mov_rel}}<br>
                                <strong>Country : </strong> <a href="#">{{$movie->mov_rel_country}}</a><br>
                                <strong>Act : </strong> @foreach($act as $actor)
                                    <a href="">{{$actor->act_fname." ".$actor->act_lname}}</a>
                                @endforeach<br>
                                <strong>Director : </strong> @foreach($dir as $director)
                                    <a href="">{{$director->dir_fname ." ".$director->dir_lname }}</a>
                                @endforeach<br>
                                <strong>Genres : </strong> @foreach($genres as $genress)
                                    <a href="">{{$genress->gen_title   }}</a>
                                @endforeach<br>
                                <a class="btn btn-primary" href="watch/{{$movie->mov_id}}/1" role="button">Watch</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-4 col-md-12">
                <h1> -this is table- </h1>
            </div>
        </div>
    </div>




@endsection
