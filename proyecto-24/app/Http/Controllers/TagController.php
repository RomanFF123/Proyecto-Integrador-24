<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    /**
     * Muestra el formulario para crear un nuevo Tag.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // No se obtiene ningún dato de la tabla `productos` aquí
        return view('configurar'); // Asegúrate de que la vista no espera datos de productos
    }

    /**
     * Almacena un nuevo Tag en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'codigo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
        ]);

        // Inserta el nuevo registro en la tabla `tag2`
        DB::table('tags2')->insert([
            'codigo' => $request->input('codigo'),
            'descripcion' => $request->input('descripcion'),
            'nombre' => $request->input('nombre'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirige de vuelta al formulario con un mensaje de éxito
        return redirect()->route('tags.create')->with('success', 'Tag guardado con éxito');
    }
}
