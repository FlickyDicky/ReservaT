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

Route::get('/regsitro', [ClienteController::class, 'create'])->name('registro.usuario');

Route::post('/registro-empresa', [EmpresaController::class, 'store'])->name('registrar_empresa');

Route::get('/registro-empresa', [EmpresaController::class, 'create'])->name('registro.empresa');

Route::get('/principal', function () {
    return view('principal');
})->name('principal');

Route::post('/conectar', [LoginController::class, 'login'])->name('conectar');

Route::get('/mostrar_datos', [LoginController::class, 'mostrar_bienvenida'])->name('mostrar_datos');

Route::get('/desconectar', [LoginController::class, 'logout'])->name('desconectar');

Route::get('/perfil', [ClienteController::class, 'mostrar_perfil'])->name('mostrar_perfil'); //muestra la vista

Route::get('/editar_perfil', [ClienteController::class, 'editar_perfil'])->name('editar_perfil');

Route::post('/update', [ClienteController::class, 'update'])->name('update');









