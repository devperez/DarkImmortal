<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DarkImmortal</title>
        <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nosifer&family=Roboto&display=swap" rel="stylesheet">   

    </head>
    <body>
        <div class="sitename">
            <h1>DARKIMMORTAL</h1>
        </div>
        <nav>
            <ul class="liwrapper">
                <li><a href="{{ route('groupes') }}">Groupes</a></li>
                <li><a href="#">Sons</a></li>
                <li><a href="#">Clips</a></li>
                <li><a href="#">Iconographies</a></li>
                <li><a href="{{ route('about') }}">À propos</a></li>
            </ul>
        </nav>
        <div class='container'>
            @yield('content')
        </div>
        
    </body>
</html>