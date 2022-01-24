<?php

namespace GoodPayments\Datatrans\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;
use GoodPayments\Datatrans\Models\DatatransSetting;
use Illuminate\Support\Facades\Auth;

class DatatransSettingController extends Controller
{

    public function index(){
        if(Auth::user()->is_superuser == 1){
            $settings = DB::table('datatrans_settings')->get();
            return view('datatrans::datatransetting')->with('settings', $settings);
        }
        else{
            $settings = DB::table('datatrans_settings')->where('own_id', Auth::user()->id)->get();
            return view('datatrans::datatransetting')->with('settings', $settings);
        }

        
    }

    public function create(Request $request){
        
        try{
            $Setting = new DatatransSetting;
            $Setting->end_day = request('end_day');
            $Setting->start_time = request('start_time');
            $Setting->end_time = request('end_time');
            $Setting->payment_enable = request('payment_enable');
            $Setting->own_id = Auth::user()->id;
            $Setting->save();
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            
            return response()->json(['success'=>false]);
        }  
    }

    public function update($id){
        
        try{
            DB::table('datatrans_settings')->where('id', $id)->update([
                'end_day' => request('uend_day'),
                'start_time' => request('ustart_time'),
                'end_time' => request('uend_time'),
                'payment_enable' => request('upayment_enable')
            ]);
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }  
    }
}