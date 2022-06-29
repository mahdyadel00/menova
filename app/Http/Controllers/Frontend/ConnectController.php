<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Connect;
use Illuminate\Http\Request;

class ConnectController extends Controller
{
  
    protected function index(){

        $connects = Connect::with('data')->get();
        
        return view('frontend.connect' , compact('connects'));
    }

    protected function store(Request $request){

        dd($request->all());
    }
}