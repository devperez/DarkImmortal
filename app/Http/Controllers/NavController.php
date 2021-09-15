<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class NavController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function groupes()
    {
        $posts = Post::latest()->paginate(10);
        
        return view('welcome', compact('posts'))->with(request()->input('page'));
    }
}
