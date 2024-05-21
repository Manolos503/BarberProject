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
        Schema::create('citas', function (Blueprint $table) {
            $table->id('pk_cita');
            $table->string('nombre_cita', 50);
            $table->dateTime('fechahora_cita');
            $table->dateTime('fechahorafinal_cita');
            $table->decimal('total_cita', 6, 2);
            $table->decimal('tiempo_cita', 2, 1);
            $table->unsignedBigInteger('fk_usuariocliente');
            $table->unsignedBigInteger('fk_estadocliente');
            $table->foreign('fk_usuariocliente')->references('pk_usuario')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('fk_estadocliente')->references('pk_detalle')->on('detalle_estado')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
