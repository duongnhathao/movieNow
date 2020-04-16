<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>@yield('title')</title>

    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
    <link href="{{ asset('fonts/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
{{--    font awsome--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/v4-shims.css">
    <!-- Loading main css file -->
    <link rel="stylesheet" href="{{ asset('css_v2/style.css')}}" type="text/css" media="all">
    <script type="text/javascript" src="{{ asset('js_v2/ie-support/html5.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js_v2/ie-support/respond.js')}}"></script>
{{--    font google--}}
    @yield('add_css')
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
</head>
