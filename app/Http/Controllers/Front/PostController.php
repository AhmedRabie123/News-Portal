<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin as MiddlewareAdmin;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Admin;

class PostController extends Controller
{
    public function detail($id)
    {
        $tag_data = Tag::where('post_id', $id)->get();  
        $post_detail =Post::with('rSubCategory')->where('id', $id)->first();

        if ($post_detail->author_id == 0) {
           $user_data = Admin::where('id', $post_detail->admin_id)->first();
           //dd($user_data->name);
        } else {
          //showing later
        }

        //update page view count

        $new_values = $post_detail->visitors+1;

        $post_detail->visitors = $new_values;
        $post_detail->update();
        
        return view('Front.post_detail', compact('post_detail','user_data','tag_data'));

    }
}
