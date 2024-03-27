
<?php $__env->startSection("content"); ?>

<style>
    .table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 1rem;
    background-color: transparent;
    border: 1px solid #ddd;
}

.toggle-password {
    position: absolute;
    top: 50%;
    right: 0;
    transform: translateY(-50%);
    cursor: pointer;
}
.toggle-password i {
    font-size: 20px;
}
.field-icon {
    float: right;
    margin-right: 10px;
    margin-top: -20px;
    position: relative;
    z-index: 2;
    color: #ddd;
}
</style>

<section class="breadcrumbs bg-primary py-5">
<div class="container">
<div class="row">
<div class="col-xl-12">
<div class="breadcrumbs-title">
    <?php $auth =  App\Models\Register::where(['mail'=>session()->get('email')])->get()[0] ?>
<h4 class="text-light">সেটিং -  <?php echo e($auth->name); ?></h4>
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
    <div class="alert  <?php if(session('condition') == true): ?> alert-success <?php else: ?> alert-danger <?php endif; ?> d-flex align-item-center">

        <?php if(session('condition') == true): ?> 
        <h2 class="text-5 text-success"><i class="fa fa-solid fa-check"></i></h2>
         <?php else: ?> 
         <h2 class="text-5 danger-color"><i class="fa fa-times-circle" aria-hidden="true"></i></h2>

         <?php endif; ?>
         <div>
            <?php echo e(session('message')); ?>

         </div>
     
    </div>
<?php endif; ?>
<div class="profile-tab-content edit-profile">
<ul class="nav nav-settings mb-3 justify-content-between" id="settings-tab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="tab-1-tab" data-toggle="pill" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">জেনারেল সেটিং</a>
</li>
<li class="nav-item d-none">
<a class="nav-link" id="tab-2-tab" data-toggle="pill" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="true">একাউন্ট ডিলেট</a>
</li>
</ul>
<hr>
<div class="tab-content" id="settings-tabContent">
<div class="tab-pane fade active show" id="tab-1" role="tabpanel" aria-labelledby="tab-1-tab">

<section>
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="general-setting">
<form action="<?php echo e(URL::to("/profile_update")); ?>" method="GET" id="updatePassword">

<label for="exampleInputEmail1">Email Account</label>
<input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo e($auth->mail); ?>" disabled>
<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="form-group">
<label>Gender</label><br>
<label class="radio-inline">
<input type="radio" name="gender" value="female"  <?php if($auth->gender=="female"): ?> checked <?php endif; ?>> Female
</label>
<label class="radio-inline">
<input type="radio" name="gender" value="male" <?php if($auth->gender=="male"): ?> checked <?php endif; ?>> Male
</label>
</div>
<div class="form-group position-relative">
<label for="password">Password</label>
<input type="password" name="password" class="form-control" id="password" placeholder="Password">
<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
</div>
<div class="form-group position-relative">
<label for="password_confirmation">Confirm Password</label>
<input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password">
<span toggle="#password_confirmation" class="fa fa-fw fa-eye field-icon toggle-password"></span>
</div>
<button type="submit" class="btn btn-primary my-3">Submit</button>
</form>
</div>
</div>
</div>
</div>
</section>
</div>

</div>
</div>
</div>
</div>
</div>
</section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make("master.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ordhang1/public_html/resources/views/pages/userprofile.blade.php ENDPATH**/ ?>