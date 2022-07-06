<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ForFund;
use App\Models\Rais;
use Illuminate\Http\Request;

class RaisController extends Controller
{

    protected function index()
    {

        $rais = Rais::get();

        return view('frontend.raise', compact('rais'));
    }

    protected function store(Request $request)
    {

        $request->validate([

            'name' => 'required',
            'email' => 'required',
            'stage_business' => 'required',
            'description' => 'required',
        ]);
        $connect_for_fumd = ForFund::create([
            'name' => $request->name,
            'email' => $request->email,
            'stage_business' => $request->stage_business,
            'description' => $request->description,
        ]);
        Session()->flash('success', trans('front.added_successfully'));
        return redirect()->back();
    }
}
