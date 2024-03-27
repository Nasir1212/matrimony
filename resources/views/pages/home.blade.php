@extends("master.layout")
@section("content")
{{-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
<style>
    @media (max-width:375px) {
        .hading_h1 {
    font-size: 2rem;
}
    }
</style>
@php
    $is_enable = App\Models\PopUpModel::first()->disable_enable;
@endphp
@if (  $is_enable == 'anable')
@component("component.popup")  @endcomponent  
@endif


<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 m-auto col-md-8 col-sm-12">
                <div class="hero-content text-center wow fadeInUp animated" data-wow-delay="0.1s">
                    <h1 class="hading_h1" style="font-family: 'solaimanlipi';" > <b >ইসলামিক</b> <span>&nbsp;</span> <span > <b style="color: #eb2300 "> বিয়ে শাদি</b> </span> </h1>

                    <div class="hero-title" >
                        <h2 style="font-family: 'Tiro Bangla', serif;"> <span>তোমাদের মধ্যে যারা বিবাহহীন, তাদের বিয়ে সম্পাদন করে দাও।তারা যদি নিঃস্ব হয়, আল্লাহ নিজ অনুগ্রহে তাদের সচ্ছল করে দেবেন।</span></h2>
                    </div>
                    <p class="">আল-কুরআন | সূরা আননূর, আয়াত : ৩২</p>
                    <div class="btn-group-hero">
                        <a class="btn btn-primary" href="/dashboardedit"><i class="fa  fa-user-friends"></i> বিনামূল্যে বায়োডাটা সাবমিট করুন</a>
                        <button class="btn btn-primary "  data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-brands fa-youtube"></i> যেভাবে সাইটটি ব্যবহার করবেন</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="recent-registe-section wow fadeInUp animated" data-wow-delay="0.2s">
    <div class="container">
        <div class="row justify-content-center align-items-center align-self-middle">
            <div class="col-xs-12 col-sm-12 col-md-3 col-xl-3">
                <div class="recent-title text-center">
                    <h4>সর্বশেষ নিবন্ধিত বায়োডাটা</h4>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <div class="recent-item">
                    <ul>
                        
                        @foreach ( App\Http\Controllers\home_controller::latest_biodata() as $biodata )
                        <li>
                            <a href="/show_biodata/{{$biodata->user_table_id}}" target="_blank">
                                <div class="recent-item-register justify-content-center align-items-center align-self-middle d-inline-block">
                                    <div class="recent-register-img d-inline-block f-left">
                                        {{-- <img src="/avatar/female-1675938966.png" alt="female" class="img-fluid rounded-circle bg-light" width="70"> --}}
                                        @if($biodata->biodata_type=="1")
                                        <img src="/avatar/male-1675938028.png" alt="female" class="img-fluid rounded-circle bg-light" width="70">
                                        @else
                                        <img src="/avatar/female-1675938966.png" alt="female" class="img-fluid rounded-circle bg-light" width="70">
                                        @endif
                                    </div>
                                    <div class="recent-reigster-item d-inline-block text-center">
                                        <h4>বায়োডাটা নাম</h4>
                                        <p class="m-0"> {{$biodata->user_name}}</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="filter-section py-5 wow fadeInUp animated" data-wow-delay="0.3s">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="data-filter">
                    <form class="col-12" action="/biodata" method="GET">
                        <input type="hidden" name="type" value="filter_box" hidden>
                        <div class="form-row mb-2">
                            <label class="col-xl-3 col-form-label col-md-4" for="আমি খুঁজছি">আমি খুঁজছি</label>
                            <select class="form-control col-xl-9 form-control-sm col-md-8 biodata_type" name="biodata_type" data-placeholder="আমি খুঁজছি" required="required">
                            <option value="2">পাত্রীর বায়োডাটা</option>
                            <option value="1" selected="&quot;selected&quot;">পাত্রের বায়োডাটা</option>
                            </select>
                        </div>
                        <div class="form-row mb-2">
                            <label class="col-xl-3 col-form-label col-md-4" for="married">বৈবাহিক অবস্থা</label>
                            <select class="form-control col-xl-9 form-control-sm col-md-8 marital_status" name="marital_status" data-placeholder="বৈবাহিক অবস্থা">
<option value>সকল</option>
<option value="অবিবাহিত" selected="&quot;selected&quot;">অবিবাহিত</option>
<option value="বিবাহিত">বিবাহিত</option>
<option value="ডিভোর্সড">ডিভোর্সড</option>
<option value="বিধবা">বিধবা</option>
<option value="বিপত্নীক">বিপত্নীক</option>
</select>
                        </div>
                        <div class="form-row mb-2">
                            <label class="col-xl-3 col-form-label col-md-4" for="age">বয়স</label>
                            <select class="form-control col-xl-4 form-control-sm col-md-8 min_age" name="minimumages" data-placeholder="বয়স">
                                @for ($x = 18; $x <= 75; $x++)
                                <option value="{{$x}}"  @if($x==18) selected="&quot;selected&quot;" @endif>{{$x}}</option>  
                                @endfor
</select>
<label class="col-xl-1 col-form-label col-md-4 text-center" for="age">-</label>
<select class="form-control col-xl-4 form-control-sm col-md-8 max_age" name="maximumages" data-placeholder="বয়স">

    @for ($x = 18; $x <= 75; $x++)
    <option value="{{$x}}" @if($x==22) selected="&quot;selected&quot;" @endif>{{$x}}</option>  
    @endfor
</select>
                        </div>
                        <div class="form-row mb-2">
                            <label class="col-xl-3 col-form-label col-md-4" for="district">জেলা</label>
                            <select class="form-control col-xl-9 form-control-sm col-md-8 district" name="district" data-placeholder="জেলা">
<option value selected="selected">সকল</option>
@foreach( App\Models\districts::get() as $district ) 
<option value="{{$district->id}}" >{{$district->bn_name}}</option>
@endforeach
</select>
                        </div>
                        <div class="form-row mb-2">
                            <div class="submit-form col-sm-12 text-right  p-0">
                                <a href="/biodata?type=all" class="btn btn-info">সকল বায়োডাটা দেখুন</a>
                                <button type="submit"> <i class="fa fa-search"></i> বায়োডাটা খুঁজুন</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="achivement-content">
                    <h3 class="mb-4"> অর্ধাঙ্গিনী ডাটাবেজ</h3>
                    <div class="row">
                        <div class="col-xl-6 mb-3 pr-0 col-md-6">
                            <div class="card text-center card-bg-1">
                                <div class="card-body">
                                    <h5 class="card-title">231+</h5>
                                    <p class="card-text">মোট দ্বীনদার পাত্র-পাত্রীর বায়োডাটা.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 mb-3 pr-0 col-md-6">
                            <div class="card text-center card-bg-2">
                                <div class="card-body">
                                    <h5 class="card-title">180+</h5>
                                    <p class="card-text">মোট পাত্রীর বায়োডাটা</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 mb-3 pr-0 col-md-6">
                            <div class="card text-center card-bg-3">
                                <div class="card-body">
                                    <h5 class="card-title">51+</h5>
                                    <p class="card-text">মোট পাত্রের বায়োডাটা.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 mb-3 pr-0 col-md-6">
                            <div class="card text-center card-bg-4">
                                <div class="card-body">
                                    <h5 class="card-title">19+</h5>
                                    <p class="card-text">সর্বমোট সফল বিবাহ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="featured-biodata">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-md-12 wow fadeInUp animated" data-wow-delay="0.1s">
                <div class="section-title">
                    <h2>ফিচারড সিভি</h2>
                </div>
            </div>


@foreach ( App\Http\Controllers\home_controller::show_random_biodata() as $biodata )
    

            <div class="col-xl-4 col-md-6 wow fadeInUp animated" data-wow-delay="0.2s">
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
                            <h4>বায়োডাটা নাম</h4>
                            <p>{{$biodata->user_name}}</p>
                        </div>
                    </div>
                    <div class="biodata-body">
                        <label>বৈবাহিক অবস্থা</label>
                        
                        <p>{{$biodata->marid_type}}</p>
                        <label>বর্তমান ঠিকানা </label>
                        <p>{{$biodata->present_address}}</p>
                        <label>জন্মসন (আসল) </label>
                        <p>{{$biodata->birth}}</p>
                        <label>পেশা</label>
                        <p>{{$biodata->profession}}</p>
                    </div>
                    <div class="biodata-footer align-items-middle align-self-middle text-center m-auto">
                        <a href="/show_biodata/{{$biodata->user_table_id}}" class="btn btn-primary">বায়োডাটা দেখুন</a>
                        <a onclick="add_favorite('{{$biodata->user_table_id}}');" class="btn btn-outline-primary btn-favorite"><i class="fa fa-heart-o"></i></a>
                    </div>
                </div>
            </div>
@endforeach
           
        </div>
    </div>
</section >
<style>
.how_to_work_section_card {
    background: linear-gradient(1deg,  #fff3e6, white);
    height:100%;
    border-radius: 0.7rem;
    box-shadow: 1px 4px 15px -7px #7700ef;
}
.how_to_work_section_card:hover{
color: white
}

@media(max-width:320px) {
    .review_card {
       
        height: 23rem !important;
        width: 15rem !important;
    }
}
</style>
<section class=" wow fadeInUp animated">
    <div class="container mb-3">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="tiro_bangla"> <b> <span>অর্ধাঙ্গিনী</span> যেভাবে কাজ করে </b></h3>
              
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                        <div class="how_to_work_section_card">
                            <br>
                            <div  class="mb-3">
                               
                                <img src="/frontend/img/create_biography.svg" alt="">
                            </div>
                            <h3 class="tiro_bangla">বায়োডাটা তৈরি করুন</h3>
                            <p class="p-3 text-justify">খুব সহজেই বিনামূল্যে অর্ধাঙ্গিনী বায়োডাটা তৈরি করতে পারবেন।</p>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12  mb-3">
                        <div  class="how_to_work_section_card">
                            <br>
                            <div  class="mb-3">
                               
                                <img src="/frontend/img/search_biography.svg" alt="">
                            </div>
                            <h3 class="tiro_bangla">বায়োডাটা খুঁজুন</h3>
                            <p  class="p-3 text-justify">বয়স, উপজেলা, পেশা, শিক্ষাগত যোগ্যতা সহ অনেক ফিল্টার ব্যবহার করে সহজেই বায়োডাটা খুঁজতে পারবেন।</p>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12  mb-3">
                        <div  class="how_to_work_section_card">
                            <br>
                            <div  class="mb-3">
                               
                                <img src="/frontend/img/cotact_gurdians.svg" alt="">
                            </div>
                            <h3 class="tiro_bangla">বায়োডাটা তৈরি করুন</h3>
                            <p  class="p-3 text-justify">আপনার বায়োডাটা কেউ পছন্দ করলে অথবা আপনি কারো বায়োডাটা পছন্দ করলে সরাসরি অভিভাবকের সাথে যোগাযোগ করতে পারবেন।</p>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12  mb-3">
                        <div  class="how_to_work_section_card">
                            <br>
                            <div class="mb-3">
                               
                                <img src="/frontend/img/get_complated.svg" alt="">
                            </div>
                            <h3 class="tiro_bangla"> বিবাহ সম্পন্ন করুন </h3>
                            <p  class="p-3 text-justify">বায়োডাটা ও কথাবার্তা পছন্দ হলে নিজ দায়িত্বে ভালভাবে খোঁজ নিয়ে সুন্নতি বিবাহ সম্পন্ন করুন।</p>
                        </div>

                    </div>
                </div>
               
            </div>
        </div>
        <hr>
    </div>

</section>

<style>
    .review_card {
    box-shadow: 0px 0px 6px -2px rebeccapurple;
    padding: 4px 8px;
    margin-top: 2rem;
    border-radius: 4px;
    height: 21rem;
    width: 17rem;
}
</style>
<section class=" wow fadeInUp animated">
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
           <div class="col-10">
          
            <h2 class="text-center tiro_bangla" >ইউজার রিভিউ</h2>
            <br>
            <div class="row">
                <div class="col-sm-12 col-lg-4 col-md-6">
                    <div class="review_card">
                        <div>
                            <img style="width: 4rem;height:4rem;border-radius: 50%" src="/frontend/img/brand_1.jpeg" alt="">
                        </div>
                        <br>
                        <div>
                            <p >বিবাহের জন্য পছন্দ করা  দুইজন এর মাঝে বন্ডিংটা খুবা জরুরি | একে অপরকে জানাটা খুব জরুরি | ধন্যবাদ, অর্ধাঙ্গিনী. কম কে আমাকে বিবাহের আগে পাএীকে নিজের মত করে জানার সুযোগ করে দেওয়ার জন্য</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-4 col-md-6">
                    <div class="review_card">
                        <div>
                            <img style="width: 4rem;height:4rem;border-radius: 50%" src="/frontend/img/brand_2.jpeg" alt="">
                        </div>
                        <br>
                        <div>
                            <p  class="p-3">বর্তমান সময়ে এমন প্ল্যাটফর্ম থাকায় বিয়ের জনা নিজের পছন্দ মত পাএ-পাএী পছন্দ করা তার সম্পর্কে জানা খুব সহজ হয়ে গেছে | খুব সুন্দর সিস্টেম  আপানাদের এমন ইসলামিক বিবাহ ব্যাবস্থাকে স্বাগতম জানাই, এগিয়ে যান।আমার অনেক ভালো লেগেছে। তারপরেও সবাই বিনামুল্যে বায়োডাটা সাবমিট করা যায়। এটা খুবি সুন্দর।</p>
                        </div>
                    
                     </div>
                </div>

                <div class="col-sm-12 col-lg-4 col-md-6">
                    <div class="review_card">
                    <div>
                        <img style="width: 4rem;height:4rem;border-radius: 50%" src="/frontend/img/brand_3.jpeg" alt="">
                    </div>
                    <br>
                    <div>
                        <p>ভালো নিজের মনের মত জীবন সঙ্গিনী বাছাই করার সুযোগ করে দেওয়ার জন্য ধন্যবাদ অর্ধাঙ্গিনী.কম'কে  | অনেক সুন্দর সিস্টেম। সবাই এখানে দেখতে পারেন। নিজের পোঁছন্দের পাত্র পাত্রীর জোস একটা প্লাটফর্ম। অনেক অনেক শুভ কামনা আপনাদের জন্য। এগিয়ে যান।</p>
                    </div>
                </div>

                </div>
            </div>
           </div>
           <div class="col-1"></div>
        </div>
        <hr>
    </div>

</section>

<section class="about-section wow fadeInUp animated" data-wow-delay="0.1s">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="about-section-content text-center">
                    <h3 style="font-family: 'Tiro Bangla', serif;">বিয়ে সংক্রান্ত কুরআন ও হাদীসের বানীঃ</h3>
                   <p>মহান রাব্বুল আলামিন কোরআনুল কারিমে ইরশাদ করেন, ‘আর এক নিদর্শন এই যে, তিনি তোমাদের জন্যে তোমাদের মধ্য থেকে তোমাদের সঙ্গিনীদের সৃষ্টি করেছেন, যাতে তোমরা তাদের কাছে শান্তিতে থাক এবং তিনি তোমাদের মধ্যে পারস্পরিক সম্প্রীতি ও দয়া সৃষ্টি করেছেন।’ (সুরা রুম, আয়াত : ২১)</p>
                   <p>রাসুল (সা.)  বলেন, ‘যখন বান্দা বিয়ে করে, তখন সে তার দ্বীনের অর্ধেক পূরণ করে। অতএব, বাকি অর্ধেকাংশে সে যেন আল্লাহকে ভয় করে।’ (জামিউস সাগির হাদিস : ৬১৪৮; তাবরানি, হাদিস : ৯৭২; মুসতাদরাক হাকিম, হাদিস : ২৭২৮)</p>
                    <p>আল্লাহর রাসুল (সা.) বলেছেন, ‘তিন প্রকারের মানুষকে সাহায্য করা— আল্লাহ তাআলা নিজের কর্তব্য হিসেবে নির্ধারণ করেছেন। এক. আল্লাহ তাআলার পথে জিহাদকারী। দুই. মুকাতাব গোলাম- যে চুক্তির অর্থ পরিশোধের ইচ্ছা করে। তিন. বিয়ে আগ্রহী— যে পবিত্র জীবন যাপন করতে চায়। (ইবনে মাজাহ, হাদিস : ২৫১৮)</p>
                    <p>তোমাদের মধ্যে যারা বিবাহহীন, তাদের বিয়ে সম্পাদন করে দাও এবং তোমাদের দাস ও দাসীদের মধ্যে যারা সৎকর্মপরায়ন, তাদেরও। তারা যদি নিঃস্ব হয়, তবে আল্লাহ নিজ অনুগ্রহে তাদের সচ্ছল করে দেবেন। আল্লাহ প্রাচুর্যময়, সর্বজ্ঞ। যারা বিয়েতে সামর্থ্য নয়, তারা যেন সংযম অবলম্বন করে— যে পর্যন্ত না আল্লাহ নিজ অনুগ্রহে তাদের অভাবমুক্ত করে দেন। (সুরা নুর, আয়াত : ৩২-৩৩)</p>
             
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-header modal-video">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span class="text-white" aria-hidden="true">&times;</span>
</button>
            </div>
            <div class="modal-body p-0">
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/2ggn1d8NUTs?si=FefNW2lU6PaAhDDN" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js#xfbml=1&version=v6.0&autoLogAppEvents=1'
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<div class="fb-customerchat" attribution="setup_tool" page_id="104282912022862">
</div>

@endsection

@section("Js_link")

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