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
            // Añadir la columna 'id_producto' si no existe
            if (!Schema::hasColumn('tags', 'id_producto')) {
                $table->unsignedBigInteger('id_producto')->after('descripcion'); // Ajusta 'after' si es necesario

                // Definir la llave foránea
                $table->foreign('id_producto')
                      ->references('id')
                      ->on('productos')
                      ->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tags', function (Blueprint $table) {
            // Eliminar la llave foránea si existe
            if (Schema::hasColumn('tags', 'id_producto')) {
                $table->dropForeign(['id_producto']);
                $table->dropColumn('id_producto');
            }
        });
    }
};
