<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\WebsiteMail;
use App\Models\Page;
use App\Models\Author;
use App\Helper\Helpers;
use Hash;
use Auth;


class LoginController extends Controller
{
    public function index()
    {
        Helpers::read_json();

        $page_data = Page::where('id', 1)->first();
        return view('Front.login', compact('page_data'));
    }

    public function author_login_submit(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('author')->attempt($credential)) {
            return redirect()->route('author_home');
        } else {
            return redirect()->route('login')->with('error', 'Information Is Not Correct!');
        }
    }

    public function author_logout()
    {
        Auth::guard('author')->logout();
        return redirect()->route('login')->with('success', 'You Are Logout Successfully');
    }

    public function author_forget_password()
    {
        Helpers::read_json();

        return view('Front.forget_password');
    }

    public function author_forget_password_submit(Request $request)
    {
        //  dd($request->email);

        $request->validate([
            'email' => 'required|email'

        ]);

        $author_data = Author::where('email', $request->email)->first();
        if (!$author_data) {
            return redirect()->back()->with('error', 'email address not found');
        }

        $token = hash('sha256', time());

        $author_data->token = $token;
        $author_data->update();

        $reset_password = url('author/reset-password/' . $token . '/' . $request->email);
        $subject = 'Author Reset Password';
        $message = 'please click on follow link to reset password:  </br>';
        $message .= '<a href="' . $reset_password . '">Click Here</a>';

        \Mail::to($request->email)->send(new WebsiteMail($subject, $message));

        return redirect()->route('login')->with('success', 'Please Check Your Email And Follow The Steps There');
    }

    public function author_reset_password($token, $email)
    {
        Helpers::read_json();
        
        // dd($token);
        $author_reset = Author::where('token', $token)->where('email', $email)->first();
        if (!$author_reset) {
            return redirect()->route('login');
        }

        return view('Front.reset_password', compact('token', 'email'));
    }

    public function author_reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'

        ]);

        $author_data = Author::where('token', $request->token)->where('email', $request->email)->first();
        $author_data->password = Hash::make($request->password);
        $author_data->token = '';
        $author_data->update();

        return redirect()->route('login')->with('success', 'password is reset successfully');
    }
}
