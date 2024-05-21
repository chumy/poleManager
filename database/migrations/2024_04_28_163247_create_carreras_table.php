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
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->integer("orden")->default(1);
            $table->foreignId('campeonato_id')->constrained();
            $table->foreignId('circuito_id')->constrained();
            $table->boolean('ultima')->default(false);
            $table->boolean('cerrado')->default(false);
            $table->timestamps();
            /*
            $table->foreign('circuito_id')
                ->references('id')->on('circuitos')
                ->onDelete('cascade');

            $table->foreign('campeonato_id')
                ->references('id')->on('campeonatos')
                ->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};
