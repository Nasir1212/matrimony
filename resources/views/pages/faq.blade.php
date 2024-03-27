@extends("master.layout")
@section("content")

<style>
    .card-header, .card-link,.card-link:hover{
      background-color:#eee;
      text-align:left;
      color:#000;
    }
   .card-body{
    padding:10px 10px;
    background: #fff;
   }

   @keyframes minus {
    from {
      transform:rotate(0deg);
    }
    to {
      transform:rotate(360deg);
    }
   }
   [aria-expanded="false"] > .expanded, [aria-expanded="true"] > .collapsed {display: none;}
   .according {
    padding-bottom: 50px;
    animation: minus 1s infinite;
   }
</style>

<section class="breadcrumbs">
    <div class="container">
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
    <h2>প্রশ্ন ও উত্তর</h2>
    </div>
    </div>
    </div>
    </section>
    <section class="f__a__q_section py-md-5 py-sm-2">
    <div class="container">
    <div class="row pb-40">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div id="according">
    <div class="card">
    <div class="card-header">
    <a class="card-link" data-toggle="collapse" href="#ahlia-matrimony-te-bayodata-toiri-krte-kemn-khrc-hbe" aria-expanded="false" aria-controls="ahlia-matrimony-te-bayodata-toiri-krte-kemn-khrc-hbe">
      Ordhangini Matrimony তে বায়োডাটা তৈরি করতে কেমন খরচ হবে?
    <span class="collapsed">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-down"></i></strong> </p>
    </span>
    <span class="expanded">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-up"></i></strong> </p>
    </span>
    </a>
    </div>
    <div id="ahlia-matrimony-te-bayodata-toiri-krte-kemn-khrc-hbe" class="collapse show">
    <div class="card-body">Ordhangini Matrimony বায়োডাটা তৈরি করার জন্য কোন চার্জ নেয় না।</div>
    </div>
    </div>
    <div class="card">
    <div class="card-header">
    <a class="card-link" data-toggle="collapse" href="#ami-ki-ekhane-bayodata-toiri-krte-parb" aria-expanded="false" aria-controls="ami-ki-ekhane-bayodata-toiri-krte-parb">
    আমি কি এখানে বায়োডাটা তৈরি করতে পারব?
    <span class="collapsed">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-down"></i></strong> </p>
    </span>
    <span class="expanded">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-up"></i></strong> </p>
    </span>
    </a>
    </div>
    <div id="ami-ki-ekhane-bayodata-toiri-krte-parb" class="collapse ">
    <div class="card-body">আপনি যদি একজন দ্বীনদার ভাই বা বোন হয়ে থাকেন তাহলে আপনি এখানে বায়োডাটা তৈরি করতে পারবেন। দ্বীনদার অর্থাৎ ৫ ওয়াক্ত নামাযী। ভাইদের জন্য সুন্নাতি দাড়ি, টাখনুর উপরে কাপড় পড়া এবং হারাম ইনকামের সাথে জড়িত না থাকা। বোনদের জন্য নিকাবসহ পর্দা করা।</div>
    </div>
    </div>
    <div class="card">
    <div class="card-header">
    <a class="card-link" data-toggle="collapse" href="#kon-bayodata-pchnd-hle-ki-krte-hbe" aria-expanded="false" aria-controls="kon-bayodata-pchnd-hle-ki-krte-hbe">
    কোন বায়োডাটা পছন্দ হলে কি করতে হবে?
    <span class="collapsed">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-down"></i></strong> </p>
    </span>
    <span class="expanded">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-up"></i></strong> </p>
    </span>
    </a>
    </div>
    <div id="kon-bayodata-pchnd-hle-ki-krte-hbe" class="collapse ">
    <div class="card-body">আপনার যদি কোন বায়োডাটা পছন্দ হয় তাহলে আপনি যোগাযোগ বাটনে ক্লিক করবেন। এরপর পেমেন্ট করে অভিভাবকের নাম্বারের জন্য রিকুয়েস্ট করবেন। সাধারনত ২৪ ঘন্টার মধ্যে আমরা ইনফো দেয়ার চেষ্টা করি। তবে অনেক সময় পাত্র/পাত্রীকে মেইল করে বা কল করেও তাদের সাথে যোগাযোগ করা সম্ভব হয় না। তখন আমরা ১ সপ্তাহ পর্যন্ত সময় নিয়ে থাকি।</div>
    </div>
    </div>
    <div class="card">
    <div class="card-header">
    <a class="card-link" data-toggle="collapse" href="#amar-ekhno-kon-inkam-nei-tbe-amar-basay-amar-biyete-raji-ami-bayodata-toiri-krte-parb" aria-expanded="false" aria-controls="amar-ekhno-kon-inkam-nei-tbe-amar-basay-amar-biyete-raji-ami-bayodata-toiri-krte-parb">
    আমার এখনো কোন ইনকাম নেই। তবে আমার বাসায় আমার বিয়েতে রাজি। আমি বায়োডাটা তৈরি করতে পারব?
    <span class="collapsed">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-down"></i></strong> </p>
    </span>
    <span class="expanded">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-up"></i></strong> </p>
    </span>
    </a>
    </div>
    <div id="amar-ekhno-kon-inkam-nei-tbe-amar-basay-amar-biyete-raji-ami-bayodata-toiri-krte-parb" class="collapse ">
    <div class="card-body">জ্বি ইন শা আল্লাহ্‌। আপনি বায়োডাটা তৈরি করে ফেলুন।</div>
    </div>
    </div>
    <div class="card">
    <div class="card-header">
    <a class="card-link" data-toggle="collapse" href="#bayodata-dilet-krbo-kivabe" aria-expanded="false" aria-controls="bayodata-dilet-krbo-kivabe">
    বায়োডাটা ডিলেট করবো কিভাবে
    <span class="collapsed">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-down"></i></strong> </p>
    </span>
    <span class="expanded">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-up"></i></strong> </p>
    </span>
    </a>
    </div>
    <div id="bayodata-dilet-krbo-kivabe" class="collapse ">
    <div class="card-body">উপরে ডান দিক থেকে "আমার বায়োডাটা"> সেটিংস> একাউন্ট ডিলিট>হাইড/তথ্য ডিলিট
    হাইড করলে পরবর্তীতে চাইলে আবার বায়ো পাবলিকলি শো করতে পারবেন। ডিলিট হলে এটা পারমানেন্টভাবে ডিলিট হয়ে যাবে।</div>
    </div>
    </div>
    <div class="card">
    <div class="card-header">
    <a class="card-link" data-toggle="collapse" href="#kon-bayodatay-keu-mithza-tthz-diyeche-kina-kivabe-bujhbo" aria-expanded="false" aria-controls="kon-bayodatay-keu-mithza-tthz-diyeche-kina-kivabe-bujhbo">
    কোন বায়োডাটায় কেউ মিথ্যা তথ্য দিয়েছে কিনা কিভাবে বুঝবো?
    <span class="collapsed">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-down"></i></strong> </p>
    </span>
    <span class="expanded">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-up"></i></strong> </p>
    </span>
    </a>
    </div>
    <div id="kon-bayodatay-keu-mithza-tthz-diyeche-kina-kivabe-bujhbo" class="collapse ">
    <div class="card-body">আমরা আসলে আশা করি সবাই আল্লাহ্‌কে ভয় করে সত্য তথ্যটাই দিবে। সব মিথ্যা আসলে বুঝা সম্ভব নয়। তবে যথাসম্ভব খোঁজখবর নিতে হবে।</div>
    </div>
    </div>
    <div class="card">
    <div class="card-header">
    <a class="card-link" data-toggle="collapse" href="#amar-basay-ekhni-amake-biye-dite-cacche-na-biye-dite-caileoo-dween-smprke-bekhbr-emn-kauke-biye-krate-caiche-ami-ki-apnader-ekhane-bayodata-dite-parb" aria-expanded="false" aria-controls="amar-basay-ekhni-amake-biye-dite-cacche-na-biye-dite-caileoo-dween-smprke-bekhbr-emn-kauke-biye-krate-caiche-ami-ki-apnader-ekhane-bayodata-dite-parb">
    আমার বাসায় এখনি আমাকে বিয়ে দিতে চাচ্ছে না। বিয়ে দিতে চাইলেও দ্বীন সম্পর্কে বেখবর এমন কাউকে বিয়ে করাতে চাইছে। আমি কি আপনাদের এখানে বায়োডাটা দিতে পারব?
    <span class="collapsed">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-down"></i></strong> </p>
    </span>
    <span class="expanded">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-up"></i></strong> </p>
    </span>
    </a>
    </div>
    <div id="amar-basay-ekhni-amake-biye-dite-cacche-na-biye-dite-caileoo-dween-smprke-bekhbr-emn-kauke-biye-krate-caiche-ami-ki-apnader-ekhane-bayodata-dite-parb" class="collapse ">
    <div class="card-body">আমাদের একটা শর্ত হচ্ছে যোগাযোগের জন্য অভিভাবকের নাম্বার দিতে হবে। যেহেতু আপনার বাসা থেকে আপনি সাপোর্ট পাচ্ছেন না সেহেতু আপনার বাসায় কল করলে সমস্যার সৃষ্টি হতে পারে। তাই আপনি বায়োডাটা তৈরি করতে পারবেন না। বরং আপনি আমাদের এখানের বায়ো ডাটা পছন্দ হলে তাদের সাথে কথা বলে নিতে পারেন।</div>
    </div>
    </div>
    <div class="card">
    <div class="card-header">
    <a class="card-link" data-toggle="collapse" href="#apnader-ekhan-theke-biye-krar-pr-zdi-prtarnar-sikar-hi-ba-kon-smszar-smmukheen-hi-tahle-apnara-amake-help-krte-parben-ki" aria-expanded="false" aria-controls="apnader-ekhan-theke-biye-krar-pr-zdi-prtarnar-sikar-hi-ba-kon-smszar-smmukheen-hi-tahle-apnara-amake-help-krte-parben-ki">
    আপনাদের এখান থেকে বিয়ে করার পর যদি প্রতারণার শিকার হই বা কোন সমস্যার সম্মুখীন হই তাহলে আপনারা আমাকে হেল্প করতে পারবেন কি?
    <span class="collapsed">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-down"></i></strong> </p>
    </span>
    <span class="expanded">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-up"></i></strong> </p>
    </span>
    </a>
    </div>
    <div id="apnader-ekhan-theke-biye-krar-pr-zdi-prtarnar-sikar-hi-ba-kon-smszar-smmukheen-hi-tahle-apnara-amake-help-krte-parben-ki" class="collapse ">
    <div class="card-body">আমরা এখানে শুধুমাত্র পাত্র পাত্রীর অভিভাবকের মধ্যে যোগাযোগ করিয়ে দিচ্ছি। বাদবাকি খোঁজ খবর নেয়ার দায়িত্ব সম্পূর্ণ আপনার। হাজারখানেক মানুষের চারিত্রিক সার্টিফিকেট আমরা দিচ্ছি না। এখান থেকে বিয়ে করে কোন সমস্যার সম্মুখীন হলে তার জন্য Ahlia Matrimony বা এর সাথে সম্পৃক্ত কেউ কোনভাবেই এর দায়ভার নিবে না।</div>
    </div>
    </div>
    <div class="card">
    <div class="card-header">
    <a class="card-link" data-toggle="collapse" href="#ficard-bayodata-ki" aria-expanded="false" aria-controls="ficard-bayodata-ki">
    ফিচার্ড বায়োডাটা কি?
    <span class="collapsed">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-down"></i></strong> </p>
    </span>
    <span class="expanded">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-up"></i></strong> </p>
    </span>
    </a>
    </div>
    <div id="ficard-bayodata-ki" class="collapse ">
    <div class="card-body">ফিচার্ড বায়োডাটা হচ্ছে আমাদের বায়োডাটা ব্যাংক থেকে বিশেষভাবে ফিচার করা বায়োডাটা যেগুলো আমরা হোমপেজে ফিচার করে থাকি। একটা ফিচার বায়োডাটা সাধারন বায়োডাটার চেয়ে কয়েকগুন বেশী ভিউ হয়।</div>
    </div>
    </div>
    <div class="card">
    <div class="card-header">
    <a class="card-link" data-toggle="collapse" href="#amar-bayodata-ficar-krte-cai-ki-krte-hbe" aria-expanded="false" aria-controls="amar-bayodata-ficar-krte-cai-ki-krte-hbe">
    আমার বায়োডাটা ফিচার করতে চাই। কি করতে হবে?
    <span class="collapsed">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-down"></i></strong> </p>
    </span>
    <span class="expanded">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-up"></i></strong> </p>
    </span>
    </a>
    </div>
    <div id="amar-bayodata-ficar-krte-cai-ki-krte-hbe" class="collapse ">
    <div class="card-body">ফিচার করতে চাইলে বায়োডাটা অবশ্যই পাবলিশ থাকতে হবে। পাবলিশ থাকা অবস্থায় আবার পাবলিশ করতে গেলেই ফিচারের অপশন পাওয়া যাবে। ওয়েব ফিচারে ১০০ টাকায় ৩ দিন ফিচার করা হয়। ফেসবুক ফিচারে ১৫০ টাকায় ফেসবুক পোস্ট করা হয়। ফেসবুক ও ওয়েব ফিচার একত্রে করতে চাইলে ২০০ টাকা পেমেন্ট করতে হয়। সিরিয়াল মোতাবেক ফেসবুক ও ওয়েব সাইটে ফিচার করা হয়।</div>
    </div>
    </div>
    <div class="card">
    <div class="card-header">
    <a class="card-link" data-toggle="collapse" href="#amar-bayodata-epruv-hcche-na-bar-bar-rijekt-hcche-bla-hcche-sb-fild-filap-krte-ami-to-sb-fild-filap-krechi-tahle-smsza-kothay" aria-expanded="false" aria-controls="amar-bayodata-epruv-hcche-na-bar-bar-rijekt-hcche-bla-hcche-sb-fild-filap-krte-ami-to-sb-fild-filap-krechi-tahle-smsza-kothay">
    আমার বায়োডাটা এপ্রুভ হচ্ছে না। বার বার রিজেক্ট হচ্ছে। বলা হচ্ছে সব ফিল্ড ফিলাপ করতে। আমি তো সব ফিল্ড ফিলাপ করেছি। তাহলে সমস্যা কোথায়?
    <span class="collapsed">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-down"></i></strong> </p>
    </span>
    <span class="expanded">
    <p class="m-0 f-right"> <strong><i class="fa fa-angle-up"></i></strong> </p>
    </span>
    </a>
    </div>
    <div id="amar-bayodata-epruv-hcche-na-bar-bar-rijekt-hcche-bla-hcche-sb-fild-filap-krte-ami-to-sb-fild-filap-krechi-tahle-smsza-kothay" class="collapse ">
    <div class="card-body">প্রথমেই বায়োডাটা রিজেক্ট হওয়ার কারনগুলো আরেকবার মনোযোগ দিয়ে পড়বেন। আর আপনি সব ফিল্ড ফিলাপ করছেন এরপরও বায়ো রিজেক্ট হচ্ছে কিন্তু মেইলে বলা হচ্ছে সব ফিল্ড ফিলাপ করেন নি। আপনি মেহেরবানি করে আবার ভালভাবে চেক করবেন। যারাই এই কমপ্লেইন করে তাদেরই আসলে ১ টা হলেও ফিল্ড ফিলাপ করা বাকি থাকে। ১ টা ফিল্ড ও বাদ দিবেন না যা দেখতে পাচ্ছেন।</div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>

    @endsection
    