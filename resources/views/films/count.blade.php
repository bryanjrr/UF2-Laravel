<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

@include('master.header');

<div class="text-center">
    <h1>{{$title}}</h1>
</div>

@if(empty($films))
    <FONT COLOR="red">No se ha encontrado ninguna película</FONT>
@else
    <div class="text-center mx-auto">
        <h2>Contador de peliculas: {{$contador}}</h2>
    </div>
@endif
@include('master.footer');
