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
        Schema::create('repuestos', function (Blueprint $table) {
            
            $table->id();
            $table->string('numero')->nullable();
            $table->string('codigo')->nullable();
            $table->string('nombre');
            $table->string('foto')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('estado')->nullable();
            $table->integer('ubicacionActual')->nullable();
            $table->integer('stockActual')->nullable();
            $table->integer('stockMinimo')->nullable();
            $table->string('medida')->nullable();
            $table->string('unidad')->nullable();
            $table->double('precioRelativo')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repuestos');
    }
};
