<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChangePasswordController;




Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('auth')
    ->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');
Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');
Route::post('/login', [SessionsController::class, 'store'])
    ->name('login.store');
Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');

Route::get('/', [AlumnoController::class, 'index'])
    ->name('alumnos.index');

Route::resource('/alumnos', AlumnoController::class);

Route::get('/users', [UserController::class, 'index'])
    ->middleware('auth')
    ->name('users.index');

Route::resource('/users', UserController::class)
    ->middleware('auth');

Route::get('/cambiar-contrasena', [ChangePasswordController::class, 'showChangePasswordForm'])
    ->middleware('auth')
    ->name('changeme.showChangePasswordForm');

Route::post('/cambiar-contrasena', [ChangePasswordController::class, 'changePassword'])
    ->middleware('auth')
    ->name('changeme.changePassword');

Route::get('/usuarios/{id}/cambiar-contrasena', [UserController::class, 'cambiarContrasena'])
    ->middleware('auth')
    ->name('usuarios.cambiarContrasena');
Route::put('/usuarios/{id}/actualizar-contrasena', [UserController::class, 'actualizarContrasena'])
    ->middleware('auth')
    ->name('usuarios.actualizarContrasena');
