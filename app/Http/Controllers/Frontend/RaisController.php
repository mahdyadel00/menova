<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Rais;
use Illuminate\Http\Request;

class RaisController extends Controller
{
  
    protected function index(){

        $rais = Rais::get();
        
        return view('frontend.raise' , compact('rais'));
    }
}