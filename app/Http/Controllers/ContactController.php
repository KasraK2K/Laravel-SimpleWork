<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function store()
    {
        request()->validate(['email' => 'required|email']);

//        Mail::raw('It works!', function ($message) {
//            $message
//                ->to(request('email'))
//                ->subject('test email subject');
//        });

        Mail::to(request('email'))
            ->send(new Contact('shirt'));

        return redirect('/contact')
            ->with('message', 'Email sent');
    }
}
