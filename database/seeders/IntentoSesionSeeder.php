<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class IntentoSesionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intentos_sesion')->insert([    
            'intentos' => '10', 
            'tiempomax' => '30',
            'fecha_creado' => date('Y-m-d H:i:s')
         ]);

    }
}
