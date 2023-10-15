<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') </title>
    <link rel="icon" href="{{ asset('images/logo-sistemas.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav class="navbar bg-body-tertiary pt-0 navbar-expand-lg">
        @if (auth()->check())
            <div class="container-fluid" style="background-color: blue">
                <p class="navbar-brand" style="color: white;"><b>UPEU - JULIACA</b></a>
                <div>
                    <style>
                        /* Estilo base para el enlace */
                        .user {
                            color: blue;
                            text-decoration: none;
                            background: white;
                            padding: 10px;
                            border-radius: 5px;
                        }

                        /* Estilo para el enlace cuando el cursor está sobre él (hover) */
                        .user:hover {
                            color: white;
                            background: blue;
                            border: 2px solid white;
                        }
                    </style>
                </div>
                <div>
                    <a
                        style="color: white; border: 2px solid white; padding: 10px;border-radius: 5px; margin-right: 10px""><b><i
                                class="fa fa-user-circle-o" aria-hidden="true"
                                style="margin-right: 5px; font-size: 25px"></i>
                            {{ auth()->user()->name }}</b></a>
                    <a href="{{ route('login.destroy') }}" class="btn btn-danger"><b><i class="fa fa-sign-out"
                                aria-hidden="true" style="font-size: 20px"></i>
                            Cerrar Sesión</b></a>
                </div>
            </div>
        @else
            <div class="container-fluid" style="background-color: blue;">
                <p class="navbar-brand" style="color: white"><b>UPEU - JULIACA</b></a>
                <div>
                    <a class="sesion" href="{{ route('login.index') }}"><b><i class="fa fa-sign-in fa-1g"
                                aria-hidden="true" style="margin-right: 10px; font-size: 20px"></i>Iniciar
                            Sesión</b></a>
                    <style>
                        /* Estilo base para el enlace */
                        .sesion {
                            color: blue;
                            text-decoration: none;
                            background: white;
                            padding: 8px;
                            border-radius: 5px;
                        }

                        /* Estilo para el enlace cuando el cursor está sobre él (hover) */
                        .sesion:hover {
                            color: white;
                            background: blue;
                            border: 2px solid white;
                        }
                    </style>
                </div>
            </div>
        @endif

    </nav>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
