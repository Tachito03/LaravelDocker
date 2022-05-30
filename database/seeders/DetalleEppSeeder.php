<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class DetalleEppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* DB::table('reporte_detalle_epp')->insert([    
            'descripcion' => 'Pilas tipo AAA',
            'solicitado' => '2 piezas',
            'entregado' => '2 piezas',
            'fecha_entrega' => date('Y-m-d H:i:s'),
            'id_solic_epp' => '1',
            'fecha_creado' => date('Y-m-d H:i:s')
         ]);

         DB::table('reporte_detalle_epp')->insert([    
            'descripcion' => 'Botas',
            'solicitado' => '10 piezas',
            'entregado' => '10 piezas',
            'fecha_entrega' => date('Y-m-d H:i:s'),
            'id_solic_epp' => '1',
            'fecha_creado' => date('Y-m-d H:i:s')
         ]);*/

         DB::table('reporte_detalle_epp')->insert([    
            'descripcion' => 'Prueba',
            'solicitado' => '1 Pieza',
            'entregado' => '1 Pieza',
            'fecha_entrega' => date('Y-m-d H:i:s'),
            'id_solic_epp' => '1',
            'fecha_creado' => date('Y-m-d H:i:s')
         ]);
    }
}
