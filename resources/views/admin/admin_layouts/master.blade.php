<!DOCTYPE html>
<html lang="en">
<head>
    <title>MovieNow || Admin</title>@include("admin.admin_layouts.header")
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link rel="icon" href="{{asset('/image/circle-cropped.png')}}">
    @yield('link')
</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

        @include("admin.admin_layouts.sidebar")
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
        @include("admin.admin_layouts.navbar")


        <!-- Begin Page Content -->
            <div class="container-fluid">
                @yield('container-fluid')

            </div>
            @include("admin.admin_layouts.footer")

        </div>
    </div>
</div>

@include("admin.admin_layouts.button_scroll")
@include("admin.admin_layouts.script")


</body>
@yield('page-js-files')
@yield('page-js-script')
</html>
