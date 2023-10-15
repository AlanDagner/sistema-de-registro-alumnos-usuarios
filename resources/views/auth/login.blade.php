@extends('layouts/app')

@section('title', 'Login')

@section('content')

    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    </head>

    <body>
        <div class="contenido_login">
            <div class="container">
                <div class="row">
                    <div>
                        <a href="{{ route('alumnos.index') }}" class="boton_back"><i class="fa fa-arrow-left"
                                aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="col">
                        <img class="logo" src="images/logo-sistemas.png"style="max-width: 80%;">
                    </div>
                    <h2 class="fw-bold universidad">UNIVERSIDAD PERUANA UNIÓN <br> CAMPUS JULIACA</h2>
                    <h2 class="fw-bold universidad">INGENIERÍA DE SISTEMAS</h2>
                    <!-- Login-->
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-4">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Usuario"
                                required>
                        </div>
                        <div class="mb-4">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Contraseña" required>
                            @error('message')
                                <p>* {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="d-grid">

                            <button type="submit" class="boton_inicio"> <i class="fa fa-sign-in fa-1g"
                                    aria-hidden="true"></i>Iniciar Sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

@endsection
