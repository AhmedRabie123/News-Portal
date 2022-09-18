<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Post;


class TagController extends Controller
{
    public function show($tag_name)
    {
       // echo $tag_name;

       $all_tag_posts = Tag::where('tag_name', $tag_name)->get();
        $all_post_ids = [];
        foreach( $all_tag_posts as $row ){
            //    echo $row->post_id;
            //    echo '<br>';
            $all_post_ids[] = $row->post_id;
        }

        $all_posts = Post::orderBy('id', 'desc')->paginate(8);
        return view('Front.tag', compact('all_post_ids','all_posts','tag_name'));
    }
}
