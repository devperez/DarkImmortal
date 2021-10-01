@extends('layouts.menu')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="{{ asset('css/layout.css') }}" rel="stylesheet">




<div class="container">
    <form method="GET" action="'{{ route('searchband') }}'">
        <input class="container" name="band" id="band" placeholder="Tapez le nom du groupe que vous souhaitez rechercher" />
        <!--<input class="btn btn-primary mt-2 float-right" type="submit" value="Lancer la recherche" class="btn btn-primary"/>-->
    </form>
    @isset($posts)
    @foreach ($posts as $post)
    <p>{{ $post->groupe }}</p>
    @endforeach
    @endisset
</div>
<br />
<div id="success" class="mt-8">

</div>






<script>
    $(document).ready(function () {
        $("#band").keyup(function(){
            $('#success').html('');
            var groupe = $(this).val();
            if (groupe != ""){
                $.ajax({
                    type:"GET",
                    url:"{{ route('searchband') }}",
                    data:'band='+ encodeURIComponent(groupe),
                    success: function(data){
                        if(data != ""){
                            $('#success').append(data);
                        }else{
                            document.getElementById('fail').css('display','block');
                        }
                    }
                });
            }
        });
    });

//
    //         var formData = {
    //             band: $("#band").val(),
    //             _token: $('input[name="_token"]').val(),
    //         };
    //         console.log(formData);
    //         $.ajax({
    //             type:"GET",
    //             url:'{{ route('searchband') }}',
    //             data: formData,
    //             dataType:"html",
    //             // encode:true,
    //         }).done(function (data) {
    //             $('#band').val('');
    //             $('#success').html(data);
    //         }).fail(function () {
    //             $('#fail').css('display','block');
    //             setTimeout(function(){$('#fail').fadeOut()},5000);
    //         })
    //     });
    // });
</script>

@endsection
