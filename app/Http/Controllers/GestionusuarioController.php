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

        $reglas = [
            'nombre' => 'required',
            'apellidos' => 'required',
            'correo' => 'required|email|unique:users,correo',
            'contrasena' => 'required|min:8|max:15',
            'contrasena_conf' => 'required|same:contrasena',
            'id_rol' => 'required'
        ];

        $mensajes = [
            'nombre.required' => 'El campo nombre es requerido',
            'apellidos.required' => 'El campo apellido es requerido',
            'correo.required' => 'El campo correo electrónico es requerido',
            'correo.email' => 'El campo correo electrónico tiene un formato incorrecto',
            'correo.unique' => 'Este correo electrónico ya existe, intente con otro',
            'contrasena.min' => 'La contraseña debe contener al menos 8 carácteres',
            'contrasena_conf.required' => 'Es necesario confirmar la contraseña',
            'contrasena_conf.min' => 'La contraseña debe contener al menos 8 carácteres',
            'contrasena_conf.same' => 'Las contraseñas no coinciden'
        ];

        $validator = Validator::make($request->all(), $reglas, $mensajes);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $user = new user();
        $user->nombre = $request->input('nombre');
        $user->apellidos = $request->input('apellidos');
        $user->foto = 'thumb.jpg';
        $user->correo = $request->input('correo');
        $user->contrasena = Hash::make($request->input('contrasena'));
        $user->inactivo = '0';
        $user->bloqueado = '0';
        $user->id_rol = $request->input('id_rol');
        $user->created_at = date('Y-m-d H:i:s');
        $user->save();

        if($user){
            $tabla = 'Usuarios';
            $modulo = 'Ajustes/gestion usuarios';
            $accion = 'Alta usuario';

            \HistorialCambios::Logcambios($tabla,$modulo,$accion, $user->id);
            return response()->json(['message' => 'OK'], 200);
        }else{
            return response()->json(['message' => 'Error'], 501);
        }

    }

    public function updateUser(Request $request, $id){

        $reglas = [
            'nombre' => 'required',
            'apellidos' => 'required',
            'correo' => 'required|email',
            'contrasena' => 'required|min:8|max:15',
            'contrasena_conf' => 'required|same:contrasena',
            'id_rol' => 'required'
        ];

        $mensajes = [
            'nombre.required' => 'El campo nombre es requerido',
            'apellidos.required' => 'El campo apellido es requerido',
            'correo.required' => 'El campo correo electrónico es requerido',
            'correo.email' => 'El campo correo electrónico tiene un formato incorrecto',
            'contrasena.min' => 'La contraseña debe contener al menos 8 carácteres',
            'contrasena_conf.required' => 'Es necesario confirmar la contraseña',
            'contrasena_conf.min' => 'La contraseña debe contener al menos 8 carácteres',
            'contrasena_conf.same' => 'Las contraseñas no coinciden'
        ];

        $validator = Validator::make($request->all(), $reglas, $mensajes);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 401);
        }

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
            $tabla = 'usuarios';
            $modulo = 'Ajustes/gestion usuarios';
            $accion = 'Actualizacion';

            \HistorialCambios::Logcambios($tabla,$modulo,$accion,$user->id);
            return response()->json(['message' => 'OK'], 200);
        }else{
            return response()->json(['message' => 'Error'], 501);
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
       $user = User::where('id', $id)
        ->update([
                    'inactivo' => '1'
                ]);

        if($user){
            $tabla = 'usuarios';
            $modulo = 'Ajustes/gestion usuarios';
            $accion = 'Baja usuario';
        
            \HistorialCambios::Logcambios($tabla,$modulo,$accion,$id);
                return response()->json(['message' => 'OK'], 200);
        }else{
            return response()->json(['message' => 'Error'], 501);
        }
    }
}
