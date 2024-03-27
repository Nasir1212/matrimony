@extends("master.layout")
@section("content")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css" />

<style>
   .biodata_sideFilter {
      max-width: 265px;
      width: 265px;
      position: fixed;
      top: 0;
      height: 100vh;
      min-height: 100vh;
      background: #fff;
      box-shadow: -5px 0px 20px #777;
      z-index: 9;
   }
   span.filterBtn {
      position: absolute;
      right: -35px;
      background: #ddd;
      padding: 10px 10px;
      width: 35px;
      cursor: pointer;
   }
   a.filterBtn {
        position: absolute;
        left: -30%;
        font-size: 24px;
   }
   .filter-data .card-header {
        padding-left: 0 !important;
        padding-right: 0 !important;
        background: transparent !important;
        border-bottom: 1px solid rgba(0,0,0,.125) !important;
   }
   .filter-data .card {
        border: 0 !important;
   }
   .filter-data .card-header h5 {
        font-family: 'SolaimanLipi', sans-serif;
   }
   .filter-data label {
        color: var(--ha-dark);
        cursor: pointer;
        font-size: 17px !important;
        font-weight: 500 !important;
   }
   .filter-data input[type=checkbox], input[type=radio] {
        background-color: var(--ha-primary) !important;
        height: 18px !important;
        width: 18px !important;
        margin-right: 5px !important;
        position: relative;
        top: 3px;
   }
   .filter-data input[type=checkbox], input[type=radio] {
        accent-color: var(--ha-primary) !important;;
   }

   .filter-data .nav-tabs .nav-item .nav-link, .nav-tabs .nav-link {
        padding-left: 0 !important;
        padding-right: 0 !important;
        border: 0 !important;
        font-size: 20px !important;
        color: #495057;
        background-color: transparent;
        border-color: transparent transparent #f3f3f3;
    }
    .filter-data .nav-tabs .nav-link.active {
        color: var(--ha-primary);
        padding-left: 0 !important;
        padding-right: 0 !important;
    }
    .label-title h5 {
        font-size: 18px;
        line-height: 40px;
        font-weight: 500;
    }
   .list-columns-2 {
      -webkit-column-count: 2;
      -moz-column-count: 2;
      column-count: 2;
   }
   .nice-select {
      float: none;
   }
   .breadcrumbs {
      position: relative;
   }
   #biodata_sidebar {
      width: 265px;
      position: fixed;
      top: 0;
      bottom: 0;
      background-color: #f7f7f7; /* add your desired background color */
      border-right: 1px solid #ddd; /* add a border if desired */
      overflow-y: auto; /* enable vertical scrolling if content exceeds sidebar height */
   }
   .drawer {
      width: 350px;
   }
   .drawer-backdrop.show {
      opacity: 0 !important;
   }
   .filter__btn {
      cursor: pointer !important;
   }
   /* response query for mobile */
   @media only screen and (max-width: 600px) {
      .biodata_sideFilter{
         display: none;
      }
   }

   .irs--modern .irs-from, .irs--modern .irs-to, .irs--modern .irs-single {
    
    background-color: #5e2797 !important;
  
}
.irs--modern .irs-bar {
    
    background: #5e2797 !important;
    /* background: linear-gradient(to bottom, #20b426 0%, #18891d 100%); */
}

.irs--modern .irs-from:before, .irs--modern .irs-to:before, .irs--modern .irs-single:before {
    border-top-color: #5e2797 !important;
}


</style>



<section class="breadcrumbs">
<div class="container">
<div class="row">
<div class="col-md-12">
<h2>
বায়োডাটা সমূহ
@if(isset($searching_data))
<p class="mt-3 text-white count-biodata-found">মোট বায়োডাটা সমূহ : {{count($searching_data)}}</p>
{{-- @dd($searching_data) --}}
@endif

</h2>
</div>
</div>
</div>
</section>


<section class="biodata-list h-100">

