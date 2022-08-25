<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\WebsiteMail;
use App\Models\Admin;
use Hash;
use Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;

class AdminProfileController extends Controller
{
   public function edit_profile()
   {
      return view('Admin.profile');
   }

   public function admin_profile_submit(Request $request)
   {
    //  dd($request->name);

     $admin_data = Admin::where('email',Auth::guard('admin')->user()->email)->first();

       $request->validate([
  
         'name' => 'required',
         'email' => 'required|email'

       ]);

       //dd($request->name);
      //  dd($request->email);

       if($request->password!=''){

         $request->validate([
  
            'password' => 'required|',
            'retype_password' => 'required|same:password'
   
          ]);

          $admin_data->password = Hash::make($request->password);

         //  dd($request->password);

       }

       if($request->hasFile('photo')){

         $request->validate([
  
            'photo' => 'image|mimes:jpg,jpeg,png,gif'
   
          ]);

          unlink(public_path('uploads/'.$admin_data->photo));

          $ext = $request->file('photo')->extension();
          $final_name = 'admin'.'.'.$ext;
          $request->file('photo')->move(public_path('uploads/'),$final_name);

          $admin_data->photo = $final_name;

       }

       $admin_data->name = $request->name;
       $admin_data->email = $request->email;
       $admin_data->update();

       return redirect()->back()->with('success', 'profile information updated successfully.');

   }



}
