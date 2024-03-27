<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="বাংলাদেশী উপযুক্ত পাত্র/পাত্রী খুজার শ্রেষ্ঠ ইসলামিক মাধ্যম">
    <meta name="matrimony" content="https://ordhangini.com দেশজুড়ে উপযুক্ত পাত্র/পাত্রী খুজার শ্রেষ্ঠ ইসলামিক মাধ্যম">  
    
    
    <meta name="keywords" content="@yield('Ordhangini, অর্ধাঙ্গিনী ডট কম, পাত্রের বায়োডাটা, মহিলা মাদরাসার পাত্রী, deen matrimony, ইসলামিক বিয়ের ওয়েবসাইট, দ্বীনি পাত্র পাত্রী, হুজুর পাত্র চাই, অর্ধেকদীন,  আহলিয়া ম্যাট্রিমনি, Ahlia Matrimony,  বিয়ের বায়োডাটা, ইসলামিক ম্যাট্রিমনি')">
    @if(explode('/', Request::path())[0] =='blog_details')
    @php
           $blog =    App\Models\BlogModel::where(['id'=>explode('/', Request::path())[1]])->first();
    @endphp
    <meta name="{{$blog->keywords}}" content="{{$blog->meta_discription}}">
    @endif
  
    
    <meta name="google-site-verification" content="wImMyp83XFHfpLP246Roab498sDoD__sUL3ZiousSss" />
    <link rel="shortcut icon" href="{{asset('logo/1668426970.png')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/default.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/sweetalert2/sweetalert2.min.css')}}" >
    <link rel="stylesheet" href="{{asset('frontend/css/nice-select2.css')}}">
    <title>অর্ধাঙ্গিনী.কম | ইসলামিক ম্যাট্রিমনি  </title>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Bangla&display=swap" rel="stylesheet">
    <style>
        /* *{
            font-family: 'Tiro Bangla', serif;
        } */
h1, h2, h3, h4, h5, h6 {
    font-family: 'Tiro Bangla', serif;
   
}
    </style>
    
    
    
   <!-- Google Tag Manager -->
<script>
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NHT6BNF2');
</script>
<!-- End Google Tag Manager -->


<meta name="google-adsense-account" content="ca-pub-8448500107628442">
    
    
</head>
<body class="container-fluid">
    @component("component.header")  @endcomponent
    @yield("content")
    @component("component.footer")  @endcomponent
    <script src="https://kit.fontawesome.com/fbadad80a0.js"></script>
    <script src="{{asset('frontend/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/js/one-page-nav-min.js')}}"></script>
    <script src="{{asset('frontend/js/slick.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.meanmenu.min.js')}}"></script>
    <script src="{{asset('frontend/js/ajax-form.js')}}"></script>
    <script src="{{asset('frontend/js/wow.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontend/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontend/js/plugins.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="{{asset('js/share.js')}}"></script>
    <script src="{{asset('assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

    <script src="/frontend/js/nice-select2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    
       @yield("Js_link")
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
        
        
        <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NHT6BNF2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

</body>
</html>