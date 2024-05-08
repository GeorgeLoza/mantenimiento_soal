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
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solicitud_id')->nullable()->constrained()->onDelete('restrict');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('restrict');

            $table->date('tiempoAstStart')->nullable();
            $table->date('tiempoAstEnd')->nullable();

            $table->date('fecha_sol')->nullable();
            $table->date('fecha_gen')->nullable();

            $table->foreignId('prioridad_id')->nullable()->constrained()->onDelete('restrict');
            $table->foreignId('tipo_ordens_id')->nullable()->constrained()->onDelete('restrict');
            $table->foreignId('estado_ots_id')->nullable()->constrained()->onDelete('restrict');

            $table->date('tiempoEstStart')->nullable();
            $table->date('tiempoEstEnd')->nullable();

            $table->date('tiempoActStart')->nullable();
            $table->date('tiempoActEnd')->nullable();

            $table->string('notasTec')->nullable();
            $table->text('diagnostico')->nullable();
            $table->text('accionTomada')->nullable();
            $table->string('prevencion')->nullable();

            $table->string('PMNo')->nullable();
            $table->string('TaskNo')->nullable();
            
            $table->string('WoTrade')->nullable();
            $table->string('LaborCost')->nullable();

            $table->string('ParCost')->nullable();     
            $table->string('InsuCost')->nullable();

            $table->timestamps();
            $table->integer('numero_orden')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordens');
    }
};
