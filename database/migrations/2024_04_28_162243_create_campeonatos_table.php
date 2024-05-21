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
        Schema::create('campeonatos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('num_coches')->default(6);
            $table->integer('num_bots')->default(0);
            $table->integer('num_carreras')->default(4);
            $table->boolean('escuderias')->default(false);
            $table->text('descripcion');
            $table->boolean('oficial')->default(false);
            $table->boolean('activo')->default(false);
            $table->boolean('desgaste')->default(false);
            $table->boolean('reglajes')->default(false);
            $table->boolean('cartas_escuderia')->default(false);
            $table->boolean('cartas_piloto')->default(false);
            $table->boolean('estress')->default(false);
            $table->string('hashid');
            $table->foreignId('user_id')->constrained();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campeonatos');
    }
};
