<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmpresaController;

// ...


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', function () {
    return view('components.login');
})->name('login');

Route::post('/registro', [ClienteController::class, 'store'])->name('registrar_usuario');

Route::get('/registro', [ClienteController::class, 'create'])->name('registro.usuario');

Route::post('/registro-empresa', [EmpresaController::class, 'store'])->name('registrar_empresa');

Route::get('/registro-empresa', [EmpresaController::class, 'create'])->name('registro.empresa');

Route::post('/conectar', [LoginController::class, 'login'])->name('conectar');

Route::get('/mostrar_datos', [LoginController::class, 'mostrar_datos'])->name('mostrar_datos');

Route::get('/desconectar', [LoginController::class, 'logout'])->name('desconectar');

Route::get('/perfil', [LoginController::class, 'mostrar_perfil'])->name('mostrar_perfil'); //muestra la vista

Route::get('/editar_perfil', [ClienteController::class, 'editar_perfil'])->name('editar_perfil');

Route::post('/update', [ClienteController::class, 'update'])->name('update');

Route::get('/upload-profile-photo', function () {
    return view('foto');
})->name('upload.profile.photo');

Route::post('/post-photo', [ClienteController::class, 'uploadProfilePhoto'])->name('upload.photo');

