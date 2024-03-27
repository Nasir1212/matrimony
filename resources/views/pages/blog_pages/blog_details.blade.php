@extends("master.layout")
@section("content")
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
{{-- <div class="breadcrumbs-title">
<h4 class="text-light"> সম্পূর্ণ ব্লগ </h4>
</div> --}}
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
<h2 style="text-align:start; font-family: 'Hind Siliguri';">{{$blog->title}}</h2>
</div>
<div style="width: 100%;height:100%;overflow:hidden;">
  <img style="width: 100%;height:100%;padding:2rem" src="@if($blog->img_path != null)https://img.ordhangini.com/uploads/{{$blog->img_path}}@else/frontend/img/220_F_137578103_ulK9MbD9IfKACx9RZe6Rx7PAyBA9aN2K.jpg @endif" alt="">
</div>
<div class="card-body m-0 p-0">
  <div style="padding: 2rem;text-align:justify;font-family: 'Hind Siliguri';">
  {!! $blog->blog !!}
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
  
      @foreach ($latest_blogs as $latest_blog)
          
      <div class="card mb-1" style="max-width: 443px;border:none;border-bottom: 1px solid rgba(0, 0, 0, .125);margin:0 auto;">
        <div class="row " >
          <div class="col-md-4">
            <img style="width: 100%;height:90px;padding:0.5rem" src="@if($latest_blog->img_path != null)https://img.ordhangini.com/uploads/{{$latest_blog->img_path}}@else/frontend/img/220_F_137578103_ulK9MbD9IfKACx9RZe6Rx7PAyBA9aN2K.jpg @endif" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body" style="font-family: 'Hind Siliguri';">
             <a href="{{URL::to("blog_details/$latest_blog->id/$latest_blog->title")}}"><h5 class="card-title" style="font-family: 'Hind Siliguri';">{{$latest_blog->title}}</h5></a> 
              <p class="card-text" style="text-align: justify;font-family:'Hind Siliguri';">{!! substr($latest_blog->blog,0,300,)  !!} ...</p>
              {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
            </div>
          </div>
        </div>
      </div>
      @endforeach

    
      
  
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

@endsection

