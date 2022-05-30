<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class ReporteDanoRoboExtravioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reporte_danio_robo')->insert([    
            'folio' => '300', 
            'reporte' => 'Extravio del equipo',
            'id_proyecto' => '10',
            'ciudad' => 'Villahermosa tabasco',
            'fecha' => date('Y-m-d H:i:s'),
            'nombre' => 'Impresora',
            'marca' => 'Epson',
            'modelo' => '325GP',
            'no_serie' => '123456789',
            'cod_barra' => 'CPI-740221',
            'relato' => 'El equipo del usuario refiere que ....',
            'recomendacion' => 'Prueba prueba 2',
            'reponer_equipo' => 'No',
            'reponer_equipo_costo' => '0.00',
            'descontar_nomina' => 'No',
            'descontar_nomina_costo' => '0.00',
            'otro'=> 'Si',
            'otro_costo' => '50.00',
            'renponsable_evento' => 'prueba 3',
            'responsable_almacen' => 'Prueba 2',
            'responsable_baja' => 'Prueba 1',
         ]);
    }
}
