<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

 // Rutas de gestión de usuarios y departamentos (CRUD)
 Route::resource('departamentos', DepartamentoController::class);
 Route::resource('usuarios', UsuarioController::class);

 // Rutas para restaurar usuarios y departamentos eliminados suavemente
 Route::post('/usuarios/{usuario}/restore', [UsuarioController::class, 'restore'])->name('usuarios.restore');
 Route::post('/departamentos/{departamento}/restore', [DepartamentoController::class, 'restore'])->name('departamentos.restore');

// Redirigir siempre a la lista de usuarios y departamentos
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/departamentos', [DepartamentoController::class, 'index'])->name('departamentos.index');