<div class="biodata_sideFilter">
<span class="filterBtn"><i class="fa fa-times" aria-hidden="true"></i></span>
<section id="biodata_sidebar" class="bg-light sidebar">
<div class="filter-data h-100">
<div id="filter__data_body">
<div class="card p-2">
<ul class="nav nav-tabs justify-content-between" role="tablist">
<li class="nav-item">
<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">ফিল্টার সমূহ</a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">বায়োডাটা সার্চ</a>
</li>
</ul>

<div class="tab-content">
<div class="tab-pane active" id="tabs-1" role="tabpanel">
<form action="/biodata" method="GET" id="ah__bio_filter">
<input type="hidden" name="type" value="Advancefilter">

<div class="card-header" id="HeadLine">
<h5 class="mb-0">
<a href="#" data-toggle="collapse" data-target="#general-info" aria-expanded="true" aria-controls="general-info">সাধারণ তথ্য <i class="fa fa-angle-down float-right" aria-hidden="true"></i></a>
</h5>
</div>

<div id="general-info" class="collapse show" aria-labelledby="HeadLine" data-parent="#filter__data_body">
<div class="card-body p-2 shadow mt-3 rounded borderd" style="box-shadow:0 .125rem 1.25rem rgba(0,0,0,.075)!important">
<div class="card-header label-title p-0">
<h5 class="mb-0"><a href="#">আমি খুঁজছি</a></h5>
</div>
<select class="form-control mt-2" name="biodata_type" data-placeholder="আমি খুঁজছি">
<option value>আমি খুঁজছি</option>
<option value="1">পাত্রের বায়োডাটা</option>
<option value="2">পাত্রীর বায়োডাটা</option>
</select>
</div>
<div class="card-body p-2 shadow mt-3 rounded borderd" style="box-shadow:0 .125rem 1.25rem rgba(0,0,0,.075)!important">
<div class="card-header label-title p-0">
<h5 class="mb-0"><a href="#">বৈবাহিক অবস্থা</a></h5>
</div>
<select class="form-control mt-2" name="marital_status" data-placeholder="বৈবাহিক অবস্থা">
<option value=>বৈবাহিক অবস্থা</option>
<option value="অবিবাহিত">অবিবাহিত</option>
<option value="বিবাহিত">বিবাহিত</option>
<option value="ডিভোর্সড">ডিভোর্সড</option>
<option value="বিধবা">বিধবা</option>
<option value="বিপত্নীক">বিপত্নীক</option>
</select>
</div>
<div class="card-body p-2 shadow mt-3 rounded borderd" style="box-shadow:0 .125rem 1.25rem rgba(0,0,0,.075)!important">
<div class="card-header label-title p-0">
<h5 class="mb-0"><a href="#">উচ্চতা</a></h5>
</div>
<select class="form-control mt-2" name="height" data-placeholder="উচ্চতা">
<option value selected>সকল</option>
<option value="1"  >৪&#039;১&#039;&#039;</option>
<option value="2" >৪&#039;২&#039;&#039;</option>
<option value="3" >৪&#039;৩&#039;&#039;</option>
<option value="4" >৪&#039;৪&#039;&#039;</option>
<option value="5" >৪&#039;৫&#039;&#039;</option>
<option value="6" >৪&#039;৬&#039;&#039;</option>
<option value="7" >৪&#039;৭&#039;&#039;</option>
<option value="8" >৪&#039;৮&#039;&#039;</option>
<option value="9" >৪&#039;৯&#039;&#039;</option>
<option value="10" >৪&#039;১০&#039;&#039;</option>
<option value="11" >৪&#039;১১&#039;&#039;</option>
<option value="12" >৪&#039;১২&#039;&#039;</option>
<option value="13" >৫&#039;০&#039;&#039;</option>
<option value="14" >৫&#039;১&#039;&#039;</option>
<option value="15" >৫&#039;২&#039;&#039;</option>
<option value="16" >৫&#039;৩&#039;&#039;</option>
<option value="17" >৫&#039;৪&#039;&#039;</option>
<option value="18" >৫&#039;৫&#039;&#039;</option>
<option value="19" >৫&#039;৬&#039;&#039;</option>
<option value="20" >৫&#039;৭&#039;&#039;</option>
<option value="21" >৫&#039;৮&#039;&#039;</option>
<option value="22" >৫&#039;৯&#039;&#039;</option>
<option value="23" >৫&#039;১০&#039;&#039;</option>
<option value="24" >৫&#039;১১&#039;&#039;</option>
<option value="25" >৫&#039;১২&#039;&#039;</option>
<option value="26" >৬&#039;০&#039;&#039;</option>
<option value="27" >৬&#039;১&#039;&#039;</option>
<option value="28" >৬&#039;২&#039;&#039;</option>
<option value="29" >৬&#039;৩&#039;&#039;</option>
<option value="30" >৬&#039;৪&#039;&#039;</option>
<option value="31" >৬&#039;৫&#039;&#039;</option>
<option value="32" >৬&#039;৬&#039;&#039;</option>
<option value="33" >৬&#039;৭&#039;&#039;</option>
<option value="34" >৬&#039;৮&#039;&#039;</option>
<option value="35" >৬&#039;৯&#039;&#039;</option>
<option value="36" >৬&#039;১০&#039;&#039;</option>
<option value="37" >৬&#039;১১&#039;&#039;</option>
<option value="38" >৬&#039;১২&#039;&#039;</option>
</select>
</div>

