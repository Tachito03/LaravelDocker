<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporteDetalleEppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_detalle_epp', function (Blueprint $table) {
            $table->id();
            $table->string('partida', 20);
            $table->string('descripcion', 40);
            $table->string('solicitado', 30);
            $table->string('entregado', 30);
            $table->string('fecha_entrega', 20);
            $table->foreignId('id_solic_epp')
                ->constrained('reporte_solicitud_epp');
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
        Schema::dropIfExists('reporte_detalle_epp');
    }
}
