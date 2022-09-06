<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisement;
use App\Models\Setting;
use App\Models\Post;


class HomeController extends Controller
{
   public function index()
   {

       $home_ad_data = HomeAdvertisement::where('id', 1)->first();
       $setting_data = Setting::where('id', 1)->first();
       $post_data = Post::orderBy('id', 'desc')->get();
       return view('Front.home', compact('home_ad_data','setting_data','post_data'));

   }
}
