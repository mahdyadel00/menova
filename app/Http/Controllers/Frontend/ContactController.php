<?php

namespace App\Http\Controllers\Frontend;

use anlutro\LaravelSettings\Facades\Setting;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    protected function index()
    {

        $setting = Setting::all();

        return view('frontend.contact', compact('setting'));
    }

    protected function store(Request $request)
    {
        // dd($request->all());

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

        Session()->flash('success', 'site.added_successfully');

        return redirect()->route('contacts.index');
    }
}
