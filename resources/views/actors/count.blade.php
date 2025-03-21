@include('master.header')

<div class="text-center">
    <h1>{{$title}}</h1>
</div>

@if(empty($actors))
    <FONT COLOR="red">No se ha encontrado ningun actor</FONT>
@else
    <div class="text-center mx-auto">
        <h2>Contador de actores: {{$contador}}</h2>
    </div>
@endif
@include('master.footer');