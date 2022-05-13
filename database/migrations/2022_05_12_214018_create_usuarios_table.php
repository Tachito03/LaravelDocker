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
            $table->string('nombre', 20);
            $table->string('apellidos', 50);
            $table->string('foto', 30);
            $table->string('correo', 40)->unique();
            $table->string('contrasena', 255);
            $table->integer('inactivo')->length(1);
            $table->foreignId('id_rol')
                ->constrained('roles');
            $table->datetime('ultima_sesion')->nullable();
            $table->datetime('fecha_creacion')->nullable();
            $table->datetime('fecha_actualizacion')->nullable();
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
