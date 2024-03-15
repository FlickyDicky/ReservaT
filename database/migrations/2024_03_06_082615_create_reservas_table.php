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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('horario_id')->constrained();
            $table->foreignId('empresa_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('servicio_id')->constrained();
            $table->dateTime('hora_reserva');
            $table->dateTime('fecha_reserva');
            $table->boolean('estado');
            // $table->string('comentario');
            // $table->string('puntuacion');
            $table->float('precio', 8, 2);
            $table->integer('duracion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
