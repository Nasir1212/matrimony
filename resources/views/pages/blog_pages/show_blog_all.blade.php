@extends("master.layout")
<link href='https://fonts.googleapis.com/css?family=Hind Siliguri' rel='stylesheet'>

<style>
    /* body{
        background-color: #F6F6F6 !important;
    } */
    p,h1,h2,h3,h4,h5,h6{
    font-family: 'Hind Siliguri'
  }
</style>
@section("content")
<section class="  py-5" style="  background-color: #F6F6F6 !important;">
    <div class="container">
    <div class="row">
    <div class="col-xl-12">
    {{-- <div class="breadcrumbs-title">
     
    <h4 class="text-light">অর্ধাঙ্গানী ব্লগ </h4>
    </div> --}}
    </div>
    </div>
    </div>
    </section>
{{--     
@dd($blogs) --}}
    


<section class="profile-section py-5" style="  background-color: #F6F6F6 !important;">
    <div class="container">
    <div class="row">
        @foreach ($blogs as $blog)
        <div class="col-xl-4 col-md-6 wow fadeInUp  animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp; ">
            <div class="biodata-card" style="border: none;background: white;border-radius:0px ;height: 29rem;
    overflow: hidden;">
                <a href="{{URL::to("/blog_details/$blog->id/$blog->title")}}">
                <div class="" style="padding: 5px;font-family: 'Hind Siliguri';">
                    <div style="width: 100%;margin: 0 auto;background: white;padding: 5px 3px;border-radius: 2px; overflow:hidden">
                    <div class="  d-flex justify-content-around align-items-middle ">
                     <img  style="object-fit:cover;object-position: right;"  src="@if($blog->img_path != null)https://img.ordhangini.com/uploads/{{$blog->img_path}}@else/frontend/img/220_F_137578103_ulK9MbD9IfKACx9RZe6Rx7PAyBA9aN2K.jpg @endif " class=" bg-light" width="320" height="180">
                    </div>
                      </div>
                    <div class=" ">
                        <h5 style="margin:7px 10px;  font-family: 'Hind Siliguri'" >{{ $blog->title}}</h5>
                    </div>
                </div>
                <div class="p-3" style="height: 13rem;overflow:hidden">
    
                    {!! $blog->blog !!}
                </div>
                <div class="biodata-footer align-items-middle align-self-middle text-center m-auto">
                    {{-- <a href="{{URL::to("/blog_details/$blog->id")}}" class="btn btn-primary"> আরো পড়ুন </a> --}}
                   
                </div>
                </a>
            </div>
        </div>
        @endforeach       
    </div>
    </div>
    </section>
    @endsection
    



