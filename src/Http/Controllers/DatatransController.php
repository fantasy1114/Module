<?php

namespace GoodPayments\Datatrans\Http\Controllers;

use Exception;
use GoodPayments\Datatrans\Models\DatatransOrder;
use GoodPayments\Datatrans\Providers\Event;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DatatransController extends Controller
{
    public function index($id)
    {

        $events = Event::get();

        // print_r(strtotime($events[0]->start->dateTime));
        // print_r(strtotime($events[0]->end->dateTime));

        // $start_day = time();
        // $setting_end_day = DB::table('datatrans_settings')->where('own_id', $id)->get('end_day');
        // $setting_start_time = DB::table('datatrans_settings')->where('own_id', $id)->get('start_time');
        // $setting_end_time = DB::table('datatrans_settings')->where('own_id', $id)->get('end_time');

        // $end_day = $start_day + ((($setting_end_day[0])->end_day) * 86400);

        // $s_temp_time = ($setting_start_time[0])->start_time;
        // $stime = explode(':', $s_temp_time);
        // $start_time = ($stime[0] * 3600) + ($stime[1] * 60) + ($stime[2]);

        // $e_temp_time = ($setting_end_time[0])->end_time;
        // $etime = explode(':', $e_temp_time);
        // $end_time = ($etime[0] * 3600) + ($etime[1] * 60) + ($etime[2]);

        // $defference_time = 1800000;

        // $now_second = date('h', time()) * 3600 + date('i', time()) + date('s', time());

        $categories = DB::table('datatrans_categories')->where('own_id', $id)->get();
        $services = DB::table('datatrans_services')->where('own_id', $id)->get();

        // $orders = DB::table('datatrans_orders')->where('own_id', $id)->get();
        $orders = array();
        $orders_service_name = DB::table('datatrans_orders')
            ->where('own_id', $id)
            ->groupBy('service_name', 'datatrans_day', 'datatrans_time')
            ->get();

        for ($i = 0; $i < count($orders_service_name); $i++) {
            $order_num = DB::table('datatrans_orders')->where('own_id', $id)->where('service_name', $orders_service_name[$i]->service_name)->where('datatrans_day', $orders_service_name[$i]->datatrans_day)->where('datatrans_time', $orders_service_name[$i]->datatrans_time)->count();

            foreach ($services as $service) {

                if ($service->title == $orders_service_name[$i]->service_name && $order_num >= $service->allow) {
                    array_push($orders, $orders_service_name[$i]);
                }
            }
        }

        // $settings = DB::table('datatrans_settings')->where('own_id', $id)->get();
        $merchantId = env('merchantId');

        return view('datatrans::service')->with('categories', $categories)->with('services', $services)->with('orders', $orders)->with('events', $events)->with('merchantId', $merchantId)->with('id', $id);
    }
    public function create(Request $request)
    {
        try {
            $email = new \SendGrid\Mail\Mail();

            $email->setFrom(env('SENDGRID_SENDER_MAIL'), "Datatrans");
            $email->setSubject("Welcome to use Our Service");
            $email->addTo(request('client_email'), "Example User");
            $email->addContent("text/plain", "Message");
            $email->addContent(
                "text/html", "Dear " . $request->client_name . "<p>We expect you on " . request('datatrans_day') . " at " . request('datatrans_time') . "<p>Thank you for choosing our company.</p>"
            );
            // $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
            $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));

            $response = $sendgrid->send($email);

            $Order = new DatatransOrder;
            $Order->service_name = $request->service_name;
            $Order->category_name = $request->category_name;
            $Order->timezone_name = $request->timezone_name;
            $Order->datatrans_day = $request->datatrans_day;
            $Order->datatrans_time = $request->datatrans_time . ':00';
            $Order->client_name = $request->client_name;
            $Order->phone_num = $request->phone_num;
            $Order->client_email = $request->client_email;
            $Order->client_comment = $request->client_comment;

            $Order->datatrans_payment = $request->datatrans_payment;
            $Order->own_id = $request->own_id;
            $Order->save();

            return response()->json(['success' => true]);
        } catch (Exception $e) {
            dd($e);
            return response()->json(['success' => false]);
        }
    }

    public function transactionget(Request $request)
    {
        $price = $request->price;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.sandbox.datatrans.com/v1/transactions',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "currency": "CHF",
                "refno": "Test",
                "amount": '.$price.',
                "paymentMethods": ["ECA","VIS","TWI"],
                "autoSettle": true,
                "option": {
                    "createAlias": true
                },
                "redirect": {
                    "successUrl": "https://ybooking.ch/datatrans-service-pay",
                    "cancelUrl": "https://ybooking.ch/datatrans-service-cancel",
                    "errorUrl": "https://ybooking.ch/datatrans-service-error"
                }
            }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic ',
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);
        $response = str_replace(['transactionId', '{', '}', ':', '"', ' '], ['', '', '', '', '', ''], $response);
        

        curl_close($curl);
        // print_r($response);exit;
        return response()->json(['success' => $response]);
    }

    public function pay(Request $request)
    {
        dd($request);
    }

    public function error(Request $request)
    {
        dd($request->requestUri);
       
    }
	
	public function cancel(Request $request)
    {
        dd($request);
    }

}
