<?php

namespace App\Http\Controllers\Front;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\WebsiteMail;
use App\Models\Subscriber;
// use App\Helper\Helpers;
use Hash;

class SubscriberController extends Controller
{
    public function index(Request $request)
    {
        // Helpers::read_json();

        $validator = \Validator::make($request->all(),[
            
            'email' => 'required|email'
        ]);

        //dd($request->email);

        if(!$validator->passes()){

            return response()->json(['code'=>0, 'error_message'=>$validator->errors()->toArray() ]);

        } else{
            
            
            
            $token = hash('sha256', time());

            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->token = $token;
            $subscriber->status = 'Pending';
            $subscriber->save();


             //send email
             $subject = 'Subscriber Email Verified';
             $verification_link = url('subscriber/verified/'.$token.'/'.$request->email);
             $message = 'Please Click On The FollOwing Link In Order To Verified as Subscriber: <br>';
             $message .= '<a href="'.$verification_link.'">';
             $message .= $verification_link;
             $message .= '</a>';


            \Mail::to($request->email)->send(new WebsiteMail($subject, $message));

            return response()->json(['code'=>1, 'success_message'=>'Please Check Your Email Address To Verify To Subscriber!']);
        }

    }

    public function subscriber_verified($token, $email)
    {
        
        $subscriber_data = Subscriber::where('token', $token)->where('email', $email)->first();
        if($subscriber_data){
                 
            $subscriber_data->token = '';
            $subscriber_data->status = 'Active';
            $subscriber_data->update();

            return Redirect()->back()->with('success', 'Congratulation You Are Successfully a Subscriber In This System');

        }else{
            return Redirect()->route('home');
        }
    }


}
