<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OnlinePoll;

class AdminOnlinePollController extends Controller
{
    public function online_poll_show()
    {
        $online_poll_data = OnlinePoll::with('rLanguage')->orderBy('id','desc')->get();
        return view('Admin.online_poll_show',compact('online_poll_data'));
    }

    public function online_poll_create()
    {
        return view('Admin.online_poll_create');
    }

    public function online_poll_store(Request $request)
    {
  
        $request->validate([
            'question' => 'required'
        ]);

        $online_poll_data = new OnlinePoll();
        $online_poll_data->question = $request->question;
        $online_poll_data->yes_vote = 0;
        $online_poll_data->no_vote = 0;
        $online_poll_data->language_id = $request->language_id;

        $online_poll_data->save();

        return redirect()->route('admin_online_poll_show')->with('success', 'Online Poll Saved Successfully.');

    }

    public function online_poll_edit($id)
    {
        $online_poll_single = OnlinePoll::where('id', $id)->first();
        return view('Admin.online_poll_edit', compact('online_poll_single'));
    }

    public function online_poll_update(Request $request, $id)
    {

        $request->validate([
            'question' => 'required'
        ]);

        $online_poll_data = OnlinePoll::where('id', $id)->first();
        $online_poll_data->question = $request->question;
        $online_poll_data->language_id = $request->language_id;
        $online_poll_data->update();

        return redirect()->route('admin_online_poll_show')->with('success', 'Online Poll Updated Successfully.');

    }

    public function online_poll_delete($id)
    {
        $online_poll_single = OnlinePoll::where('id', $id)->first();
        $online_poll_single->delete();

        return redirect()->route('admin_online_poll_show')->with('success', 'Online Poll Deleted Successfully.');

    }
}
