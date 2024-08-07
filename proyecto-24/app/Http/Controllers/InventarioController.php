<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductosExport;

class InventarioController extends Controller
{
    public function guardarInventario(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'uids' => 'required|array',
            'uids.*' => 'string'
        ]);

        $uids = $request->input('uids');

        // Obtener productos que coincidan con los UIDs
        $productos = Producto::whereIn('lote', $uids)->get();

        // Almacenar los productos en la sesión
        session(['productos_inventario' => $productos]);

        // Redirigir a la vista 'basedatos' con los datos del inventario
        return redirect()->route('basedatos')->with('productos', $productos);
    }

    public function exportarInventario()
    {
        // Obtener los productos desde la sesión
        $productos = session('productos_inventario', collect());

        // Retornar el archivo de Excel
        return Excel::download(new ProductosExport($productos), 'productos.xlsx');
    }

    public function mostrarInventario()
    {
        // Obtener productos de la sesión
        $productos = session('productos_inventario', collect());

        // Retornar la vista con los productos
        return view('basedatos', compact('productos'));
    }
}
