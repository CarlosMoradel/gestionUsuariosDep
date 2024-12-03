@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crear Departamento</h2>
        
        <form action="{{ route('departamentos.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Crear Departamento</button>
        </form>
    </div>
@endsection