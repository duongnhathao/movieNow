<!DOCTYPE html>
<html lang="en">
    @include("layouts_v2.head")
<body>
<div id="site-content">
    @include("layouts_v2.navbar")

    @yield('main-content')
    @include("layouts_v2.footer")
    @include("layouts_v2.script")

</div>
</body>

</html>
