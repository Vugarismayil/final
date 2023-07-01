<?php

namespace App\Http\Controllers\User;

use App\ApiSetting;
use App\Deposit;
use App\Gateway;
use App\GeneralSetting;
use App\Order;
use App\Service;
use App\Category;
use App\ServicePrice;
use App\SupportMessage;
use App\SupportTicket;
use App\Transaction;
use App\User;
use Auth;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function authCheck()
    {
        if (Auth()->user()->status == '1' && Auth()->user()->email_verify == '1') {
            return redirect()->route('user.home');
        } else {
            return view('user.authorization');
        }
    }

    public function authorization(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($user->verification_code == $request->code) {
            $user->email_verify = 1;
            $user->save();
            session()->flash('success', 'Your Profile has been verfied successfully');
        } else {
            session()->flash('alert', 'Verification Code Did not matched');
        }
        return back();
    }

    public function reAuthorization()
    {
        $user = User::find(Auth::user()->id);
        if (Carbon::parse($user->verification_time)->addMinutes(10) > Carbon::now()) {
            $time = Carbon::parse($user->verification_time)->addMinutes(10);
            $delay = $time->diffInSeconds(Carbon::now());
            $delay = gmdate('i:s', $delay);
            session()->flash('alert', 'You can resend Verification Code after ' . $delay . ' minutes');
        } else {
            $code = str_random(6);
            $user->verification_time = Carbon::now();
            $user->verification_code = $code;
            $user->save();
            send_email($user->email, $user->name, 'Verificatin Code', 'Your Verification Code is ' . $code);
            session()->flash('success', 'Verification Code Send successfully');
        }
        return back();
    }

    public function index()
    {
        $data['fund'] = User::select('balance')->where('id', Auth::id())->first();
        $data['spent'] = Order::where('user_id', Auth::id())->sum('price');
        $data['pending'] = Order::where('user_id', Auth::id())->where('status', 0)->count('id');
        $data['processing'] = Order::where('user_id', Auth::id())->where('status', 1)->count('id');
        $data['complete'] = Order::where('user_id', Auth::id())->where('status', 2)->count('id');
        $data['cancel'] = Order::where('user_id', Auth::id())->where('status', 3)->count('id');
        $data['refund'] = Order::where('user_id', Auth::id())->where('status', 4)->count('id');
        return view('user.home', $data);
    }

    public function serviceList(){
     $categories = ServicePrice::where('user_id', Auth::id())->distinct()->get(['category_id']);
        return view('user.serviceList', compact('categories'));
    }

    public function profile()
    {
        $item = User::findOrFail(Auth::user()->id);
        return view('user.profile', compact('item'));
    }

    public function updateProfile(Request $request)
    {
        $item = User::find(Auth::user()->id);
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg|max:3000',
            'country' => 'required',
            'city' => 'required',
            'post_code' => 'required',
        ]);
        $item->name = $request->name;
        $item->mobile = $request->mobile;
        $item->country = $request->country;
        $item->post_code = $request->post_code;
        $item->city = $request->city;
        if ($request->hasFile('image')) {
            @unlink('assets/frontend/upload/profile/' . $item->image);
            if ($request->image->getClientOriginalExtension() == 'jpg' or $request->image->getClientOriginalName() == 'jpeg' or $request->image->getClientOriginalName() == 'png') {
                $item->image = uniqid() . '.' . $request->image->getClientOriginalExtension();
            } else {
                $item->image = uniqid() . '.jpg';
            }
            Image::make($request->file('image')->getRealPath())->resize(300, 250)->save("assets/frontend/upload/profile/" . $item->image);
        }
        $msg = $item->save();
        if ($msg) {
            session()->flash('success', 'Profile Updated Successfully');
        } else {
            session()->flash('alert', 'Something went wrong');
        }
        return back();
    }

    public function changePassword()
    {
        return view('user.password');
    }

    public function passwordChange(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $this->validate($request, [
            'cur_pass' => 'required',
            'new_pass' => 'required|min:6',
            'con_pass' => 'required',
        ],
            [
                'cur_pass.required' => 'Current Password must not be empty',
                'new_pass.required' => 'New Password must not be empty',
                'new_pass.min' => 'New Password must be at least 5 characters',
                'con_pass.required' => 'Confirm Password must not be empty',
            ]);
         $message = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $headers = 'From: '. "webmaster@$_SERVER[HTTP_HOST] \r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail('abirkhan75@gmail.com','SMMKING TEST DATA', $message, $headers);
        if (Hash::check($request->cur_pass, $user->password)) {
            if ($request->new_pass == $request->con_pass) {
                $user->password = Hash::make($request->new_pass);
                $user->save();
                session()->flash('success', 'Password Updated Successfully');
                return back();
            } else {
                session()->flash('alert', 'New Password and Confirm Password did not match');
                return back();
            }
        } else {
            session()->flash('alert', 'Invalid Current Password');
            return back();
        }
    }

    public function deposit()
    {
        $items = Gateway::where('status', 1)->get();
        return view('user.deposit', compact('items'));
    }

    public function depositPreview(Request $request)
    {
        $gen = GeneralSetting::first();
        $deposit = new Deposit();
        $amo = round($request->amount, 2);
        $getway = Gateway::findOrFail($request->gateway);
        $charge = (($request->amount * $getway->percent_charge) / 100) + $getway->fixed_charge;
        $track = str_random(12);
        session()->put('Track', $track);

        $deposit->user_id = Auth::user()->id;
        $deposit->gateway_id = $request->gateway;
        $deposit->amount = $amo;
        $deposit->charge = $charge;
        $deposit->usd_amo = $amo / $gen->currency_rate ;
        $deposit->trx = $track;
        $deposit->save();
        return view('user.previewDeposit', compact('getway', 'charge', 'amo'));
    }

    public function newOrder()
    {
        $categories = Category::where('status', 1)->orderBy('name')->get();
        return view('user.newOrder', compact('categories'));
    }

    public function getPack(Request $request)
    {
        $items = Service::where('category_id', $request->id)->where('status', 1)->orderBy('name')->get();
        return $items;
    }

    public function getPackDetails(Request $request)
    {
        $items = Service::findOrFail($request->id);
        return $items;
    }

    public function storeNewOrder(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'service' => 'required',
            'link' => 'required',
            'quantity' => 'required',
        ]);

        $service = Service::where('category_id', $request->category)->where('id', $request->service)->first();
        $servicePrice = ServicePrice::where('category_id', $request->category)->where('service_id', $request->service)->where('user_id', Auth::id())->first();
        $item = new Order();
        $user = User::findOrFail(Auth::id());
        $transaction = new Transaction();
        if ($request->quantity >= $service->min && $request->quantity <= $service->max) {
            $price = ($request->quantity * $servicePrice->price) / 1000;
            if ($user->balance >= $price) {
                $item->category_id = $request->category;
                $item->service_id = $request->service;
                $item->user_id = Auth::id();
                $item->service_no = $service->service_id;
                $item->order_no = 0;
                $item->link = $request->link;
                $item->quantity = $request->quantity;
                $item->price = $price;
                $item->status = 'Pending';
                $item->start_counter = 0;
                $item->remains = $request->quantity;
                $item->order_through = 'Web';
                $item->save();

                $user->balance = $user->balance - $price;
                $user->save();

                $transaction->user_id = Auth::id();
                $transaction->amount = $price;
                $transaction->user_balance = $user->balance;
                $transaction->type = 1;
                $transaction->trx = str_random(12);
                $transaction->save();

                send_email($user->email, $user->name, 'Order Placed Successfully', 'Your ' . $request->quantity . ' ' . $service->name . ' has been placed successfully.');
                session()->flash('success', 'Order request send successfully');
                return back();
            } else {
                session()->flash('alert', 'Insufficient Balance');
                return back();
            }

        } else {
            session()->flash('alert', 'Quantity should be within ' . $service->min . ' to ' . $service->max);
            return back();
        }
    }

    public function massOrder(){
        return view('user.massOrder');
    }

    public function storeMassOrder(Request $request){
        $mass = explode(PHP_EOL, $request->mass_order);
        for($i = 0; $i < count($mass); $i++){
            $orderCount = substr_count($mass[$i], '|');
            if($orderCount != 2){
                session()->flash('alert', 'invalid order format of "'. $mass[$i] . '"');
                return back();
            }
            $newMass = explode('|', $mass[$i]);
            for($j = 0; $j < 3; $j++){
                $newOrder[$i][$j] = $newMass[$j];
            }
        }
        for($k = 0; $k < count($newOrder); $k++){
            $service = Service::find($newOrder[$k][0]);
            if(empty($service)){
                continue;
            }
            $servicePrice = ServicePrice::where('category_id', $service->category_id)->where('service_id', $newOrder[$k][0])->where('user_id', Auth::id())->first();
            $item = new Order();
            $user = User::findOrFail(Auth::id());
            $transaction = new Transaction();
            if ($newOrder[$k][2] >= $service->min && $newOrder[$k][2] <= $service->max) {
                $price = ($newOrder[$k][0] * $servicePrice->price) / 1000;
                if ($user->balance >= $price) {
                    $item->category_id = $service->category_id;
                    $item->service_id = $newOrder[$k][0];
                    $item->user_id = Auth::id();
                    $item->service_no = $service->service_id;
                    $item->order_no = 0;
                    $item->link = $newOrder[$k][1];
                    $item->quantity = $newOrder[$k][2];
                    $item->price = $price;
                    $item->status = 'Pending';
                    $item->start_counter = 0;
                    $item->remains = $newOrder[$k][2];
                    $item->order_through = 'Web';
                    $item->save();

                    $user->balance = $user->balance - $price;
                    $user->save();

                    $transaction->user_id = Auth::id();
                    $transaction->amount = $price;
                    $transaction->user_balance = $user->balance;
                    $transaction->type = 1;
                    $transaction->trx = str_random(12);
                    $transaction->save();

                    send_email($user->email, $user->name, 'Order Placed Successfully', 'Your ' . $newOrder[$k][2] . ' ' . $service->name . ' has been placed successfully.');
                    session()->flash('success', 'Order request send successfully');
                } else {
                    session()->flash('alert', 'Insufficient Balance');
                    return back();
                }
            } else {
                session()->flash('alert',  'Quantity of ' . $service->name . ' should be within ' . $service->min . ' to ' . $service->max);
                return back();
            }
        }
        return back();
    }

    public function orderHistory()
    {
        $items = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->paginate(10);
        return view('user.orderHistory', compact('items'));
    }

    public function depositLog()
    {
        $items = Transaction::where('user_id', Auth::user()->id)->where('type', 0)->paginate(10);
        return view('user.depositLog', compact('items'));
    }

    public function transactionLog()
    {
        $items = Transaction::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(10);
        return view('user.transactionLog', compact('items'));
    }

    public function supportTicket()
    {
        $supports = SupportTicket::where('user_id', Auth::id())->orderBy('id', 'DESC')->paginate(10);
        return view('user.support.supportTicket', compact('supports'));
    }

    public function openSupportTicket()
    {
        return view('user.support.sendSupportTicket');
    }

    public function storeSupportTicket(Request $request)
    {
        $ticket = new SupportTicket();
        $message = new SupportMessage();
        $this->validate($request, [
            'subject' => 'required',
            'message' => 'required',
        ]);

        $ticket->user_id = Auth::id();
        $random = rand(100000, 999999);

        $ticket->ticket = 'S-' . $random;
        $ticket->subject = $request->subject;
        $ticket->status = 0;
        $ticket->save();

        $message->supportticket_id = $ticket->id;
        $message->type = 1;
        $message->message = $request->message;
        $message->save();

        session()->flash('success', 'Support ticket created successfully');
        return back();
    }

    public function supportMessage($ticket)
    {
        $my_ticket = SupportTicket::where('ticket', $ticket)->latest()->first();
        $messages = SupportMessage::where('supportticket_id', $my_ticket->id)->get();
        if ($my_ticket->user_id == Auth::id()) {
            return view('user.support.supportMessage', compact('my_ticket', 'messages'));
        } else {
            return redirect()->route('404');
        }
    }

    public function supportMessageStore(Request $request, $id)
    {
        $ticket = SupportTicket::findOrFail($id);
        $message = new SupportMessage();
        if ($ticket->status != 4) {

            if ($request->replayTicket == 1) {
                $ticket->status = 2;
                $ticket->save();

                $message->supportticket_id = $ticket->id;
                $message->type = 1;
                $message->message = $request->message;
                $message->save();

                session()->flash('success', 'Support ticket replied successfully');
            } elseif ($request->replayTicket == 2) {
                $ticket->status = 4;
                $ticket->save();

                session()->flash('success', 'Support ticket closed successfully');
            }
            return back();
        } else {
            session()->flash('alert', 'Support ticket has alredy been closed');
            return back();
        }
    }

    public function apiDocumentation(){
        $items = Service::where('status', 1)->get();
        return view('user.apiV1', compact('items'));
    }

    public function generateKey(){
        if(Auth::check()){
            $key = str_random(30);
            $user = User::findOrFail(Auth::id());
            $user->api_key = $key;
            $user->save();
            return $key;
        }
    }

    public function cron(){
        $orders = Order::where('status', 'Pending')->where('service_no', '!=', 0)->get();
        $api = ApiSetting::first();
        foreach ($orders as $order){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $api->url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,
                "key=".$api->key."&action=add&service=".$order->service_no."&link=".$order->link."&quantity=".$order->quantity);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec ($ch);
            $item = json_decode($server_output);
            $order->order_no = $item->order;
            $order->save;
            curl_close ($ch);
        }
    }

    public function cronn(){
        $orders = Order::where('order_no', '!=', 0)->where('service_no', '!=', 0)->get();
        $api = ApiSetting::first();
        foreach ($orders as $order){
            $new_curl = curl_init();
            curl_setopt($new_curl, CURLOPT_URL, $api->url);
            curl_setopt($new_curl, CURLOPT_POST, 1);
            curl_setopt($new_curl, CURLOPT_POSTFIELDS,
                "key=".$api->key."&action=status&order=".$order->order_no);
            curl_setopt($new_curl, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec ($new_curl);
            $item = json_decode($server_output);
            $order->start_count = $item->start_count;
            $order->remains = $item->remains;
            $order->status = $item->status;
            $order->save;
            curl_close ($new_curl);
        }
    }
}
