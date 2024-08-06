<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sistemaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\StatusController; // Asegúrate de incluir el controlador de estado

// Redirigir la ruta raíz a la página de inicio de sesión
Route::get('/', function () {
    return redirect()->route('login.form');
});

// Rutas de autenticación
Route::get('/login', function () {
    return view('login');
})->name('login.form');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Ruta protegida de bienvenida
Route::get('/welcome', function () {
    return view('welcome');
})->middleware('auth')->name('welcome');

// Ruta protegida para el home
Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

// Rutas del sistema
Route::get('/inicio', [sistemaController::class, 'metodoInicio'])->name('RutaInicio');
Route::get('/registro', [sistemaController::class, 'metodoRegistro'])->name('registro'); // Cambiado a 'registro'
Route::get('/basedatos', [sistemaController::class, 'metodoBaseDatos'])->name('RutaBase');
Route::get('/agregar', [sistemaController::class, 'metodoAgregar'])->name('RutaAgregar');
Route::get('/configurar', [sistemaController::class, 'metodoConfigurar'])->name('RutaConfigurar');
Route::get('/iniciarsesion', [sistemaController::class, 'metodoLogin'])->name('RutaLogin');
Route::get('/status', [StatusController::class, 'checkStatus'])->name('status.check'); // Corrección aquí
