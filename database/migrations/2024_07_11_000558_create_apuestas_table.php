<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('apuestas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_juego');
            $table->foreign('id_juego')->references('id')->on('juegos')->onDelete('cascade');
            $table->dateTime('fecha');
            $table->integer('monto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apuestas');
    }
};
