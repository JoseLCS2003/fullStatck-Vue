<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
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
                    <ul class="navbar-nav justify-content-end pe-4">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{url('/materia')}}"><i class="bi bi-journal"></i> Materias</a>
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
        @isset($materia)
        <h1 class="text-center">Editar Materia</h1>
        @else
        <h1 class="text-center">Nueva Materia</h1>
        @endisset
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="" method="post">
            @isset($materia)
            @method("PUT")
            @else
            @method("POST")
            @endisset
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nombre</span>
                <input type="text" name="nombre" @isset($materia) value="{{$materia->nombre}}" value="{{old('nombre')}}" @endisset class="form-control @error('nombre') is-invalid @enderror" placeholder="Ingrese el Nombre">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Unidades</span>
                <input type="text" name="unidades" @isset($materia) value="{{$materia->unidades}}" @else value="{{old('unidades')}}" @endisset class="form-control @error('unidades') is-invalid @enderror" placeholder="Ingrese el numero de Unidades">
            </div>
            <button type="submit" class="btn btn-outline-success">Guardar</button>
        </form>
    </div>
</body>

</html>