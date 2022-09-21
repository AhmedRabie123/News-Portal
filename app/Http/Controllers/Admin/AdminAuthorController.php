<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Mail\WebsiteMail;
use App\Models\Author;
use Hash;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AdminAuthorController extends Controller
{
    public function author_show()
    {
        $authors = Author::get();
        return view('Admin.author_show', compact('authors'));
    }

    public function author_create()
    {
        return view('Admin.author_create');
    }

    public function author_store(Request $request)
    {

        $author_data = new Author();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:authors',
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        if ($request->hasFile('photo')) {

            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            $now = time();
            $ext = $request->file('photo')->extension();
            $final_name = 'author_photo_' . $now . '.' . $ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);

            $author_data->photo = $final_name;
        }



        $author_data->name = $request->name;
        $author_data->email = $request->email;
        $author_data->password = Hash::make($request->password);
        $author_data->token = '';
        $author_data->save();

        //send email

        $subject = 'You Account Is Created To The Website';
        $message = 'Hi, Your Account Is Created Successfully And Now You Can Login To Our System From The Login Page Please Go To The Link:<br> <br>';
        $message .= '<a href= "' . route('login') . '">';
        $message .= 'Click on This Link';
        $message .= '</a>';
        $message .= '<br> <br> Please See Your Password Here And After Login, Change That Immediately <br>';
        $message .= $request->password;


        \Mail::to($request->email)->send(new WebsiteMail($subject, $message));


        return redirect()->route('admin_author_show')->with('success', 'Author Account Is Created Successfully.');
    }

    public function author_edit($id)
    {
        $author_single = Author::where('id', $id)->first();
        return view('Admin.author_edit', compact('author_single'));
    }


    public function author_update(Request $request, $id)
    {

        $author_data = Author::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('authors')->ignore($author_data->id)
            ]
        ]);


        if ($request->password != '') {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password'
            ]);

            $author_data->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {

            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            unlink(public_path('uploads/' . $author_data->photo));

            $now = time();
            $ext = $request->file('photo')->extension();
            $final_name = 'author_photo_' . $now . '.' . $ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);

            $author_data->photo = $final_name;
        }



        $author_data->name = $request->name;
        $author_data->email = $request->email;
        $author_data->token = '';
        $author_data->update();


        return redirect()->route('admin_author_show')->with('success', 'Author Account Is Updated Successfully.');
    }

    public function author_delete($id)
    {
        $author_single = Author::where('id', $id)->first();
        if ($author_single->photo != Null) {
            unlink(public_path('uploads/' . $author_single->photo));
        }

        $author_single->delete();

        return redirect()->route('admin_author_show')->with('success', 'Author Account Is Deleted Successfully.');
    }
}
