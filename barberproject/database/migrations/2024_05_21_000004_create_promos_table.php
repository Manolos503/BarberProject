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
        Schema::create('promos', function (Blueprint $table) {
            $table->id('pk_promo');
            $table->string('nombre_promo', 50);
            $table->string('descripcion_promo', 250);
            $table->string('url_img', 500);
            $table->unsignedInteger('valor_descuento');
            $table->unsignedBigInteger('fk_estadopromo');
            $table->unsignedBigInteger('fk_serviciopromo');
            $table->foreign('fk_estadopromo')->references('pk_detalle')->on('detalle_estado')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('fk_serviciopromo')->references('pk_servicio')->on('servicios')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};