<div class="card-body p-2 shadow mt-3 rounded borderd" style="box-shadow:0 .125rem 1.25rem rgba(0,0,0,.075)!important">
<div class="card-header label-title p-0">
<h5 class="mb-0"><a href="#">বয়স</a></h5>
</div>
<div class="form-group">
<input type="text" id="age_range" name="age" value data-type="double" , data-min="18" , data-max="75" , data-from="18" , data-to="35" , data-grid="false" , data-skin="modern" />
</div>
</div>
</div>

<div class="card-header" id="HeadLine">
<h5 class="mb-0">
<a href="#" data-toggle="collapse" data-target="#general-addres" aria-expanded="true" aria-controls="general-addres">ঠিকানা <i class="fa fa-angle-down float-right" aria-hidden="true"></i></a>
</h5>
</div>

<div id="general-addres" class="collapse" aria-labelledby="HeadLine" data-parent="#filter__data_body">
<div class="card-body p-2 shadow mt-3 rounded borderd" style="box-shadow:0 .125rem 1.25rem rgba(0,0,0,.075)!important">
<div class="card-header label-title p-0">
<h5 class="mb-0"><a href="#">বর্তমান ঠিকানা</a></h5>
</div>
<select class="form-control mt-2" name="p__address" data-placeholder="নিবার্চন করুন">
<option value>নিবার্চন করুন</option>

@foreach( App\Models\districts::get() as $district ) 
<option value="{{$district->id}}" >{{$district->bn_name}}</option>
@endforeach
</select>
</div>
<div class="card-body p-2 shadow mt-3 rounded borderd" style="box-shadow:0 .125rem 1.25rem rgba(0,0,0,.075)!important">
<div class="card-header label-title p-0">
<h5 class="mb-0"><a href="#">স্থায়ী ঠিকানা</a></h5>
</div>
<select class="form-control mt-2" name="pm__address" data-placeholder="নিবার্চন করুন">
<option value>নিবার্চন করুন</option>
@foreach( App\Models\districts::get() as $district ) 
<option value="{{$district->id}}" >{{$district->bn_name}}</option>
@endforeach

</select>
</div>
</div>

<div class="card-header" id="HeadLine">
<h5 class="mb-0">
<a href="#" data-toggle="collapse" data-target="#general-education" aria-expanded="true" aria-controls="general-education">শিক্ষা <i class="fa fa-angle-down float-right" aria-hidden="true"></i></a>
</h5>
</div>

<div id="general-education" class="collapse" aria-labelledby="HeadLine" data-parent="#filter__data_body">
<div class="card-body p-2 shadow mt-3 rounded borderd" style="box-shadow:0 .125rem 1.25rem rgba(0,0,0,.075)!important">
<div class="card-header label-title p-0">
<h5 class="mb-0"><a href="#">শিক্ষাগত যোগ্যতা</a></h5>
</div>
<select class="form-control mt-2" name="education" data-placeholder="নিবার্চন করুন">
<option value>নিবার্চন করুন</option>
<option value="1">মাদ্রাসা</option>
<option value="2">জেনারেল</option>
</select>
</div>
</div>

