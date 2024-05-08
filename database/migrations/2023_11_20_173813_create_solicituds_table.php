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
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('restrict');

            $table->date('fecha_sol');

            $table->foreignId('maquina_id')->nullable()
            ->constrained()->onDelete('restrict');

            $table->foreignId('ubicacion_id')->nullable()->constrained()->onDelete('restrict');

            $table->string('descripcion');
            $table->string('estado');
            $table->boolean('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicituds');
    }
};
