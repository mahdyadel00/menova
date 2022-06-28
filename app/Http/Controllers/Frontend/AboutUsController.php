<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
  
    protected function index(){

        $about_us = AboutUs::all();
        return view('frontend.about_us.index');
    }
}