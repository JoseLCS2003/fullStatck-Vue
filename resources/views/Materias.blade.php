<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Materias</title>
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
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-journal"></i> Materias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/profesor')}}"><i class="bi bi-person"></i> Profesores</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1 class="text-center">Tabla Materias</h1>

        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Unidades</th>
                    <th>Ver Profesores Asignados</th>
                    <th colspan="3" class="text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                
                <tr v-for="materia in materias" :key="materia.id">
                    <td>{{materia.id}}</td>
                    <td>{{materia.nombre}}</td>
                    <td>{{materia.unidades}}</td>
                    <td>
                        <a href="{{url('verProfesores',$materia->id)}}" class="btn btn-outline-info"><i class="bi bi-person-lines-fill"></i> Profesores</a>
                    </td>
                    <td><a href="{{url('materia/modificar' ,$materia->id)}}" class="btn btn-outline-warning"><i class="bi bi-pencil-square"></i> Modificar</a>
                    </td>
                    <td>
                        <form method="post" action="{{url('materia/eliminar' ,$materia->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger"><i class="bi bi-journal-x"></i> Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{url('profesor/nuevo', $materia->id)}}" class="btn btn-outline-primary"><i class="bi bi-person-plus"></i> Agregar profesor</a>
                    </td>
                    <td>
                        @empty
                    <td colspan="7">
                        <div class="alert alert-danger fade show" role="alert">
                            <h1 class="text-center"><i class="bi bi-exclamation-circle"></i> no hay materias</h1>
                        </div>
                    </td>
                    </td>
                </tr>
                
            </tbody>
        </table>
        <a href="{{url('materia/nueva')}}" class="btn btn-outline-success"><i class="bi bi-journal-plus"></i> Agregar Materia</a>
    </div>
</body>

</html>