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

Route::post('/post-photo', [ProfileController::class, 'uploadProfilePhoto'])->name('photo.upload');

//Mostrar y editar el perfil
Route::get('/profile/{user}', function($user){
    $user = Auth::user();
    return view('editar-perfil', ['user' => $user]);
})->name('profile.create'); //muestra la vista del perfil

Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update'); //actualiza el perfil

Route::post('/delete', [ProfileController::class, 'destroy'])->name('profile.destroy'); //borra el perfil

//Gestión de servicios
Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.index');

Route::get('/reservas', [ServicioController::class, 'index'])->name('reservas.index');

Route::get('/new-servicio', [ServicioController::class, 'create'])->name('servicios.create');

// Route to render the edit servicio view
Route::get('/update-servicio/{servicio}', [ServicioController::class, 'edit'])->name('servicios.edit');

// Route to handle the update request
Route::put('/servicios/{servicio}', [ServicioController::class, 'update'])->name('servicios.update');

Route::post('/store-servicio', [ServicioController::class, 'store'])->name('servicios.store');

Route::delete('/delete-servicio/{servicio}', [ServicioController::class, 'destroy'])->name('servicios.destroy');

