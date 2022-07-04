<?php

namespace App\Http\Controllers;

use App\Http\Requests\Frontend\ContactRequest;
use App\Models\Blog;
use App\Models\Slider;
use App\Models\AboutUs;
use App\Models\Services;
use App\Models\Counter;
use App\Models\Connect;
use App\Models\Advisor;
use App\Models\Rais;
use App\Models\Contact;
use App\Models\OurClient;
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
        $sliders = Slider::get();
        $about_us = AboutUs::take(3)->get();
        $abouts = AboutUs::with('data')->skip(1)->take(1)->first();
        $services = Services::take(4)->get();
        $counters = Counter::with('data')->take(4)->get();
        $connects = Connect::with('data')->take(1)->get();
        $advisor = Advisor::with('data')->take(4)->get();
        $advisor_first = Advisor::with('data')->skip(1)->take(4)->first();
        $rais = Rais::with('data')->get();
        $blogs = Blog::with('data')->get();
        return view('frontend.index' , compact('sliders' , 'about_us' , 'abouts' , 'services' , 'counters' , 'connects' , 'advisor' , 'advisor_first' , 'rais' , 'blogs' ));
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
