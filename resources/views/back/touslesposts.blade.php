@extends('back.layout')

@section('content')

<table class="table table-bordered">
    <tr>
        <th>Groupe</th>
        <th>Pays</th>
        <th>Genre</th>
        <th>Article</th>
        <th>Image</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($posts as $post)
        <tr>
            <td>{{ $post->groupe }}</td>
            <td>{{ $post->pays }}</td>
            <td>{{ $post->genre }}</td>
            <td>{{ $post->article }}</td>
            <td><img src="$imgs->url" /></td>
        <td>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
            <a class="btn btn-info" href="{{ route('posts.show', $post->id) }}">Voir</a>
            <a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}">Éditer</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </td>

    </tr>
    @endforeach
</table>
{{ $posts->links() }}
@endsection