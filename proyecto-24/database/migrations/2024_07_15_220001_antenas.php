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
        Schema::create('antenas_', function (Blueprint $table) {
            $table->bigIncrements('id_antena');
            $table->string('modelo');
            $table->string('fabricante');
            $table->string('tipo');
            $table->string('tipo_energia');
            $table->text('descripcion')->nullable();
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antenas_');
    }
};

