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
        Schema::create('detalle_estado', function (Blueprint $table) {
            $table->id('pk_detalle');
            $table->string('valor_detalle', 50);
            $table->unsignedBigInteger('fk_estadodetalle');
            $table->foreign('fk_estadodetalle')->references('pk_estado')->on('estado')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_estado');
    }
};
