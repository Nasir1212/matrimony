
<?php $__env->startSection("content"); ?>
<link href='https://fonts.googleapis.com/css?family=Hind Siliguri' rel='stylesheet'>

<style>
  /* body{
      background-color: #F6F6F6 !important;
  } */
  p,h1,h2,h3,h4,h5,h6{
    font-family: 'Hind Siliguri'
  }
</style>
<section class="  py-5" style="  background-color: #F6F6F6 !important;">
<div class="container" >
<div class="row">
<div class="co-xl-12">

</div>
</div>
</div>
</section>


<section class="profile-section py-5" style="  background-color: #F6F6F6 !important;">
<div class="container">
<div class="row">


<div class="col-xl-7">
<div class="profile-tab-content">
<div class="card profile-card-content mb-4" style="border: none">
<div class="   " style="margin: 1rem 2rem">
<h2 style="text-align:start; font-family: 'Hind Siliguri';"><?php echo e($blog->title); ?></h2>
</div>
<div style="width: 100%;height:100%;overflow:hidden;">
  <img style="width: 100%;height:100%;padding:2rem" src="<?php if($blog->img_path != null): ?>https://img.ordhangini.com/uploads/<?php echo e($blog->img_path); ?><?php else: ?>/frontend/img/220_F_137578103_ulK9MbD9IfKACx9RZe6Rx7PAyBA9aN2K.jpg <?php endif; ?>" alt="">
</div>
<div class="card-body m-0 p-0">
  <div style="padding: 2rem;text-align:justify;font-family: 'Hind Siliguri';">
  <?php echo $blog->blog; ?>

  </div>


</div>
</div>
</div>
</div>


<div class="col-xl-5">
  <div class="profile-tab-content">
    <div class="card profile-card-content mb-4" style="border: none">
    <div class="  bg-transparent p-2 m-2 ">
    <h4 style="font-family: 'Hind Siliguri'"> সাম্প্রতিক ব্লগগুলো </h4>
    </div>
    <div class="card-body m-0 p-0" >
  
      <?php $__currentLoopData = $latest_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latest_blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
      <div class="card mb-1" style="max-width: 443px;border:none;border-bottom: 1px solid rgba(0, 0, 0, .125);margin:0 auto;">
        <div class="row " >
          <div class="col-md-4">
            <img style="width: 100%;height:90px;padding:0.5rem" src="<?php if($latest_blog->img_path != null): ?>https://img.ordhangini.com/uploads/<?php echo e($latest_blog->img_path); ?><?php else: ?>/frontend/img/220_F_137578103_ulK9MbD9IfKACx9RZe6Rx7PAyBA9aN2K.jpg <?php endif; ?>" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body" style="font-family: 'Hind Siliguri';">
             <a href="<?php echo e(URL::to("blog_details/$latest_blog->id/$latest_blog->title")); ?>"><h5 class="card-title" style="font-family: 'Hind Siliguri';"><?php echo e($latest_blog->title); ?></h5></a> 
              <p class="card-text" style="text-align: justify;font-family:'Hind Siliguri';"><?php echo substr($latest_blog->blog,0,300,); ?> ...</p>
              
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
      
  
    </div>
    </div>
    </div>
  </div>

</div>
</div>
</section>



        
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make("master.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Nasir All Project\Nasir_Personal_Project\Ordangini\resources\views/pages/blog_pages/blog_details.blade.php ENDPATH**/ ?>