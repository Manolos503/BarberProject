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
        Schema::create('venta', function (Blueprint $table) {
            $table->id('pk_venta');
            $table->unsignedInteger('cantidad');
            $table->unsignedBigInteger('fk_cita');
            $table->unsignedBigInteger('fk_servicio');
            $table->foreign('fk_cita')->references('pk_cita')->on('citas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('fk_servicio')->references('pk_servicio')->on('servicios')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta');
    }
};
