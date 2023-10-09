<?php

namespace App\Http\Controllers;

class FeatureController extends Controller
{
    public function loadFeaturePage(){
        return view('frontend.feature.feature');
    }
}
