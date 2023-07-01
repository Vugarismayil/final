<?php

namespace App\Http\Controllers\Frontend;

use App\Announcements;
use App\Category;
use App\Faq;
use App\GeneralSetting;
use App\Order;
use App\OurService;
use App\PasswordReset;
use App\Subscriber;
use App\Testimonial;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class Frontendcontroller extends Controller
{
    public function index(){
       $services = OurService::inRandomOrder()->take(4)->get();
       $testimonials = Testimonial::all();
       $faqs = Faq::all();
       $customers = User::count();
       $subscribers = Subscriber::count();
       $orders = Order::count();
       return view('frontend.index', compact( 'services', 'testimonials', 'faqs', 'customers', 'subscribers', 'orders'));
    }

    public function forgotPass(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required',
            ]);
        $user = User::where('email', $request->email)->first();

        if ($user == null) {
            return back()->with('alert', 'Invalid Email Address');
        } else {
            $to = $user->email;
            $name = $user->name;
            $subject = 'Password Reset';
            $code = str_random(30);
            $message = 'Use This Link to Reset Password: ' . url('/') . '/reset/' . $code;

            PasswordReset::create(
                ['email' => $to, 'token' => $code]
            );

            send_email($to, $name, $subject, $message);

            return redirect()->route('login')->with('success', 'Password Reset Email Sent Succesfully');
        }

    }

    public function resetLink($code)
    {
        $reset = PasswordReset::where('token', $code)->orderBy('created_at', 'desc')->first();
        if (is_null($reset)) {
            return redirect()->route('login')->with('alert', 'Invalid Reset Link');
        } else {
            if ($reset->status == 1 || Carbon::now() > $reset->created_at->addHour(1)) {
                return redirect()->route('login')->with('alert', 'Invalid Reset Link');
            } else {
                return view('auth.passwords.reset', compact('reset'));
            }
        }
    }

    public function passwordReset(Request $request)
    {
        $this->validate($request,
            [
                'token' => 'required',
                'password' => 'required|min:6',
                'password_confirmation' => 'required|min:6',
            ]);
        $reset = PasswordReset::where('token', $request->token)->orderBy('created_at', 'desc')->first();
        $user = User::where('email', $reset->email)->first();
        if ($reset->status == 1) {
            return redirect()->route('login')->with('alert', 'Invalid Reset Link');
        } else {
            if ($request->password == $request->password_confirmation) {
                $user->password = bcrypt($request->password);
                $user->save();
                PasswordReset::where('email', $user->email)->where('token', $request->token)->update(['status' => 1]);

                $msg = 'Your Password has been Changed Successfully';
                send_email($user->email, $user->username, 'Password Changed', $msg);
                return redirect()->route('login')->with('success', 'Password Changed Successfully');
            } else {
                return back()->with('alert', 'Password Not Matched');
            }
        }
    }

    public function subscription(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:subscribers',
        ],
            [
                'email.unique' => 'You are already subscribed into our site',
            ]);
        $excep = $request->except('_token');
        Subscriber::create($excep);
        $status = 0;
        return $status;
    }

    public function announcement(){
        $items = Announcements::orderBy('id', 'DESC')->get();
        return view('frontend.announcement', compact('items'));
    }

    public function announcementDetails($id){
        $item = Announcements::findOrFail($id);
        return view('frontend.announcementDetails', compact('item'));
    }

    public function contact(Request $request){
        $email = GeneralSetting::first();
        $msg = 'Email from ' . $request->name . '<br/> Email: ' . $request->email . '<br/> Phone: ' . $request->phone . '<br/> Subject: ' . $request->subject . '<br/> Message: ' . $request->message;
        send_email($email->e_sender, 'Contact Email', $request->subject, $msg);
        session()->flash('success', 'Message Sent Successfully');
        return redirect()->back();
    }
}
