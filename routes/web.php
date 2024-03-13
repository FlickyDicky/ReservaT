<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProfileController;
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

Route::get('/register', [UserController::class, 'create'])->name('register.create');

Route::post('/register', [UserController::class, 'store'])->name('register.store');

Route::post('/register-company', [EmpresaController::class, 'store'])->name('company.store');

Route::get('/register-company', [EmpresaController::class, 'create'])->name('company.create');

Route::get('/login', [AuthController::class, 'create'])->name('login.create');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/upload-profile-photo', function () {
    return view('foto');
})->name('photo.create');

Route::post('/post-photo', [UserController::class, 'uploadProfilePhoto'])->name('photo.upload');

//Mostrar y editar el perfil
Route::get('/profile/{user}', [ProfileController::class, 'create'])->name('profile.create')->middleware('auth'); //muestra la vista del perfil

Route::post('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth'); //actualiza el perfil

Route::post('/delete', [ProfileController::class, 'destroy'])->name('eliminar_perfil');

//Gestión de servicios
Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.index');

Route::get('/new-servicio', function (){
    return view('form-servicio');
})->name('servicios.form.create');

Route::post('/create_servicio', [ServicioController::class, 'create'])->name('servicios.create');

Route::get('/update-servicio/{servicio}', function($servicio){
    return view('update-servicio', ['servicio' => $servicio]);
})->name('servicios.form.update');

Route::post('/update-servicio/{servicio}', [ServicioController::class, 'update'])->name('servicios.update');

Route::post('/delete-servicio/{servicio}', [ServicioController::class, 'destroy'])->name('servicios.destroy');

