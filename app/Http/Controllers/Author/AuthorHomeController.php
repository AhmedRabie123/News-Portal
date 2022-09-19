<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorHomeController extends Controller
{
    public function index()
    {
       return view('Author.home');
    }
}
