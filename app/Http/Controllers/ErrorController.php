<?php

namespace App\Http\Controllers;

class ErrorController extends Controller
{
    public function loadErrorPage(){
        return view('frontend.error.error');
    }
}
