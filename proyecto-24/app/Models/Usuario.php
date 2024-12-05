<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    
    // Especificar la clave primaria
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'nombre',  // Cambiado de 'name' a 'nombre'
        'telefono', 
        'direccion', 
        'rol', 
        'email', 
        'password',
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Si la clave primaria no es autoincremental
    public $incrementing = false;

    // Si la clave primaria no es un entero
    protected $keyType = 'string';
}



