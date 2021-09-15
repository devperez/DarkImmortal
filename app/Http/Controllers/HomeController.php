<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        
        return view('welcome', compact('posts'))->with(request()->input('page'));
    }

    public function article()
    {
        return view('back.write');
    }
}
