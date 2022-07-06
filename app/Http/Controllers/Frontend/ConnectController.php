<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Connect;
use App\Models\ConnectFounder;
use Illuminate\Http\Request;

class ConnectController extends Controller
{

    protected function index(){

        $connects = Connect::with('data')->get();

        return view('frontend.connect' , compact('connects'));
    }

    protected function store(Request $request){

        $request->validate([

            'name' => 'required',
            'email' => 'required',
            'stage_business' => 'required',
            'description' => 'required',
        ]);

        $connect_for_fumd = ConnectFounder::create([

            'name' =>  $request->name,
            'email' =>  $request->email,
            'stage_business' =>  $request->stage_business,
            'description' =>  $request->description,
        ]);
            Session()->flash('success', trans('front.added_successfully'));
            return redirect()->back();
    }
}
