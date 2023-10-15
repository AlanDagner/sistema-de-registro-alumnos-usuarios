@extends('layouts/template')

@section('title', 'Registrar Alumno')

@section('content')


    <body>
        <main>
            <div class="container py-4">
                <h2>Registar Alumno</h2>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>Ya existe un registro con ese codigo o email.</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ url('alumnos') }}" method="post">

                    @csrf

                    <div class="mb-3 row">
                        <label for="codigo" class="col-sm-2 col-form-label"><b>Código:</b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="codigo" id="codigo"
                                value="{{ old('codigo') }}" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nombre" class="col-sm-2 col-form-label"><b>Nombre Completo:</b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                value="{{ old('nombre') }}" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="fecha" class="col-sm-2 col-form-label"><b>Fecha de nacimiento:</b></label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" name="fecha" id="fecha"
                                value="{{ old('fecha') }}" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="telefono" class="col-sm-2 col-form-label"><b>Teléfono:</b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="telefono" id="telefono"
                                value="{{ old('telefono') }}" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label"><b>Email:</b></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="email" id="email"
                                value="{{ old('email') }}" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="ciclo" class="col-sm-2 col-form-label"><b>Ciclo:</b></label>
                        <div class="col-sm-5">
                            <select name="ciclo" id="ciclo" class="form-select" required>
                                <option value="">Seleccionar ciclo</option>
                                @foreach ($ciclos as $ciclo)
                                    <option value="{{ $ciclo->id }}">{{ $ciclo->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <a href="{{ url('alumnos') }}" class="btn btn-danger"><b><i class="fa fa-chevron-left"
                                aria-hidden="true"></i>
                            Regresar</b></a>
                    <button type="submit" class="btn btn-success" id="btn_guardar"><b><i class="fa fa-floppy-o"
                                aria-hidden="true"></i>
                            Guardar</b></button>

                </form>
            </div>
        </main>
    </body>

@endsection