<div class="card-header" id="HeadLine">
<h5 class="mb-0">
<a href="#" data-toggle="collapse" data-target="#general-personal" aria-expanded="true" aria-controls="general-personal">ব্যক্তিগত <i class="fa fa-angle-down float-right" aria-hidden="true"></i></a>
</h5>
</div>

<div id="general-personal" class="collapse" aria-labelledby="HeadLine" data-parent="#filter__data_body">
<div class="card-body p-2 shadow mt-3 rounded borderd" style="box-shadow:0 .125rem 1.25rem rgba(0,0,0,.075)!important">
<div class="card-header label-title p-0">
<h5 class="mb-0"><a href="#">গাত্রবর্ণ</a></h5>
</div>
<select class="form-control mt-2" name="personal_skins" data-placeholder="নিবার্চন করুন">
<option value>নিবার্চন করুন</option>
<option value="কালো">কালো</option>
<option value="শ্যামলা">শ্যামলা</option>
<option value="উজ্জ্বল শ্যামলা">উজ্জ্বল শ্যামলা</option>
<option value="ফর্সা">ফর্সা</option>
<option value="উজ্জ্বল ফর্সা">উজ্জ্বল ফর্সা</option>
</select>
</div>
<div class="card-body p-2 shadow mt-3 rounded borderd" style="box-shadow:0 .125rem 1.25rem rgba(0,0,0,.075)!important">
<div class="card-header label-title p-0">
<h5 class="mb-0"><a href="#">যেমন চাচ্ছেন?</a></h5>
</div>
<select class="form-control mt-2" name="expected_people" data-placeholder="নিবার্চন করুন">
<option value>নিবার্চন করুন</option>
<option value="1">নওমুসলিম</option>
<option value="2">মাসনায় আগ্রহী</option>
<option value="3">প্রবাসী/ প্রবাসী বিয়ে করতে আগ্রহী</option>
<option value="4">ঘর জামাই থাকতে চাই</option>
<option value="5">প্রযোজ্য নয়</option>
</select>
</div>
</div>

<div class="card-header" id="HeadLine">
<h5 class="mb-0">
<a href="#" data-toggle="collapse" data-target="#general-occupation" aria-expanded="true" aria-controls="general-occupation">পেশা <i class="fa fa-angle-down float-right" aria-hidden="true"></i></a>
</h5>
</div>

<div id="general-occupation" class="collapse" aria-labelledby="HeadLine" data-parent="#filter__data_body">
<div class="card-body p-2 shadow mt-3 rounded borderd" style="box-shadow:0 .125rem 1.25rem rgba(0,0,0,.075)!important">
<div class="card-header label-title p-0">
<h5 class="mb-0"><a href="#">পেশা</a></h5>
</div>
<select class="form-control mt-2" name="occupation" data-placeholder="নিবার্চন করুন">
<option value>নিবার্চন করুন</option>
<option value="গৃহিণী">গৃহিণী</option>
<option value="ছাত্র/ছাত্রী">ছাত্র/ছাত্রী</option>
<option value="ব্যবসা">ব্যবসা</option>
<option value="প্রাইভেট জব">প্রাইভেট জব</option>
<option value="সরকারি চাকুরীজীবি">সরকারি চাকুরীজীবি</option>
<option value="মাদ্রাসার শিক্ষক">মাদ্রাসার শিক্ষক</option>
<option value="স্কুলের শিক্ষক">স্কুলের শিক্ষক</option>
<option value="ফ্রিল্যান্সার">ফ্রিল্যান্সার</option>
<option value="ডাক্তার">ডাক্তার</option>
<option value="বিএসসি ইঞ্জিনিয়ার">বিএসসি ইঞ্জিনিয়ার</option>
<option value="ডিপ্লোমা ইঞ্জিনিয়ার">ডিপ্লোমা ইঞ্জিনিয়ার</option>
<option value="ড্রাইভিং">ড্রাইভিং</option>
<option value="বাড়ি ভাড়া ব্যবসা">বাড়ি ভাড়া ব্যবসা</option>
<option value="সাংবাদিক">সাংবাদিক</option>
<option value="নার্স">নার্স</option>
<option value="উকিল">উকিল</option>
<option value="সেনাবাহিনী/নৌবাহিনী/বিমানবাহিনী">সেনাবাহিনী/নৌবাহিনী/বিমানবাহিনী</option>
<option value="পুলিশ/বিজিবি/কোস্টগার্ড ও অন্যান্য নিরাপত্তা বাহিনীর সদস্য">পুলিশ/বিজিবি/কোস্টগার্ড ও অন্যান্য নিরাপত্তা বাহিনীর সদস্য</option>
<option value="কৃষি">কৃষি</option>
<option value="বেকার">বেকার</option>
<option value="সাধারণ">সাধারণ</option>
</select>
</div>
</div>

