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
use App\Models\User;
use App\Models\Contact;
use App\Models\OurClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
        $sliders = Slider::with([
            'data' => function ($query) {

                $query->where('locale', app()->getLocale());
            },
        ])->get();
        $about_us = AboutUs::take(3)->get();
        $abouts = AboutUs::with([
            'data' => function ($query) {

                $query->where('locale', app()->getLocale());
            },
        ])->skip(1)->take(1)->first();
        $services = Services::with([
            'data' => function ($query) {

                $query->where('locale', app()->getLocale());
            },
        ])->take(4)->get();
        $counters = Counter::with([
            'data' => function ($query) {

                $query->where('locale', app()->getLocale());
            },
        ])->take(4)->get();
        $connects = Connect::with([
            'data' => function ($query) {

                $query->where('locale', app()->getLocale());
            },
        ])->take(1)->get();
        $advisor = Advisor::with([
            'data' => function ($query) {

                $query->where('locale', app()->getLocale());
            },
        ])->take(4)->get();
        $advisor_first = Advisor::with([
            'data' => function ($query) {

                $query->where('locale', app()->getLocale());
            },
        ])->skip(1)->take(4)->first();
        $rais = Rais::with('data')->first();
        $blogs = Blog::with([
            'data' => function ($query) {

                $query->where('locale', app()->getLocale());
            },
        ])->take(3)->get();
        return view('frontend.index', compact('sliders', 'about_us', 'abouts', 'services', 'counters', 'connects', 'advisor', 'advisor_first', 'rais', 'blogs'));
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

    protected function register(Request $request)
    {

        // dd($request->all());

        $request->validate([

            'first_name'  => 'required',
            'last_name'  => 'nullable',
            'phone'  => 'required',
            'email'  => 'required',
            'password'  => 'required',
        ]);

        $request_data = $request->except(['password']);
        $request_data['password'] = bcrypt($request->password);


        $users = User::create($request_data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('home');
    }
}//end of controller
