<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  
    protected function index(){

        $contat_us = Contact::with('data')->get();
        
        return view('frontend.contact' , compact('contat_us'));
    }


}