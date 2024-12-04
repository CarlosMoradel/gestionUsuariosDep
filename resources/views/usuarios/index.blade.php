@extends('layouts.app')
@section('title', 'Lista de Usuarios')
@section('content')
    <div class="container">
        <h2>Lista de Usuarios</h2>

        <a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-3">Crear Usuario</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Departamento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->correo }}</td>
                        <td>{{ $usuario->telefono }}</td>
                        <td>{{ $usuario->direccion }}</td>
                        <td>{{ $usuario->departamento->nombre }}</td>
                        <<td>
    <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-warning">Editar</a>
    @if($usuario->trashed())
        <form action="{{ route('usuarios.restore', $usuario) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-success">Restaurar</button>
        </form>
    @else
        <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    @endif
</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $usuarios->links() }}
        </div>
    </div>
@endsection
