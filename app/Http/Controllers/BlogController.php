<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;

class BlogController extends Controller
{
    public function show_blog_all(Request $req){
     $blogs =   BlogModel::all();
     return view('pages.blog_pages.show_blog_all',['blogs'=>$blogs]);

    }

    public function blog_details(Request $req,$id){
        $blog =   BlogModel::where(['id'=>$id])->first();
        $latest_blogs = BlogModel::limit(5)->orderBy('id', 'desc')->get();
        if($blog!= null){
            return view('pages.blog_pages.blog_details',['blog'=>$blog,'latest_blogs'=>$latest_blogs]);

        }else{
            return back();
        }
    }
}
