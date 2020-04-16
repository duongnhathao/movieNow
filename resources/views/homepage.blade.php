@extends('layouts.master')
@section('title','MovieNow - HomePage')

@section('content')
    <div class="row" style="justify-content:center;" >
    <div class="card-deck">
        @foreach($mov as $movie)

            <a href="{{url('movie/'.$movie->mov_id)}}">
{{--  this line for encrypt url              <a href="{{url('movie/'.encrypt($movie->mov_id))}}">--}}
                <div class=" col-md-12">
                    <div class="movie-card">
                        <div class="card">
                            <img src="{{asset($movie->mov_img)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$movie->mov_title}}</h5>
                            </div>
                        </div>
                    </div></div>
                </a>
        @endforeach
    </div>
    </div>
@endsection
