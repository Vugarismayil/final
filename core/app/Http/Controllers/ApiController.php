<?php

namespace App\Http\Controllers;

use App\Order;
use App\Service;
use App\ServicePrice;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function order(Request $request){
        if(!isset($request->action)){
            $data['error'] = 'Action should not be empty';
            return response()->json($data);
        }
        if($request->action === 'services') {
            if (!isset($request->key)) {
                $data['error'] = 'Api Key should not be empty';
                return response()->json($data);
            }
            $user = User::where('api_key', $request->key)->where('status', 1)->latest()->first();
            if (empty($user) || $user->status == 0) {
                $data['error'] = 'Invalid Api key';
                return response()->json($data);
            }
            $servicePrice = ServicePrice::where('user_id', $user->id)->get();
            $serv = [];
            $allservices = [];
            foreach ($servicePrice as $service){
                $serv['service'] = $service->service;
                $serv['name'] = $service->service->name;
                $serv['category'] = $service->category->name;
                $serv['price_per_k'] = $service->price;
                $serv['min'] = $service->service->min;
                $serv['max'] = $service->service->max;

                $allservices[]= $serv;
            }
            return $allservices;

        }elseif($request->action === 'add') {
            if (!isset($request->key)) {
                $data['error'] = 'Api Key should not be empty';
                return response()->json($data);
            } elseif (!isset($request->service)) {
                $data['error'] = 'Service Id should not be empty';
                return response()->json($data);
            } elseif (!isset($request->link)) {
                $data['error'] = 'Requested link should not be empty';
                return response()->json($data);
            } elseif (!isset($request->quantity)) {
                $data['error'] = 'Order quantity should not be empty';
                return response()->json($data);
            }
            $user = User::where('api_key', $request->key)->where('status', 1)->latest()->first();
            if (empty($user) || $user->status == 0) {
                $data['error'] = 'Invalid Api key';
                return response()->json($data);
            }
            $service = Service::findOrFail($request->service);
            if (empty($service)) {
                $data['error'] = 'Invalid Service ID';
                return response()->json($data);
            }
            $servicePrice = ServicePrice::where('user_id', $user->id)->where('service_id', $service->id)->first();
            $item = new Order();
            $transaction = new Transaction();
            if ($request->quantity >= $service->min && $request->quantity <= $service->max) {
                $price = ($request->quantity * $servicePrice->price) / 1000;
                if ($user->balance >= $price) {
                    $item->category_id = $service->category_id;
                    $item->service_id = $request->service;
                    $item->service_no = $service->service_id;
                    $item->order_no = 0;
                    $item->user_id = $user->id;
                    $item->link = $request->link;
                    $item->quantity = $request->quantity;
                    $item->price = $price;
                    $item->status = 0;
                    $item->start_counter = 0;
                    $item->remains = $request->quantity;
                    $item->order_through = 'API';
                    $item->save();

                    $user->balance = $user->balance - $price;
                    $user->save();

                    $transaction->user_id = $user->id;
                    $transaction->amount = $price;
                    $transaction->user_balance = $user->balance;
                    $transaction->type = 1;
                    $transaction->trx = str_random(12);
                    $transaction->save();

                    send_email($user->email, $user->name, 'Order Placed Successfully', 'Your ' . $request->quantity . ' ' . $service->name . ' has been placed successfully.');
                    $data['order'] = $item->id;
                    return response()->json($data);
                } else {
                    $data['error'] = 'Insuffcient Funds';
                    return response()->json($data);
                }
            } else {
                $data['error'] = 'Quantity should be within ' . $service->min . ' to ' . $service->max;
                return response()->json($data);
            }
        }elseif($request->action === 'status'){
            if (!isset($request->key)) {
                $data['error'] = 'Api Key should not be empty';
                return response()->json($data);
            } elseif (!isset($request->order)) {
                $data['error'] = 'order Id should not be empty';
                return response()->json($data);
            }
            $user = User::where('api_key', $request->key)->where('status', 1)->latest()->first();
            if (empty($user) || $user->status == 0) {
                $data['error'] = 'Invalid Api key';
                return response()->json($data);
            }
            $order = Order::select('status', 'start_counter', 'remains')->where('user_id', $user->id)->where('id', $request->order)->latest()->first();
            if(empty($order)){
                $data['error'] = 'Invalid order ID';
                return response()->json($data);
            }else{
                return response()->json($order);
            }
        }else{
            $data['error'] = 'Invalid Action';
            return response()->json($data);
        }
    }
}
