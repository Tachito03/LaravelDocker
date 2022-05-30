<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB; 

use Illuminate\Database\Seeder;

class DetalleConsumibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reporte_detalle_consumible')->insert([    
            'descripcion' => 'prueba 1',
            'solicitado' => '2 piezas',
            'entregado' => '2 piezas',
            'fecha_entrega' => date('Y-m-d H:i:s'),
            'id_solic_consumible' => '1',
            'fecha_creado' => date('Y-m-d H:i:s')
         ]);

         DB::table('reporte_detalle_consumible')->insert([    
            'descripcion' => 'Prueba 2',
            'solicitado' => '10 piezas',
            'entregado' => '10 piezas',
            'fecha_entrega' => date('Y-m-d H:i:s'),
            'id_solic_consumible' => '1',
            'fecha_creado' => date('Y-m-d H:i:s')
         ]);

         DB::table('reporte_detalle_consumible')->insert([    
            'descripcion' => 'Prueba 3',
            'solicitado' => '1 Pieza',
            'entregado' => '1 Pieza',
            'fecha_entrega' => date('Y-m-d H:i:s'),
            'id_solic_consumible' => '1',
            'fecha_creado' => date('Y-m-d H:i:s')
         ]);

         DB::table('reporte_detalle_consumible')->insert([    
            'descripcion' => '30 paquetes de agua ciel 500ml',
            'solicitado' => '1 Pieza',
            'entregado' => '1 Pieza',
            'fecha_entrega' => date('Y-m-d H:i:s'),
            'id_solic_consumible' => '1',
            'fecha_creado' => date('Y-m-d H:i:s')
         ]);
    }
}
