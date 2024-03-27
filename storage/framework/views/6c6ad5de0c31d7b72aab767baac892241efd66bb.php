
<style>
    .tiro_bangla{
        font-family: 'Tiro Bangla', serif ;
    }
</style>
<header class="header-sticky">
<nav class="navbar navbar-expand-lg navbar-transparent bg-transparent py-2">
    <div class="container">

        <a class="navbar-brand" href="/">
<img src="/frontend/img/logo.png" alt="Ordhangini" class="img-fluid h-8" width="90">
</a>

        <button class="navbar-toggler bg-primary text-light" type="button" data-toggle="collapse" data-target="#menu_bar" aria-controls="menu_bar" aria-expanded="false" aria-label="Toggle navigation">
<i class="fa fa-bars"></i>
</button>

        <div class="collapse navbar-collapse" id="menu_bar">

            <div class="navbar-nav mx-lg-auto">
                <a class="nav-item nav-link" href="<?php echo e(URL::to("/")); ?>"> হোম </a>
                <a class="nav-item nav-link" href="<?php echo e(URL::to("/biodata?type=all")); ?>">বিয়ের বায়োডাটা </a>
                <a class="nav-item nav-link" href="<?php echo e(URL::to("/faq")); ?>"> প্রশ্নোত্তর
                <a class="nav-item nav-link" href="<?php echo e(URL::to("/about")); ?>"> আমাদের সম্পর্কে </a>
                </a>
                <a class="nav-item nav-link" href="<?php echo e(URL::to("/contact")); ?>"> যোগাযোগ </a>
                
                <a class="nav-item nav-link" href="<?php echo e(URL::to("/show_blog_all")); ?>"> ব্লগ </a>
            </div>
          
           
            <?php if(Session::get('is_login')==true ): ?>
            <div class="navbar-nav ms-lg-6 pt-10">
                <ul class="d-flex">
                <li class="mr-2">
                <a href="/notification" class=" text-dark"> <i class="fa fa-bell"></i> <span class="badge badge-danger badge-sm rounded-circle"></span> </a>
                </li>
                <li >
                
                <a href="#" class="dropdown-toggle text-dark" id="profile_menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <span> <i class="fa fa-user-circle"></i></span> আমার বায়োডাটা</a>
                <div class="dropdown-menu m-0 dropdown-menu-right text-dark " aria-labelledby="profile_menu">
                <a href="#" class="p-1">
                
                <div class="row align-items-center m-auto">
                <div class="col-md-12 text-center m-auto">
                <div class="card border-0 p-0">
                <div class="card-body p-0">
                <?php $auth =  App\Models\Register::where(['mail'=>session()->get('email')])->get()[0] ?>
                <?php if($auth->gender=="male"): ?>
                <img src="/avatar/male-1675938028.png" alt="female" class="img-fluid rounded-circle bg-light" width="70">
                <?php else: ?>
                <img src="/avatar/female-1675938966.png" alt="female" class="img-fluid rounded-circle bg-light" width="70">
                <?php endif; ?>
               
                <div class="badge badge-info my-2 d-none"><h6 class="m-0 text-white">INCOMPLETE</h6></div>
                </div>
                </div>
                </div>
                </div>
                </a>
                <a class="dropdown-item" href="<?php echo e(URL::to('dashboard')); ?>"> <i class="fa fa-tachometer mr-2"></i> ড্যাশবোর্ড</a>
                <a class="dropdown-item" href="<?php echo e(URL::to('ai-intelegent')); ?>"> <i class="fa fa-snowflake-o mr-2"></i> অটোমেটিক ফিল্টার</a>
                <a class="dropdown-item" href="<?php echo e(URL::to('dashboardedit')); ?>"> <i class="fa fa-pencil-square-o mr-2"></i> বায়োডাটা এডিট করুন</a>
                <a class="dropdown-item" href="<?php echo e(URL::to('favoritelist')); ?>"><i class="fa fa-heart mr-2"></i> পছন্দের তালিকা</a>
                <a class="dropdown-item" href="<?php echo e(URL::to('purchaselist')); ?>"><i class="fa fa-shopping-cart mr-2"></i> আমার ক্রয়সমূহ</a>
                <a class="dropdown-item" href="<?php echo e(URL::to('userprofile')); ?>"> <i class="fa fa-sliders mr-2"></i>সেটিংস</a>
                <a href="<?php echo e(URL::to('logout')); ?>" class="dropdown-item" > <i class="fa fa-sign-out mr-2"></i> লগআউট</a>
                
                </div>
                </li>
                </ul>
                </div>
                <?php else: ?>
                <div class="navbar-nav ms-lg-6 pt-10 ">
                    <a class="nav-item nav-link" href="/login"> <span> </span> সাইন-ইন / সাইন-আপ</a>
                </div>

                <?php endif; ?>

        </div>
    </div>
</nav>
</header><?php /**PATH C:\Nasir All Project\Nasir_Personal_Project\Ordangini\resources\views/component/header.blade.php ENDPATH**/ ?>