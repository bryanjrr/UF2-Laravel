<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>

    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Include any additional stylesheets or scripts here -->
</head>

<body class="container">

    @include('master.header')

    <h1 class="mt-4">Lista de Peliculas</h1>
    <ul>
        <li><a href=/filmout/oldFilms>Pelis antiguas</a></li>
        <li><a href=/filmout/newFilms>Pelis nuevas</a></li>
        <li><a href=/filmout/films>Pelis</a></li>
        <li><a href=/filmout/filmsByYear>PelisPorAño</a></li>
        <li><a href=/filmout/filmsByGenre>PelisPorGenero</a></li>
        <li><a href=/filmout/sortFilms>Ordenar Descentemente</a></li>
        <li><a href=/filmout/countFilm>Contar Peliculas</a></li>
    </ul>

    <h1 class="mt-4">Lista de Actores</h1>
    <li><a href=/actorout/listActors>Actores</a></li>
    <li><a href=/actorout/countActors>Contar Actores</a></li>

    <h1 class="mt-4">Buscar Actores por Criterio</h1>
    <p>Decada de nacimiento</p>

    <form action="{{ route('listByDecade') }}" method="GET">
        @csrf
        <select name="year" id="">
            <option value="1980-1989">1980-1989</option>
            <option value="1990-1999">1990-1999</option>
            <option value="2000-2009">2000-2009</option>
            <option value="2010-2019">2010-2019</option>
            <option value="2020-2029">2020-2029</option>
        </select>
        </div> <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <h1 class="mt-4">Crear una Pelicula</h1>
    <form action="{{ route('createFilm') }}" method="POST">
        @csrf <!-- Protege el formulario contra ataques CSRF -->
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Año</label>
            <input type="number" id="year" name="year" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Género</label>
            <select name="genre" id="" class="form-control" required>
                <option value="thriller">thriller</option>
                <option value="action">action</option>
                <option value="drama">drama</option>
                <option value="love ">love </option>
            </select>
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">País</label>
            <input type="text" id="country" name="country" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duración</label>
            <input type="text" id="duration" name="duration" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label">Imagen URL</label>
            <input type="text" id="image_url" name="image_url" class="form-control">
        </div> <button type="submit" class="btn btn-primary">Enviar</button>
        <div class="mb-3">
            <label for="genre" class="form-label">Donde quieres insertar?</label>
            <select name="subida" id="" class="form-control" required>
                <option value="json">json</option>
                <option value="bbdd">bbdd</option>
            </select>
        </div>
        @if ($errors->has('errors'))
            <div>{{$errors->first('errors')}}</div>
        @endif


    </form>



    <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Include any additional HTML or Blade directives here -->
    @include('master.footer')

</body>

</html>