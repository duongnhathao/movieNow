@extends('admin.admin_layouts.master')

@section('link')
    <!-- Custom styles for this page -->

@endsection

@section('container-fluid')
    <div class="card shadow mb-4">
        <div class="card-body">
            <h1 align="center"><font color="red">SUCCESSFULL! {{$movie->mov_id}}</font></h1>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="hidden">
                        <tr>
                            <td>
                                <a href="admin/dashboard" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>

                                    <span class="text">Back to admin page</span>
                                </a>
                            </td>
                            <td>
                            <form action="{{url('/admin/add-chapter')}}" method="POST" role="form">
                                <input name="mov_id" type="hidden" value="{{$movie->mov_id}}">

                                    {{ csrf_field()}}
                                <button type="submit" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Previous page</span>
                                </button>
                            </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- Page level plugins -->
