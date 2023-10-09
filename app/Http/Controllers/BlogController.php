<?php

namespace App\Http\Controllers;

class BlogController extends Controller
{
    public function loadBlogPage(){
        return view('frontend.blog.blog');
    }
}
