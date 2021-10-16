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
        $posts = Post::where('draft','=','off')->latest()->paginate(10);
        
        // dd($posts);
        return view('back.touslesposts', compact('posts'))->with(request()->input('page'));
    }

    public function home()
    {
        try{
            $posts = Post::latest('id')->first();
            //$posts = $posts[1];
            $post = json_decode(json_encode($posts), false);
            //dd($post);
            return view('back.home', compact('post'));
        }catch (\Exception $e){
            return view('auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.write');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        if ($request->draft) 
        {
            $post = Post::create($request->all());

            // $file = $request->file('image');
            // $extention = $file->getClientOriginalExtension();
            // $filename = time().'.'.$extention;
            // $file->move('storage/images/', $filename);

            // $file2 = $request->file('couv');
            // $extention2 = $file2->getClientOriginalExtension();
            // $filename2 = time(). '.' .$extention2;
            // $file2->move('storage/images/couv', $filename2);

            // Post::create([
            //     'groupe'=>$request->groupe,
            //     'pays'=>$request->pays,
            //     'morceau'=>$request->morceau,
            //     'album'=>$request->album,
            //     'article'=>$request->article,
            //     'genre'=>$request->genre,
            //     'clip'=>$request->clip,
            //     'image'=>$filename,
            //     'couv'=>$filename2,
            //     'paroles'=>$request->paroles,
            //     'draft'=>$request->draft,
            //]);
        }else{
            $request->validate([
                'groupe'=>'required|max:255',
                'pays'=>'required|max:255',
                'article'=>'required',
                'album'=>'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
                'couv' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            ]);
// dd('coucou');
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('storage/images/', $filename);
// dd($filename);
                $file2 = $request->file('couv');
                $extention2 = $file2->getClientOriginalExtension();
                $filename2 = time(). '.' .$extention2;
                $file2->move('storage/images/couv', $filename2);

            Post::create([
                'groupe'=>$request->groupe,
                'pays'=>$request->pays,
                'morceau'=>$request->morceau,
                'album'=>$request->album,
                'article'=>$request->article,
                'genre'=>$request->genre,
                'clip'=>$request->clip,
                'image'=>$filename,
                'couv'=>$filename2,
                'paroles'=>$request->paroles,
                'draft'=>$request->draft,
            ]);
        }

        $posts = Post::where('draft', '=', 'off')->latest()->simplePaginate(10);
        //dd($posts);
        return view('back.touslesposts', compact('posts'))->with(request()->input('page'));
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
        //dd($request->has('draft'));
        if($request->has('draft'))
        {
            //dd($request);
            $post = Post::find($id);
            //dd($post);
            
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
                $post->morceau = $request->morceau;
                $post->album = $request->album;
                $post->genre = $request->genre;
                $post->article = $request->article;
                $post->image = $filename;
                $post->clip = $request->clip;
                $post->couv = $filename2;
                $post->paroles = $request->paroles;
                $post->draft = 'on';
                $post->save();

            }elseif ($request->hasFile('image')) {

                $file = $request->file('image');
                //dd($file);
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('storage/images/', $filename);

                $post = Post::find($id);
                $post->groupe =  $request->groupe;
                $post->pays = $request->pays;
                $post->morceau = $request->morceau;
                $post->album = $request->album;
                $post->genre = $request->genre;
                $post->article = $request->article;
                $post->clip = $request->clip;
                $post->image = $filename;
                $post->paroles = $request->paroles;
                $post->draft = 'on';

                $post->save();


            }else if ($request->hasFile('couv'))
            {
                $file2 = $request->file('couv');
                $extention2 = $file2->getClientOriginalExtension();
                $filename2 = time().'.'.$extention2;
                $file2 ->move('storage/images/couv/', $filename2);

                $post = Post::find($id);
                $post->groupe =  $request->groupe;
                $post->pays = $request->pays;
                $post->morceau = $request->morceau;
                $post->album = $request->album;
                $post->genre = $request->genre;
                $post->article = $request->article;
                $post->clip = $request->clip;
                $post->couv = $filename2;
                $post->paroles = $request->paroles;
                $post->draft = 'on';

                $post->save();

            }else {
                $post = Post::find($id);
                $post->groupe =  $request->groupe;
                $post->pays = $request->pays;
                $post->morceau = $request->morceau;
                $post->album = $request->album;
                $post->genre = $request->genre;
                $post->article = $request->article;
                $post->clip = $request->clip;
                $post->paroles = $request->paroles;
                $post->draft = 'on';

                $post->save();
            }


        }else{
            $request->validate([
                'groupe'=>'required',
                'pays'=>'required',
                'morceau'=>'required',
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
                $post->morceau = $request->morceau;
                $post->album = $request->album;
                $post->genre = $request->genre;
                $post->article = $request->article;
                $post->image = $filename;
                $post->clip = $request->clip;
                $post->couv = $filename2;
                $post->paroles = $request->paroles;
                $post->draft = 'off';

                $post->save();

            }elseif ($request->hasFile('image')) {

                $file = $request->file('image');
                //dd($file);
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('storage/images/', $filename);

                $post = Post::find($id);
                $post->groupe =  $request->groupe;
                $post->pays = $request->pays;
                $post->morceau = $request->morceau;
                $post->album = $request->album;
                $post->genre = $request->genre;
                $post->article = $request->article;
                $post->clip = $request->clip;
                $post->image = $filename;
                $post->paroles = $request->paroles;
                $post->draft = 'off';

                $post->save();


            }else if ($request->hasFile('couv'))
            {
                $file2 = $request->file('couv');
                $extention2 = $file2->getClientOriginalExtension();
                $filename2 = time().'.'.$extention2;
                $file2 ->move('storage/images/couv/', $filename2);

                $post = Post::find($id);
                $post->groupe =  $request->groupe;
                $post->pays = $request->pays;
                $post->morceau = $request->morceau;
                $post->album = $request->album;
                $post->genre = $request->genre;
                $post->article = $request->article;
                $post->clip = $request->clip;
                $post->couv = $filename2;
                $post->paroles = $request->paroles;
                $post->draft = 'off';

                $post->save();

            }else {
                $post = Post::find($id);
                $post->groupe =  $request->groupe;
                $post->pays = $request->pays;
                $post->morceau = $request->morceau;
                $post->album = $request->album;
                $post->genre = $request->genre;
                $post->article = $request->article;
                $post->clip = $request->clip;
                $post->paroles = $request->paroles;
                $post->draft = 'off';

                $post->save();
            }
        }
        $posts = Post::latest('id')->first();
        //$posts = $posts[1];
        $post = json_decode(json_encode($posts), false);
        //dd($post);
        return view('back.home', compact('post'));
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

    public function draft()
    {
        $posts = Post::where('draft', '=', 'on')->latest()->simplePaginate(10);

        return view('back.draft', compact('posts'));
    }
}
