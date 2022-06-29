<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
  
    protected function index(){

        $blogs = Blog::paginate(3);
        
        return view('frontend.blogs.blog' , compact('blogs'));
    }
  
    protected function show($id){

        $blog = Blog::findOrFail($id);
        
        return view('frontend.blogs.blog-single' , compact('blog'));
    }
}