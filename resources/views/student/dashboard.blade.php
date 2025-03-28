@extends('layouts.app')

@section('title', 'Dashboard Estudiante')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h3 class="mb-0">Panel de Estudiante</h3>
        </div>
        <div class="card-body">
            <h4>Bienvenido, {{ Auth::user()->name }}</h4>
            <p class="text-muted">Eres un <strong>Estudiante</strong></p>

            <p>Tu información:</p>
            <ul class="list-group">
                <li class="list-group-item"><strong>Nombre:</strong> {{ Auth::user()->name }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ Auth::user()->email }}</li>
            </ul>

            <form action="{{ route('logout.student') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger mt-3">Cerrar Sesión</button>
            </form>
        </div>
    </div>
</div>
@endsection