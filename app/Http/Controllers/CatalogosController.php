<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Rol;

class CatalogosController extends Controller
{
    public function saveRol(Request $request){
        $validator = Validator::make($request->all(),[
            'descripcion' => 'required',
            'permisos' => 'required'
        ]);

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
        $validator = Validator::make($request->all(),[
            'descripcion' => 'required',
            'permisos' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
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
}
