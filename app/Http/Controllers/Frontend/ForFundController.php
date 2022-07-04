<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ForFund;
use Illuminate\Http\Request;

class ForFundController extends Controller
{

    protected function index(){

        $fopr_fund = ForFund::paginate(3);

        return view('frontend.for_fund.blog' , compact('fopr_fund'));
    }

    protected function show($id){

        $blog = Blog::findOrFail($id);

        return view('frontend.blogs.blog-single' , compact('blog'));
    }
}
