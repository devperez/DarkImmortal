<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
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
        $posts = Post::latest()->paginate(10);

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
        //dd($request);
        $request->validate([
            'groupe'=>'required|max:255',
            'pays'=>'required|max:255',
        ]);

//         if ($request->hasFile('image')) {
//             //  Let's do everything here
//             if ($request->file('image')->isValid()) {
//                 //
//                 $validated = $request->validate([
//                     'name' => 'string',
//                     'image' => 'mimes:jpeg,png',
//                 ]);
//                 $extension = $request->image->extension();
//                 $request->image->storeAs('/public', $validated['name'].".".$extension);
//                 $url = Storage::url($validated['name'].".".$extension);
//                 $file = File::create([
//                     'name' => $validated['name'],
//                     'url' => $url,
//         ]);
//         Session::flash('success', "Success!");
//         return redirect()->back();
//     }
// }
// abort(500, 'Could not upload image :(');


        Post::create([
            'groupe'=>$request->groupe,
            'pays'=>$request->pays,
            'titre'=>$request->titre,
            'morceau'=>$request->titre,
            'album'=>$request->album,
            'article'=>$request->post,
            'genre'=>$request->genre,
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
        //dd($post['article']);
        $article=strip_tags($post['article']);
        //dd($post);
        return view('back.show', compact('post', 'article'));
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
        $request->validate([
            'groupe'=>'required',
            'pays'=>'required',
            'titre'=>'required',
            'album'=>'required',
            'genre'=>'required',
            'article'=>'required',
        ]);

        Post::where('id',$id)->update([
            'groupe'=>$request->groupe,
            'pays'=>$request->pays,
            'titre'=>$request->titre,
            'album'=>$request->album,
            'genre'=>$request->genre,
            'article'=>$request->article,
            'image'=>$request->image,
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
