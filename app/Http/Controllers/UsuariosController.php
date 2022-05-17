<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Hash;


class UsuariosController extends Controller
{
    public function IniciaSesion(Request $request){

       $param = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where(['correo' => $param['email'], 'inactivo' => '0'])->first();

        if(!$user){
            return response()->json(['status' => 'Usuario no existe'], 501);
        }else if(!Hash::check($param['password'], $user->contrasena)){
            return response()->json(['status' => 'Credenciales incorrectos'], 402);
        }

        $roles = Rol::select('permisos')
        ->join('users', 'users.id_rol', '=', 'roles.id')
        ->where('users.id', $user->id)
        ->get();
        
        $token = $user->createToken($request->email)->plainTextToken;

        return  response()->json(['token' => $user->createToken($request->device_name)->plainTextToken, 
                                'access' => $roles],
                                 200);
       
    }

    public function ObtieneUsuarios(){
        $user = User::where('inactivo', '=', '0')->get();
        return $user;
    }

    public function editaUsuario($id){
        $user = User::find($id);
        return response()->json(['usuario' => $user], 200);
    }

    public function DesactivaUsuario($id){
        User::where('id', $id)
        ->update([
                    'inactivo' => '1'
                ]);
    }

    public function Salir(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(['msg' => 'Token destruido']);
    }

    public function guardaUsuario(Request $request){
        $user = new user();
        $user->nombre = $request->input('nombre');
        $user->apellidos = $request->input('apellidos');
        $user->foto = 'general.jpg';
        $user->correo = $request->input('correo');
        $user->contrasena = Hash::make($request->input('contrasena'));
        $user->inactivo = '0';
        $user->id_rol = $request->input('rol');
        $user->created_at = date('Y-m-d H:i:s');
        $user->save();

        if($user){
            return response()->json(['msg' => 'OK'], 200);
        }else{
            return response()->json(['msg' => 'Error'], 501);
        }

        //return response()->json(['msg' => $message]);
    }

    public function ActualizaUsuario(Request $request, $id){

        $user = User::find($id);
        $user->nombre = $request->input('nombre');
        $user->apellidos = $request->input('apellidos');
        $user->foto = 'general.jpg';
        $user->correo = $request->input('correo');
        $user->contrasena = Hash::make($request->input('contrasena'));
        $user->inactivo = '0';
        $user->id_rol = $request->input('rol');
        $user->updated_at = date('Y-m-d H:i:s');
        $user->update();

        if($user){
            return response()->json(['msg' => 'OK'], 200);
        }else{
            return response()->json(['msg' => 'Error'], 501);
        }
    }

}
