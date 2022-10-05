<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OnlinePoll;
use App\Models\Language;
use App\Helper\Helpers;

class OnlinePollController extends Controller
{
    public function submit(Request $request)
    {
        //   dd($request->id);
        //   dd($request->vote);

        $poll_data = OnlinePoll::where('id', $request->id)->first();

        if ($request->vote == 'Yes') {
            $updated_yes = $poll_data->yes_vote + 1;
            $poll_data->yes_vote = $updated_yes;
        } else {
            $updated_no = $poll_data->no_vote + 1;
            $poll_data->no_vote = $updated_no;
        }

        $poll_data->update();

        session()->put('current_poll_id', $poll_data->id);

        return redirect()->back()->with('success', 'Your vote is Counted Successfully');
    }

    public function previous_poll()
    {
        Helpers::read_json();

       if(!session()->get('session_short_name')){
            $current_short_name = Language::where('is_default', 'Yes')->first()->short_name;
       }else{
        $current_short_name = session()->get('session_short_name');
       }
  
       $current_language_id = Language::where('short_name', $current_short_name)->first()->id;

        $online_poll_data = OnlinePoll::where('language_id', $current_language_id)->orderBy('id', 'desc')->get();
        return view('Front.poll_previous', compact('online_poll_data'));
    }
}
