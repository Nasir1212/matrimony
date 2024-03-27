
<?php $__env->startSection("content"); ?>

<style>
    .contact-content {
        margin-bottom: 50px;
    }
    .contact-content p {
        margin: 0;
        font-size: 20px;
        line-height: 30px;
    }
    .social-content h4 {
        font-family: 'SolaimanLipi';
    }
    .form-header h4 {
        font-family: 'SolaimanLipi';
    }
    </style>

<section class="breadcrumbs">
    <div class="container">
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <h2>
    যোগাযোগ
    </h2>
    </div>
    </div>
    </div>
    </section>
    <section class="social-section py-md-4">
    <div class="container">
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="social-content">
    <h4>যেকোন বিষয়ে সাহায্যের জন্য ফেসবুক পেজের মেসেন্জারে যোগাযোগ করুন:</h4>
    <a style="color: gray"> https://facebook.com/ordhanginibd<br>
    <img src="/wp-content/uploads/2022/08/1200px-Facebook_Messenger_logo_2020.svg1_-150x150.png" class="img-fluid py-2" alt></a>
    </div>
    <div class="contact-content">
    <hr>
    
   

    <p>ইমার্জেন্সি হেল্পলাইন :</p>
    <p>প্রতিদিন সকাল ১১.৩০ থেকে রাত ১১.৩০ টা </p>
    <p>ফোন: +880 9638407697</p>
    <p>লাইভচ্যাট এর জন্য <a href="https://api.whatsapp.com/send?phone=+18326199444"><i class="fa fa-whatsapp" aria-hidden="true"></i>+18326199444</a></p>

        

        
        
    </div>
    
   
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
    <div class="form-header">
    <h4> যেকোন বিষয়ে সাহায্যের জন্য ফেসবুক পেজের মেসেন্জারে যোগাযোগ করুন। ফেসবুক না থাকলে আপনার যে কোন জিজ্ঞাসা, নিম্নোক্ত ফর্মে পূরণ করে আমাদের কাছে পাঠিয়ে দিন। আমরা শীঘ্রই আপনার সাথে যোগাযোগ করবো ইন শা আল্লাহ। </h4>
    
</div>
    <div class="contact-form pt-20">
    <form action="<?php echo e(URL::to('/client_contact_save')); ?>" method="GET" id="contactform">
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
    <div class="form-group">
    <label for="name">নাম</label>
    <input type="name" name="name" class="form-control" id="name" placeholder="আপনার নাম">
    </div>
    <div class="form-group">
    <label for="email">ইমেইল</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="আপনার ইমেইল">
    </div>
    <div class="form-group">
    <label for="subject"> মোবাইল </label>
    <input type="subject" name="subject" class="form-control" id="subject" placeholder="017**-******">
    </div>
    <div class="form-group">
    <label for="message">আপনার বার্তা</label>
    <textarea class="form-control" name="message" id="message" placeholder="আপনার বার্তা" rows="3"></textarea>
    </div>
    <button type="submit"  class="btn btn-primary btn-lg btn-block">পাঠান</button>
    </form>
    </div>
    </div>
    </div>
    </div>
    </section>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make("master.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Nasir All Project\Nasir_Personal_Project\Ordangini\resources\views/pages/contact.blade.php ENDPATH**/ ?>