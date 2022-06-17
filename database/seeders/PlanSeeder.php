<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([  
            'plan_id' => 'price_1LB31ZCdfnjeiInFNvrGBgsl',
            'stripe_product_id' => 'prod_LsoeLd3FNN9rE4',
            'name' => 'Básico', 
            'slug' => 'basico',
            'stripe_plan' => 'Mes',
            'price' => '20.00',
            'description' => 'Plan básico',
            'characteristic' => 'prueba 1, prueba 2',
            'fecha_creado' => date('Y-m-d H:i:s'),
            'fecha_actualizado' => date('Y-m-d H:i:s')
         ]);

         DB::table('plans')->insert([    
            'plan_id' => 'price_1LB32jCdfnjeiInFWNSucqfE',
            'stripe_product_id' => 'prod_LsogFI5j3vhq7c',
            'name' => 'Estándar', 
            'slug' => 'estandar',
            'stripe_plan' => 'Mes',
            'price' => '30.00',
            'description' => 'Está mas chido',
            'characteristic' => 'prueba 1, prueba 2',
            'fecha_creado' => date('Y-m-d H:i:s'),
            'fecha_actualizado' => date('Y-m-d H:i:s')
         ]);

         DB::table('plans')->insert([ 
            'plan_id' => 'price_1LBLs7CdfnjeiInFSjrzIaCZ', 
            'stripe_product_id' => 'prod_Lt884DzO312uWO',
            'name' => 'Premium', 
            'slug' => 'premium',
            'stripe_plan' => 'Mes',
            'price' => '50.00',
            'description' => 'Este está mas bueno',
            'characteristic' => 'prueba 1, prueba 2',
            'fecha_creado' => date('Y-m-d H:i:s'), 
            'fecha_actualizado' => date('Y-m-d H:i:s')
         ]);
    }
}
