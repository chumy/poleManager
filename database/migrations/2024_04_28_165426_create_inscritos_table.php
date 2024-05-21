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
        Schema::create('inscritos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('campeonato_id')->constrained();
            $table->foreignId('coche_id')->constrained();
            $table->foreignId('escuderia_id')->nullable()->constrained();
            $table->foreignId('carta_piloto_id')->nullable();
            $table->foreignId('carta_escuderia_id')->nullable();

            $table->timestamps();

                
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscritos');
    }
};
