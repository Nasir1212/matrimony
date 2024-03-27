@extends("master.layout")
@section("content")

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
<h4 class="text-light">সেটিং -  {{ $auth->name}}</h4>
</div>
</div>
</div>
</div>
</section>

<section class="profile-section py-5">
<div class="container">
<div class="row">
<div class="col-xl-4">
    @component("component/profile_card")@endcomponent
</div>
<div class="col-xl-8">
    @if (session('message'))
    <div class="alert  @if (session('condition') == true) alert-success @else alert-danger @endif d-flex align-item-center">

        @if (session('condition') == true) 
        <h2 class="text-5 text-success"><i class="fa fa-solid fa-check"></i></h2>
         @else 
         <h2 class="text-5 danger-color"><i class="fa fa-times-circle" aria-hidden="true"></i></h2>

         @endif
         <div>
            {{ session('message') }}
         </div>
     
    </div>
@endif
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
<form action="{{URL::to("/profile_update")}}" method="GET" id="updatePassword">
{{-- <input type="hidden" name="_token" value="Mq6Aa2Gd0bvOuXfmZvPjN4eiw10kUiRmevQqw6lB"> <div class="form-group"> --}}
<label for="exampleInputEmail1">Email Account</label>
<input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" value="{{$auth->mail}}" disabled>
<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="form-group">
<label>Gender</label><br>
<label class="radio-inline">
<input type="radio" name="gender" value="female"  @if($auth->gender=="female") checked @endif> Female
</label>
<label class="radio-inline">
<input type="radio" name="gender" value="male" @if($auth->gender=="male") checked @endif> Male
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
{{-- <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2-tab">

<section>
<div class="container">
<div class="row">
<div class="col-md-12">

<div class="alert alert-danger" role="alert">
<h4 class="alert-heading">আপনি কি নিশ্চিত,বায়োডাটা হাইড করতে চান?</h4>
<p>আপনি কি আপনার একাউন্ট হাইড করতে চান? আপনি কি নিশ্চিত?</p>
<hr>
<p class="mb-0">যদি আপনি নিশ্চিত হন, তাহলে নীচের বাটনে ক্লিক করুন।</p>
</div>
<div class="card text-center">
<div class="card-header">
<h5 class="card-title mb-0">বায়োডাটা হাইড</h5>
</div>
<div class="card-body">
<p class="card-text">আপনি যদি আপনার বায়োডাটা হাইড করতে চান, তাহলে অনুগ্রহ করে নীচের বাটনে ক্লিক করুন।</p>
<button type="button" class="btn btn-danger delete_account" data-action="delete/account/3268">বায়োডাটা হাইড</button>
</div>
</div>
<div class="alert alert-danger" role="alert">
<h4 class="alert-heading">আপনি কি নিশ্চিত,আপনার বায়োডাটার তথ্য ডিলিট করতে চান?</h4>
<p> নিম্নোক্ত বাটনে ক্লিক করলে আপনার বায়োডাটার বর্তমান সব তথ্য ডিলিট হবে এবং আপনাকে পূরনায় বায়োডাটা ফর্ম পূরন করতে হবে।</p>
<hr>
<p class="mb-0">যদি আপনি নিশ্চিত হন, তাহলে নীচের বাটনে ক্লিক করুন।</p>
</div>
<div class="card text-center">
<div class="card-header">
<h5 class="card-title mb-0">বায়োডাটার তথ্য ডিলিট করুন</h5>
</div>
<div class="card-body">
<p class="card-text">আপনি যদি আপনার বায়োডাটা ডিলিট করতে চান, তাহলে অনুগ্রহ করে নীচের বাটনে ক্লিক করুন।</p>
<button type="button" class="btn btn-info reset_account" data-id="3268" data-action="reset/account/3268">বায়োডাটার তথ্য ডিলিট করুন</button>
</div>
</div>
</div>
</div>
</div>
</section>
</div> --}}
</div>
</div>
</div>
</div>
</div>
</section>

@endsection

