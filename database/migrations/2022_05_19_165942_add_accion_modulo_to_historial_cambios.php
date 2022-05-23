<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAccionModuloToHistorialCambios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historial_cambios', function (Blueprint $table) {
            //agregamos nuevas columnas
            $table->string('accion', 20)->after('responsable');
            $table->string('modulo', 25)->after('accion');
            $table->string('tabla', 25)->nullable()->after('modulo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('historial_cambios', function (Blueprint $table) {
            //
        });
    }
}
