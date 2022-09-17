<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LiveChannel;

class AdminLiveChannelController extends Controller
{
    public function live_channel_show()
    {
        $live_channels = LiveChannel::orderBy('id','DESC')->get();
        return view('admin.live_channel_show', compact('live_channels'));
    }

    public function live_channel_create()
    {
        return view('Admin.live_channel_create');
    }

    public function live_channel_store(Request $request)
    {
  
        $request->validate([
            'video_id' => 'required',
            'heading' => 'required'
        ]);

        $live_channel_data = new LiveChannel();
        $live_channel_data->video_id = $request->video_id;
        $live_channel_data->heading = $request->heading;
        $live_channel_data->save();

        return redirect()->route('admin_live_channel_show')->with('success', 'Live Channel Saved Successfully.');

    }

    public function live_channel_edit($id)
    {
        $live_channel_single = LiveChannel::where('id', $id)->first();
        return view('Admin.live_channel_edit', compact('live_channel_single'));
    }

    public function live_channel_update(Request $request, $id)
    {

        $request->validate([
            'video_id' => 'required',
            'heading' => 'required'
        ]);

        $live_channel_data = LiveChannel::where('id', $id)->first();
        $live_channel_data->video_id = $request->video_id;
        $live_channel_data->heading = $request->heading;
        $live_channel_data->update();

        return redirect()->route('admin_live_channel_show')->with('success', 'Live Channel Updated Successfully.');

    }

    public function live_channel_delete($id)
    {
        $live_channel_single = LiveChannel::where('id', $id)->first();
        $live_channel_single->delete();

        return redirect()->route('admin_live_channel_show')->with('success', 'Live Channel Deleted Successfully.');

    }
}
