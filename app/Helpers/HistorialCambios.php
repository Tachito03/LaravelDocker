<?php
namespace App\Helpers;
use App\Models\HistorialCambio;
use Illuminate\Support\Facades\DB;

class HistorialCambios
{

    public static function Logcambios($tabla, $modulo, $accion, $idusuario)
    {
        $usuario_init = session('usuario');
        $historial = new HistorialCambio();
        $historial->responsable = $usuario_init;
        $historial->accion = $accion ; //insert, update, delete
        $historial->modulo = $modulo;
        $historial->tabla  = $tabla;
        $historial->id_usuario  = $idusuario;
        $historial->fecha = date('Y-m-d H:i:s');
        $historial->save();
    }

    public static function ObtieneHistorial(){
        $data = HistorialCambio::All();
        return $data;
    } 

}