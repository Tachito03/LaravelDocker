<?php

namespace App\Http\Controllers;

//use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Hash;



class UsuariosController extends Controller
{
    public function create(){

        $user = Usuario::create(
            [
                'nombre' => 'admin',
                'apellido' => 'admin',
                'foto' => 'admin',
                'contrasena' => Hash::make('12345'),
                'inactivo' => '0',
                'id_rol' => '1',
                'ultima_sesion' => 'demo',
                'fecha_creacion' => 'demo',
                'fecha_actualizacion' => 'demo'
            ]
        );
       /* $user->nombre = 'admin';
        $user->apellido = 'admin';
        $user->foto = 'foto.png';
        $user->correo = 'admin@admin.com';
        $user->contrasena = Hash::make('12345');
        $user->inactivo = '0';
        $user->id_rol = '1';
        $user->ultima_sesion = 'demo';
        $user->fecha_creacion = 'demo';
        $user->fecha_actualizacion = 'demo';
        $user->save();*/

    }


    public function logInit(Request $request){
       $param = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = Usuario::where('correo', $param['email'])->first();


        if(!Hash::check($param['password'], $user->contrasena)){
            return response()->json([
                'msg' => 'Credenciales incorrectos'
            ], 401);
        }

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('appToken')->plainTextToken
        ], 200);
    }
}
