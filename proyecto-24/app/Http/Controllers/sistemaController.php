<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;

class sistemaController extends Controller
{
    public function metodoInicio()
    {
        return view('welcome');
    }

    public function metodoRegistro()
    {
        return view('registro');
    }

    public function metodoBaseDatos()
    {
        // Lógica para mostrar la vista de base de datos
        return view('basedatos');
    }

    public function metodoAgregar()
    {
        return view('agregar');
    }

    public function metodoConfigurar()
    {
        return view('configurar');
    }

    public function metodoLogin()
    {
        return view('login');
    }

    public function guardarInventario(Request $request)
    {
        $uids = $request->input('uids', []);
        $productos = Producto::whereIn('lote', $uids)->get();

        // Generar un archivo Excel
        return Excel::download(new ProductExport($productos), 'inventario.xlsx');
    }
}
