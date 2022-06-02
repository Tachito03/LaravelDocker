<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([    
            'nombre' => 'Eustacio', 
            'apellidos' => 'Bautista',
            'foto' => 'thumb.png',
            'correo' => 'admin.dev@cyp.com',
            'contrasena' => Hash::make('admin123'),
            'inactivo' => '0',
            'id_rol' => '1' 
         ]);
         
        /* DB::table('users')->insert([    
            'nombre' => 'Admin', 
            'apellidos' => 'Admin',
            'foto' => 'admin.png',
            'correo' => 'admin@cyp.com',
            'contrasena' => Hash::make('12345'),
            'inactivo' => '0',
            'id_rol' => '2' 
         ]);

         DB::table('users')->insert([    
            'nombre' => 'Usuario', 
            'apellidos' => 'Usuario',
            'foto' => 'usuario.png',
            'correo' => 'usuario@cyp.com',
            'contrasena' => Hash::make('12345'),
            'inactivo' => '0',
            'id_rol' => '3' 
         ]);*/

    }
}
