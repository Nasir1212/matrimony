@extends("master.layout")
@section("content")

<section class="breadcrumbs bg-primary py-5">
<div class="container">
<div class="row">
<div class="col-xl-12">
<div class="breadcrumbs-title">
    <?php $auth =  App\Models\Register::where(['mail'=>session()->get('email')])->get()[0] ?>
<h4 class="text-light">প্রিয়  {{ $auth->name}},  অটোমেটিক ফিল্টার দ্বারা ম্যাচড করানো বায়োডাটা</h4>
</div>
</div>
</div>
</div>
</section>


<section class="profile-section py-5">
<div class="container">
<div class="row">
<div class="col-xl-4 d-block d-sm-none d-xs-none d-md-block">
  @component("component/profile_card")@endcomponent
</div>

<div class="col-xl-8">
<div class="row">
  <?php $ai_data = App\Http\Controllers\home_controller::show_ai_biodata();  ?>
  @if(count($ai_data) != 0)
    @foreach (  $ai_data as $biodata )
<div class="col-xl-6 col-md-6">
<div class="biodata-card">
<div class="biodata-header d-flex justify-content-around align-items-middle align-self-middle">
<div class="biodata-img">
    @if($biodata->biodata_type=="1")
    <img src="/avatar/male-1675938028.png" alt="female" class="img-fluid rounded-circle bg-light" width="70">
    @else
    <img src="/avatar/female-1675938966.png" alt="female" class="img-fluid rounded-circle bg-light" width="70">
    @endif
</div>
<div class="biodata-title text-center">
<h4>বায়োডাটা নাম্বার</h4>
<p>{{$biodata->user_name}}</p>
</div>
</div>
<div class="biodata-body">
<label>বৈবাহিক অবস্থা</label>
<p>{{$biodata->marid_type}}</p>
<label>{{$biodata->present_address}}</label>
<p>ঢাকা</p>
<label>জন্মসন (আসল) </label>
<p>{{$biodata->birth}}</p>
<label>পেশা</label>
<p>{{$biodata->profession}}</p>
</div>
<div class="biodata-footer align-items-middle align-self-middle text-center m-auto">
<a href="/show_biodata/{{$biodata->user_table_id}}" class="btn btn-primary">বায়োডাটা দেখুন</a>
<a onclick="add_favorite('{{$biodata->user_table_id}}');"  class="btn btn-outline-primary btn-favorite"><i class="fa fa-heart-o"></i></a>
</div>
</div>
</div>
@endforeach
@else
<div class="col-12">
  <div class="alert alert-danger">
   অনুগ্রহ করে !  আপনার পছন্দের  ফলাফল পেতে আপনার  <b>স্থায়ী ঠিকানা</b>  এবং  <b>পেশা</b>  নির্বাচন করুন । 
  </div>
</div>

@endif
</div>
</div>
</div>
</div>
</section>
@endsection

@section("Js_link")
<script>


const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
})

async function add_favorite(id){
    const res = await fetch(`${location.origin}/save_favorite?id=${id}`)
    const data = await res.json();
   
    if(res.status == 200){
        if(data.condition ==true){
            Toast.fire({
  icon: 'success',
  title: data.message,
}); 
        }else{
            Toast.fire({
  icon: 'error',
  title: data.message,
});
        }
    }else{
        Toast.fire({
  icon: 'error',
  title: "Something Went Wrong",
});
    }
    
    
}

   
</script>
<script src="/frontend/js/nice-select2.js"></script>
<script>
$(document).ready(function() {
// nice select init for all select
var selectElements = document.querySelectorAll("select");
var options = {
  searchable: false
};

selectElements.forEach(function(selectElement) {
  var placeholder = selectElement.getAttribute("data-placeholder");
  options.placeholder = placeholder;
  NiceSelect.bind(selectElement, options);
});

});
</script>
 
@endsection
