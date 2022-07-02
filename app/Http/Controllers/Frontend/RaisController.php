<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ForFund;
use App\Models\Rais;
use Illuminate\Http\Request;

class RaisController extends Controller
{

    protected function index(){

        $rais = Rais::get();

        return view('frontend.raise' , compact('rais'));
    }

    protected function store(Request $request){

        $for_fund = ForFund::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'stage_business' => $request->stage_business,
            'description' => $request->description,
        ]);



        session()->flash('success', __('site.added_successfully'));
        return redirect()->back();    }
}
