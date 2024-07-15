<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id_usuario'); 
            $table->string('nombre');
            $table->string('telefono')->unique();
            $table->string('direccion');
            $table->string('rol');
            $table->string('email')->unique();
            $table->string('password'); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios'); // Código para eliminar la tabla cuando se revierta la migración
    }
};
