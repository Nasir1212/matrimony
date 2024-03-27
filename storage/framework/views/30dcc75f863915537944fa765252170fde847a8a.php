
<?php $__env->startSection("content"); ?>
<?php $auth =  App\Models\Register::where(['mail'=>session()->get('email')])->get()[0] ?>
<style>
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
        border: 1px solid #ddd;
    }
    .dashboard-data-analytics .card {
        box-shadow: 0 .125rem 1.25rem rgba(0,0,0,.075)!important;
    }
</style>

<section class="breadcrumbs bg-primary py-5">
<div class="container">
<div class="row">
<div class="col-xl-12">
<div class="breadcrumbs-title">

<?php 
    // $auth =  App\Models\Register::where(['mail'=>session()->get('email')])->get()[0]
    
    ?>
<h4 class="text-light">ড্যাশবোর্ড, স্বাগতম  <?php echo e($auth->name); ?>,</h4>
</div>
</div>
</div>
</div>
</section>

<section class="profile-section py-5">
<div class="container">
<div class="row">

<div class="col-xl-4">
    <?php $__env->startComponent("component/profile_card"); ?><?php echo $__env->renderComponent(); ?>

</div>
<div class="col-xl-8">
<?php if(session('message')): ?>
 <div class="alert <?php if(session('condition') ==true): ?>  alert-success <?php else: ?> alert-danger <?php endif; ?> ">
    <?php echo e(session('message')); ?>

    
</div>
<?php endif; ?>
<div class="dashboard-data-analytics">
<div class="row justify-content-between">

    <div class="col-xl-6 col-md-12">
        <div class="card p-3 mb-5 border-0 rounded profile-card"  data-toggle="modal" data-target="#exampleModal" style="cursor: pointer">
            <div class="card-body shadow">
            <div class="col-xl-12 col-md-12 mb-3">
            <div class="visitors_counts text-center">
          
            <h2 class="text-5 text-white"><i class="fas fa-money-check-alt    "></i></h2>
            <h6 class="text-warning text-2">কানেকশন প্যাকেজ</h6>
            <?php $purchased_count = 0; ?>
                <?php $__currentLoopData = App\Models\package_connection_buy::where(['purchaser'=>$auth->id])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $purchased_count += count(explode(",", $data->purchased))-1 ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $total_package =  \DB::select("SELECT  SUM(package) AS total FROM package_connection_buy WHERE purchaser = '$auth->id'")   ?>
               <!--- total_package -->
                <?php if((int)$total_package[0]->total - $purchased_count > 0): ?>
                <h6 class="text-white" > আপনার  <?php echo e((int)$total_package[0]->total - $purchased_count); ?>  টি কানেকশন অবশিষ্ট আছে </h6>
                
                <?php endif; ?>
           <br>
            </div>
            </div>
            </div>
            </div>
    </div>
<div class="col-xl-6 col-md-12">
<div class="card p-3 mb-5 border-0 rounded">
<div class="card-body shadow">
<div class="col-xl-12 col-md-12 mb-3">
<div class="visitors_counts text-center">

<?php if($auth->is_publish==0): ?>
<h2 class="text-5 danger-color"><i class="fa fa-times-circle" aria-hidden="true"></i></h2>
<h6 class="danger-color text-2">বায়োডাটা পাবলিশ করা হয়নি</h6>
<p>আপনার বায়োডাটা পাবলিশ করার জন্য সকল ইনপুট ফিল্ড পূরন করুন</p>
<?php else: ?>
<h2 class="text-5 text-success"><i class="fa fa-solid fa-check"></i></h2>
<h6 class="danger-green text-2">ধন্যবাদ </h6>
<p>বায়োডাটা পাবলিশ করা হয়েছে । </p>
<?php endif; ?>
</div>
</div>
</div>
</div>
</div>



<div class="col-xl-6 col-md-6">
<div class="card p-3 mb-5 border-0 rounded">
<div class="card-body shadow">
<div class="col-xl-12 col-md-12 mb-3 ">
<div class="visitors_counts text-center py-4">
    <?php if(App\Models\visitor::where(['user_table_id'=>$auth->id])->count() != 0 ): ?>
