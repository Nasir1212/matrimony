
<?php $__env->startSection("content"); ?>

<section class="login-section">
    <div class="container">
    <div class="row">
    <div class="col-md-6 col-xl-6 offset-md-3 offset-xl-3">
    <div class="auth-card">
    <div class="card">
         <?php if(session('message')): ?>
         <div class="alert    alert-danger ">
            <?php echo e(session('message')); ?>

          
        </div>
        <?php endif; ?>
    <div class="card-header p-0 m-0 bg-transparent">
    <h5> পাসওর্য়াড় রিসেট </h5>
    </div>
    <div class="card-body">
    <form method="POST" action="<?php echo e(URL::to("/send_otp")); ?>" method="POST" name="login_form">
    <div class="col-xl-12">
    <label for="Enter Email " class="d-block">Enter Email</label>
    <div class="input-group mb-3">
        <?php echo csrf_field(); ?>
    <input  type="email" class="form-control " name="email"  required autocomplete="email" placeholder="Enter Email  " autofocus>
    <div class="input-group-append">
    <span class="input-group-text bg-transparent"><i class="fa fa-envelope"></i></span>
    </div>
    <span class="invalid-feedback" role="alert"><strong>This field is required</strong></span>
    </div>
    </div>

    <div class="col-xl-12">
    <div class="button-submit mt-4">
    <button type="submit"  class="btn btn-primary btn-block rounded">Send OTP </button>
    </div>
    </div>
    </form>

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("master.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ordhang1/public_html/resources/views/pages/reset_password.blade.php ENDPATH**/ ?>