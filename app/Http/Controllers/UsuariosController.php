<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;
use App\Models\Acceso;
use App\Models\IntentoSesion;
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

        $attempts = DB::table('intentos_sesion')->select('intentos', 'tiempomax')->first();
        $attempts_default = session()->get('default_intentos', 1);
        $usuario = User::where(['correo' => $request->email, 'inactivo' => '0'])->first();

        if(empty($usuario)){
            return response()->json(['message' => 'Tu usuario no está dado de alta'], 501);
        }

        if($usuario->bloqueado === 1){
            return response()->json(['message' => 'Este usuario se ha bloqueado temporalmente'], 501);
        }
        
            if(!Hash::check($request->password, $usuario->contrasena)){
                $this->registraAcceso($request->email, $request->password, 'Credenciales Incorrectos'); 
                    if($attempts_default === 1){
                        session()->put('fecha_inicio', date("Y/m/d H:i:s"));
                    }
                    session()->put('default_intentos', $attempts_default + 1);
                    $minutos_actual = $this->minutos_transcurridos(session()->get('fecha_inicio'));

                    if($minutos_actual <= $attempts->tiempomax && $attempts_default === $attempts->intentos){  
                        $this->bloquear_usuario($usuario->id);
                        return response()->json(['message' => 'Tu usuario se ha bloqueado, contáctate con el administrador para desbloquear'], 501);
                    }else if($minutos_actual > $attempts->tiempomax){
                        Session::forget('default_intentos');
                        Session::forget('fecha_inicio');
                    }
                
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

    public function bloquear_usuario($id){
        $bloqueado = User::find($id);
        $bloqueado->bloqueado = '1';
        $bloqueado->fecha_bloqueado = date('Y-m-d H:i:s');
        $bloqueado->update();
    }

    public function activateUsuario($id){
        $activar_usuario = User::find($id);
        $activar_usuario->bloqueado = '0';
        $activar_usuario->update();
        session()->forget('default_intentos');
        session()->forget('fecha_inicio');

        if($activar_usuario){
            $tabla = 'usuarios';
            $modulo = 'Ajustes/Usuarios blocked';
            $accion = 'Activar usuario';
        
            \HistorialCambios::Logcambios($tabla,$modulo,$accion,$id);
                return response()->json(['message' => 'OK'], 200);
        }else{
            return response()->json(['message' => 'Error'], 501);
        }

    }

    public function HistorialAccesos(){
        $accesos = Acceso::All();
        return response()->json(['accesos' => $accesos], 200);
    }

    public function HistorialModificaciones(){
        $historial = \HistorialCambios::ObtieneHistorial();
        return response()->json(['historial' => $historial], 200);
    }

    public function usuariosBloqueados(){
        $usuarios_bloqueados = User::where(['bloqueado' => '1', 'inactivo' => '0'])->get();
        return response()->json(['bloqueados' => $usuarios_bloqueados], 200);
    }

    public function intentosSesion(){
        $dataIntentos = DB::table('intentos_sesion')->select('id', 'intentos', 'tiempomax')->first();
        return response()->json(['intentos' => $dataIntentos], 200);
    }

    public function updateIntentoSesion($id, Request $request){

        $reglas = [
            'intentos' => 'required',
            'tiempomax' => 'required'
        ];

        $mensajes = [
            'intentos.required' => 'El campo intentos es requerido',
            'tiempomax.required' => 'El campo tiempo máximo es requerido',
        ];

        $validator = Validator::make($request->all(), $reglas, $mensajes);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 401);
        }
        
        $updateIntento = IntentoSesion::find($id);
        $updateIntento->intentos = $request->intentos;
        $updateIntento->tiempomax = $request->tiempomax;
        $updateIntento->fecha_actualizado = date('Y-m-d H:i:s');
        $updateIntento->update();

        if($updateIntento){
            $tabla = 'Intentos de sesión';
            $modulo = 'Ajustes/Bloqueo usuario';
            $accion = 'Actualización';
        
            \HistorialCambios::Logcambios($tabla,$modulo,$accion,$id);
                return response()->json(['message' => 'OK'], 200);
        }else{
            return response()->json(['message' => 'Error'], 501);
        }

    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        session()->forget(['usuario', 'default_intentos', 'fecha_inicio']);
        return response()->json(['message' => 'OK'], 200);
    }

    public function minutos_transcurridos($fecha_inicio){
        $fecha_final= date("Y/m/d H:i:s"); 
        $minutos = (strtotime($fecha_inicio)-strtotime($fecha_final))/60;
        $minutos = abs($minutos); 
        $minutos = floor($minutos);
        return $minutos;
    }

    //prueba envio de correo
    //$mail = new SendMail($request->all());
    //Mail::to('eustacio.bautista@grupoperti.com.mx')->send($mail);

}
