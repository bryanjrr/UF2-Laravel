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
            <input type="text" id="genre" name="genre " class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">País</label>
            <input type="text" id="country" name="country" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duración</label>
            <input type="text" id="duration" name="durat
                ion" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label">Imagen URL</label>
            <input type="url" id="image_url" name="image_url" class="form-control">
        </div> <button type="submit" class="btn btn-primary">Enviar</button>
    </form>



    <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Include any additional HTML or Blade directives here -->
    @include('master.footer')

</body>

</html>