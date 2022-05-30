<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Str;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('roles')->where('id', '=', '1')->update(['descripcion' => 'root', 'permisos' => '[{"crear":true,"reportes":true,"eliminar":true,"actualizar":true,"name_mod":"Ajustes"},{"crear":true,"reportes":true,"eliminar":true,"actualizar":true,"name_mod":"Compras"},{"crear":true,"actualizar":true,"eliminar":true,"reportes":true,"name_mod":"Proyectos"},{"crear":true,"reportes":true,"eliminar":true,"actualizar":true,"name_mod":"Clientes"},{"crear":true,"actualizar":true,"eliminar":true,"reportes":true,"name_mod":"Ingresos"},{"crear":true,"actualizar":true,"eliminar":true,"reportes":true,"name_mod":"Flujo"},{"crear":true,"actualizar":true,"eliminar":true,"reportes":true,"name_mod":"Almacen"},{"crear":true,"actualizar":true,"eliminar":true,"reportes":true,"name_mod":"Sistemas"},{"crear":true,"actualizar":true,"eliminar":true,"reportes":true,"name_mod":"Soporte"},{"crear":true,"actualizar":true,"eliminar":true,"reportes":true,"name_mod":"Vehiculos"},{"crear":true,"actualizar":true,"eliminar":true,"reportes":true,"name_mod":"Recursos"},{"crear":true,"actualizar":true,"eliminar":true,"reportes":true,"name_mod":"Autorizacion"},{"crear":true,"actualizar":true,"eliminar":true,"reportes":true,"name_mod":"Analisis"}]']);
        /*DB::table('roles')->insert([    
            'descripcion' => 'Root',  
            'permisos' => '[{"nombre_modulo":"ajustes","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"compras","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"proyectos","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"clientes","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"ingresos","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"flujos","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"sistemas","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"soporte","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"vehiculos","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"rh","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"Autorizacion","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true}]' 
         ]);*/
         
         /*DB::table('roles')->insert([    
            'descripcion' => 'Admin',  
            'permisos' => '[{"nombre_modulo":"ajustes","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"compras","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"proyectos","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"clientes","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"ingresos","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"flujos","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"sistemas","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"soporte","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"vehiculos","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"rh","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"Autorizacion","crear":true,"actualizar":true,"eliminar":true,"reportes":true,"filtros":true,"lista":true,"ver":true}]' 
         ]);

         DB::table('roles')->insert([    
            'descripcion' => 'Usuario',  
            'permisos' => '[{"nombre_modulo":"ajustes","crear":false,"actualizar":false,"eliminar":false,"reportes":false,"filtros":false,"lista":true,"ver":false},{"nombre_modulo":"compras","crear":true,"actualizar":true,"eliminar":false,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"proyectos","crear":false,"actualizar":false,"eliminar":false,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"clientes","crear":false,"actualizar":false,"eliminar":false,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"ingresos","crear":false,"actualizar":false,"eliminar":false,"reportes":false,"filtros":false,"lista":false,"ver":false},{"nombre_modulo":"flujos","crear":false,"actualizar":false,"eliminar":false,"reportes":false,"filtros":false,"lista":false,"ver":false},{"nombre_modulo":"sistemas","crear":false,"actualizar":false,"eliminar":false,"reportes":false,"filtros":false,"lista":false,"ver":false},{"nombre_modulo":"soporte","crear":true,"actualizar":true,"eliminar":false,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"vehiculos","crear":true,"actualizar":true,"eliminar":false,"reportes":true,"filtros":true,"lista":true,"ver":true},{"nombre_modulo":"rh","crear":false,"actualizar":false,"eliminar":false,"reportes":false,"filtros":false,"lista":false,"ver":false},{"nombre_modulo":"Autorizacion","crear":false,"actualizar":false,"eliminar":false,"reportes":false,"filtros":false,"lista":false,"ver":false}]' 
         ]);*/
    }
}
