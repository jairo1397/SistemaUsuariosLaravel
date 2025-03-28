@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-6">
        <div class="card shadow-lg">
            <div class="card-header text-center bg-success text-white">
                <h4>Registro de Usuario</h4>
            </div>
            <div class="card-body">
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form action="{{ url('/register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" name="name" id="name" 
                               class="form-control @error('name') is-invalid @enderror" 
                               placeholder="Ingrese su nombre" required value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" name="email" id="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               placeholder="Ingrese su correo" required value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" id="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               placeholder="Ingrese su contraseña" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" 
                               class="form-control" placeholder="Repita su contraseña" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Rol</label>
                        <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrador</option>
                            <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Estudiante</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success w-100">Registrarse</button>
                </form>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="text-decoration-none">¿Ya tienes cuenta? Inicia sesión</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection