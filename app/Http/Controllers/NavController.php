<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function groupes()
    {
        return view('welcome');
    }
}
