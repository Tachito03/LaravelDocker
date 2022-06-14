<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntentosSesionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intentos_sesion', function (Blueprint $table) {
            $table->id();
            $table->integer('intentos');
            $table->integer('tiempomax');
            $table->timestamp('fecha_creado')->useCurrent();
            $table->timestamp('fecha_actualizado')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_intentos_sesion');
    }
}
