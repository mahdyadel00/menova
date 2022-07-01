<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
  
    protected function index(){

        $about_us = AboutUs::with('data')->first();
        $abouts = AboutUs::with('data')->get();
        $about_us1 = AboutUs::with('data')->skip(1)->take(1)->get();
        $about_us2 = AboutUs::with('data')->skip(2)->take(1)->get();
        $about_us3 = AboutUs::with('data')->skip(3)->take(1)->get();
        return view('frontend.about' , compact('about_us' , 'abouts' , 'about_us1' , 'about_us2' , 'about_us3'));
    }
}