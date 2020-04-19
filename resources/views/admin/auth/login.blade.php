<!DOCTYPE html>
<html lang="en">
<head>
    <title>MovieNow || Admin</title>@include("admin.admin_layouts.header")
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link rel="icon" href="{{asset('/image/circle-cropped.png')}}">
    @yield('link')
</head>
<body  id="page-top" style="background-image: url({{asset('image/loginbg.jpg')}});background-repeat: no-repeat;background-position: center; background-size: cover;">
{{--<div class="container">--}}

    <!-- Outer Row -->
{{--    <div class="row justify-content-center">--}}

{{--        <div class="col-xl-6 col-lg-12 col-md-9">--}}

{{--            <div class="card o-hidden border-0 shadow-lg my-5">--}}
{{--                <div class="card-body p-0">--}}
{{--                    <!-- Nested Row within Card Body -->--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>--}}
{{--                        <div class="col-lg-12">--}}
{{--                            <div class="p-5">--}}
{{--                                <div class="text-center">--}}
{{--                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>--}}
{{--                                </div>--}}
{{--                                <form class="user">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <div class="custom-control custom-checkbox small">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="customCheck">--}}
{{--                                            <label class="custom-control-label" for="customCheck">Remember Me</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <a href="index.html" class="btn btn-primary btn-user btn-block">--}}
{{--                                        Login--}}
{{--                                    </a>--}}
{{--                                    <hr>--}}
{{--                                    <a href="index.html" class="btn btn-google btn-user btn-block">--}}
{{--                                        <i class="fab fa-google fa-fw"></i> Login with Google--}}
{{--                                    </a>--}}
{{--                                    <a href="index.html" class="btn btn-facebook btn-user btn-block">--}}
{{--                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook--}}
{{--                                    </a>--}}
{{--                                </form>--}}
{{--                                <hr>--}}
{{--                                <div class="text-center">--}}
{{--                                    <a class="small" href="forgot-password.html">Forgot Password?</a>--}}
{{--                                </div>--}}
{{--                                <div class="text-center">--}}
{{--                                    <a class="small" href="register.html">Create an Account!</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--    </div>--}}

{{--</div>--}}

<br>
<div class="container ">

    <div class="row h-100 justify-content-center ">
        <div class="col-sm-8 my-auto " style="height: 800px;">
            <div class="card " style="margin-top: 300px">
                <div class="card-header"align="center"><b>{{ $title }}</b></div>
                <div class="card-body">
                    <form method="POST" action="{{ route($loginRoute) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route($forgotPasswordRoute) }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include("admin.admin_layouts.button_scroll")
@include("admin.admin_layouts.script")


</body>
@yield('page-js-files')
@yield('page-js-script')
</html>





