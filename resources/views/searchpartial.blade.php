<div class='container-fluid'>
    <div class="row grid gap-4">
    
    @foreach($posts as $post)
        <div class="col-md-4 col-xs-4 col-sm-4 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <div class="pull-left">
                        <h4 class="grid-title">{{ $post->groupe }}</h4>
                    </div>
                    <a href="{{ route('groupe', $post->id) }}"><img src="{{ asset('storage/images/'.$post->image) }}" class="card-img-top" /></a>
                </div>
                <div class="card-body">
                    <h5 class="card-subtitle mb-2 text-muted">{{ $post->titre }}</h5>
                    <p class="card-text">{!! $post->short_description !!}</p>
                </div>
                <div class="card-footer">
                    <button onclick="location.href='{{ route('groupe', $post->id) }}'" class="btn btn-primary">Lire plus</button>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>



