<?php

namespace GoodPayments\Datatrans\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Exception;
use GoodPayments\Datatrans\Models\DatatransCategory;
use Illuminate\Support\Facades\Auth;

class DatatransCategoryController extends Controller
{
    public function index(){
        if(Auth::user()->is_superuser == 1){
            $categories = DB::table('datatrans_categories')->get();
            return view('datatrans::datatranscategory')->with('categories', $categories);
        }
        else{
            $categories = DB::table('datatrans_categories')->where('own_id', Auth::user()->id)->get();
            return view('datatrans::datatranscategory')->with('categories', $categories);
        }
    }

    public function create(){
        
        try{
            $Categories = new DatatransCategory;
            $Categories->name = request('categoryname');
            $Categories->own_id = Auth::user()->id;
            $Categories->save();
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }  
    }
    public function update($id){
        
        try{
            DB::table('datatrans_categories')->where('id', $id)->update([
                'name' => request('uname')
            ]);
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }  
    }
    public function delete($id){
     
        try{
            DB::table('datatrans_categories')->where('id', $id)->delete();
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }
    }
}