<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sistemaController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Ruta para la página principal
Route::get('/', function () {
    return view('home');
})->name('home');

// Rutas del sistema
Route::get('/registro', [sistemaController::class, 'metodoRegistro'])->name('RutaRegistro');
Route::get('/basedatos', [InventarioController::class, 'mostrarInventario'])->name('basedatos');
Route::get('/agregar', [sistemaController::class, 'metodoAgregar'])->name('RutaAgregar');
Route::get('/configurar', [sistemaController::class, 'metodoConfigurar'])->name('RutaConfigurar');
Route::get('/iniciarsesion', [sistemaController::class, 'metodoLogin'])->name('RutaLogin');

// Rutas para la gestión de productos
Route::get('/productos', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');

// Ruta para obtener el producto por UID
Route::get('/producto/{uid}', [ProductoController::class, 'getByUid'])->name('producto.byUid');
Route::get('/producto/{lote}', [ProductoController::class, 'getProducto'])->name('producto.get');

// Rutas para configuración y almacenamiento de tags
Route::get('/configurar-tags', [TagController::class, 'create'])->name('tags.create');
Route::post('/tags', [TagController::class, 'store'])->name('tags.store');

// Rutas para guardar y exportar inventario
Route::post('/guardar-inventario', [InventarioController::class, 'guardarInventario'])->name('guardar-inventario');
Route::get('/exportar-inventario', [InventarioController::class, 'exportarInventario'])->name('exportar-inventario');

// Ruta para el registro de usuarios
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Ruta para el inicio de sesión
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
