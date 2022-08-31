<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\WebsiteMail;
use App\Models\Admin;
use Hash;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AdminLoginController extends Controller
{



    // public function index()
    // {
    //     return redirect()->route('admin_home');
    // }

    public function admin_login()
    {
        // $pass = Hash::make('1234');
        // dd($pass);
        return view('admin.login');
    }

    public function admin_login_submit(Request $request)
    {
 
       // dd($request->email);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
 
        $credential = [
 
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::guard('admin')->attempt($credential)){
            return redirect()->route('admin_home');
        }else {
            return redirect()->route('admin_login')->with('error','information is not correct!');
        }

    }

    public function admin_logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }




    public function forget_password()
    {
        return view('admin.forget_password');
    }

    public function admin_forget_password_submit(Request $request)
    {
         ;
       //  dd($request->email);

       $request->validate([
        'email' => 'required|email'
      
     ]);

     $admin_data = Admin::where('email', $request->email)->first();
     if(!$admin_data){
        return redirect()->back()->with('error', 'email address not found');
     }

     $token = hash('sha256',time());

     $admin_data->token = $token;
     $admin_data->update();

     $reset_password =url('admin/reset-password/'.$token.'/'.$request->email);
     $subject = 'Admin Reset Password';
     $message = 'please click on follow link to reset password:  </br>';
     $message .= '<a href="'.$reset_password.'">Click Here</a>';
  
     \Mail::to($request->email)->send(new WebsiteMail($subject, $message));

     return redirect()->route('admin_login')->with('success', 'reset password successfully please enter a new password');

    }

    public function admin_reset_password($token, $email)
    {
        // dd($token);
        $admin_reset = Admin::where('token',$token)->where('email',$email)->first();
        if(!$admin_reset){
            return redirect()->route('admin_login');
         }

         return view('Admin.reset_password',compact('token','email'));

    }

    public function admin_reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
          
         ]);
 
         $admin_data = Admin::where('token', $request->token)->where('email', $request->email)->first();
         $admin_data->password = Hash::make($request->password);
         $admin_data->token = '';
         $admin_data->update();

         return redirect()->route('admin_login')->with('success', 'password is reset successfully');
        
    }


}


