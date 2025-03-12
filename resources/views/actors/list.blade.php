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
    <div class="container mt-4 ">
        <h1 class="text-center">{{$title}}</h1>

        @if(empty($actors))
            <div class="alert alert-danger text-center" role="alert">
                No se ha encontrado ningun Actor
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Birthdate</th>
                            <th>Country</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($actors as $actor)
                            <tr>
                                <td>{{$actor->name}}</td>
                                <td>{{$actor->surname}}</td>
                                <td>{{$actor->birthdate}}</td>
                                <td>{{$actor->country}}</td>
                                <td>
                                    <img src="{{$actor->img_url}}" class="img-fluid" style="width: 200px; height: 120px;" />
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