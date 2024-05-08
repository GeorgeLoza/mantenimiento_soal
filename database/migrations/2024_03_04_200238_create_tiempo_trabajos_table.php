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
        Schema::create('tiempo_trabajos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('orden_id')->nullable()->constrained()->onDelete('restrict');
            
            $table->timestamps();

            $table->dateTime('tiempo_inicio')->nullable();
            $table->dateTime('tiempo_fin')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiempo_trabajos');
    }
};
