<?php $auth =  App\Models\Register::where(['mail'=>session()->get('email')])->get()[0] ?>

    <div class="biodata-card m-0 profile-card">
    <div class="biodata-header d-flex justify-content-around align-items-middle align-self-middle">
    <div class="biodata-img">
        @if($auth->gender =="male")
        <img src="/avatar/male-1675938028.png" alt="male" class="img-fluid rounded-circle bg-light" width="70">
        @else
        <img src="/avatar/female-1675938966.png" alt="female" class="img-fluid rounded-circle bg-light" width="70">
        @endif
    </div>
    <div class="biodata-title text-center">
    <h4>বায়োডাটা নাম</h4>
    <p>{{ $auth->name}}</p>
    </div>
    </div>
    <div class="biodata-body">
    </div>
    <hr style="opacity: 0.3; margin: 20px 0px;">
    <button type="button" class="btn btn-primary copy_url d-none"><i class="fa fa-clone" aria-hidden="true"></i> বায়োডাটার লিংক কপি করুন</button>
    </div>
    <div class="visit-bio py-3 rounded">
    <a href="/show_biodata/{{ $auth->id}}" target="_blank" class="btn btn-primary btn-block btn-sm">বায়োডাটা দেখুন</a>
    </div>
