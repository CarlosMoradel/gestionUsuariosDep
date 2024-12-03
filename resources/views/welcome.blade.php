@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>Bienvenido al Dashboard</h1>
    </div>
    <div class="mt-5">
        <a href="{{ route('usuarios.index') }}" class="btn btn-primary">Gestionar Usuarios</a>
        <a href="{{ route('departamentos.index') }}" class="btn btn-secondary">Gestionar Departamentos</a>
    </div>
</div>
@endsection