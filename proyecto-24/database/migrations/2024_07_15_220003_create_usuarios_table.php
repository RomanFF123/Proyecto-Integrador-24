<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id_usuario'); // Clave primaria
            $table->string('nombre'); // Nombre
            $table->string('telefono')->nullable(); // Teléfono
            $table->string('direccion')->nullable(); // Dirección
            $table->string('rol')->nullable(); // Rol
            $table->string('email')->unique(); // Correo electrónico
            $table->string('password'); // Contraseña
            $table->timestamps(); // Timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
