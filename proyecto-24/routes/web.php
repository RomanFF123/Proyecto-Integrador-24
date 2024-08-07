<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sistemaController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/registro', [sistemaController::class, 'metodoRegistro'])->name('RutaRegistro');
Route::get('/basedatos', [sistemaController::class, 'metodoBaseDatos'])->name('RutaBase');
Route::get('/agregar', [sistemaController::class, 'metodoAgregar'])->name('RutaAgregar');
Route::get('/configurar', [sistemaController::class, 'metodoConfigurar'])->name('RutaConfigurar');
Route::get('/iniciarsesion', [sistemaController::class, 'metodoLogin'])->name('RutaLogin');

Route::resource('productos', ProductoController::class);

Route::post('/tags', [TagController::class, 'store'])->name('tags.store');

Route::get('/configurar', [ProductoController::class, 'configurar'])->name('RutaConfigurar');
// routes/api.php

// Rutas para tu formulario
Route::get('/configurar-tags', function () {
    $productos = \App\Models\Producto::all(); // Asegúrate de que el modelo Producto existe
    return view('configurar_tags', ['productos' => $productos]);
});

Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
