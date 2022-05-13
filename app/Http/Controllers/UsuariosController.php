<?php

namespace App\Http\Controllers;

//use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Hash;



class UsuariosController extends Controller
{

    public function __construct(){
       // $this->middleware('auth:sanctum')->only('logout');
    }

    public function logInit(Request $request){
       $param = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        /*Usuario::create(
            [
                'nombre' => 'admin2',
                'apellidos' => 'admin2',
                'foto' => 'admin',
                'correo' => 'admin@gmail.com',
                'contrasena' => Hash::make('12345'),
                'inactivo' => '1',
                'id_rol' => '1'
            ]
        );*/

        Usuario::where('id', '3')
        ->update([
                    'name' => 'Invitado', 
                    'apellidos' => 'Invitado', 
                    'foto' => 'foto2.png', 
                    'correo' => 'invitado@gmail.com',
                    'contrasena' => Hash::make('12345'),
                    'inactivo' => '0',
                    'id_rol' => '2'
                ]);

        $options = ['correo' => $param['email'], 'inactivo' => '0'];
        $user = Usuario::where($options)->first();

        if(!$user){
            return response()->json(['status' => 'Usuario no existe'], 501);
        }else if(!Hash::check($param['password'], $user->contrasena)){
            return response()->json(['status' => 'Credenciales incorrectos'], 401);
        }

        return response()->json([
            //'user' => $user,
            'token' => $user->createToken('appToken')->plainTextToken
        ], 200);
    }

    public function ObtieneUsuarios(){
        return Usuario::where('inactivo', '=', '0')->get();
    }

    public function ActualizaUsuario(Request $request){
        Usuario::where('id', $request->id)
        ->update([
                    'name' => $request->nombre, 
                    'apellidos' => $request->apellidos, 
                    'foto' => $request->foto, 
                    'correo' => $request->correo
                ]);
    }

    public function DesactivaUsuario($id){
        Usuario::where('id', $id)
        ->update([
                    'inactivo' => '1'
                ]);
    }


    public function logout(){
        Auth::logout();
    }
}
