<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroAccesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_accesos', function (Blueprint $table) {
            $table->id();
            $table->string('correo', 40);
            $table->string('contrasena', 255);
            $table->string('ip', 20);
            $table->string('estado', 30);
            $table->datetime('fecha_acceso')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_accesos');
    }
}
