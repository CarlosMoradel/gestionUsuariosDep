@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Departamento</h2>
        
        <form action="{{ route('departamentos.update', $departamento) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $departamento->nombre) }}" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ old('descripcion', $departamento->descripcion) }}</textarea>
            </div>

            <button type="submit" class="btn btn-warning">Actualizar Departamento</button>
        </form>
    </div>
@endsection