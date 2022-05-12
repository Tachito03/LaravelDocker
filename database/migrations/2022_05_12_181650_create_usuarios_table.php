<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('apellidos', 50);
            $table->string('foto', 50);
            $table->string('correo')->unique();
            $table->string('contrasena', 255);
            $table->integer('inactivo')->length(1);
            $table->foreignId('id_rol')
                ->constrained('roles');
            $table->datetime('ultima_sesion');
            $table->datetime('fecha_creacion');
            $table->datetime('fecha_actualizacion');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
