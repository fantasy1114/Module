<?php

namespace GoodPayments\Datatrans\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;
use GoodPayments\Datatrans\Models\DatatransMerchant;
use Illuminate\Support\Facades\Auth;

class DatatransMerchantController extends Controller
{

    public function index(){
        if(Auth::user()->is_superuser == 1){
            $merchants = DB::table('datatrans_merchants')->get();
            return view('datatrans::datatransmerchant')->with('merchants', $merchants);
        }
        else{
            $merchants = DB::table('datatrans_merchants')->where('own_id', Auth::user()->id)->get();
            return view('datatrans::datatransmerchant')->with('merchants', $merchants);
        }
    }

    public function create(Request $request){
      
        try{
            $Merchant = new DatatransMerchant;
            $Merchant->merchant_name = request('merchant_name');
            $Merchant->merchant_id = request('merchant_id');
            $Merchant->own_id = Auth::user()->id;
            $Merchant->save();
            return response()->json(['success'=>true]);
           
        }catch (Exception $e) {
            // dd($e);
            return response()->json(['success'=>false]);
        }  
    }
    public function update($id){
        
        try{
        
            DB::table('datatrans_merchants')->where('id', $id)->update([
                'merchant_name' => request('umerchant_name'),
                'merchant_id' => request('umerchant_id'),            
            ]);
            return response()->json(['success'=>true]);
        
            
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }  
    }
    public function delete($id){
     
        try{
            DB::table('datatrans_merchants')->where('id', $id)->delete();
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }
    }
}