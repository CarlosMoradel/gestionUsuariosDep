<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Rutas públicas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    // Ruta para el dashboard (inicio después de login)
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
});

 // Rutas de gestión de usuarios y departamentos (CRUD)
 Route::resource('departamentos', DepartamentoController::class);
 Route::resource('usuarios', UsuarioController::class);

 // Rutas para restaurar usuarios y departamentos eliminados suavemente
 Route::post('/usuarios/{usuario}/restore', [UsuarioController::class, 'restore'])->name('usuarios.restore');
 Route::post('/departamentos/{departamento}/restore', [DepartamentoController::class, 'restore'])->name('departamentos.restore');

// Redirigir siempre a la lista de usuarios y departamentos
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/departamentos', [DepartamentoController::class, 'index'])->name('departamentos.index');
