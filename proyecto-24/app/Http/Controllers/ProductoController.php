<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Método para guardar un producto
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'almacen' => 'required|string|max:255',
            'lote' => 'required|string|max:255',
            'categoria' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
        ]);

        Producto::create($validatedData);

        return redirect()->route('productos.create')->with('success', true);
    }

    // Método para mostrar la vista de productos
    public function create()
    {
        return view('productos'); 
    }

    // Método para obtener un producto por UID
    public function getByUid($uid)
    {
        $producto = Producto::where('lote', $uid)->first(); // Asumiendo que el UID se guarda en el campo 'lote'

        if ($producto) {
            return response()->json($producto);
        } else {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
    }
    public function getProducto($lote)
    {
        $producto = Producto::where('lote', $lote)->first();

        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        return response()->json($producto);
    }
}
