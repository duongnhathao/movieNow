@extends('layouts.master')
@section('title','MovieNow - '.$movie->mov_title)

@section('content')
    <br>

    <div class="row">
        <div class="col-xl-9">
            <video class="movie-video" width="100%" height="100%" controls controlsList="nodownload" autoplay>
                <source src="{{asset($chapter->chapter_link)}}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="row">
                <div class="col-12">
                    <div class="togglelight" id="light" onclick="changeLight()" title="click to toggle the lights mode">
                        <i class="fa fa-lightbulb"></i>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
        </div>
        <div class="col-xl-3">
            <div class="panel-body">
                <ul class="list-group link">
                    @foreach($all_chapter as $achapter)
                        @if($achapter->chapter_nums == $chapter->chapter_nums)
                            <li class="list-group-item active">

                                <a href="{{url('movie/watch/'.$chapter->mov_id.'/'.$achapter->chapter_nums)}}"
                                   role="button"> <i class="fa fa-pause" style="color: white"
                                                     aria-hidden="true"> </i>
                                    <strong>{{$achapter->chapter_name}}</strong>

                                </a>
                            </li>
                        @else

                            <li class="list-group-item ">

                                <a href="{{url('movie/watch/'.$chapter->mov_id.'/'.$achapter->chapter_nums)}}"
                                   role="button"> <i class="fa fa-play" style="color: white" aria-hidden="true"></i>
                                    <strong>{{$achapter->chapter_name}}</strong>
                                </a>
                            </li>
                        @endif

                    @endforeach
                    <li class="list-group-item"><a href="{{url('movie/watch/'.$chapter->mov_id.'/'.$achapter->chapter_nums)}}"
                                                        role="button"> <i class="fa fa-play" style="color: white" aria-hidden="true"></i>
                                <strong>CHAPTER 3</strong>
                            </a>
                        </li>
                        <li class="list-group-item"><a href="{{url('movie/watch/'.$chapter->mov_id.'/'.$achapter->chapter_nums)}}"
                                                       role="button"> <i class="fa fa-play" style="color: white" aria-hidden="true"></i>
                                <strong>CHAPTER 4</strong>
                            </a>
                        </li>
                        <li class="list-group-item"><a href="{{url('movie/watch/'.$chapter->mov_id.'/'.$achapter->chapter_nums)}}"
                                                       role="button"> <i class="fa fa-play" style="color: white" aria-hidden="true"></i>
                                <strong>CHAPTER 5</strong>
                            </a>
                        </li>
                        <li class="list-group-item"><a href="{{url('movie/watch/'.$chapter->mov_id.'/'.$achapter->chapter_nums)}}"
                                                       role="button"> <i class="fa fa-play" style="color: white" aria-hidden="true"></i>
                                <strong>CHAPTER 6</strong>
                            </a>
                        </li>
                        <li class="list-group-item"><a href="{{url('movie/watch/'.$chapter->mov_id.'/'.$achapter->chapter_nums)}}"
                                                       role="button"> <i class="fa fa-play" style="color: white" aria-hidden="true"></i>
                                <strong>CHAPTER 7</strong>
                            </a>
                        </li>
                        <li class="list-group-item"><a href="{{url('movie/watch/'.$chapter->mov_id.'/'.$achapter->chapter_nums)}}"
                                                       role="button"> <i class="fa fa-play" style="color: white" aria-hidden="true"></i>
                                <strong>CHAPTER 8</strong>
                            </a>
                        </li>
                        <li class="list-group-item"><a href="{{url('movie/watch/'.$chapter->mov_id.'/'.$achapter->chapter_nums)}}"
                                                       role="button"> <i class="fa fa-play" style="color: white" aria-hidden="true"></i>
                                <strong>CHAPTER 9</strong>
                            </a>
                        </li>
                        <li class="list-group-item"><a href="{{url('movie/watch/'.$chapter->mov_id.'/'.$achapter->chapter_nums)}}"
                                                       role="button"> <i class="fa fa-play" style="color: white" aria-hidden="true"></i>
                                <strong>CHAPTER 10</strong>
                            </a>
                        </li>
                        <li class="list-group-item"><a href="{{url('movie/watch/'.$chapter->mov_id.'/'.$achapter->chapter_nums)}}"
                                                       role="button"> <i class="fa fa-play" style="color: white" aria-hidden="true"></i>
                                <strong>CHAPTER 11</strong>
                            </a>
                        </li>
                        <li class="list-group-item"><a href="{{url('movie/watch/'.$chapter->mov_id.'/'.$achapter->chapter_nums)}}"
                                                       role="button"> <i class="fa fa-play" style="color: white" aria-hidden="true"></i>
                                <strong>CHAPTER 12</strong>
                            </a>
                        </li>
{{--                    <li class="list-group-item"><strong>Signature--}}
{{--                            Accommodations</strong>(1480m)--}}
{{--                    </li>--}}
{{--                    <li class="list-group-item"><strong>Signature--}}
{{--                            Accommodations</strong>(1480m)--}}
{{--                    </li>--}}
{{--                    <li class="list-group-item"><strong>Signature--}}
{{--                            Accommodations</strong>(1480m)--}}
{{--                    </li>--}}
{{--                    <li class="list-group-item"><strong>Signature--}}
{{--                            Accommodations</strong>(1480m)--}}
{{--                    </li>--}}
{{--                    <li class="list-group-item"><strong>Signature--}}
{{--                            Accommodations</strong>(1480m)--}}
{{--                    </li>--}}
{{--                    <li class="list-group-item"><strong>Signature--}}
{{--                            Accommodations</strong>(1480m)--}}
{{--                    </li>--}}
{{--                    <li class="list-group-item"><strong>Signature--}}
{{--                            Accommodations</strong>(1480m)--}}
{{--                    </li>--}}
{{--                    <li class="list-group-item"><strong>Signature--}}
{{--                            Accommodations</strong>(1480m)--}}
{{--                    </li>--}}
{{--                    <li class="list-group-item"><strong>Signature--}}
{{--                            Accommodations</strong>(1480m)--}}
{{--                    </li>--}}
{{--                    <li class="list-group-item"><strong>Signature--}}
{{--                            Accommodations</strong>(1480m)--}}
{{--                    </li>--}}
{{--                    <li class="list-group-item"><strong>Signature--}}
{{--                            Accommodations</strong>(1480m)--}}
{{--                    </li>--}}
                </ul>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="chapter-name"><h4>{{$movie->mov_title}} : {{$chapter->chapter_name}}</h4></div>
        </div>

    </div>


    <br>

    <div class="row" style="justify-content:center;" >
        <div class="col-xl-9 col-md-12" style="justify-content:center;">
            <div class="lite-movie-panel">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-4">
                        <img src="{{asset($movie->mov_img)}}" class="img-fluid" alt="Responsive image">

                    </div>
                    <div class="col-xl-8 col-lg-7 col-md-8">
                        <div class="lite-movie-info">
                            <strong>Year : </strong> <a href="">{{$movie->mov_year}}</a>
                            <br>
                            <strong>Time : </strong> {{$movie->mov_time}} minutes<br>
                            <strong>Language : </strong> {{$movie->mov_lang}}<br>
                            <strong>Release date : </strong> {{$movie->mov_rel}}<br>
                            <strong>Country : </strong> <a href="#">{{$movie->mov_rel_country}}</a><br></div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-12">

        </div>
    </div>







@endsection