<h2 class="text-5 primary-color"><?php echo e(count( explode(',', App\Models\visitor::where(['user_table_id'=>$auth->id])->get()[0]->session_arr))-1); ?></h2>
<?php else: ?>
<h2 class="text-5 primary-color">0</h2>

<?php endif; ?>
<h6 class="primary-color text-2">ভিজিটরস সংখ্যা</h6>
<p>আপনার বায়োডাটা দেখেছেন এমন লোকের সংখ্যা।</p>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-6 col-md-6">
<a href="<?php echo e(URL::to("/faveritor_list")); ?>">
<div class="card p-3 mb-5 border-0 rounded">
<div class="card-body shadow">
<div class="col-xl-12 col-md-12 mb-3">
<div class="visitors_counts text-center py-4">

<h2 class="text-5 primary-color"><?php echo e(App\Models\favorite::where(['favorited'=>$auth->id])->count()); ?></h2>
<h6 class="primary-color text-2">পছন্দের তালিকাভুক্ত হয়েছে</h6>
<p>বায়োডাটা পছন্দের তালিকায় রেখেছেন।</p>
</div>
</div>
</div>
</div>
</a>
</div>

<div class="col-xl-6 col-md-4">
<a href="favoritelist">
<div class="card p-3 mb-5 border-0 rounded">
<div class="card-body shadow rounded align-middle">
<div class="row">
<div class="col-xl-3">
<div class="card-icon primary-color">
<i class="fa fa-heart text-5"></i>
</div>
</div>
<div class="col-xl-9">
<div class="visitors_counts text-left">
<h2 class="text-5 primary-color"><?php echo e(App\Models\favorite::where(['favoriter'=>$auth->id])->count()); ?></h2>
<h6 class="primary-color text-2">পছন্দের তালিকা</h6>
<p>আপনার পছন্দের তালিকাভুক্ত বায়োডাটা সমূহ।</p>
</div>
</div>
</div>
</div>
</div>
</a>
</div>
<div class="col-xl-6 col-md-4">
<a href="purchaselist">
<div class="card p-3 mb-5 border-0 rounded">
<div class="card-body shadow rounded">
<div class="col-xl-12 col-md-12 mb-3">
<div class="row">
<div class="col-xl-3">
<div class="card-icon primary-color">
<i class="fa fa-shopping-cart text-5"></i>
</div>
</div>
<div class="col-xl-9">
<div class="visitors_counts text-left">
<h2 class="text-5 primary-color"></h2>
<h6 class="primary-color text-2">আমার ক্রয়সমূহ</h6>
<p>আপনার ক্রয় সংক্রান্ত সমস্ত তথ্য।</p>
</div>
</div>
</div>
</div>
</div>
</div>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >কানেকশন প্যাকেজ সমূহ </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h3>বেসিক</h3>
                        <h5>৩ কানেকশন </h5>
                        <h6>২৭০ টাকা</h6>
                        <p>৩ টি বায়োডাটার তথ্য দেখা যাবে</p>
                        <a href="<?php echo e(URL::to("/package_connection_buy?connection=3")); ?>" class="btn btn-success"> কিনুন </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h3>পপুলার  </h3>
                        <h5> ৫ কানেকশন  </h5>
                        <h6> ৪৩০ টাকা </h6>
                        <p>৫ টি বায়োডাটার তথ্য দেখা যাবে</p>
                        <a href="<?php echo e(URL::to("/package_connection_buy?connection=5")); ?>" class="btn btn-success">কিনুন</a>
                    </div>
                </div>

                

            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">

               
                <div class="card">
                    <div class="card-body">
                        <h3>প্রিমিয়াম</h3>
                        <h5> ১০ কানেকশন  </h5>
                        <h6> ৮০০ টাকা</h6>
                        <p>১০ টি বায়োডাটার তথ্য দেখা যাবে</p>
                        <a href="<?php echo e(URL::to("/package_connection_buy?connection=10")); ?>" class="btn btn-success">কিনুন</a>
                    </div>
                </div>
            </div>
         </div>
        </div>
        
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("master.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ordhang1/public_html/resources/views/pages/dashboard.blade.php ENDPATH**/ ?>