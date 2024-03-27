
<?php $__env->startSection("content"); ?>

<div class="card" style="width: 20rem;margin: 0 auto;margin-top: 2rem" >
    <div class="card-body">
        
        <div class="alert    alert-success ">
            
            We have sent OTP on your  email 
        </div>
        

        <form action="<?php echo e(URL::to("/checking_otp")); ?>" method="post">
            <?php echo csrf_field(); ?>
        <div class="form-group">

            <label for="">OTP</label>
            <input type="OTP" name="otp" class="form-control" placeholder="Enter OTP " >
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">Submit</button>
          </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("master.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ordhang1/public_html/resources/views/pages/otp_view.blade.php ENDPATH**/ ?>