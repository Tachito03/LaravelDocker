<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acceso extends Model
{
    use HasFactory;
    protected $table = 'registro_accesos';
    protected $fillable = ['correo','contrasena','ip','estado','id_usuario','fechaacceso'];
    public $timestamps = false;
}
