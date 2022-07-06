<?php

namespace App\Http\Controllers\Frontend;

// use anlutro\LaravelSettings\Facades\Setting;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    protected function index()
    {

        // $setting = Setting::first();
        // dd($setting);

        return view('frontend.contact');
    }

    protected function store(Request $request)
    {

        $request->validate([

            'name'  => 'required',
            'email'  => 'required',
            'subject'  => 'required',
            'message'  => 'required',
        ]);

        $contact = Contact::create([

            'name'  => $request->name,
            'email'  => $request->email,
            'subject'  => $request->subject,
            'message'  => $request->message,
        ]);
        // dd($contact);
        Session()->flash('success', trans('front.added_successfully'));
        return redirect()->back();
    }
}
