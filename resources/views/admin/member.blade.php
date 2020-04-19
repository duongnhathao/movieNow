@extends('admin.admin_layouts.master')
@section('link')
    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('container-fluid')
    <!-- DataTales movie -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Member Data</h6>
        </div>

{{--        <div class="card-body">--}}
{{--            <a href="add_member" class="btn btn-success btn-icon-split">--}}
{{--                <span class="icon text-white-50">--}}
{{--                    <i class="fas fa-check"></i>--}}
{{--                </span>--}}
{{--                            --}}
{{--                <span class="text">Add Member</span>--}}
{{--            </a>--}}
{{--        </div>--}}

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID User</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID User</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($member as $users)
                        <tr>
                            <td>{{$users->id}}</td>
                            <td>{{$users->name}}</td>
                            <td>{{$users->email}}</td>
                            <td>
                            <form action="{{ url('edit-users') }}" method="POST" role="form">
                                <input name="id" type="hidden" value="{{$users->id}}">
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
