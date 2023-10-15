@extends('layouts.app')

@section('title', 'Registrar Usuario')

@section('content')

    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/register.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    </head>

    <body>

        <div class="contenido_login">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <img class="logo" src="images/logo-sistemas.png" style="max-width: 90%;">
                    </div>
                    <h2 class="fw-bold universidad">UNIVERSIDAD PERUANA UNIÓN CAMPUS JULIACA</h2>
                    <h2 class="fw-bold universidad">INGENIERÍA DE SISTEMAS</h2>
                    <!-- Register-->
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>Ya existe un registro con ese email.</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <input type="text" placeholder="Nombre" id="name" name="name" class="form-control"
                            required>
                        <input type="text" placeholder="Correo" id="email" name="email" class="form-control"
                            required>
                        <input type="password" placeholder="Contraseña" id="password" name="password" class="form-control"
                            required>
                        @error('password')
                            <p>* Las contraseñas no coinciden.</p>
                        @enderror
                        <input type="password" placeholder="Confirmar Contraseña" id="password_confirmation"
                            name="password_confirmation" class="form-control" required>
                        <button type="submit" class="boton_registrar"> Registrar </button>
                    </form>
                    <a href="{{ route('users.index') }}" class="boton_cancelar"><button type="submit"
                            class="boton_salir">Cancelar</button></a>
                </div>
            </div>
        </div>
    </body>


@endsection
