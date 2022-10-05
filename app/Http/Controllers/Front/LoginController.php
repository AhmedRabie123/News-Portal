<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\WebsiteMail;
use App\Models\Page;
use App\Models\Author;
use App\Models\Language;
use App\Helper\Helpers;
use Hash;
use Auth;


class LoginController extends Controller
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
        return view('Front.login', compact('page_data'));
    }

    public function author_login_submit(Request $request)
    {
        Helpers::read_json();

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => ERROR_EMAIL_REQUIRED,
            'email.email' => ERROR_EMAIL_VALID,
            'password.required' => ERROR_PASSWORD_REQUIRED
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('author')->attempt($credential)) {
            return redirect()->route('author_home');
        } else {
            return redirect()->route('login')->with('error', ERROR_AUTHOR_LOGIN);
        }
    }

    public function author_logout()
    {
        Helpers::read_json();

        Auth::guard('author')->logout();
        return redirect()->route('login')->with('success', SUCCESS_AUTHOR_LOGOUT);
    }

    public function author_forget_password()
    {
        Helpers::read_json();

        return view('Front.forget_password');
    }

    public function author_forget_password_submit(Request $request)
    {
        //  dd($request->email);
        Helpers::read_json();

        $request->validate([
            'email' => 'required|email'

        ], [
            'email.required' => ERROR_EMAIL_REQUIRED,
            'email.email' => ERROR_EMAIL_VALID
        ]);

        $author_data = Author::where('email', $request->email)->first();
        if (!$author_data) {
            return redirect()->back()->with('error', ERROR_EMAIL_NOT_FOUND);
        }

        $token = hash('sha256', time());

        $author_data->token = $token;
        $author_data->update();

        $reset_password = url('author/reset-password/' . $token . '/' . $request->email);
        $subject = 'Author Reset Password';
        $message = 'please click on follow link to reset password:  </br>';
        $message .= '<a href="' . $reset_password . '">Click Here</a>';

        \Mail::to($request->email)->send(new WebsiteMail($subject, $message));

        return redirect()->route('login')->with('success', SUCCESS_FORGET_PASSWORD);
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
        Helpers::read_json();

        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'

        ], [
            'password.required' => ERROR_PASSWORD_REQUIRED,
            'retype_password.required' => ERROR_RETYPE_PASSWORD_REQUIRED,
            'retype_password.same' => ERROR_RETYPE_PASSWORD_SAME
        ]);

        $author_data = Author::where('token', $request->token)->where('email', $request->email)->first();
        $author_data->password = Hash::make($request->password);
        $author_data->token = '';
        $author_data->update();

        return redirect()->route('login')->with('success', SUCCESS_RESET_PASSWORD);
    }
}
