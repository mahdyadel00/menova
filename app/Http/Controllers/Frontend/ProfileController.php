<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    protected function index(){

        

        return view('frontend.user-profile');
    }

    protected function update(Request $request , $id){

        $user = User::where('id' , $id)->update([
            'first_name'  => $request->first_name,
            'last_name'  => $request->last_name,
            'email'  => $request->email,
            'email'  => $request->email,
            'location'  => $request->location,
        ]);
        
        return  redirect()->back();
    }
}
