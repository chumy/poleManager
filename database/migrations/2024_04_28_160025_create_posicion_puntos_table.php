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
        Schema::create('posicion_puntos', function (Blueprint $table) {
            $table->id();
            $table->integer('posicion')->default(0);
            $table->integer('puntos')->default(0);
            $table->boolean('ultima')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posicion_puntos');
    }
};
