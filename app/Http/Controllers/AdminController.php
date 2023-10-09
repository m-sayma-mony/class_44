<?php

namespace App\Http\Controllers;

use App\Models\Product;

class AdminController extends Controller
{
    public function loadAdminPage(){
        $p = Product::all();
        return view('backend.dashboard.dashboard', ['products' => $p]);
    }
}
