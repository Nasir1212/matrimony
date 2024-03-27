<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth_controller;
use App\Http\Controllers\home_controller;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\NoAuth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
});


Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/faq', function () {
    return view('pages.faq');
});

Route::get('/contact', function () {
    return view('pages.contact');
});


Route::get('/blog_details', function () {
    return view('pages.blog_pages.blog_details');
});

Route::get('/login', function () {
    return view('pages.login');
});

Route::get('/notification', function () {
    return view('pages.notification');
})->middleware('login');


Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware('login');;

Route::get('/ai-intelegent', function () {
    return view('pages.ai-intelegent');
})->middleware('login');;

Route::get('/dashboardedit', function () {
    return view('pages.dashboardedit');
})->middleware('login');;

Route::get('/favoritelist', function () {
    return view('pages.favoritelist');
})->middleware('login');;

Route::get('/userprofile', function () {
    return view('pages.userprofile');
})->middleware('login');;

Route::get('/signup', function () {
    return view('pages.signup');
});
Route::get('/privacy-policy', function () {
    return view('pages.privacy-policy');
});

Route::get('/terms-condition', function () {
    return view('pages.terms-condition');
});

Route::get('/search_biodata', function () {
    return view('pages.search_biodata');
});

Route::get('/reset_password', function () {
    return view('pages.reset_password');
});

Route::get('/change_password', function () {
    return view('pages.change_password');
});

Route::get('/faveritor_list', function () {
    return view('pages.faveritor_list');
});


// Route::get('/show_biodata/{id}', function () {
//     return view('pages.show_biodata');
// });


Route::controller(auth_controller::class)->group(function () {
    Route::post("/signup_user","signup_user");  
    Route::post("/user_login","user_login");  
    Route::post("/handle_change_password","handle_change_password");  
    Route::post("/send_otp","send_otp");  
    Route::post("/checking_otp","checking_otp");  
    Route::get("/test_sleep_mail","test_sleep_mail");  
   
            
});
Route::controller(NoAuth::class)->group(function () {
    Route::get("/save_favorite","save_favorite");  
    Route::get("/bkash_create/{id}","bkash_create");  
    Route::get("/login_google","login_google");  
    Route::get("/package_connection_buy","package_connection_buy");  
   

   
   
            
});
    
Route::controller(home_controller::class)->group(function () {
 Route::post("/add_or_edit_biodata","add_or_edit_biodata");            
 Route::get("/biodata","biodata");            
 Route::get("/show_biodata/{id}","show_biodata");            
 Route::get("/delete_favorite/{id}","delete_favorite");            
 Route::get("/profile_update","profile_update");            
 Route::get("/client_contact_save","client_contact_save");            
 Route::get("/purchaselist","purchaselist");            
 Route::get("/success_callback_url","success_callback_url");  
 Route::get("/package_connection_callback_url","package_connection_callback_url");            
 Route::get("/package_connection_buy_add","package_connection_buy_add");            
 Route::get("/handle_modal_biodata","handle_modal_biodata");            
 Route::get("/is_permition_for_public","is_permition_for_public");            
 Route::get("/logout","logout");            
})->middleware('login');
  
Route::controller(BlogController::class)->group(function () {
    Route::get("/show_blog_all","show_blog_all");            
    Route::get("/blog_details/{id}/{title}","blog_details");            
           
   });
     
// Route::get('/show_blog_all', function () {
//     return view('pages.blog_pages.show_blog_all');
// });
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});