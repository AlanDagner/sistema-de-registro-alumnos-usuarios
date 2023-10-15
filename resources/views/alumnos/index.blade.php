@extends('layouts/template')

@section('title', 'Alumnos | Sistemas')

@section('content')



    <body>
        <main>
            <div class="container py-4">
                <h2>Listado de alumnos de la EP Ingeniería de Sistemas <img src="{{ asset('images/logo-sistemas.png') }}"
                        alt="Logo" style="max-width: 15%;"></h2>
                @if (auth()->check())
                    <a href="{{ url('alumnos/create') }}" class="btn btn-primary btn" style="float: left; margin:5px;"><b><i
                                class="fa fa-plus-circle" style="font-size: 20px" aria-hidden="true"></i>
                            Agregar
                            Alumno</b></a>
                    <a href="{{ url('/users') }}" class="btn btn-dark btn" style="float: left; margin:5px;"><b><i
                                class="fa fa-users" aria-hidden="true"></i>
                            Usuarios</b></a>
                    <a id="change-password-link" href="{{ route('changeme.showChangePasswordForm') }}" class="btn btn-info"
                        style="float: right;">
                        <b><i class="fa fa-lock" aria-hidden="true"></i> Cambiar Contraseña</b>
                    </a>
                @endif
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Fecha Nacimiento</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Ciclo</th>
                            @if (auth()->check())
                                <th></th>
                                <th></th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumnos as $alumno)
                            <tr>
                                <td>{{ $alumno->id }}</td>
                                <td>{{ $alumno->codigo }}</td>
                                <td>{{ $alumno->nombre }}</td>
                                <td>{{ $alumno->fecha_nacimiento }}</td>
                                <td>{{ $alumno->telefono }}</td>
                                <td>{{ $alumno->email }}</td>
                                <td>{{ $alumno->ciclo->nombre }}</td>
                                @if (auth()->check())
                                    <td><a href="{{ url('alumnos/' . $alumno->id . '/edit') }}"
                                            class="btn btn-warning btn-sm"><b><i class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i>
                                                Editar</b></a>
                                    </td>
                                    <td>
                                        <form action="{{ url('alumnos/' . $alumno->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"><b><i class="fa fa-trash"
                                                        aria-hidden="true"></i>
                                                    Eliminar</b></button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </main>

    </body>

@endsection
