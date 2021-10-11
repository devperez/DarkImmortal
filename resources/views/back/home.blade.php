@extends('back.layout')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">Écrire un nouvel article</h5>
          </div>
          <div class="card-body">
            <h5 class="card-title">Écrire un article</h5>

            <p class="card-text">
              Pour écrire un nouvel article, ça se passe ici.
            </p>

            <a href="{{route('posts.create') }}" class="btn btn-primary">Écrire</a>
              <!--<a href="#" class="card-link">Another link</a>-->
          </div>
        </div>

        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">Retrouver tous les posts</h5>
          </div>
          <div class="card-body">
            <h5 class="card-title">Chercher</h5>

            <p class="card-text">
              Pour trouver un post, c'est par ici.
            </p>
            <a href="#" class="btn btn-primary">Rechercher un post</a>
              <!-- <a href="#" class="card-link">Another link</a>-->
          </div>
        </div><!-- /.card -->
      </div>
          <!-- /.col-md-6 -->
      <div class="col-lg-6">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">Poster un clip</h5>
          </div>
          <div class="card-body">
            <h6 class="card-title">Poster un clip vidéo</h6>

            <p class="card-text">Pour poster un clip vidéo, clique sur le bouton.</p>
              <a href="#" class="btn btn-primary">Poster un clip</a>
          </div>
        </div>

        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">Iconographie</h5>
          </div>
          <div class="card-body">
            <h6 class="card-title">Poster une image</h6>

            <p class="card-text">Pour poster une illustration, c'est par ici.</p>
              <a href="#" class="btn btn-primary">Poster une image</a>
          </div>
        </div>
      </div>
          <!-- /.col-md-6 -->
    </div>
        <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
    <!-- /.content -->
  <!--</div> -->
  <!-- /.content-wrapper -->

  <div class="container">
    <p>Dernier post en date :</p>
    <table class="table table-bordered">
      <tr>
        <th>Groupe</th>
        <th>Genre</th>
        <th>Morceau</th>
        <th>Paroles</th>
        <th>Image</th>
        <th>Clip</th>
    </tr>
    
        <tr>
            <td>{{ $post->groupe }}</td>
            <td>{{ $post->genre }}</td>
            <td>{{ $post->morceau }}</td>
            @if( $post->paroles != '')
            <td>
                <i class="far fa-check-square"></i>
            </td>
            @else
            <td></td>
            @endif
            </td>
            <td><img style="width:75px; margin-bottom:5px" src="{{ asset('storage/images/'.$post->image) }}" /><br />
            @isset($post->couv)
                <img style="width:100px" src=" {{ asset('storage/images/couv/'.$post->couv) }}" />
                @endisset
            </td>
            @if($post->clip != '')
            <td><i class="far fa-check-square"></i></td>
            @else
            <td></td>
            @endif
        </tr>
    
  </table>
</div>
@endsection
