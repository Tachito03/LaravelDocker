<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporteDanioRoboTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_danio_robo', function (Blueprint $table) {
            $table->id();
            $table->string('folio', 10);
            $table->string('reporte', 10);
            $table->string('id_proyecto', 10);
            $table->string('ciudad', 50);
            $table->datetime('fecha');
            $table->string('nombre', 40);
            $table->string('marca', 25);
            $table->string('modelo', 25);
            $table->string('no_serie', 30);
            $table->string('cod_barra', 35);
            $table->string('relato');
            $table->string('recomendacion');
            $table->string('reponer_equipo', 10);
            $table->string('reponer_equipo_costo', 10);
            $table->string('descontar_nomina', 10);
            $table->string('descontar_nomina_costo', 10);
            $table->string('otro', 10);
            $table->string('otro_costo', 10);
            $table->string('renponsable_evento', 35);
            $table->string('responsable_almacen', 35);
            $table->string('responsable_baja', 35);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reporte_danio_robo');
    }
}
