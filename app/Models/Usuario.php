<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Model
{
    use Notifiable, HasApiTokens, HasFactory;

    //protected $fillable = ['correo', 'contrasena'];
    protected $fillable = ['nombre','apellidos', 'foto','correo', 'contrasena','inactivo', 'id_rol'];
    public $timestamps = false;
}
