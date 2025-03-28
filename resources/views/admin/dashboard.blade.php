
@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Panel de Administrador</h3>
        </div>
        <div class="card-body">
            <h4>Bienvenido, {{ Auth::user()->name }}</h4>
            <p class="text-muted">Eres un <strong>Administrador</strong></p>

            <h5>Lista de Usuarios Registrados</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <form action="{{ route('logout.admin') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger mt-3">Cerrar Sesión</button>
            </form>
        </div>
    </div>
</div>
@endsection