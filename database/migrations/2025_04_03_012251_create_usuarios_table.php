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
             $table->id('usuario_id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('imagen_usuario');
            $table->string('cedula');
            $table->string('telefono');
            $table->date('fecha_nacimiento');
            $table->string('correo_electronico')->unique();
            $table->string('nombre_usuario')->unique();
            $table->string('contrasenia');
            $table->string('rol');
            $table->string('activo');
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
