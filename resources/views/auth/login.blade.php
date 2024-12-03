@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card" style="width: 400px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
        <div class="card-header bg-dark text-white text-center" style="border-radius: 10px 10px 0 0;">
            <h3>Iniciar Sesión</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresa tu correo" required>
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Ingresa tu contraseña" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Recordarme</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
            </form>
        </div>
        <div class="card-footer text-center">
            <p class="mb-0">¿No tienes una cuenta? <a href="{{ route('usuarios.create') }}">Regístrate</a></p>
        </div>
    </div>
</div>
@endsection