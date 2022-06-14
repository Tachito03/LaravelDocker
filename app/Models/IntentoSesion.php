<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntentoSesion extends Model
{
    use HasFactory;
    protected $table = 'intentos_sesion';
    protected $fillable = ['intentos','tiempomax','fecha_creado', 'fecha_actualizado'];
    public $timestamps = false;
}
