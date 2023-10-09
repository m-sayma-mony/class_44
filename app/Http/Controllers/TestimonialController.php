<?php

namespace App\Http\Controllers;

class TestimonialController extends Controller
{
    public function loadTestimonialPage(){
        return view('frontend.testimonial.testimonial');
    }
}