<div class="card-body p-4 d-flex shadow mt-3 rounded borderd text-center justify-content-between mb-5" style="box-shadow:0 .125rem 1.25rem rgba(0,0,0,.075)!important">
<button type="reset" class="btn btn-danger mr-2">রিসেট ডাটা</button>
<button type="submit" class="btn btn-primary">সাবমিট ডাটা</button>
</div>
</form>
</div>
<div class="tab-pane" id="tabs-2" role="tabpanel">

<div class="card-body p-2 shadow mt-3 rounded borderd" style="box-shadow:0 .125rem 1.25rem rgba(0,0,0,.075)!important">
<form action="/biodata" method="GET" id="searchByNumber">
<div class="card-header label-title p-0">
<h5 class="mb-0"><a href="#">বায়োডাটা নং</a></h5>
</div>
<input type="hidden" name="type" value="biodata_no" hidden>
<input type="text" class="form-control mt-2" name="biodata_no" value placeholder="বায়োডাটা নং লিখুন">

<div class="card-body p-4 d-flex shadow mt-3 rounded borderd text-center justify-content-between" style="box-shadow:0 .125rem 1.25rem rgba(0,0,0,.075)!important">
<button type="submit" class="btn btn-primary">সাবমিট ডাটা</button>
<button type="reset" class="btn btn-danger">রিসেট ডাটা</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
<div class="pre-loader-request"></div>
<div class="container">
<div class="row align-items-center align-items-middle align-self-middle">
<div class="col-xl-12">
<div class="section-title d-flex justify-content-between position-relative">
<h2 class="text-3">বায়োডাটা সমূহ &nbsp; <a class="float-right filter__btn" role="button"><i class="fa fa-filter"></i> <sup class="text-small cursor-pointer d-none d-md-block" style="font-size: 14px; top: -20px; margin-left:30px">ফিল্টার করুন</sup> </a></h2>
<div class="sorting mt-2 text-right text-end">
<div class="form-group row">
<div class="col-xl-12">
<form action="/biodata" method="GET" id="Sorting_biodata">
<input type="hidden" name="type" value="sorting">
<select class="form-control form-control-sm d-none" name="sorting" data-placeholder="আমি খুঁজছি">
<option value="old" selected="selected">পুরাতন</option>
<option value="new">নতুন</option>
</select>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row row-biodata">
@if(isset($searching_data) && count($searching_data) >0)
@foreach ($searching_data as $data)
   

<div class="col-xl-4 col-md-6">
<div class="biodata-card">
<div class="biodata-header d-flex justify-content-around align-items-middle align-self-middle">
<div class="biodata-img">
   @if($data->biodata_type=="1")
   <img src="/avatar/male-1675938028.png" alt="female" class="img-fluid rounded-circle bg-light" width="70">
   @else
   <img src="/avatar/female-1675938966.png" alt="female" class="img-fluid rounded-circle bg-light" width="70">
   @endif
