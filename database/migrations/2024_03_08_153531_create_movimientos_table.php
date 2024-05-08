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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha')->nullable();
            $table->string('tipo')->nullable();
            $table->string('movimiento')->nullable();
            $table->foreignId('repuestos_id')->nullable()->constrained()->onDelete('restrict');
            $table->float('cantidad',8,2);
            $table->float('precio',8,2)->nullable();
            $table->foreignId('almacen_id')->nullable()->constrained()->onDelete('restrict');
            $table->string('observaciones')->nullable();
            $table->foreignId('proveedor_id')->nullable()->constrained()->onDelete('restrict');
            $table->integer('factura')->nullable();
            $table->foreignId('orden_id')->nullable()->constrained()->onDelete('restrict');
            $table->integer('estado');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
