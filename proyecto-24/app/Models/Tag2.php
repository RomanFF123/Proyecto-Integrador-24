<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag2 extends Model
{
    protected $table = 'tags2'; // Nombre de la tabla
    protected $fillable = ['codigo', 'descripcion', 'nombre']; // Campos que se pueden llenar
}
