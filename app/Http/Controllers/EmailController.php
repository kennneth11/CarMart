<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{

    public function create()
    {
        return view('contact');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'fullname' => 'required',
            'phone'=>'required',
            'content' => 'required',
          ]);

          $data = [
            'subject' => $request->subject,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'content' => $request->content
          ];

          Mail::send('email-subject', $data, function($message) use ($data) {
            $message->to($data['email'])
            ->subject($data['subject']);
          });

          return back()->with(['message' => 'Email successfully sent!']);

    }

}
