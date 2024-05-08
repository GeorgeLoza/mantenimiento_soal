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
        Schema::create('maquinas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('nombre');
            $table->string('serie')->nullable();
            $table->date('fechacom')->nullable();
            $table->string('modelo')->nullable(); 
            $table->decimal('costo',10,2)->nullable();
            $table->string('fabricante')->nullable();
            $table->string('estado');
            $table->string('criticidad')->nullable();

            $table->foreignId('tipo_maqs_id')->nullable()->constrained()->onDelete('restrict');
            $table->foreignId('estado_equipos_id')->nullable()->constrained()->onDelete('restrict');
            $table->foreignId('ubicacion_id')->nullable()->constrained()->onDelete('restrict');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('maquinas');
    }
};
