<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class DetalleSolicitudAlmacenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('solicitud_detalle_almacen')->insert([    
            'partida' => '1',
            'material_equipo' => 'Equipo',
            'descripcion' => 'Un equipo para este prueba',
            'serie'=> '4-10045 CP1-73030',
            'solicitado' => ' 2 Piezas',
            'entregado' => '2 Piezas',
            'fecha_entregado' => date('Y-m-d'),
            'certificado_fecha_vencimiento' => 'E-1618-2021 30 SEP 2022',
            'devuelto' => 'Si',
            'fecha_material' => date('Y-m-d H:i:s'),
            'quien_devuelve' => 'prueba quien lo devuelve',
            'id_salida_almacen' => '1',
            'fecha_creado' => date('Y-m-d H:i:s')
         ]);

         DB::table('solicitud_detalle_almacen')->insert([    
            'partida' => '2',
            'material_equipo' => 'Equipo 2',
            'descripcion' => 'Un equipo para este prueba 2',
            'serie'=> '4-10045 CP1-73030',
            'solicitado' => ' 1 Piezas',
            'entregado' => '1 Piezas',
            'fecha_entregado' => date('Y-m-d'),
            'certificado_fecha_vencimiento' => 'E-1618-2021 30 SEP 2022',
            'devuelto' => 'Si',
            'fecha_material' => date('Y-m-d H:i:s'),
            'quien_devuelve' => 'prueba quien lo devuelve',
            'id_salida_almacen' => '1',
            'fecha_creado' => date('Y-m-d H:i:s')
         ]);
    }
}
