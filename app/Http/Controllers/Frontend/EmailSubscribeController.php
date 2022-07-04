<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\EmailSubscribe;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class EmailSubscribeController extends Controller
{

    protected function store(Request $request)
    {

        $request->validate([

            'email'  => 'required',
        ]);

        $email = EmailSubscribe::create([

            'email'  => $request->email,
        ]);
        Session()->flash('success', 'site.added_successfully');
        return redirect()->back();
    }
}
