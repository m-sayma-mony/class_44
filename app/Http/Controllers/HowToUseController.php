<?php

namespace App\Http\Controllers;

class HowToUseController extends Controller
{
    public function loadHowToUsePage(){
        return view('frontend.how.how');
    }
}
