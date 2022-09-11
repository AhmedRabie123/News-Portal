<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisement;
use App\Models\Setting;
use App\Models\Post;
use App\Models\Admin;
use App\Models\SubCategory;
use App\Models\Video;

class HomeController extends Controller
{
   public function index()
   {

       $home_ad_data = HomeAdvertisement::where('id', 1)->first();
       $setting_data = Setting::where('id', 1)->first();
       $post_data = Post::with('rSubCategory')->orderBy('id', 'desc')->get();
       $sub_category_data = SubCategory::with('rPost')->orderBy('sub_category_order', 'asc')->where('show_on_home', 'Show')->get();
       $videos = Video::orderBy('id', 'desc');
       return view('Front.home', compact('home_ad_data','setting_data','post_data','sub_category_data','videos'));

   }
}
