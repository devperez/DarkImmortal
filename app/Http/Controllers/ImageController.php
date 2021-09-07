<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ImageController extends Controller
{
    public function upload(Request $request){
        dd($request);
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                //
                $validated = $request->validate([
                    'name' => 'string|max:40',
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);
                $extension = $request->image->extension();
                $request->image->storeAs('/public', $validated['name'].".".$extension);
                $url = Storage::url($validated['name'].".".$extension);
                $file = Image::create([
                    'name' => $validated['name'],
                    'url' => $url,
                ]);
                Session::flash('success', "Success!");
                return \Redirect::back();
            }
        }
        abort(500, 'Could not upload image :(');
    }

    public function viewUploads () {
        $images = Image::all();
        return view('view_uploads')->with('images', $images);
    }

    }
