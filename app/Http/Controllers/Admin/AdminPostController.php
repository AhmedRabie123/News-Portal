<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\WebsiteMail;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Models\Subscriber;
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
            'post_detail' => 'required|',
            'post_photo' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $q = DB::select("SHOW TABLE STATUS LIKE 'POSTS'");
        $ai_id = $q[0]->Auto_increment;
        // dd($ai_id);
        //dd($request->tags);

        $now = time();
        $ext = $request->file('post_photo')->extension();
        $final_name = 'post_photo_' . $now . '.' . $ext;
        $request->file('post_photo')->move(public_path('uploads/'), $final_name);

        $post = new Post();
        $post->sub_category_id = $request->sub_category_id;
        $post->post_title = $request->post_title;
        $post->post_detail = $request->post_detail;
        $post->post_photo = $final_name;
        $post->visitors = 1;
        $post->author_id = 0;
        $post->admin_id = Auth::guard('admin')->user()->id;
        $post->is_share = $request->is_share;
        $post->is_comment = $request->is_comment;

        $post->save();
 
        if ($request->tags != '') {
            $tags_array_new = [];
            $tags_array = explode(',', $request->tags);
            for ($i = 0; $i < count($tags_array); $i++) {
    
                $tags_array_new[] = trim($tags_array[$i]);
            }
    
            $tags_array_new = array_values(array_unique($tags_array_new));
    
            for ($i = 0; $i < count($tags_array_new); $i++) {
    
                $tag = new Tag();
                $tag->post_id = $ai_id;
                $tag->tag_name = trim($tags_array_new[$i]);
                $tag->save();
            }
        }
      

        if($request->subscriber_send_option == 1){
                   
            $subject = 'A New Post Is Published';
            $message = 'Hi : A New Post Is Published Into Our Website. Please Go To See That Post <br>';
            $message .= '<a target="_blank" href="'.route('news_detail', $ai_id).'">';
            $message .= $request->post_title;
            $message .= '</a>';

            $subscribers = Subscriber::where('status', 'Active')->get();
            foreach($subscribers as $row){
                \Mail::To($row->email)->send(new WebsiteMail($subject, $message));
            }
            
        }

        return redirect()->route('admin_post_show')->with('success', 'Post Created successfully.');
    }

    public function post_edit($id)
    {
        $sub_categories = SubCategory::with('rCategory')->get();
        $post_single = Post::where('id', $id)->first();
        $existing_tags = Tag::where('post_id', $id)->get();
        return view('Admin.post_edit', compact('post_single', 'sub_categories', 'existing_tags'));
    }


    public function post_update(Request $request, $id)
    {
        $request->validate([
            'post_title' => 'required|',
            'post_detail' => 'required|',
        ]);

        $post = Post::where('id', $id)->first();

        if ($request->hasFile('post_photo')) {

            $request->validate([

                'post_photo' => 'image|mimes:jpg,png,jpeg,gif'
            ]);

            unlink(public_path('uploads/' . $post->post_photo));

            $now = time();

            $ext = $request->file('post_photo')->extension();
            $final_name = 'post_photo_' . $now . '.' . $ext;
            $request->file('post_photo')->move(public_path('uploads/'), $final_name);

            $post->post_photo = $final_name;
        }


        $post->sub_category_id = $request->sub_category_id;
        $post->post_title = $request->post_title;
        $post->post_detail = $request->post_detail;
        $post->visitors = 1;
        $post->author_id = 0;
        $post->admin_id = Auth::guard('admin')->user()->id;
        $post->is_share = $request->is_share;
        $post->is_comment = $request->is_comment;

        $post->update();

        if ($request->tags != ''){
            $tags_array = explode(',', $request->tags);
            for ($i = 0; $i < count($tags_array); $i++) {
    
                $total = Tag::where('post_id', $id)->where('tag_name', trim($tags_array[$i]))->count();
                if (!$total) {
                    $tag = new Tag();
                    $tag->post_id = $id;
                    $tag->tag_name = trim($tags_array[$i]);
                    $tag->save();
                }
            }
        }

      

        return redirect()->route('admin_post_show')->with('success', 'Post Updated Successfully.');
    }

    public function tag_delete($id, $id1)
    {

        $tag = Tag::where('id', $id)->first();
        $tag->delete();

        return redirect()->route('admin_post_edit', $id1)->with('success', 'tag deleted successfully.');
    }

    public function post_delete($id)
    {
        $post = Post::where('id', $id)->first();
        unlink(public_path('uploads/' . $post->post_photo));
        $post->delete();

       Tag::where('post_id',$id)->delete();
        
        return redirect()->route('admin_post_show')->with('success', 'Post deleted Successfully.');

    }
}
