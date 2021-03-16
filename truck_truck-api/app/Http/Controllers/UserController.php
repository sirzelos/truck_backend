<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\User;
use App\ShippingCompany;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user(Request $request){
        return $request->user();
    }

    public function getUserByID($id){
        $result =DB::table('users')->where('id',$id)->first();
        return response()->json( $result,200);
    }

    public function register(Request $request){
       User::create(
        [
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            'password'=>Hash::make($request->password)
        ]
       );
    }

    public function getShippingCompany(){
        $result =DB::table('shippingcompany')
            ->join('users', 'shippingcompany.user_id', '=', 'users.id')
            ->select('shippingcompany.*', 'users.name')
            ->get();
        return response()->json( $result,200);
    }

    public function addDetailShippingCompany(Request $request){

    $detailShippingCompany = DB::table('shippingcompany')->where('user_id',$request->user_id)->count();
  
    if($detailShippingCompany===0){
        $data = [$request->north_mini_weight_cost,$request->bangkok_mini_weight_cost,$request->east_mini_weight_cost,
        $request->west_mini_weight_cost,$request->northeast_mini_weight_cost, $request->central_mini_weight_cost
        ,$request->south_mini_weight_cost];
       
        $max = max($data);
        $min = min($data);
  
        DB::table('shippingcompany')->insert([
        'user_id' => $request->user_id,
        'oil_cost' => $request->oil_cost,
        'mini_weight' => $request->mini_weight,
        'north_mini_weight_cost' => $request->north_mini_weight_cost,
        'bangkok_mini_weight_cost' => $request->bangkok_mini_weight_cost,
        'east_mini_weight_cost' => $request->east_mini_weight_cost,
        'west_mini_weight_cost' => $request->west_mini_weight_cost,
        'northeast_mini_weight_cost' => $request->northeast_mini_weight_cost,
        'central_mini_weight_cost' => $request->central_mini_weight_cost,
        'south_mini_weight_cost' => $request->south_mini_weight_cost,
        'weight_to_kk'=>$request->weight_to_kk,
        'product_type' => $request->product_type,
        'approximate_price'=>$min .'-'.$max,
    ]);
    }
    else{ 
        $data = [$request->north_mini_weight_cost,$request->bangkok_mini_weight_cost,$request->east_mini_weight_cost,
        $request->west_mini_weight_cost,$request->northeast_mini_weight_cost, $request->central_mini_weight_cost
        ,$request->south_mini_weight_cost];
       
        $max = max($data);
        $min = min($data); 
        DB::table('shippingcompany')->where('user_id',$request->user_id)->update([
            'user_id' => $request->user_id,
            'oil_cost' => $request->oil_cost,
            'mini_weight' => $request->mini_weight,
            'north_mini_weight_cost' => $request->north_mini_weight_cost,
            'bangkok_mini_weight_cost' => $request->bangkok_mini_weight_cost,
            'east_mini_weight_cost' => $request->east_mini_weight_cost,
            'west_mini_weight_cost' => $request->west_mini_weight_cost,
            'northeast_mini_weight_cost' => $request->northeast_mini_weight_cost,
            'central_mini_weight_cost' => $request->central_mini_weight_cost,
            'south_mini_weight_cost' => $request->south_mini_weight_cost,
            'weight_to_kk'=>$request->weight_to_kk,
            'product_type' => $request->product_type,
            'approximate_price'=>$min .'-'.$max,
        ]);
    }
   
      }
    public function getDetailShippingCompany($id){
        $result = DB::table('shippingcompany')->where("user_id",$id)->first();
        if(is_null($result)){
            return response()->json(['message'=>'DetailShippingCompany Not found'],404);
        }
        return response()->json( $result,200);
    }
}
