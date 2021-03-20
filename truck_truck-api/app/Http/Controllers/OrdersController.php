<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use  DateTimeZone;
use Exception;




class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 $date = new DateTime("now", new DateTimeZone('Asia/Bangkok') );
 try{
     DB::table('orders')->insert(
           
            [  'name_recipient'=>$request->name_recipient, 
                'detail_address_recipient'=>$request->detail_address_recipient, 
                'subdistrict_recipient'=>$request->subdistrict_recipient,
                'district_recipient'=>$request->district_recipient,
                'province_recipient'=>$request->province_recipient, 
                'postCode_recipient'=>$request->postCode_recipient,
                'tel_recipient'=>$request->tel_recipient,
                'shipping_company_id'=>$request->shipping_company_id,
                'employer_id'=>$request->employer_id,
                'name_giver'=>$request->name_giver,
                'detail_address_giver'=>$request->detail_address_giver,
                'subdistrict_giver'=>$request->subdistrict_giver,
                'district_giver'=>$request->district_giver,
                'province_giver'=>$request->province_giver,
                'postCode_giver'=>$request->postCode_giver,
                'tel_giver'=>$request->tel_giver,
                'pick_up_date'=>$request->pick_up_date,
                'delivery_date'=>$request->delivery_date,
                'product_type'=>$request->product_type,
                'weight_product'=>$request->weight_product,
                'cost'=>$request->cost,
                'created_at'=>$request->created_at,
                'updated_at'=>$request->updated_at,
                'status'=>0,
                'update_at'=>$date
            ]
     );}catch (Exception  $e) {
        dd($e);
        return false;
 }
   
          
       
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = DB::table('orders')->where('shipping_company_id', $id)
        ->orWhere('employer_id',  $id)
        ->get();
        return response()->json( $result,200);
    }
    public function showByID($id)
    {
        $result = DB::table('orders')->where('id', $id)->first();
        return response()->json( $result,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id ,$status)
    {
        DB::table('orders')->where("id",$id)->update([
            'status'=>$status
        ]);
        return true; 
    }

    public function  saveSignaturepad($id,Request $request){
        try{
             DB::table('orders')->where("id",$id)->update([
            "signaturepad"=>$request->signaturepad,
            "status"=>3
        ]);
        }catch (Exception  $e) {
            dd($e);
            return false;
     }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
