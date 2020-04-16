@section('title', $movie->mov_title)
@extends('layouts_v2.master')

@section('main-content')
    <main class="main-content">
        <div class="container">
            <div class="page">
                <div class="breadcrumbs">
                    <a href="/">Home</a>
                    <a href="/movie/{{$movie->mov_title}}">Movie Review</a>
                    <span>{{$movie->mov_title}}</span>
                </div>

                <div class="content">
                    <div class="row">
                        <div class="col-xl-9">
                            <video class="movie-video" width="100%" height="100%" controls controlsList="nodownload"
                                   autoplay>
                                <source src="{{asset($chapter->chapter_link)}}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <br>
{{--                            <div class="col-xs-12">--}}

{{--                                <div class="togglelight" id="light" onclick="changeLight()"--}}
{{--                                     title="click to toggle the lights mode">--}}
{{--                                    <i class="fa fa-lightbulb"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <br>
                            <br>
                            <div class="col-12 ">

                                <div class="movie-chapter">{{$chapter->chapter_name}}</div>


                            </div>
                            <div class="col">
                                @foreach($all_chapter as $achapter)
                                    @if($achapter->chapter_nums == $chapter->chapter_nums)
                                        <a href="{{url('movie/watch/'.$movie->mov_title.'/'.$achapter->chapter_nums)}}" class="chapter-button shadow animate red">{{$achapter->chapter_nums}}</a>


                                    @else
                                        <a href="{{url('movie/watch/'.$movie->mov_title.'/'.$achapter->chapter_nums)}}" class="chapter-button shadow animate red">{{$achapter->chapter_nums}}</a>


                                    @endif

                                @endforeach
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </main>






@endsection
