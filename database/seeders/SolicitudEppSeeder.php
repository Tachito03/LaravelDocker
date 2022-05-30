<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class SolicitudEppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reporte_solicitud_epp')->insert([    
            'nomenclatura_documento' => 'CYP ALL EMD-22', 
            'anio' => '2022',
            'mes' => 'Marzo',
            'folio_solicitud' => '955',
            'folio_entrega' => '536',
            'id_solicitante' => '2',
            'id_proyecto' => '3',
            'lugar' => 'Villahermosa Tab',
            'duracion' => '20',
            'fecha' => date('Y-m-d H:i:s'),
            'fecha_requerida' => date('Y-m-d H:i:s'),
            'id_area' => '2',
            'id_gerente_responsable' => '1',
            'observaciones' => 'Es una prueba de solicitud epp',
            'fecha_creado' => date('Y-m-d H:i:s')
         ]);
    }
}
