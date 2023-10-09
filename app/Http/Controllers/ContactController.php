<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    public function loadContactPage(){
        return view('frontend.contact.contact');
    }
}
