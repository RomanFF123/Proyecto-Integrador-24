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
        Schema::create('drones', function (Blueprint $table) {
            $table->bigIncrements('id_dron');
            $table->string('modelo');
            $table->string('fabricante');
            $table->integer('n_serie');
            $table->string('estado');
            $table->unsignedBigInteger('id_antena'); 
            $table->timestamps();

            $table->foreign('id_antena')->references('id_antena')->on('antenas_')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drones');
    }
};
