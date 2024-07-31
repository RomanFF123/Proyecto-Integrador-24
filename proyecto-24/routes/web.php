<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sistemaController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[sistemaController::class,'metodoInicio'] )->name('RutaInicio');
Route::get('/registro',[sistemaController::class,'metodoRegistro'] )->name('RutaRegistro');
Route::get('/basedatos',[sistemaController::class,'metodoBaseDatos'] )->name('RutaBase');
Route::get('/agregar',[sistemaController::class,'metodoAgregar'] )->name('RutaAgregar');
Route::get('/configurar',[sistemaController::class,'metodoConfigurar'] )->name('RutaConfigurar');
Route::get('/iniciarsesion',[sistemaController::class,'metodoLogin'] )->name('RutaLogin');



