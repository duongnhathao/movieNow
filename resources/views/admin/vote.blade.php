@extends('admin.admin_layouts.master')
@section('link')
    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('container-fluid')
    <!-- DataTales movie -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Movie rating Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID Movie</th>
                        <th>ID persion</th>
                        <th>Review Star</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID Movie</th>
                        <th>Viewer(ID persion)</th>
                        <th>Review Star</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($movie_ratings as $movie_rating)
                        <tr>
                            <td>{{\App\Http\Controllers\MovieController::getName($movie_rating->mov_id)}}</td>
                            <td>{{\App\Http\Controllers\ViewerController::getNameViewer($movie_rating->rev_id)}}({{$movie_rating->rev_id}})</td>
                            <td>{{$movie_rating->rev_starts}}</td>

                            <!--<td>
                                <form action="{{ url('edit-movie') }}" method="POST" role="form">
                                    <input name="mov_id" type="hidden" value="{{$movie_rating->mov_id}}">
                                    {{ csrf_field()}}
                                    <button type="submit" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-info-circle"></i>
                    </span>
                                        <span class="text">Edit</span>
                                    </button>
                                </form>
                            </td>-->
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
