@extends('layouts/template')

@section('title', 'Usuarios')

@section('content')

    <body>

        <main>
            <div class="container py-4">
                <h2>Listado de usuarios del sistema<img src="{{ asset('images/logo-sistemas.png') }}" alt="Logo"
                        style="max-width: 15%;"></h2>

                @if (auth()->check())
                    <a class="btn btn-primary btn" href="{{ route('register.index') }}"><b><i class="fa fa-plus-circle"
                                style="font-size: 20px" aria-hidden="true"></i>
                            Agregar
                            usuario</b></a>
                    <a href="{{ url('/alumnos') }}" class="btn btn-dark btn"><b><i class="fa fa-users"
                                aria-hidden="true"></i>
                            Alumnos</b></a>
                    <a id="change-password-link" href="{{ route('changeme.showChangePasswordForm') }}" class="btn btn-info"
                        style="float: right;">
                        <b><i class="fa fa-lock" aria-hidden="true"></i> Cambiar Contraseña</b>
                    </a>
                @endif

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Contraseña</th>
                            <th>Fecha de creación</th>
                            <th>Fecha de Actualización</th>
                            @if (auth()->check())
                                <th></th>
                                <th></th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->password }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                @if (auth()->check())
                                    <td><a href="{{ url('users/' . $user->id . '/edit') }}"
                                            class="btn btn-warning btn-sm"><b><i class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i>
                                                Editar</b></a>
                                    </td>
                                    <td>
                                        <form action="{{ url('users/' . $user->id) }}" method="post">
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