</div>
<div class="biodata-title text-center">
<h4>বায়োডাটা নাম</h4>
<p>{{$data->user_name}}</p>
</div>
</div>
<div class="biodata-body">
<label>বৈবাহিক অবস্থা</label>
<p>{{$data->marid_type}}</p>
<label>বর্তমান ঠিকানা </label>
<p>{{$data->present_address}}</p>
<label>জন্মসন (আসল) </label>
<p>{{$data->birth}}</p>
<label>পেশা</label>
<p>{{$data->profession}}</p>
</div>
<div class="biodata-footer align-items-middle align-self-middle text-center m-auto">
<a href="{{URL::to("/show_biodata/$data->user_table_id")}}" class="btn btn-primary">বায়োডাটা দেখুন</a>
<a onclick="add_favorite('{{$data->user_table_id}}');" class="btn btn-outline-primary btn-favorite"><i class="fa fa-heart-o"></i></a>
</div>
</div>
</div>
@endforeach
@else



   <div class="col-xl-12">
   <div class="alert alert-danger text-center" role="alert">
    বায়োডাটা ম্যাচ করে নাই 
   </div>
   </div>
 
   @endif
</div>
{{-- 
<div class="row algin-items-center algin-self-center justify-content-center">
<div class="col-xl-12 py-3 paged ">
<div class="pagination-area text-center">
<nav>
<ul class="pagination justify-content-center text-center">
<li class="page-item disabled" aria-disabled="true" aria-label="pagination.previous">
<span class="page-link" aria-hidden="true">Previous Page</span>
</li>
<li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
<li class="page-item"><a class="page-link" href="/biodata?page=2">2</a></li>
<li class="page-item"><a class="page-link" href="/biodata?page=3">3</a></li>
<li class="page-item"><a class="page-link" href="/biodata?page=4">4</a></li>
<li class="page-item"><a class="page-link" href="/biodata?page=5">5</a></li>
<li class="page-item"><a class="page-link" href="/biodata?page=6">6</a></li>
<li class="page-item"><a class="page-link" href="/biodata?page=7">7</a></li>
<li class="page-item"><a class="page-link" href="/biodata?page=8">8</a></li>
<li class="page-item"><a class="page-link" href="/biodata?page=9">9</a></li>
<li class="page-item"><a class="page-link" href="/biodata?page=10">10</a></li>
<li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
<li class="page-item"><a class="page-link" href="/biodata?page=24">24</a></li>
<li class="page-item"><a class="page-link" href="/biodata?page=25">25</a></li>
<li class="page-item">
<a class="page-link" href="25" rel="next" aria-label="pagination.next">Next Page</a>
</li>
</ul>
</nav>
</div>
</div>
</div> --}}
</div>
</section>

@endsection
@section("Js_link")
<script>

   // each #age_range Ion Range Slider init
   $(document).ready(function(){
       $("#age_range").each(function(){
           $(this).ionRangeSlider();
       });
   });

   // nice select init for all select
	var selectElements = document.querySelectorAll("select");
	var options = {searchable: false};

	selectElements.forEach(function(selectElement) {
		var placeholder = selectElement.getAttribute("data-placeholder");
		options.placeholder = placeholder;
		NiceSelect.bind(selectElement, options);
	});

   //  Onclick #card-header change icon
   $(document).ready(function(){
       $('.card-header h4 a').click(function(){
           $(this).find('i').toggleClass('fa-angle-up fa-angle-down');
       });
   });
   
   // Sorting .sorting change send request via ajax with csrf
   $(document).ready(function(){
      $('#Sorting_biodata select').on('change', function(){
         $('.pre-loader-request').html('<div class="PreLoader"></div>');
         // submit form
         $('#Sorting_biodata').submit();
      });
   });

   // onsubmit searchByNumber form send request via ajax with csrf
   $(document).ready(function(){
      $('.searchByNumber').submit(function(){
         $('.pre-loader-request').html('<div class="PreLoader"></div>');
      });
   });

   // When press button reset form return redirect to biodata.index
   $(document).ready(function(){
      $('button[type="reset"]').click(function(){
         $('.pre-loader-request').html('<div class="PreLoader"></div>');
         window.location.href = "/biodata";
      });
      // biodata_sideFilter
      $('.filter__btn, .filterBtn').click(function(){
         $('.biodata_sideFilter').slideToggle();
      });
   });

   
   
   
</script>
@endsection