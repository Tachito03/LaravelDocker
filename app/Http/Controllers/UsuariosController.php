<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;
use App\Models\Acceso;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;


class UsuariosController extends Controller
{
    public function StartLogin(Request $request){
        
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $usuario = User::where(['correo' => $request->email, 'inactivo' => '0'])->first();
            
        if(! $usuario || ! Hash::check($request->password, $usuario->contrasena)){
            $this->registraAcceso($request->email, $request->password, 'Credenciales Incorrectos');

            //prueba envio de correo
            //$mail = new SendMail($request->all());
            //Mail::to('eustacio.bautista@grupoperti.com.mx')->send($mail);
            return response()->json(['message' => 'Credenciales incorrectos'], 501);
                
        }else{
            session(['usuario' => $usuario->nombre]);
                $token = $usuario->createToken($request->email)->plainTextToken;
                $roles = Rol::select('permisos')->join('users', 'users.id_rol', '=', 'roles.id')
                ->where('users.id', $usuario->id)->get();
    
                $this->registraAcceso($request->email, 'OK', 'Success');
                $this->ultimaConexion($usuario->id);
                return  response()->json(['token' => $token , 
                                          'access' => $roles, 'msg' => 'OK'], 200);
        }
    }

    public function ultimaConexion($iduser){
        $ultimaconexion = User::find($iduser);
        $ultimaconexion->ultima_sesion = date('Y-m-d H:i:s');
        $ultimaconexion->update();
    }

    public function registraAcceso($email, $pw, $msg){
        $log = new Acceso();
        $log->correo = $email;
        $log->contrasena = $pw;
        $log->ip = $_SERVER['REMOTE_ADDR'];
        $log->estado = $msg;
        $log->fecha_acceso = date('Y-m-d H:i:s');
        $log->save();
    }

    public function HistorialAccesos(){
        $accesos = Acceso::All();
        return response()->json(['accesos' => $accesos], 200);
    }

    public function HistorialModificaciones(){
        $historial = \HistorialCambios::ObtieneHistorial();
        return response()->json(['historial' => $historial], 200);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        session()->forget('usuario');
        return response()->json(['msg' => 'Token destruido']);
    }



}
