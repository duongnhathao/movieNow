@section('title', 'Movie Review')
{{--@section('current-home', '')--}}
{{--@section('current-review', '')--}}
{{--@section('current-joinus', '')--}}
{{--@section('current-contact', '')--}}

@section('current-review', 'current-menu-item')
@extends('layouts_v2.master')
@section('main-content')
    <main class="main-content">
        <div class="container">
            <div class="page">
                <div class="breadcrumbs">
                    <a href="/">Home</a>
                    <span>Movie Review</span>
                </div>

                <div class="filters">
                    <select name="#" id="#" placeholder="Choose Category"
                            onchange="location = '/genres/'+   this.value;">

                        <option>All</option>

                        @foreach($genres as $genre)
                            <option {{\App\Http\Controllers\MovieController::check_selected($genre->gen_title,$genre_select)}}>{{$genre->gen_title}}</option>
                        @endforeach

                    </select>
                    {{--                    <button type="submit"  class="button">Search</button>--}}
                    {{--                    <select name="#" id="#">--}}
                    {{--                        <option value="#">2012</option>--}}
                    {{--                        <option value="#">2013</option>--}}
                    {{--                        <option value="#">2014</option>--}}
                    {{--                    </select>--}}
                </div>
                <div class="movie-list">
                    @foreach($movies as $movie)
                        <div class="movie">
                            <figure class="movie-poster"><a href="/movie/{{$movie->mov_title}}"><img
                                        src="{{asset($movie->mov_img)}}" alt="#"></a></figure>
                            <div class="movie-title">
                                <div class="star-rating" title="Rated 3.00 out of 5">
                                    <span
                                        style="width:{{ \App\Http\Controllers\MovieController::getRating($movie->mov_id)}}%"><strong
                                            class="rating">4.00</strong> out of 5</span></div>
                                <br>
                                <a href="/movie/{{$movie->mov_title}}">{{$movie->mov_title}}</a></div>

                        </div>
                    @endforeach
                    {{--                    <div class="movie">--}}
                    {{--                        <figure class="movie-poster"><img src="dummy/thumb-4.jpg" alt="#"></figure>--}}
                    {{--                        <div class="movie-title"><a href="single.blade.php">The adventure of Tintin</a></div>--}}
                    {{--                        <p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="movie">--}}
                    {{--                        <figure class="movie-poster"><img src="dummy/thumb-5.jpg" alt="#"></figure>--}}
                    {{--                        <div class="movie-title"><a href="single.blade.php">Hobbit</a></div>--}}
                    {{--                        <p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="movie">--}}
                    {{--                        <figure class="movie-poster"><img src="dummy/thumb-6.jpg" alt="#"></figure>--}}
                    {{--                        <div class="movie-title"><a href="single.blade.php">Exists</a></div>--}}
                    {{--                        <p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="movie">--}}
                    {{--                        <figure class="movie-poster"><img src="dummy/thumb-1.jpg" alt="#"></figure>--}}
                    {{--                        <div class="movie-title"><a href="single.blade.php">Drive hard</a></div>--}}
                    {{--                        <p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="movie">--}}
                    {{--                        <figure class="movie-poster"><img src="dummy/thumb-2.jpg" alt="#"></figure>--}}
                    {{--                        <div class="movie-title"><a href="single.blade.php">Robocop</a></div>--}}
                    {{--                        <p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="movie">--}}
                    {{--                        <figure class="movie-poster"><img src="dummy/thumb-7.jpg" alt="#"></figure>--}}
                    {{--                        <div class="movie-title"><a href="single.blade.php">Life of Pi</a></div>--}}
                    {{--                        <p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="movie">--}}
                    {{--                        <figure class="movie-poster"><img src="dummy/thumb-8.jpg" alt="#"></figure>--}}
                    {{--                        <div class="movie-title"><a href="single.blade.php">The Colony</a></div>--}}
                    {{--                        <p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>--}}
                    {{--                    </div>--}}
                </div> <!-- .movie-list -->
                {{$movies->links() }}

            </div>
        </div> <!-- .container -->
    </main>
@endsection
