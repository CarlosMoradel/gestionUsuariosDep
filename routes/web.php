<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('departamentos', DepartamentoController::class);
Route::resource('usuarios', UsuarioController::class);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Rutas protegidas por autenticación

Route::middleware('auth')->group(function () {
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/dashboard', function () {
        return view('dashboard'); // Vista del dashboard
    })->name('dashboard');
});

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/departamentos', [DepartamentoController::class, 'index'])->name('departamentos.index'); // Esta es la ruta correcta
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');