<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;

class AdminPhotoController extends Controller
{
    public function photo_show()
    {

        $photos = Photo::with('rLanguage')->get();
        return view('Admin.photo_show', compact('photos'));
    }

    public function photo_create()
    {
        return view('Admin.photo_create');
    }

    public function photo_store(Request $request)
    {

        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'caption' => 'required'
        ]);

        $photo_data = new photo();

        $now = time();
        $ext = $request->file('photo')->extension();
        $final_name = 'photo_' . $now . '.' . $ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $photo_data->photo = $final_name;


        $photo_data->caption = $request->caption;
        $photo_data->language_id = $request->language_id;
        $photo_data->save();

        return redirect()->route('admin_photo_show')->with('success', 'Photo Saved Successfully.');
    }

    public function photo_edit($id)
    {
        $photo_single = Photo::where('id', $id)->first();
        return view('Admin.photo_edit', compact('photo_single'));
    }

    public function photo_update(Request $request, $id)
    {
        $request->validate([
            'photo' => 'image|mimes:jpg,jpeg,png,gif',

        ]);

        $photos = Photo::where('id', $id)->first();

        if ($request->hasFile('photo')) {

            unlink(public_path('uploads/' . $photos->photo));

            $now = time();
            $ext = $request->file('photo')->extension();
            $final_name = 'photo_' . $now . '.' . $ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $photos->photo = $final_name;
        }

        $photos->caption = $request->caption;
        $photos->language_id = $request->language_id;
        $photos->update();

        return redirect()->route('admin_photo_show')->with('success', 'Photo Updated Successfully.');
    }

    public function photo_delete($id)
    {

        $photo_single = Photo::where('id', $id)->first();
        unlink(public_path('uploads/' . $photo_single->photo));
        $photo_single->delete();

        return redirect()->route('admin_photo_show')->with('success', 'Photo Deleted Successfully.');
    }
}
