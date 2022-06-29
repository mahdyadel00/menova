<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
  
    protected function index(){

        $services = Services::with('data')->get();
        
        return view('frontend.services' , compact('services'));
    }
}