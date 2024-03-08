<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;

// ...

Route::post('/logout', function (Request $request) {
    $request->session()->flush();
    return redirect('/login');
})->name('logout');
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

Route::get('/home', function () {
    return view('welcome');
})->name('welcome');

Route::post('/login', function () {
    $loginComponent = new \App\View\Components\Login(); // Create a new instance of the Login component
    return $loginComponent->login(request());// Call the login method of the component
})->name('login');

Route::post('/registro', function () {
    $registroComponent = new \App\View\Components\Registro(); // Create a new instance of the Registro component
    return $registroComponent->register(request());// Call the register method of the component
})->name('registro');

Route::get('/registro', function () {
    return view('components.registro');
})->name('registroForm');

Route::get('/principal', function () {
    return view('principal');
})->name('principal');

/*
Route::post('/logout', function (Request $request) {
    $request->session()->flush();
    return redirect('/login');
})->name('logout');
*/
Route::get('/login', function () {
    return view('components.login');
})->name('loginForm');

Route::post('/conectar', [LoginController::class, 'login'])->name('conectar');

Route::get('/mostrar_datos', [LoginController::class, 'mostrar_datos'])->name('mostrar_datos');

Route::get('/desconectar', [LoginController::class, 'logout'])->name('desconectar');

Route::get('/mostrar_perfil', [LoginController::class, 'mostrar_perfil'])->name('mostrar_perfil');






