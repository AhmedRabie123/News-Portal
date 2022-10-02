<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Helper\Helpers;

class VideoController extends Controller
{
    public function index()
    {
        Helpers::read_json();

        $videos = Video::orderBy('id', 'desc')->paginate(8);
        return view('Front.video_gallery', compact('videos'));

    }
}
