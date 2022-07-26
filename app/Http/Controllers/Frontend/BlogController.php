<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BComment;
use Auth;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    protected function index(){

        $blogs = Blog::with('user')->paginate(3);
        foreach($blogs as $blog){

            $comments = BComment::where('blog_id' , $blog->id)->get();
        }

        return view('frontend.blogs.blog' , compact('blogs' , 'comments'));
    }

    protected function show($id){

        $blog = Blog::with([
            'user',
            'data',
        ])->findOrFail($id);
            $comments = BComment::where('blog_id' , $blog->id)->get();

            return view('frontend.blogs.blog-single' , compact('blog' , 'comments'));
    }

    protected function storeComment(Request $request){

        // dd($request->all());
        $bcomment = BComment::query()->create([

            'name' => $request->name,
            'comment' => $request->comment,
            'blog_id' => $request->blog_id,
            'user_id' => Auth::user()->id,
        ]);

        session()->flash('success', __('site. Added Successfuly Blog Comment'));
        return redirect()->back();
    }
}
