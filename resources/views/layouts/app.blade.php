<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Sistema de Usuarios</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-danger">Cerrar Sesión</button>
                            </form>
                        </li>
                    @else
                    @if (request()->routeIs('login.admin.view'))
                        <li class="nav-item">
                            
                                <a class="nav-link" href="{{ route('login.student') }}">Login Estudiante</a>
                        </li>
                    @elseif (request()->routeIs('login.student.view'))
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('login.admin') }}">Login Administrador</a>
                        </li>
                            @else
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('login.admin') }}">Login Administrador</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('login.student') }}">Login Estudiante</a>
                        </li>
                            @endif
                        </li>
                        @if (!request()->routeIs('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>