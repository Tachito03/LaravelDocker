<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class SolicitudConsumiblesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reporte_solicitud_consumibles')->insert([    
            'nomenclatura_documento' => 'CYP ALL EMD-22', 
            'anio' => '2022',
            'mes' => 'Mayo',
            'folio_solicitud' => '955',
            'folio_entrega' => '536',
            'id_solicitante' => '2',
            'id_proyecto' => '3',
            'lugar' => 'Oaxaca, oax',
            'duracion' => '20',
            'fecha' => date('Y-m-d H:i:s'),
            'fecha_requerida' => date('Y-m-d H:i:s'),
            'id_area' => '3',
            'id_gerente_responsable' => '10',
            'observaciones' => 'Es una prueba de solicitud consumible',
            'fecha_creado' => date('Y-m-d H:i:s')
         ]);
    }
}
