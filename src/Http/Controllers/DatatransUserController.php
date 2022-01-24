<?php

namespace GoodPayments\Datatrans\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DatatransUserController extends Controller
{
    public function index(){
        
        $users = DB::table('users')->get();
        return view('datatrans::datatransuser')->with('users', $users);
    
    }

    public function create(){
        
        try{
            $User = new User;
            $User->name = request('username');
            $User->email = request('useremail');
            $User->password = Hash::make(request('userpassword'));
            $User->is_superuser = request('is_superuser');
            $User->save();
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }  
    }
    public function update($id){
        
        try{
            DB::table('users')->where('id', $id)->update([
                'name' => request('uusername'),
                'email' => request('uuseremail'),
                'password' => Hash::make(request('userpassword')),
                'is_superuser' => request('uis_superuser')
            ]);
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }  
    }
    public function delete($id){
     
        try{
            DB::table('users')->where('id', $id)->delete();
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }
    }
}