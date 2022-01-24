<?php

namespace GoodPayments\Datatrans\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;
use GoodPayments\Datatrans\Models\DatatransService;
use Illuminate\Support\Facades\Auth;

class DatatransServiceController extends Controller
{

    public function index(){
        if(Auth::user()->is_superuser == 1){
            $services = DB::table('datatrans_services')->get();
            return view('datatrans::datatranservice')->with('services', $services);
        }
        else{
            $services = DB::table('datatrans_services')->where('own_id', Auth::user()->id)->get();
            return view('datatrans::datatranservice')->with('services', $services);
        }  
    }

    public function create(Request $request){
        
        try{
            $services = new DatatransService;
            $services->title = request('title');
            $services->duration = request('duration');
            $services->duration_name = request('duration_name');
            $services->price = request('price');
            $services->start_day = date('Y-m-d', strtotime(str_replace('/', '.', request('start_day'))));
            $services->end_day = date('Y-m-d', strtotime(str_replace('/', '.', request('end_day'))));
            $services->start_time = request('start_time');
            $services->end_time = request('end_time');
            $services->sun = request('sun')?1:0;
            $services->mon = request('mon')?1:0;
            $services->tue = request('tue')?1:0;
            $services->wed = request('wed')?1:0;
            $services->thu = request('thu')?1:0;
            $services->fri = request('fri')?1:0;
            $services->sat = request('sat')?1:0;
            $services->allow = request('allow');
            $services->own_id = Auth::user()->id;
            $services->save();
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            dd($e);
            return response()->json(['success'=>false]);
        }  
    }
    public function update($id){
        
        try{
            DB::table('datatrans_services')->where('id', $id)->update([
                'title' => request('utitle'),
                'duration' => request('uduration'),
                'duration_name' => request('uduration_name'),
                'price' => request('uprice'),
                'start_day' => date('Y-m-d', strtotime(str_replace('/', '.', request('ustart_day')))),
                'end_day' => date('Y-m-d', strtotime(str_replace('/', '.', request('uend_day')))),
                'start_time' => request('ustart_time'),
                'end_time' => request('uend_time'),
                'sun' => request('usun')?1:0,
                'mon' => request('umon')?1:0,
                'tue' => request('utue')?1:0,
                'wed' => request('uwed')?1:0,
                'thu' => request('uthu')?1:0,
                'fri' => request('ufri')?1:0,
                'sat' => request('usat')?1:0,
                'allow' => request('uallow')
            ]);
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }  
    }
    public function delete($id){
     
        try{
            DB::table('datatrans_services')->where('id', $id)->delete();
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }
    }
}