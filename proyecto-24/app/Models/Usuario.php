<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable
{
    use HasFactory;

    // Los campos que se pueden asignar en masa.
    protected $fillable = [
        'nombre',
        'telefono',
        'direccion',
        'rol',
        'email',
        'password',
    ];

    // Campos que deben ocultarse para arrays.
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Los castings de los atributos.
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
