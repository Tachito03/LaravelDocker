<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Hash, Auth;
use App\Models\User;
use DB;

class UserController extends Controller
{
    
    public function __construct(){
      //  $this->middleware('auth');
    }

    public function getLogin(){
        return view('login');
    }

    public function getRegister(){
        return view('register');
    }

    public function postRegister(Request $request){

        $validacion =[
            'name' => "required",
            'lastname' => "required",
            'email' => "required|email|unique:users,email",
            'phone' => "required|min:11|numeric",
            'password' => "required|alphaNum|min:8|max:15",
            'cpassword' => "required|alphaNum|same:password"
        ];

        $mensajes =[
            'name.required' => "El Nombre es requerido",
            'lastname.required' => "El Apellido es requerido",
            'email.required' => "El email es requerido",
            'email.email' => "El email que ingresó no tiene el formato correcto",
            'email.unique' => "Este email ya existe, pruebe con otro",
            'password.required' => "El password es requerido",
            'password.min' => "El password debe tener al menos 8 caracteres",
            'cpassword.required' => "Es necesario confirmar la contraseña",
            'cpassword.min' => "El password debe tener al menos 8 caracteres",
            'cpassword.same' => "Las contraseñas no coinciden"
        ];

        $validator = Validator::make($request->all(), $validacion, $mensajes);

        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Vaya hubo un error, hay campos vacios')->with('typealert', 'danger');
        else:
            $user = new User;
            $user->name =  e($request->input('name'));
            $user->lastname =  e($request->input('lastname'));
            $user->phone =  e($request->input('phone'));
            $user->email =  e($request->input('email'));
            $user->password =  Hash::make($request->input('password'));

            if($user->save()):
                return redirect('/')->with('message', 'Se ha registrado con éxito, puedes iniciar sesión')
                ->with('typealert', 'success');
            endif;
    
        endif;  
    }


    public function postLogin(Request $request){

        $validacion =[
            'email' => "required",
            'password' => "required|min:8|max:15"
        ];

        $mensajes =[
            'email.required' => "El email es requerido",
            'email.email' => "El email que ingresó no tiene el formato correcto",
            'password.required' => "El password es requerido",
            'password.min' => "El password debe tener al menos 8 caracteres"
        ];

        $email = $request->input('email');
        $password = $request->input('password');

        $validator = Validator::make($request->all(), $validacion, $mensajes);
        
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Vaya hubo un error, hay campos vacios')->with('typealert', 'danger');
        else:
            if(Auth::attempt(['email'=> $email, 'password'=> $password], true)):
                return redirect('/dashboard');
            else:
                return back()->withErrors($validator)->with('message', 'usuario y/o contraseña incorrectas')->with('typealert', 'danger');
            endif;
        endif;
    }

    public function getEditUser($id){
        $user = DB::table('users')->find($id);
        return response()->json(['data'=> $user]);
    }

    public function PostEditUser(Request $request, $id){
        $user = DB::table('users')->where('id', $id)
            ->update(array(
                'name' => e($request->input('name')),
                'lastname' => e($request->input('lastname')),
                'email' => e($request->input('email')),
                'phone' => e($request->input('phone')),

            ));

        if($user):
            return response()->json(['success' => 'ok']);
        else:
            return response()->json(['success' => 'error']);
        endif;

       // $user->update();

    }

    Public function PostDeleteUser($id){
        $user = DB::table('users')->where('id',$id)->delete();

        if($user):
            return response()->json(['success' => 'ok']);
        else:
            return response()->json(['success' => 'error']);
        endif;
    }


    public function dashboard(){
        $data_user = DB::table('users')->get();
       //$data_user = User:all();
        return view('dashboard',['user'=> $data_user]);
    }

    public function getlogout(){
        Auth::logout();
        return redirect('/');
    }
}
