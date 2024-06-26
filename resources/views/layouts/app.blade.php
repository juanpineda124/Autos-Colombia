<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{ asset('images/logo.jpg') }}" type="image/jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AUTOS COLOMBIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #aed9e0; /* Cambia el color de fondo según tus preferencias */
        }
        .container{
            margin-top: 50px;
            margin-bottom: 50px;
            background-color: #6e91b8;
        }
        .contenedor {
            text-align: center; /* Para centrar la imagen horizontalmente */
        }
        .contenedor img {
            width: 50%; /* Establece el tamaño de la imagen al 50% del contenedor */
            display: block; /* Esto ayuda a centrar verticalmente la imagen */
            margin: 0 auto; /* Centra la imagen horizontalmente */
        }
        .margin {
            margin-left: 25px; 
            margin-right: 25px; 
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('celdas.index') }}">{{ __('Celda') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('entradas.index') }}">{{ __('Entrada') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('salidas.index') }}">{{ __('Salida') }}</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users.index') }}">{{ __('Empleados') }}</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('pagos.index') }}">{{ __('Pagos') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </div>
</body>
</html>
