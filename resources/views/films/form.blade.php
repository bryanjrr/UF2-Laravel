<h1>{{$title}}</h1>

@if(empty($films))
    <FONT COLOR="red">No se ha encontrado ninguna película</FONT>
@else
    <div align="center">
{{--   <h2>Contador de peliculas: {{$contador}}</h2>
 --}}
    <form action="{{ route('films.registrarFilm') }}" method="POST" enctype="multipart/form-data">>
     </form>
</div>
@endif