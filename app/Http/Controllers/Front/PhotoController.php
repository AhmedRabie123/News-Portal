<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Helper\Helpers;

class PhotoController extends Controller
{
   public function index()
    {
        Helpers::read_json();

        $photos = Photo::orderBy('id', 'desc')->paginate(8);
        return view('Front.photo_gallery', compact('photos'));

    }
}
