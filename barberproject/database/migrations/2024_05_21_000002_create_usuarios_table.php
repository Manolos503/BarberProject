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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('pk_usuario');
            $table->string('nombre_usuario', 50);
            $table->string('apellido_usuario', 50);
            $table->string('email_usuario', 50);
            $table->string('contrasena_usuario', 50);
            $table->unsignedInteger('tipo_usuario');
            $table->unsignedBigInteger('fk_estado_usuario');
            $table->foreign('fk_estado_usuario')->references('pk_detalle')->on('detalle_estado')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
