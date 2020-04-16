<header class="site-header">

    <div class="container">
        <a href="/" id="branding">
            <img src="{{ asset('images/logo/logo3.png')}}" alt="" class="logo">
            <div class="logo-copy">
                {{--							<h1 class="site-title">Company Name</h1>--}}
                {{--							<small class="site-description">Tagline goes here</small>--}}
            </div>
        </a> <!-- #branding -->

        <div class="main-navigation">
            <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
            <ul class="menu">
                <li class="menu-item @yield('current-home')"><a href="/" style="color: red;">Home</a></li>
                {{--                <li class="menu-item  @yield('current-about') "><a href="/about">About</a></li>--}}
                <li class="menu-item @yield('current-review')"><a href="/review" style="color: red;">Movie reviews</a>
                </li>
                {{--                <li class="menu-item @yield('current-joinus')"><a href="">Join us</a></li>--}}
                <li class="menu-item @yield('current-contact')"><a href="">Contact</a></li>
{{--                @if(!is_null($user))--}}

{{--                    <li class="menu-item current-menu-item">--}}
{{--                        <div class="dropdown">--}}
{{--                            <button class="dropbtn">{{$user->name}}</button>--}}
{{--                            <div class="dropdown-content">--}}
{{--                                <a href="/abc">Logout</a>--}}
{{--                                <a href="#">about me</a>--}}
{{--                                <a href="#">Link 3</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </li>--}}
{{--                @else--}}
{{--                    <li class="menu-item current-menu-item">--}}
{{--                        <a href="/login" style="color: red;">Login</a>--}}

{{--                    </li>--}}
{{--                @endif--}}
            </ul> <!-- .menu -->

            <form action="#" class="search-form">
                <label>
                    <input type="text" placeholder="Search...">
                </label>
                <button><i class="fa fa-search" style="color: red"></i></button>
            </form>
        </div> <!-- .main-navigation -->

        <div class="mobile-navigation"></div>
    </div>
</header>
