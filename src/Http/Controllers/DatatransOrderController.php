<?php

namespace GoodPayments\Datatrans\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;
use GoodPayments\Datatrans\Models\DatatransOrder;
use Illuminate\Support\Facades\Auth;

class DatatransOrderController extends Controller
{

    public function index(){
        if(Auth::user()->is_superuser == 1){
            $orders = DB::table('datatrans_orders')->get();
            $services = DB::table('datatrans_services')->get();
            $categories = DB::table('datatrans_categories')->get();
            return view('datatrans::datatransorder')->with('orders', $orders)->with('services', $services)->with('categories', $categories);
        }
        else{
            $orders = DB::table('datatrans_orders')->where('own_id', Auth::user()->id)->get();
            $services = DB::table('datatrans_services')->where('own_id', Auth::user()->id)->get();
            $categories = DB::table('datatrans_categories')->where('own_id', Auth::user()->id)->get();
            return view('datatrans::datatransorder')->with('orders', $orders)->with('services', $services)->with('categories', $categories);
        }
        
    }

    public function create(Request $request){
        try{
            $Order = new DatatransOrder;
            $Order->service_name = request('service_name');
            $Order->category_name = request('category_name');
            $Order->timezone_name = request('timezone_name');
            $Order->datatrans_day = request('datatrans_day');
            $Order->datatrans_time = request('datatrans_time');
            $Order->client_name = request('client_name');
            $Order->phone_num = request('phone_num');
            $Order->client_email = request('client_email');
            $Order->client_comment = request('client_comment');
            $Order->datatrans_payment = request('datatrans_payment');
            $Order->status = request('status');
            $Order->own_id = request('own_id');
            $Order->save();
            
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            
            return response()->json(['success'=>false]);
        }  
    }
    public function update($id){
        
        try{
            DB::table('datatrans_orders')->where('id', $id)->update([
                'service_name' => request('uservice_name'),
                'category_name' => request('ucategory_name'),
                'timezone_name' => request('utimezone_name'),
                'datatrans_day' => request('udatatrans_day'),
                'datatrans_time' => request('udatatrans_time'),
                'client_name' => request('uclient_name'),
                'phone_num' => request('uphone_num'),
                'client_email' => request('uclient_email'),
                'client_comment' => request('uclient_comment'),
                'datatrans_payment' => request('udatatrans_payment'),
                'status' => request('ustatus')         
            ]);

            if(request('ustatus') == 'declined'){
                $email = new \SendGrid\Mail\Mail();
                $email->setFrom(env('SENDGRID_SENDER_MAIL'), "Datatrans");
                $email->setSubject("Welcome to use Our Service");
                $email->addTo(request('uclient_email'), "User");
                $email->addContent("text/plain", "Message");
                $email->addContent(
                    "text/html", "Dear " . request('uclient_name') . "<p>Your order has been declined</p>"
                );
                // $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
                $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));

                $response = $sendgrid->send($email);
            }
            else if(request('ustatus') == 'Confirmed'){
                $email = new \SendGrid\Mail\Mail();
                $email->setFrom(env('SENDGRID_SENDER_MAIL'), "Datatrans");
                $email->setSubject("Welcome to use Our Service");
                $email->addTo(request('uclient_email'), "User");
                $email->addContent("text/plain", "Message");
                $email->addContent(
                    "text/html", "Dear " . request('uclient_name') . "<p>Your order has been Confirmed</p>"
                );
                // $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
                $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));

                $response = $sendgrid->send($email);
            }
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }  
    }
    public function delete($id){
     
        try{
            DB::table('datatrans_orders')->where('id', $id)->delete();
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }
    }
}