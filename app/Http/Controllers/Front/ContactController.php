<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\WebsiteMail;
use App\Models\Page;
use App\Models\Admin;
use App\Models\Language;
use App\Helper\Helpers;



class ContactController extends Controller
{
    public function index()
    {
        Helpers::read_json();

        if (!session()->get('session_short_name')) {
            $current_short_name = Language::where('is_default', 'Yes')->first()->short_name;
         } else {
            $current_short_name = session()->get('session_short_name');
         }
   
         $current_language_id = Language::where('short_name', $current_short_name)->first()->id;
        
        $page_data = Page::where('language_id', $current_language_id)->first();
        return view('Front.contact', compact('page_data'));
 
    }

    public function send_email(Request $request)
    {
        
        $validator = \Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

       

        if(!$validator->passes()){

            return response()->json(['code'=>0, 'error_message'=>$validator->errors()->toArray() ]);

        } else{
            
            
            //send email
             $admin_data = Admin::where('id', 1)->first();
            
             $subject = 'Contact From Email';
             $message = 'Visitor Message Detail: <br>';
             $message .= '<b> Visitor Name:</b>'. $request->name .'<br>';
             $message .= '<b>Visitor Email:</b>' .$request->email .'<br>';
             $message .= '<b> Visitor Message:</b>'.$request->message .'<br>';

             \Mail::to($admin_data->email)->send(new WebsiteMail($subject, $message));

            return response()->json(['code'=>1, 'success_message'=>'Email Is Sent Successfully!']);
        }

    }
}
