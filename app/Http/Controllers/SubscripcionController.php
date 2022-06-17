<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plan;

class SubscripcionController extends Controller
{

    public function index(){
        $planes = Plan::All();
        return response()->json(['planes' => $planes], 200);
    }

    public function mostrarPlan($plan){
        $plan = Plan::where(['slug' => $plan])->get();
        return response()->json(['detalle' => $plan], 200);
    }
    public function obtieneUsuario(){
        $usuario = User::where('id',session('userid'))->first();
        return response()->json(['usuario' => $usuario], 200);
    }

    public function checkSubscribed($prod_id, $name_prod){
        $user = User::find(session('userid'));
        //$plan = Plan::where('stripe_product_id', $prod_id)->fi;

        if($user->subscribedToProduct($prod_id, $name_prod)){
            return response()->json(['status' => true], 200);
        }else{
            return response()->json(['status' => false], 200);
        }
    }

    public function procesoPago(Request $request){

        try{
            $user = User::find(session('userid'));

            $paymentMethod = $request->input('payment_method_id');
            $plan = Plan::where('slug', $request->input('slug'))->first();
            $user->newSubscription($plan->name, $plan->plan_id)->create($paymentMethod);
            return response()->json(['message' => '¡Su pago se ha completado correctamente!', 'data'=> $user->stripe_id], 200);
            
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 501);
        }
    }
}
