<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ReportesAlmacen;

class ReportesController extends Controller
{
    //

    public function reporteSolicitudMaterial(){
       $almacen = DB::table('solicitud_salida_almacen')
       ->join('solicitud_detalle_almacen', 'solicitud_salida_almacen.id', '=', 'solicitud_detalle_almacen.id_salida_almacen')
       ->get();

        $formato = \PDF::loadView('formatosPDF.solicitud-materiales', compact('almacen'));
        $formato->setPaper('a4' , 'landscape');
        return $formato->output();
    }

    public function reporteSolicitudEpp(){
        $epp_detalle = DB::table('reporte_solicitud_epp')
        ->join('reporte_detalle_epp', 'reporte_solicitud_epp.id', '=', 'reporte_detalle_epp.id_solic_epp')
        ->get();

       // print_r($epp_detalle);
        $reporteEPP = \PDF::loadView('formatosPDF.solicitud-epp', compact('epp_detalle'));
        $reporteEPP->setPaper('a4' , 'portrait');
        return $reporteEPP->output();
    }

    public function reporteSolicitudConsumible(){
        $consumible_detalle = DB::table('reporte_solicitud_consumibles')
        ->join('reporte_detalle_consumible', 'reporte_solicitud_consumibles.id', '=', 'reporte_detalle_consumible.id_solic_consumible')
        ->get();

       // print_r($epp_detalle);
        $reporteConsumible = \PDF::loadView('formatosPDF.solicitud-consumibles', compact('consumible_detalle'));
        $reporteConsumible->setPaper('a4' , 'portrait');
        return $reporteConsumible->output();
    }

    public function reporteRoboDanio(){
        $reporte_detalle = DB::table('reporte_danio_robo')->get();

        //print_r($reporte_detalle);
        $reporteDanio = \PDF::loadView('formatosPDF.reporte-danio-extravio', compact('reporte_detalle'));
        $reporteDanio->setPaper('a4' , 'portrait');
        return $reporteDanio->output();
    }


}
