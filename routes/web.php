<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicioController;
use App\Models\Servicio;

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
//registro de usuarios
Route::get('/register', [UserController::class, 'create'])->name('register.create');

Route::post('/register', [UserController::class, 'store'])->name('register.store');
//registro de empresas
Route::post('/register-company', [EmpresaController::class, 'store'])->name('company.store');

Route::get('/register-company', [EmpresaController::class, 'create'])->name('company.create');
//inicio y cierre de sesión
Route::get('/login', [AuthController::class, 'create'])->name('login.create');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
//carga de fotos
Route::get('/upload-profile-photo', function () {
    return view('foto');
})->name('photo.create');

Route::post('/post-photo', [UserController::class, 'uploadProfilePhoto'])->name('photo.upload');

//Mostrar y editar el perfil
Route::get('/profile/{user}', function($user){
    $user = Auth::user();
    return view('editar-perfil', ['user' => $user]);
})->name('profile.create'); //muestra la vista del perfil

Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update'); //actualiza el perfil

Route::post('/delete', [ProfileController::class, 'destroy'])->name('eliminar_perfil');

//Gestión de servicios
Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.index'); //muestra los servicios

Route::get('/new-servicio', [ServicioController::class, 'create'])->name('servicios.form.create'); //muestra el formulario para crear un servicio

// Route::get('/create_servicio', [ServicioController::class, 'create'])->name('servicios.create'); //crea un servicio

Route::post('/new-servicio', [ServicioController::class, 'store'])->name('servicios.store'); //guarda el servicio

Route::get('/update-servicio/{servicio}', [ServicioController::class, 'edit'])->name('servicios.form.update');


Route::post('/update-servicio/{servicio}', [ServicioController::class, 'update'])->name('servicios.update');

Route::post('/delete-servicio/{servicio}', [ServicioController::class, 'destroy'])->name('servicios.destroy');

//Reserva

Route::get('/reserva', [ReservaController::class, 'index'])->name('reservas.index'); //muestra el Reserva

Route::post('/mostrar-Reserva', [ReservaController::class, 'show'])->name('reservas.show'); //guarda el Reserva

Route::post('/delete-reserva/{reserva}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
