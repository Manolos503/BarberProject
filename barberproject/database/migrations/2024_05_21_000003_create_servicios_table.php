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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id('pk_servicio');
            $table->string('nombre_servicio', 50);
            $table->decimal('valor_servicio', 6, 2);
            $table->decimal('tiempo_servicio', 2, 1);
            $table->unsignedBigInteger('fk_estadoservicio');
            $table->foreign('fk_estadoservicio')->references('pk_detalle')->on('detalle_estado')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
