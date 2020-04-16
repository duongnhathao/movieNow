@extends('admin.admin_layouts.master')
@section('link')
    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet"> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
-->
@endsection

@section('container-fluid')
    <!-- DataTales movie -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add a new member</h6>
        </div>
        
        <div class="card-body">
            <div class="container-fluid"> 
                <div class="row-fluid"> 
                    <div class="col-md-offset-4 col-md-4" id="box"> 
                        <h2>Add member</h2> 
                        <hr> 
                        <form class="form-horizontal" action="#" method="get" id="login_form"> 
                            <fieldset> 
                                <div class="form-group"> 
                                    <div class="col-md-12"> 
                                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> 
                                            <input name="first_name" placeholder="Username" class="form-control" type="text"> 
                                        </div> 
                                    </div> 
                                </div> 
                                <div class="form-group"> 
                                    <div class="col-md-12"> 
                                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> 
                                            <input name="email" placeholder="Password" class="form-control" type="text"> 
                                        </div> 
                                    </div> 
                                </div> 
                                <div class="form-group"> 
                                    <div class="col-md-12"> 
                                        <button type="submit" class="btn btn-md btn-danger pull-right">Đăng nhập </button> 
                                    </div> 
                                </div> 
                            </fieldset> 
                        </form> 
                    </div> 
                </div>
            </div>   
        </div>
    </div>

@endsection
<!-- Page level plugins -->
@section('page-js-files')
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}  " type="text/javascript"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/demo/datatables-demo.js')}}" type="text/javascript" defer></script>
    <!--<script src="js/jquery-1.11.1.min.js"></script>-->

@stop