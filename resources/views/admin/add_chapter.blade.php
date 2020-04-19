@extends('admin.admin_layouts.master')

@section('link')
    <!-- Custom styles for this page -->

@endsection

@section('container-fluid')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Detail of Movie : {{$movie->mov_title}}</h6>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-movie-image"
                    style="background-image: url({{asset($movie->mov_img)}} )">
                </div>

                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <th colspan="2">Movie Details</th>
                                </tr>
                                <tr>
                                    <td>ID:</td>
                                    <td>{{$movie->mov_id}}</td>
                                </tr>
                                @foreach($chapters as $chapter)
                                <tr>
                                    <td>Name chapter: </td>
                                    <td>{{$chapter->chapter_name}}</td>
                                </tr>
                                @endforeach
                                </table>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <th colspan="2">Add chapter</th>
                                </tr>
                                <form action="{{url('add-chapter-successfull')}}" method="POST" enctype="multipart/form-data">
                                    <input name="mov_id" type="hidden" value="{{$movie->mov_id}}">
                                    {{ csrf_field()}}
                                    <tr>
                                        <td>Name:</td>
                                        <td><input name="nameChapter" type="text"></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td><input type="file" name="myFile"></td>
                                    </tr>

                                </table>

                                    <div class="card-body">
                                    <button type="submit" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">Submit</span>
                                    </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- Page level plugins -->
