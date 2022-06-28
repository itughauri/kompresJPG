<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMailer;

class MailController extends Controller
{
    public function send_email(Request $request)
    {
        // $request->validate([
        //     'name_'  => 'required',
        //     'email_' => 'required'
        // ]);

        // return $request;

        $details = [
            'title'    => 'Contact-us',
            'name'     => $request->name_,
            'message'  => $request->message,
            'email'    => $request->email_
        ];

        Mail::to($request->email_)->send(new ContactMailer($details) );
        return redirect()->route('index');
    }
}
