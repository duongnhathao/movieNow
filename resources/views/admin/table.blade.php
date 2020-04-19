@extends('admin.admin_layouts.master')
@section('link')
    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('container-fluid')
    <!-- DataTales movie -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Movie Data</h6>
        </div>

{{--        <div class="card-body">--}}
{{--            <a href="add_movie" class="btn btn-success btn-icon-split">--}}
{{--                <span class="icon text-white-50">--}}
{{--                    <i class="fas fa-check"></i>--}}
{{--                </span>--}}
{{--                            --}}
{{--                <span class="text">Add Movie</span>--}}
{{--            </a>--}}
{{--        </div>--}}

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" style="border-style: solid" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Year</th>
                        <th>Time</th>
                        <th>Language</th>
                        <th>Release date</th>
                        <th>Country</th>
                        <th>Description</th>
                        <th>Start</th>
                        <th></th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Year</th>
                        <th>Time</th>
                        <th>Language</th>
                        <th>Release date</th>
                        <th>Country</th>
                        <th>Description</th>
                        <th>Start</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($movies as $movie)
                        <tr>
                            <td>{{$movie->mov_id}}</td>
                            <td>{{$movie->mov_title}}</td>
                            <td>{{$movie->mov_year}}</td>
                            <td>{{$movie->mov_time}}</td>
                            <td>{{$movie->mov_lang}}</td>
                            <td>{{$movie->mov_rel}}</td>
                            <td>{{$movie->mov_rel_country}}</td>
                            <td>{{$movie->mov_description}}</td>
                            <td>{{\App\Http\Controllers\MovieController::getRatings($movie->mov_id)}}</td>

                            <td>
                                <form action="{{ url('edit-movie') }}" method="POST" role="form">
                                    <input name="mov_id" type="hidden" value="{{$movie->mov_id}}">
                                    {{ csrf_field()}}
                                    <button type="submit" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-info-circle"></i>
                    </span>
                                        <span class="text">Edit</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
<!-- Page level plugins -->
@section('page-js-files')
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}  " type="text/javascript"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/demo/datatables-demo.js')}}" type="text/javascript" defer></script>

@stop




