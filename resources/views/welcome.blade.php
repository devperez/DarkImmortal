
@extends('layouts.menu')

@section('content')

@php
// For 1.3+:
@require_once('php/autoloader.php');
 
// We'll process this feed with all of the default options.
$feed = new SimplePie();
 
// Set the feed to process.
$feed->set_feed_url('https://www.metalorgie.com/feed/news');

//Set the duration of the cache
$feed->set_cache_duration(60);

// Run SimplePie.
$feed->init();

// Create a new array to hold data in
$new = array();
 
// Loop through all of the items in the feed
foreach ($feed->get_items() as $item) {
 
	// Calculate 48 hours ago
	$daybeforeyesterday = time() - (48*60*60);
 
	// Compare the timestamp of the feed item with 48 hours ago.
	if ($item->get_date('U') > $daybeforeyesterday) {
 
		// If the item was posted within the last 48 hours, store the item in our array we set up.
		$new[] = $item;
	}
}

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
    <div class="footerwrapper row">
        <h3 style="color:white; padding-left:10px;">{{ $feed->get_title() }}</h3>

        <footer id="slideshow" class="col-sm-12 col-lg-6">

	    
	<!--	Here, we'll loop through all of the items in the array of the feed, and $item represents the current item in the loop.-->
	
	    @foreach ($new as $item)
        @php 
        $text = str_replace('nbsp;', " ", $item->get_title());
        $link = str_replace('nbsp;', " ", $item->get_permalink());
        $text = str_replace('&amp;', " ", $text);
        $text = str_replace('amp;', " ", $text);
        $link = str_replace('amp;', " ", $link);
        $link = str_replace('&amp;', " ", $link);
        $text = str_replace('&quot;', " ", $text);
        $link = str_replace('&quot;', " ", $link);

        @endphp
		    <div class="item col-sm-12 col-lg-6">
                <div class="head">
			        <p><a class="permalink" href="{{ $link }}" target="_blank"> {{ $text }}</a></p>
                </div>
			    <p><small>Posté le {{ $item->get_date('j M Y | g:i a') }}</small></p>
		    </div>
 
	    @endforeach
        </footer>
    </div>
<div>

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->

<script>
    
    $(document).ready(function() {
        $("#slideshow > div:gt(0)").hide();

    setInterval(function() { 
    $('#slideshow > div:first')
    .fadeOut(1)
    .next()
    .fadeIn(1)
    .end()
    .appendTo('#slideshow');
    }, 8000);
});    
</script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<link href="{{ asset('css/layout.css') }}" rel="stylesheet">
