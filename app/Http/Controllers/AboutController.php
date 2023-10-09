<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function loadAboutPage(){
        return view('frontend.about.about');
    }
}
