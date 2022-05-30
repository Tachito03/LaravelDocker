<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudDetalleAlmacenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_detalle_almacen', function (Blueprint $table) {
            $table->id();
            $table->string('partida', 20);
            $table->string('material_equipo', 50);
            $table->string('descripcion', 40);
            $table->string('serie', 40);
            $table->string('solicitado', 30);
            $table->string('entregado', 30);
            $table->string('fecha_entregado', 20);
            $table->string('certificado_fecha_vencimiento', 40);
            $table->string('devuelto', 30);
            $table->string('fecha_material', 20);
            $table->string('quien_devuelve', 40);
            $table->foreignId('id_salida_almacen')
                ->constrained('solicitud_salida_almacen');
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
        Schema::dropIfExists('solicitud_detalle_almacen');
    }
}
