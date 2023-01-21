<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Profesores</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <h1 class="navbar-brand">Materias-Profesor</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Ir a...</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end pe-4">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('/materia')}}"><i class="bi bi-journal"></i> Materias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{url('/profesor')}}"><i class="bi bi-person"></i> Profesores</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        @isset($profesores)
        <h1 class="text-center">Tabla Profesores</h1>
        <table class="table table-striped align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Materia Asginada</th>
                    <th colspan="2" class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($profesores as $profesor)
                <tr>
                    <td>{{$profesor->id}}</td>
                    <td>{{$profesor->nombre}}</td>
                    <td>{{$profesor->apPaterno}} {{$profesor->apMaterno}}</td>
                    <td>{{$profesor->telefono}}</td>
                    <td>{{$profesor->correo}}</td>
                    <td>{{$profesor->materias}}</td>
                    <td><a href="{{url('profesor/modificar' ,$profesor->id)}}" class="btn btn-outline-warning"><i class="bi bi-person-fill-gear"></i> Modificar</a>
                    </td>
                    <td>
                        <form method="post" action="{{url('profesor/eliminar' ,$profesor->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger"><i class="bi bi-person-x"></i> Eliminar</button>
                        </form>
                    </td>
                    @empty
                    <td colspan="8">
                        <div class="alert alert-danger fade show" role="alert">
                            <h1 class="text-center"><i class="bi bi-exclamation-circle"></i> no hay profesores</h1>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{url('profesor/nueva')}}" class="btn btn-outline-success"><i class="bi bi-person-plus"></i> Agregar Profesor</a>
        @else
        <div class="row">
            <div class="col-1">
                <a href="{{url('materia')}}" class="btn btn-outline-secondary mt-2">Regresar</a>
            </div>
            <div class="col-11">
                <h1 class="text-center">Profesores asignados a: @isset($materia) {{$materia->nombre}} @endisset</h1>
            </div>
        </div>
        <table class="table table-striped align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <tbody>
                @isset($materiaProfesor)
                @forelse ($materiaProfesor as $profesorM)
                <tr>
                    <td>{{$profesorM->id}}</td>
                    <td>{{$profesorM->nombre}}</td>
                    <td>{{$profesorM->apPaterno}} {{$profesorM->apMaterno}}</td>
                    <td>{{$profesorM->telefono}}</td>
                    <td>{{$profesorM->correo}}</td>
                    @empty
                    <td colspan="5">
                        <div class="alert alert-danger fade show" role="alert">
                            <h1><i class="bi bi-exclamation-circle"></i> no se ha asignado a un profesor</h1>
                        </div>
                    </td>
                </tr>
                @endforelse
                @endisset
            </tbody>
        </table>
        @endisset
    </div>
</body>

</html>