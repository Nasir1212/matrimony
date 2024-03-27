
<link href='https://fonts.googleapis.com/css?family=Hind Siliguri' rel='stylesheet'>

<style>
    /* body{
        background-color: #F6F6F6 !important;
    } */
    p,h1,h2,h3,h4,h5,h6{
    font-family: 'Hind Siliguri'
  }
</style>
<?php $__env->startSection("content"); ?>
<section class="  py-5" style="  background-color: #F6F6F6 !important;">
    <div class="container">
    <div class="row">
    <div class="col-xl-12">
    
    </div>
    </div>
    </div>
    </section>

    


<section class="profile-section py-5" style="  background-color: #F6F6F6 !important;">
    <div class="container">
    <div class="row">
        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xl-4 col-md-6 wow fadeInUp  animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp; ">
            <div class="biodata-card" style="border: none;background: white;border-radius:0px ;height: 29rem;
    overflow: hidden;">
                <a href="<?php echo e(URL::to("/blog_details/$blog->id/$blog->title")); ?>">
                <div class="" style="padding: 5px;font-family: 'Hind Siliguri';">
                    <div style="width: 100%;margin: 0 auto;background: white;padding: 5px 3px;border-radius: 2px; overflow:hidden">
                    <div class="  d-flex justify-content-around align-items-middle ">
                     <img  style="object-fit:cover;object-position: right;"  src="<?php if($blog->img_path != null): ?>https://img.ordhangini.com/uploads/<?php echo e($blog->img_path); ?><?php else: ?>/frontend/img/220_F_137578103_ulK9MbD9IfKACx9RZe6Rx7PAyBA9aN2K.jpg <?php endif; ?> " class=" bg-light" width="320" height="180">
                    </div>
                      </div>
                    <div class=" ">
                        <h5 style="margin:7px 10px;  font-family: 'Hind Siliguri'" ><?php echo e($blog->title); ?></h5>
                    </div>
                </div>
                <div class="p-3" style="height: 13rem;overflow:hidden">
    
                    <?php echo $blog->blog; ?>

                </div>
                <div class="biodata-footer align-items-middle align-self-middle text-center m-auto">
                    
                   
                </div>
                </a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
    </div>
    </div>
    </section>
    <?php $__env->stopSection(); ?>
    




<?php echo $__env->make("master.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Nasir All Project\Nasir_Personal_Project\Ordangini\resources\views/pages/blog_pages/show_blog_all.blade.php ENDPATH**/ ?>