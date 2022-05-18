<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;
use App\Models\Acceso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Hash;


class UsuariosController extends Controller
{
    public function StartLogin(Request $request){

       $param = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where(['correo' => $param['email'], 'inactivo' => '0'])->first();

        if($user){
           $token = $user->createToken($request->device_name)->plainTextToken;
           $message = 'Success'; 
           $status  = '200';
           $this->logAcceso($status, $user->id);

        }else if(!$user){
            $token = null;
            $message = 'No encontramos este usuario';
            $status = '501';
        }
        else if(!Hash::check($param['password'], $user->contrasena)){
            $token = null;
            $message = 'Credenciales incorrectos';
            $status = '402';
            $this->logAcceso($status, $user->id);
        }

        $roles = Rol::select('permisos')
        ->join('users', 'users.id_rol', '=', 'roles.id')
        ->where('users.id', $user->id)
        ->get();

        return  response()->json(['token' => $token , 
                                'access' => $roles, 'status' => $message],
                                 $status);
       
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
    }

    public function logAcceso($status, $id){
        $log = new Acceso();
        $log->ip = $_SERVER['REMOTE_ADDR'];
        $log->estado = $status;
        $log->id_usuario = $id;
        $log->fechaacceso = date('Y-m-d H:i:s');
        $log->save();
    }

    public function getAccesos(){
        $user = DB::table('registroaccesos')
        ->join('users', 'users.id', '=', 'registroaccesos.id_usuario')
        ->select('registroaccesos.*','users.nombre', 'users.correo')
        ->where('users.inactivo', '=', '0')
        ->get();
        
        return response()->json(['accesos' => $user], 200);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(['msg' => 'Token destruido']);
    }

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
            return response()->json(['msg' => 'OK'], 200);
        }else{
            return response()->json(['msg' => 'Error'], 501);
        }
    }

}
