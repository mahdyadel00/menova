<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\OurClient;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{

    protected function index(){


        $about_us = AboutUs::with([
            'data' => function($query){

                $query->where('locale' , app()->getLocale());
            },
            ])->first();
        $abouts = AboutUs::with([
            'data' => function($query){

                $query->where('locale' , app()->getLocale());
            },
            ])->get();
        $about_us1 = AboutUs::with([
            'data' => function($query){

                $query->where('locale' , app()->getLocale());
            },
            ])->take(1)->get();
        $about_us2 = AboutUs::with([
            'data' => function($query){

                $query->where('locale' , app()->getLocale());
            },
            ])->skip(1)->take(1)->get();
        $about_us3 = AboutUs::with([
            'data' => function($query){

                $query->where('locale' , app()->getLocale());
            },
            ])->skip(2)->take(1)->get();
        $our_clients = OurClient::get();
        return view('frontend.about' , compact('about_us' , 'our_clients' , 'abouts' , 'about_us1' , 'about_us2' , 'about_us3'));
    }
}
