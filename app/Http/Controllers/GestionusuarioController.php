<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class GestionusuarioController extends Controller
{
    //

    public function addUser(Request $request){

        $user = new user();
        $user->nombre = $request->input('nombre');
        $user->apellidos = $request->input('apellidos');
        $user->foto = 'general.jpg';
        $user->correo = $request->input('correo');
        $user->contrasena = Hash::make($request->input('contrasena'));
        $user->inactivo = '0';
        $user->id_rol = $request->input('id_rol');
        $user->created_at = date('Y-m-d H:i:s');
        $user->save();

        if($user){
            $usuario_init = session('usuario');
            $tabla = 'Usuarios';
            $modulo = 'Ajustes/gestion usuarios';
            $accion = 'Alta usuario';

            \HistorialCambios::Logcambios($tabla,$modulo,$accion,$usuario_init, $user->id);
            return response()->json(['msg' => 'OK'], 200);
        }else{
            return response()->json(['msg' => 'Error'], 501);
        }

        //return response()->json(['msg' => $message]);
    }

    public function updateUser(Request $request, $id){

        $user = User::find($id);
        $user->nombre = $request->input('nombre');
        $user->apellidos = $request->input('apellidos');
        $user->foto = 'general.jpg';
        $user->correo = $request->input('correo');
        $user->contrasena = Hash::make($request->input('contrasena'));
        $user->inactivo = '0';
        $user->id_rol = $request->input('id_rol');
        $user->updated_at = date('Y-m-d H:i:s');
        $user->update();

        if($user){
            //$usuario_init = session('usuario');
            $tabla = 'usuarios';
            $modulo = 'Ajustes/gestion usuarios';
            $accion = 'Actualizacion';

            \HistorialCambios::Logcambios($tabla,$modulo,$accion, $user->id);
            return response()->json(['msg' => 'OK'], 200);
        }else{
            return response()->json(['msg' => 'Error'], 501);
        }
    }

    public function getUsers(){
        $user = DB::table('users')
                    ->join('roles', 'users.id_rol', '=', 'roles.id')
                    ->select('users.id','users.nombre', 'users.apellidos', 'users.correo','users.id_rol','roles.descripcion as rol',)
                    ->where('users.inactivo', '=', '0')
                    ->get();
        return response()->json(['list' => $user], 200);
    }

    public function getAllRols(){
        $roles = DB::table('roles')
                    ->select('roles.id','roles.descripcion')
                    ->get();
        return response()->json(['roles' => $roles], 200);
    }

    public function deleteUser($id){
        User::where('id', $id)
        ->update([
                    'inactivo' => '1'
                ]);
        
        $tabla = 'Usuarios';
        $modulo = 'Ajustes/gestion usuarios';
        $accion = 'Baja usuario';
        \HistorialCambios::Logcambios($tabla,$modulo,$accion, $id);
    }
}
