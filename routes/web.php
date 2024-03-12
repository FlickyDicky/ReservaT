<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ServicioController;

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



Route::post('/update', [ClienteController::class, 'update'])->name('update');

Route::get('/upload-profile-photo', function () {
    return view('foto');
})->name('upload.profile.photo');

Route::post('/post-photo', [ClienteController::class, 'uploadProfilePhoto'])->name('upload.photo');

//Mostrar y editar el perfil
Route::get('/perfil', [PerfilController::class, 'create'])->name('mostrar_perfil'); //muestra la vista del perfil

Route::get('/editar_perfil', [PerfilController::class, 'show_update'])->name('edicion_perfil');

Route::post('/editar_perfil', [PerfilController::class, 'update'])->name('editar_perfil');

Route::post('/delete', [PerfilController::class, 'delete'])->name('eliminar_perfil');

//Gestión de servicios
Route::get('/servicios', [ServicioController::class, 'create'])->name('servicios');

Route::get('/new_servicio', [ServicioController::class, 'new_servicio'])->name('new_servicio');

Route::post('/create_servicio', [ServicioController::class, 'create_servicio'])->name('create_servicio');

Route::get('/update_servicio', [ServicioController::class, 'update'])->name('update_servicio');

Route::post('/update_servicio', [ServicioController::class, 'update_servicio'])->name('editar_servicio');

Route::post('/delete_servicio', [ServicioController::class, 'delete'])->name('delete_servicio');

