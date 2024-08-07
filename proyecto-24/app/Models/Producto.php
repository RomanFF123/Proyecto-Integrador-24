<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'almacen',
        'lote',
        'Categoria',
        'descripcion',
        'precio',
        'cantidad',
    ];
}
