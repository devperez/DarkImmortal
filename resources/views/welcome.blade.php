
@extends('layouts.menu')

@section('content')
@php
// For 1.3+:
@require_once('php/autoloader.php');
 
// We'll process this feed with all of the default options.
$feed = new SimplePie();
 
// Set the feed to process.
$feed->set_feed_url('https://www.metalorgie.com/feed/news');
 
// Run SimplePie.
$feed->init();
 
// This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
$feed->handle_content_type();
@endphp

<div class="container-fluid" style="margin-bottom:15px">
    <div class="row grid gap-4"  style="margin-bottom:15px; justify-content:center;">
    @foreach($posts as $post)
        <div class="col-md-3 col-xs-3 col-sm-3 mb-3">
            <div class="card h-100">
                <div class="card-image">
                    <a href="{{ route('groupe', $post->id) }}"><img src="{{ asset('storage/images/'.$post->image) }}" class="card-image" /></a>
                </div>
                <div class="card-text">
                    <span class="date">publié le {{ $post->created_at->format('d/m/Y à H:i:s') }}</span>
                    <h2>{{ $post->groupe }}</h2>
                    @if($post->morceau)
                        <p>{{ $post->morceau }}</p>
                    @else
                    <p>{{ $post->album }}</p>
                    @endif
                    <p>{!! $post->very_short_description !!}</p>
                </div>
                <div class="card-stats">
                    <div class="stat">
                        <p>Publié dans {{ $post->genre }}</p>
                        <!-- <div class="value">4<sup>m</sup></div>
                        <div class="type">Lire</div>
                    </div>
                    <div class="stat border">
                        <div class="value">5123</div>
                        <div class="type">views</div>
                    </div>
                    <div class="stat">
                        <div class="value">32</div>
                        <div class="type">comments</div> -->
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div style="display:flex; justify-content:center; margin-top:50px;">
        {{ $posts->links() }}
    </div>
    <hr>
    <h3>{{ $feed->get_title() }}</h3>

    <footer id="slideshow">

	    
	<!--	Here, we'll loop through all of the items in the feed, and $item represents the current item in the loop.-->
	
	    @foreach ($feed->get_items() as $item)
        @php 
        $text = str_replace('nbsp;', " ", $item->get_title());
        $link = str_replace('nbsp;', " ", $item->get_permalink());
        $text = str_replace('&amp;', " ", $text);
        $link = str_replace('&amp;', " ", $link);

        @endphp
		    <div class="item">
                <div class="head">
			        <h2><a class="permalink" href="$link"> {{ $text }}</a></h2>
                </div>
                    <!-- <p>{!! $item->get_description() !!}</p> -->
			    <p><small>Posted on {{ $item->get_date('j F Y | g:i a') }}</small></p>
		    </div>
 
	    @endforeach
    </footer>
<div>

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->

<script>
    
    $(document).ready(function() {
        $("#slideshow > div:gt(0)").hide();

    setInterval(function() { 
    $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
    }, 8000);
});    
</script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
