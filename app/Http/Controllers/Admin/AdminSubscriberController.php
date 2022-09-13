<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\WebsiteMail;
use App\Models\Subscriber;

class AdminSubscriberController extends Controller
{
    public function subscriber_show()
    {
        $subscribers = Subscriber::where('status', 'Active')->get();
        return view('Admin.all_subscribers', compact('subscribers'));

    }

    public function subscriber_send_email()
    {
        return view('Admin.subscriber_send_email');

    }

    public function subscriber_send_email_submit(Request $request)
    {
  
       $request->validate([
        'subject' => 'required',
        'message' => 'required',
       ]);

      
       $subject = $request->subject;
       $message = $request->message;

       $subscribers = Subscriber::where('status', 'Active')->get();
       foreach($subscribers as $row){
           \Mail::To($row->email)->send(new WebsiteMail($subject, $message));

        }

        return redirect()->route('admin_subscribers')->with('success', 'Email Send successfully.');

    }
}