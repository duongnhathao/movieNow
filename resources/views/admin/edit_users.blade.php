@extends('admin.admin_layouts.master')
@section('link')
    <!-- Custom styles for this page -->

@endsection
@section('container-fluid')



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Detail of Member : {{$user->name}}</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-7">
                    <div class="p-5">
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-7 d-none d-lg-block "></div>

        </div>
    </div>

@endsection
<!-- Page level plugins -->