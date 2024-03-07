<?php

use Illuminate\Support\Facades\Route;

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
});

Route::post('/login', function () {
    $loginComponent = new \App\View\Components\Login();
    $loginComponent->login();
    
})->name('login');

Route::get('register', function () {
    return view('register.empresa');
})->name('empresa.register');
