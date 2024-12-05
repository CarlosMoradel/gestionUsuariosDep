@extends('layouts.app')
@section('title', 'Gestión de Usuarios y Departamentos')
@section('content')
    <div class="container">
        <div class="text-center mt-5">
            <h1 class="display-4 text-primary mb-4">Bienvenido a mi CRUD</h1>

            <!-- Contenedor de botones -->
            <div class="btn-container">
                <a href="{{ route('usuarios.index') }}" class="btn btn-lg btn-primary btn-custom">Gestionar Usuarios</a>
                <a href="{{ route('departamentos.index') }}" class="btn btn-lg btn-secondary btn-custom">Gestionar Departamentos</a>
            </div>
            </form>
        </div>
    </div>

    <style>
        body {
            background-color: #f8f9fa; /* Fondo suave */
        }

        h1 {
            font-family: 'Roboto', sans-serif;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 20px;
        }

        .btn-custom {
            width: 220px;
            height: 65px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #007;
            border-color: #007;
            font-size: 1.3rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .btn-secondary {
            background-color: #28a745;
            border-color: #28a745;
            font-size: 1.1rem;
        }

        .btn-secondary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-danger {
            font-size: 1.1rem;
            padding: 10px 20px;
            border-radius: 30px;
        }

        .btn-danger:hover {
            background-color: #dc3545;
        }

        .container {
            margin-top: 150px;
        }

        /* Animaciones de botones */
        .btn-custom:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        /* Sombras sutiles */
        .display-4 {
            color: #007;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Estilos del navbar */
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection
