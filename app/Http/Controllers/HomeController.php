<?php

namespace App\Http\Controllers;

use App\Http\Requests\Frontend\ContactRequest;
use App\Models\Blog;
use App\Models\Contact;
use App\Providers\AppServiceProvider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index()
    {
        return view('frontend.index');
    } //end of index

    public function contact(ContactRequest $request)
    {
        try {
            $data = $request->validated();
            Contact::create($data);
            session()->flash('success', __('site.message_sent'));
            return redirect('home');
        } catch (\Exception $ex) {
            session()->flash('error', __('messages.error'));
            return redirect('home');
        }
    } // end of contact

    public function blogs()
    {
        $blogs = Blog::with(['domain', 'user'])
            ->orderBy('created_at', 'desc')
            ->paginate(AppServiceProvider::PAGINATION_LIMIT);
        return view('frontend.blogs', compact('blogs'));
    } //end of blogs

    public function showBlog($slug)
    {
        $blog = Blog::with(['domain', 'user'])->whereSlug($slug)->first();
        if (!$blog) {
            \abort(404);
        }
        return view('frontend.blog', compact('blog'));
    } //end of blogs

}//end of controller