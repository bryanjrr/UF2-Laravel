<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Películas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    @include('master.header')
    <div class="container mt-4 " >
        <h1 class="text-center">{{$title}}</h1>

        @if(empty($films))
            <div class="alert alert-danger text-center" role="alert">
                No se ha encontrado ninguna película
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead class="thead-dark">
                        <tr>
                            @foreach($films as $film)
                                @foreach(array_keys($film) as $key)
                                    <th>{{$key}}</th>
                                @endforeach
                                @break
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($films as $film)
                            <tr>
                                <td>{{$film['name']}}</td>
                                <td>{{$film['year']}}</td>
                                <td>{{$film['genre']}}</td>
                                <td>{{$film['country']}}</td>
                                <td>{{$film['duration']}}</td>
                                <td>
                                    <img src="{{$film['img_url']}}" class="img-fluid" style="width: 100px; height: 120px;" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    @include('master.footer')
</body>
</html>
