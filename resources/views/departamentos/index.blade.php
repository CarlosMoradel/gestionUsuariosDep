@extends('layouts.app')
@section('title','Lista de Departamentos')
@section('content')
    <div class="container">
        <h2>Lista de Departamentos</h2>

        <a href="{{ route('departamentos.create') }}" class="btn btn-primary mb-3">Crear Departamento</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departamentos as $departamento)
                    <tr>
                        <td>{{ $departamento->nombre }}</td>
                        <td>{{ $departamento->descripcion }}</td>
                        <td>
                            <a href="{{ route('departamentos.edit', $departamento) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('departamentos.destroy', $departamento) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $departamentos->links() }}
        </div>
    </div>
@endsection