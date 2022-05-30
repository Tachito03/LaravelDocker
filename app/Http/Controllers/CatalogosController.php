<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Rol;

class CatalogosController extends Controller
{
    public function saveRol(Request $request){
        $reglas = [
            'descripcion' => 'required',
            'permisos' => 'required'
        ];

        $mensajes = [
            'descripcion.required' => 'La descripción es necesario',
            'permisos.required' => 'Selecciona los privilegios para este rol'
        ];

        $validator = Validator::make($request->all(), $reglas, $mensajes);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }

        $rol = new Rol();
        $rol->descripcion = $request->descripcion;
        $rol->permisos    = $request->permisos;
        $rol->created_at  = date('Y-m-d H:i:s');
        $rol->save();

        return response()->json(['message' => 'success'], 200);
    }

    public function updateRol(Request $request, $id){
        $reglas = [
            'descripcion' => 'required',
            'permisos' => 'required'
        ];

        $mensajes = [
            'descripcion.required' => 'La descripción es necesario',
            'permisos.required' => 'Selecciona los privilegios para este rol'
        ];

        $validator = Validator::make($request->all(), $reglas, $mensajes);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $rol = Rol::find($id);
        $rol->descripcion = $request->descripcion;
        $rol->permisos    = $request->permisos;
        $rol->updated_at  = date('Y-m-d H:i:s');
        $rol->update();

        return response()->json(['message' => 'success'], 200);
    }

    public function getRoles(){
        $roles = Rol::All();
        return response()->json(['roles' => $roles], 200);
    }

    public function getRol($id){
        $rol = Rol::find($id);
        return response()->json(['rol' => $rol], 200);
    }

    public function FormatoPdf(){
       // $almacen = DB::table('reporte_solicitud_almacen')->get();

        $formato = \PDF::loadView('formatosPDF.orden-compra');
        $formato->setPaper('a4' , 'portrait');
        return $formato->output();
        /*$formato = \PDF::loadView('formatosPDF.solicitud-epp');
        $formato->setPaper('a4' , 'portrait');
        return $formato->output();*/
        /*$formato = \PDF::loadView('formatosPDF.solicitud-consumibles');
        $formato->setPaper('a4' , 'portrait');
        return $formato->output();*/

       /* $formato = \PDF::loadView('formatosPDF.reporte-equipo-almacen');
        $formato->setPaper('a4' , 'portrait');
        return $formato->output();*/

       /* $formato = \PDF::loadView('formatosPDF.solicitud-materiales');
        $formato->setPaper('a4' , 'landscape');
        return $formato->output();*/
    }
}
