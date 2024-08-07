<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag; // Asegúrate de que este modelo existe en app/Models

class TagController extends Controller
{
    // App\Http\Controllers\TagController.php

public function store(Request $request)
{
    $request->validate([
        'codigo' => 'required|string',
        'descripcion' => 'required|string',
        'id_producto' => 'required|integer',
    ]);

    $tag = new Tag();
    $tag->codigo = $request->input('codigo');
    $tag->descripcion = $request->input('descripcion');
    $tag->id_producto = $request->input('id_producto');
    $tag->save();

    return redirect()->back()->with('success', 'Tag registrado con éxito!');
}

