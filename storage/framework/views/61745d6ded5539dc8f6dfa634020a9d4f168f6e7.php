
<?php $__env->startSection("content"); ?>

<section class="login-section">
    <div class="container">
    <div class="row">
    <div class="col-md-6 col-xl-6 offset-md-3 offset-xl-3">
    <div class="auth-card">
    <div class="card">
    <div class="card-header p-0 m-0 bg-transparent">
    <h5>সাইন-আপ করুন</h5>
    </div>
    <div class="card-body">
    
    <form method="POST" name="signup_form">
    <div class="col-xl-12">
    <label for="Enter Email  / Phone No" class="d-block">Your Name</label>
    <div class="input-group mb-3">
    <input id="name" type="text" class="form-control " data-message="Please ! Enter name" name="name" value placeholder="Name" required autocomplete="name" autofocus>
    <div class="input-group-append">
    <span class="input-group-text bg-transparent"><i class="fa fa-user"></i></span>
    </div>
    <span class="invalid-feedback" role="alert"><strong>This field is required</strong></span>
    </div>
    </div>
    <div class="col-xl-12">
    <label for="Email" class="d-block">Email Address</label>
    <div class="input-group mb-3">
    <input id="email" type="email" class="form-control " data-message="Please ! Enter Email " name="email" value placeholder="Enter Email " required autocomplete="email">
    <div class="input-group-append">
    <span class="input-group-text bg-transparent"><i class="fa fa-envelope"></i></span>
    </div>
    <span class="invalid-feedback" role="alert"><strong>This field is required</strong></span>
    </div>
    </div>
    <div class="col-xl-12">
    <label for="Gender" class="d-block">Gender</label>
    <div class="form-check form-check-inline mb-3">
    <input class="form-check-input " type="radio" name="gender" id="male" value="male">
    <label class="form-check-label" for="male">Male</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
    <label class="form-check-label" for="female">Female</label>
    </div>
    <span class="invalid-feedback" role="alert"><strong>This field is required</strong></span>
    </div>
    <div class="col-xl-12">
    <label for="Enter Password?" class="d-block">Your Password?</label>
    <div class="input-group mb-3">
    <input id="password" type="password"  data-message="Please ! Enter Password" class="form-control " name="password" placeholder="Enter Password?" required autocomplete="new-password">
    <div class="input-group-append">
    <span class="input-group-text bg-transparent"><i class="fa fa-eye"></i></span>
    </div>
    <span class="invalid-feedback" role="alert"><strong>This field is required</strong></span>
    </div>
    </div>
    <div class="col-xl-12">
    <label for="Confirm Password?" class="d-block">Confirm Password?</label>
    <div class="input-group mb-3">
    <input id="password-confirm" type="password" data-message="Please ! Enter Confirm Password" class="form-control" name="password_confirmation" placeholder="Enter Password?" required autocomplete="new-password">
    <div class="input-group-append">
    <span class="input-group-text bg-transparent"><i class="fa fa-eye"></i></span>
    </div>
    <span class="invalid-feedback" role="alert"><strong>This field is required</strong></span>
    </div>
    </div>
    <div class="col-xl-12">
    <div class="button-submit mt-4">
    <button type="button" onclick="handle_sign_up();" class="btn btn-primary btn-block rounded">Sign Up</button>
    </div>
    </div>
    </form>
    <div class="login-social text-center mt-4">
    <label for="text">- Sign Up with -</label>
    <div class="sign-in py-3">
    <a href="/social-auth/facebook"><i class="fa fa-facebook"></i> Facebook</a>
    <a href="/social-auth/google"><i class="fa fa-google"></i> Google</a>
    </div>
    <p>Do you have an account? <strong><a href="/login">Sign In Now</a></strong></p>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection("Js_link"); ?>
<script>

   async  function handle_sign_up (){
    let User = document.forms['signup_form'].elements;          
    for (const iterator of User) {
        iterator.style.border=''
         if(iterator.name !='gender' && iterator.value==''  ){
            if(iterator.dataset.message !=undefined){
            Toast.fire({ icon: 'error', title: `${iterator.dataset.message}`, })
            iterator.style.border='1px solid red';
            return false
        }
    }       
    }
     if(User.gender.value != 'male' && User.gender.value != 'female') {
         Toast.fire({ icon: 'error', title: `Select Gender`, })
         return false;
     }


     try {
        const response = await fetch(`/signup_user`,{
        method:'POST',
        body:JSON.stringify(Object.fromEntries(new FormData( document.forms['signup_form']))),
        headers: new Headers({
        'Content-Type': 'application/json',
        })
    })

    const result = await response.json();
    console.log(result)
    if(result.condition==true){
        Toast.fire({ icon: 'success', title: result.message, })
        location.href = `${location.origin}/dashboardedit`;
    }else{
        Toast.fire({ icon: 'error', title: result.message, })
    }

} catch (error) {
    Toast.fire({ icon: 'error', title: `Something Went wrong`, })
            
        }
    }

    $(document).ready(function(){
        $('.input-group-append').on('click', function(){
            var input = $(this).prev();
            if(input.attr('type') == 'password'){
                input.attr('type', 'text');
                $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
            }else{
                input.attr('type', 'password');
                $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
            }
        })
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("master.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Nasir All Project\Nasir_Personal_Project\Ordangini\resources\views/pages/signup.blade.php ENDPATH**/ ?>