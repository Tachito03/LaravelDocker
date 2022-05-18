<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acceso extends Model
{
    use HasFactory;
    protected $table = 'registroaccesos';
    protected $fillable = ['ip','estado','id_usuario','fechaacceso'];
    public $timestamps = false;
}
