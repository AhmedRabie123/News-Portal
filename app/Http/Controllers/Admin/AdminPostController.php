<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Tag;
use Auth;
use DB;

class AdminPostController extends Controller
{
    public function post_show()
    {

        $posts = Post::with('rSubCategory.rCategory')->get();
        return view('Admin.post_show', compact('posts'));
    }

    public function post_create()
    {

        $sub_categories = SubCategory::with('rCategory')->get();
        // foreach ($sub_categories as $item) {
        //     echo $item->sub_category_name . '-' .$item->rCategory->category_name;
        // }

        return view('Admin.post_create', compact('sub_categories'));
    }

    public  function post_store(Request $request)
    {

        $request->validate([
            'post_title' => 'required|',
            'post_detail' => 'required|'
        ]);

       $q = DB::select("SHOW TABLE STATUS LIKE 'POSTS'");
       $ai_id = $q[0]->Auto_increment; 
       // dd($ai_id);
       //dd($request->tags);

        $post = new Post();
        $post->sub_category_id = $request->sub_category_id;
        $post->post_title = $request->post_title;
        $post->post_detail = $request->post_detail;
        $post->visitors = 1;
        $post->author_id= 0;
        $post->admin_id = Auth::guard('admin')->user()->id;
        $post->is_share = $request->is_share;
        $post->is_comment = $request->is_comment;

        $post->save();

        $tags_array = explode(',', $request->tags);
        for($i=0; $i<count($tags_array); $i++){
  
            $tag = new Tag();
            $tag->post_id = $ai_id;
            $tag->tag_name = trim($tags_array [$i]);
            $tag->save();

        }




        return redirect()->route('admin_post_show')->with('success', 'Post Created successfully.');
    }


}
