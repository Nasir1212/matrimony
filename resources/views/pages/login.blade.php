@extends("master.layout")
@section("content")

<section class="login-section">
    <div class="container">
    <div class="row">
    <div class="col-md-6 col-xl-6 offset-md-3 offset-xl-3">
    <div class="auth-card">
    <div class="card">
        @if (session('message'))
        <div class="alert    alert-success ">
            {{ session('message') }}

        </div>
        @endif

    <div class="card-header p-0 m-0 bg-transparent">
    <h5>লগইন করুন</h5>
    </div>
    <div class="card-body">
    <form method="POST" name="login_form">
    <div class="col-xl-12">
    <label for="Enter Email " class="d-block">Enter Email</label>
    <div class="input-group mb-3">
    <input id="email" type="email" class="form-control " name="email" value required autocomplete="email" placeholder="Enter Email " autofocus>
    <div class="input-group-append">
    <span class="input-group-text bg-transparent"><i class="fa fa-envelope"></i></span>
    </div>
    <span class="invalid-feedback" role="alert"><strong>This field is required</strong></span>
    </div>
    </div>
    <div class="col-xl-12">
    <label for="Enter Password?" class="d-block">Enter Password?</label>
    <div class="input-group mb-3">
    <input id="password" type="password" class="form-control " name="password" required autocomplete="current-password" placeholder="Password">
    <div class="input-group-append">
    <span class="input-group-text bg-transparent"><i class="fa fa-eye"></i></span>
    </div>
    <span class="invalid-feedback" role="alert"><strong>This field is required</strong></span>
    </div>
    
    <div class="form-check form-check-flat form-check-primary justify-content-between">
    <label class="form-check-label d-none">
    <input class="form-check-input d-none" type="checkbox" name="remember" id="remember">Stay Sign In</label>
    <a class="float-right" href="{{URL::to("/reset_password")}}">পাসওয়ার্ড ভুলে গেছেন?</a>
    </div>
    </div>
    <div class="col-xl-12">
    <div class="button-submit mt-4">
    <button type="button" onclick="handle_login();" class="btn btn-primary btn-block rounded">Sign In</button>
    </div>
    </div>
    </form>
    <div class="login-social text-center mt-4">
    <label for="text"  class="d-none">- Sign in with -</label>
    <div class="sign-in py-3 d-none">
    <a href="/social-auth/facebook"><i class="fa fa-facebook"></i> Facebook</a>
    <?php 
    $end_point = 'https://accounts.google.com/o/oauth2/v2/auth';
$client_id = '518234325458-hpos79g4gv4e3mu8guplhg227cq0ltnr.apps.googleusercontent.com';
$client_secret = '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';
$redirect_uri = "http://127.0.0.1:8080/login_google_redirect";
$scope = 'https://www.googleapis.com/auth/drive.metadata.readonly';


$authUrl = $end_point.'?'.http_build_query([
    'client_id'              => $client_id,
    'redirect_uri'           => $redirect_uri,              
    'scope'                  => $scope,
    'access_type'            => 'online',
    'include_granted_scopes' => 'true',
    'state'                  => 'state_parameter_passthrough_value',
    'response_type'          => 'code',
]);

    
    ?>
    <a href="{{$authUrl}}"><i class="fa fa-google"></i> Google</a>
    </div>
    <p>Don’t have an account? <strong><a href="/signup">Signup Now</a></strong></p>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
@endsection
@section("Js_link")
<script>
var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })

   async  function handle_login (){
    debugger;
     try {
        const response = await fetch(`/user_login`,{
        method:'POST',
        body:JSON.stringify(Object.fromEntries(new FormData( document.forms['login_form']))),
        headers: new Headers({
        'Content-Type': 'application/json',
        })
    })

    const result = await response.json();
   
    if(result.condition==true){
        Toast.fire({ icon: 'success', title: result.message, }) 
        location.href = `${location.origin}/dashboard`;
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
@endsection
