<?php

namespace App\Http\Controllers;

use App\Notifications\PaymentResived;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function create()
    {
        return view('payments.create');
    }

    public function store()
    {
        request()->user()->notify(new PaymentResived(900));
        return redirect('payments/create')->with('message', 'notify is sent!');
    }
}
