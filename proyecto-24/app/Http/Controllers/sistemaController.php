<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sistemaController extends Controller
{
    public function metodoInicio(){
        return view('welcome');
    }
    public function metodoRegistro(){
        return view('registro');
    }
    public function metodoBaseDatos(){
        return view('basedatos');
    }
    public function metodoAgregar(){
        return view('agregar');
    }
    public function metodoConfigurar(){
        return view('configurar');
    }
}

