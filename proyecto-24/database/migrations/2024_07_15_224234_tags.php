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
        Schema::table('tags', function (Blueprint $table) {
            // Asegúrate de que el tipo de datos y la longitud coincidan con la columna referenciada
            $table->unsignedBigInteger('id_producto');

            // Define la llave foránea
            $table->foreign('id_producto')
                  ->references('id')
                  ->on('productos')
                  ->onDelete('cascade'); // Esto eliminará automáticamente los tags asociados cuando se elimine un producto
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tags', function (Blueprint $table) {
            // Eliminar la llave foránea si existe
            $table->dropForeign(['id_producto']);
        });
    }
};
