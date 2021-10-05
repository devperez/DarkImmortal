<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;


class NavController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function groupes()
    {
        $posts = Post::where('metal','=',1)->latest()->simplePaginate(8);
        
        return view('welcome', compact('posts'))->with(request()->input('page'));
        
    }

    public function show($id)
    {
        $post = Post::find($id);
        $clip = $post->clip;
        return view('groupe', compact('post', 'clip'));
    }

    public function liste($groupe)
    {
        //dd($groupe);
        $posts = Post::where('groupe','=', $groupe)->get();
        // dd($liste);
        
        return view('liste', compact('groupe','posts'));
    }

    public function index()
    {
        return view('search');
    }

    public function search( Request $request)
    {
        $band = $request->band;
        //dd($band);
        $posts = Post::where('groupe', 'like',"%{$band}%")->limit(10)->get();
        // dd($posts);
        return view("searchpartial", compact('posts'));
    }

    public function divers()
    {
        $posts = Post::where('metal','=',0)->latest()->paginate(6);
        return view('divers', compact('posts'));
    }
}       
