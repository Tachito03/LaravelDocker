<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialCambio extends Model
{
    use HasFactory;
    protected $table = 'historial_cambios';
    protected $fillable = ['responsable','id_usuario','fecha'];
    public $timestamps = false;
}
