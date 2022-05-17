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

    public function ActualizaUsuario(Request $request){
        User::where('id', $request->id)
        ->update([
                    'name' => $request->nombre, 
                    'apellidos' => $request->apellidos, 
                    'foto' => $request->foto, 
                    'correo' => $request->correo
                ]);
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

          /*User::create(
            [
                'nombre' => 'Super admin',
                'apellidos' => 'admin',
                'foto' => 'admin.png',
                'correo' => 'admin@admin.com',
                'contrasena' => Hash::make('12345'),
                'inactivo' => '0',
                'id_rol' => '1'
            ]
        );*/
}
