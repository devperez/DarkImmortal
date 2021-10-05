<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        
        // dd($posts);
        return view('back.touslesposts', compact('posts'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'groupe'=>'required|max:255',
            'pays'=>'required|max:255',
            'article'=>'required',
            'album'=>'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'couv' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

            if ($request->metal)
            {
                $metal = 1;
            }else{
                $metal = 0;
            }
        
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/images/', $filename);
//dd($filename);
            $file2 = $request->file('couv');
            $extention2 = $file2->getClientOriginalExtension();
            $filename2 = time(). '.' .$extention2;
            $file2->move('storage/images/couv', $filename2);

            Post::create([
                'groupe'=>$request->groupe,
                'pays'=>$request->pays,
                'titre'=>$request->titre,
                'morceau'=>$request->titre,
                'album'=>$request->album,
                'article'=>$request->article,
                'genre'=>$request->genre,
                'clip'=>$request->clip,
                'image'=>$filename,
                'couv'=>$filename2,
                'metal'=>$metal,
            ]);
        
        
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
        $post = Post::findOrFail($id);
        return view('back.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        //dd($post);
        return view('back.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $request->validate([
            'groupe'=>'required',
            'pays'=>'required',
            'titre'=>'required',
            'album'=>'required',
            'genre'=>'required',
            'article'=>'required',
        ]);
        // dd($request->clip);
        if ($request->hasFile('image') && $request->hasFile('couv'))
        {
            $file = $request->file('image');
            //dd($file);
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/images/', $filename);

            $file2 = $request->file('couv');
            $extention2 = $file2->getClientOriginalExtension();
            $filename2 = time().'.'.$extention2;
            $file2 ->move('storage/images/couv/', $filename2);

            $post = Post::find($id);
            $post->groupe =  $request->groupe;
            $post->pays = $request->pays;
            $post->titre = $request->titre;
            $post->morceau = $request->titre;
            $post->album = $request->album;
            $post->genre = $request->genre;
            $post->article = $request->article;
            $post->image = $filename;
            $post->clip = $request->clip;
            $post->couv = $filename2;
            $post->save();

            return redirect()->back();

        }elseif ($request->hasFile('image')) {

            $file = $request->file('image');
            //dd($file);
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('storage/images/', $filename);

            $post = Post::find($id);
            $post->groupe =  $request->groupe;
            $post->pays = $request->pays;
            $post->titre = $request->titre;
            $post->morceau = $request->titre;
            $post->album = $request->album;
            $post->genre = $request->genre;
            $post->article = $request->article;
            $post->clip = $request->clip;
            $post->image = $filename;
            $post->save();
        
            return redirect()->back();

        }else if ($request->hasFile('couv'))
        {
            $file2 = $request->file('couv');
            $extention2 = $file2->getClientOriginalExtension();
            $filename2 = time().'.'.$extention2;
            $file2 ->move('storage/images/couv/', $filename2);

            $post = Post::find($id);
            $post->groupe =  $request->groupe;
            $post->pays = $request->pays;
            $post->titre = $request->titre;
            $post->morceau = $request->titre;
            $post->album = $request->album;
            $post->genre = $request->genre;
            $post->article = $request->article;
            $post->clip = $request->clip;
            $post->couv = $filename2;
            $post->save();
        
        return redirect()->back();
        }else {
            $post = Post::find($id);
            $post->groupe =  $request->groupe;
            $post->pays = $request->pays;
            $post->titre = $request->titre;
            $post->morceau = $request->titre;
            $post->album = $request->album;
            $post->genre = $request->genre;
            $post->article = $request->article;
            $post->clip = $request->clip;
            $post->save();

            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //delete the post
        $post = Post::findOrFail($id);
         //dd($user);
        $post->delete();

        //redirect and message
        return redirect()->back()->with('success', 'L\'utilisateur a été supprimé avec succès.');
    }
}
