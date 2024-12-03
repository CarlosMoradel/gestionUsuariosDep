@extends('layouts.app')
@section('title','Gestiones de Usuarios y Departamentos')
@section('content')
<div class="container">
    <div class="text-center">
        <h1>Bienvenido a mi CRUD</h1>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <div class="mt-5">
                        <a href="{{ route('usuarios.index') }}" class="btn btn-primary">Gestionar Usuarios</a>
                        <a href="{{ route('departamentos.index') }}" class="btn btn-secondary">Gestionar Departamentos</a>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                            @csrf  <!-- Token CSRF obligatorio -->
                            <button type="submit" class="btn btn-danger btn-sm">Cerrar Sesión</button>
                    </form>
                </div>
            </nav>
        </h1>             
    </div>
</div>
@endsection

