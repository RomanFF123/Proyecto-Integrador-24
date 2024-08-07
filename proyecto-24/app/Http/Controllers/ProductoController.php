<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    // Método para mostrar la vista productos
    public function index()
    {
        $productos = Producto::all(); // Obtén todos los productos de la base de datos
        return view('productos', compact('productos')); // Pasa los productos a la vista
    }

    // Método para almacenar un nuevo producto
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'almacen' => 'required|string|max:255',
            'lote' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
        ]);

        // Crear un nuevo producto con los datos validados
        $producto = new Producto();
        $producto->nombre = $validatedData['nombre'];
        $producto->almacen = $validatedData['almacen'];
        $producto->lote = $validatedData['lote'];
        $producto->categoria = $validatedData['categoria'];
        $producto->descripcion = $validatedData['descripcion'];
        $producto->precio = $validatedData['precio'];
        $producto->cantidad = $validatedData['cantidad'];
        $producto->save();

        // Redirigir a la página de productos con un mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto guardado exitosamente');
    }

    // Método para mostrar la vista configurar
    public function configurar()
    {
        $productos = Producto::all(); // Obtén todos los productos de la base de datos
        return view('configurar', compact('productos')); // Pasa los productos a la vista
    }

    // Otros métodos como create, show, edit, update, destroy pueden ser agregados aquí
}
