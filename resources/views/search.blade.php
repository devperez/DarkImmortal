@extends('layouts.menu')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="{{ asset('css/layout.css') }}" rel="stylesheet">




<div class="container">
    <form method="GET" action="'{{ route('searchband') }}'">
        @csrf
        <input class="container" name="band" id="band" placeholder="Tapez le nom du groupe que vous souhaitez rechercher" />
        <input class="btn btn-primary mt-2 float-right" type="submit" value="Lancer la recherche" class="btn btn-primary"/>
    </form>
</div>

<div id="success" style="display:none" class="container">

<h1>{{ $groupe ?? '' }}</h1>
<h2>{{ $album ?? '' }}</h2>

</div>

<div id="fail" style="display:none">
    <p>Désolé, ce groupe ou cet artiste ne figure pas sur le site.</p>
</div>




<script>
    $(document).ready(function () {
        $("form").submit(function(event) {
            event.preventDefault();

            var formData = {
                band: $("#band").val(),
                _token: $('input[name="_token"]').val(),
            };
            console.log(formData);
            $.ajax({
                type:"GET",
                url:'{{ route('searchband') }}',
                data: formData,
                dataType:"json",
                encode:true,
            }).done(function () {
                $('#band').val('');
                $('#success').css('display','block');
                $('#success').append('Articles disponibles' + formData);
            }).fail(function () {
                $('#fail').css('display','block');
                setTimeout(function(){$('#fail').fadeOut()},5000);
            })
        });
    });
</script>

@endsection
