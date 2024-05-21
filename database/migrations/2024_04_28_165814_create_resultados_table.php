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
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->integer("qualy")->default(0);
            $table->integer("posicion")->default(0);
            $table->integer("adelantamientos")->nullable()->default(null);
            $table->integer("ataques")->nullable()->default(null);
            $table->integer("defensas")->nullable()->default(null);
            $table->integer("puntos_motor")->nullable()->default(null);
            $table->integer("averias_leves")->nullable()->default(null);
            $table->integer("averias_graves")->nullable()->default(null);
            $table->integer("reparaciones_leves")->nullable()->default(null);
            $table->integer("reparaciones_graves")->nullable()->default(null);
            $table->integer("colisiones")->nullable()->default(null);
            $table->foreignId('carrera_id')->constrained();
            $table->foreignId('inscrito_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultados');
    }
};
