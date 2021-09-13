<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ImageController extends Controller
{
    public function display(Request $request){
    
        $imgs = Image::all();

        return view('touslesposts', compact('imgs'));
    
    
    }

    public function viewUploads () {
        $images = Image::all();
        return view('view_uploads')->with('images', $images);
    }

    }
