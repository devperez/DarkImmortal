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
        $posts = Post::where('draft', '=', 'off')->latest()->simplePaginate(6);
        //dd($posts);
        return view('welcome', compact('posts'))->with(request()->input('page'));
        
    }

    public function show($id)
    {
        $post = Post::find($id);
        $clip = $post->clip;
        $genre = $post->genre;
        $paroles = $post->paroles;
        //dd($genre);
        $alikes = Post::where('genre', "=", $genre)->take(3)->get();
        

        return view('groupe', compact('post', 'clip', 'paroles', 'alikes'));
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

    public function random()
    {
        $post = Post::all()->random(1)->first();
        // dd($post);
        return view('random', compact('post'));
    }

    public function black()
    {
        $posts = Post::where('genre','like','Black Metal')->simplePaginate(6);

        return view('black', compact('posts'));
    }

    public function death()
    {
        $posts = Post::where('genre','like','Death Metal')->simplePaginate(6);

        return view('death', compact('posts'));
    }

    public function doom()
    {
        $posts = Post::where('genre','=','Doom Metal')->simplepaginate(6);
        return view('doom', compact('posts'));
    }

    public function autre()
    {
        $posts = Post::where('genre','=','Autre')->simplepaginate(6);
        return view('autre', compact('posts'));
    }
}       
