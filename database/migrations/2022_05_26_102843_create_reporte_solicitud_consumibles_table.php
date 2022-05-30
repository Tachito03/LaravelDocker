<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporteSolicitudConsumiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_solicitud_consumibles', function (Blueprint $table) {
            $table->id();
            $table->string('nomenclatura_documento', 30);
            $table->string('anio', 5);
            $table->string('mes', 15);
            $table->string('folio_solicitud', 10);
            $table->string('folio_entrega', 10);
            $table->string('id_solicitante', 10);
            $table->string('id_proyecto', 10);
            $table->string('lugar', 40);
            $table->string('duracion', 5);
            $table->datetime('fecha');
            $table->datetime('fecha_requerida');
            $table->string('id_area', 10);
            $table->string('id_gerente_responsable', 10);
            $table->string('observaciones', 255);
            $table->datetime('fecha_creado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reporte_solicitud_consumibles');
    }
}
