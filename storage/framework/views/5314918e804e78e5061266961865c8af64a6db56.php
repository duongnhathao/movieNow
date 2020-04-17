<header class="site-header">

    <div class="container">
        <a href="/" id="branding">
            <img src="<?php echo e(asset('images/logo/logo3.png')); ?>" alt="" class="logo">
            <div class="logo-copy">
                
                
            </div>
        </a> <!-- #branding -->

        <div class="main-navigation">
            <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
            <ul class="menu">
                <li class="menu-item <?php echo $__env->yieldContent('current-home'); ?>"><a href="/" style="color: red;">Home</a></li>
                
                <li class="menu-item <?php echo $__env->yieldContent('current-review'); ?>"><a href="/review" style="color: red;">Movie reviews</a>
                </li>
                
                <li class="menu-item <?php echo $__env->yieldContent('current-contact'); ?>"><a href="">Contact</a></li>



















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
<?php /**PATH C:\Users\PC ASUS\Desktop\movienow\movienow\resources\views/layouts_v2/navbar.blade.php ENDPATH**/ ?>