<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

@include('master.header');

<div class="text-center">
    <h1>{{$title}}</h1>
</div>

@if(empty($actors))
    <FONT COLOR="red">No se ha encontrado ningun Actor</FONT>
@else
    <div class="text-center mx-auto">
        <h2>Contador de Actores: {{$contador}}</h2>
    </div>
@endif
@include('master.footer');
