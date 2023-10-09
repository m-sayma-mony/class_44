<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function loadHomePage(){
        $p = Product::all();
        return view('frontend.home.home', ['products' => $p]);
    }
}
