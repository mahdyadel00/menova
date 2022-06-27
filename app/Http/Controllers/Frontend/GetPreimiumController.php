<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CommentRequest;
use App\Models\Discuss;
use App\Models\Comment;
use Illuminate\Http\Request;

class GetPreimiumController extends Controller
{
  
    protected function index(){

        
        return view('frontend.preimium.index');
    }
}