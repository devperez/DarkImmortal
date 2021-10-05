<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DarkImmortal</title>
        <link href="{{ asset('css/Hover-master/css/hover.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nosifer&family=Roboto&display=swap" rel="stylesheet">   

    </head>
    <body>
        <div class="sitename">
            <h1 class="hvr-underline-from-center" style="font-size:3rem;">DARKIMMORTAL</h1>
        </div>
        <nav>
            <ul class="liwrapper">
                @if (Request::path() == 'divers')
                <li><a href="{{ route('divers') }}">Groupes</a></li>
                @else
                <li><a href="{{ route('groupes') }}">Groupes</a></li>
                @endif
                <li><a href="{{ route('search') }}">Chercher un groupe</a></li>
                @if (Request::path() == 'groupes')
                <!-- <li><a href="{{ route('divers') }}">Passer à la partie non Metal</a></li> -->
                @elseif (Request::path() == 'divers')
                <!-- <li><a href="{{ route('groupes') }}">Passer à la partie Metal</a></li> -->
                @endif
                <li><a href="#">Roulette russe</a></li>
                <li><a href="{{ route('about') }}">À propos</a></li>
            </ul>
        </nav>
            @yield('content')        
    </body>
</html>