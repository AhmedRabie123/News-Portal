<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Hash;
use Auth;


class LoginController extends Controller
{
    public function index()
    {
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

        if(Auth::guard('author')->attempt($credential)){
            return redirect()->route('author_home');
        }else{
            return redirect()->route('login')->with('error', 'Information Is Not Correct!');
        }
    }

    public function author_logout(){
        Auth::guard('author')->logout();
        return redirect()->route('login')->with('success', 'You Are Logout Successfully');
    }
}
