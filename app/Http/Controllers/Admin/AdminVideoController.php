<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class AdminVideoController extends Controller
{
    public function video_show()
    {

        $Videos = Video::get();
        return view('Admin.video_show', compact('Videos'));
    }

    public function video_create()
    {
        return view('Admin.video_create');
    }

    public function video_store(Request $request)
    {

        $request->validate([
            'video_id' => 'required',
            'caption' => 'required'
        ]);

        $video_data = new Video();

        $video_data->video_id = $request->video_id;
        $video_data->caption = $request->caption;
        $video_data->save();

        return redirect()->route('admin_video_show')->with('success', 'Video Saved Successfully.');
    }

    public function video_edit($id)
    {
        $video_single = Video::where('id', $id)->first();
        return view('Admin.video_edit', compact('video_single'));
    }

    public function video_update(Request $request, $id)
    {
        $request->validate([
            'video_id' => 'required',
            'caption' => 'required'
        ]);

        $videos = Video::where('id', $id)->first();

        $videos->video_id = $request->video_id;
        $videos->caption = $request->caption;
        $videos->update();

        return redirect()->route('admin_video_show')->with('success', 'video Updated Successfully.');
    }

    public function video_delete($id)
    {

        $video_single = Video::where('id', $id)->first();
        $video_single->delete();

        return redirect()->route('admin_video_show')->with('success', 'video Deleted Successfully.');
    }
}
