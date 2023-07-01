<?php

namespace App\Http\Controllers\Auth;

use App\GeneralSetting;
use App\Service;
use App\ServicePrice;
use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'user/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'username' => 'required|string|alpha_dash|max:25|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $general = GeneralSetting::first();
        $code = str_random(6);
        if($general->email_verification == 1){
            $ev = 0;
            send_email($data['email'], $data['name'], 'Verificatin Code', 'Your Verification Code is ' . $code);
        }else {
            $ev = 1;
        }
        $api = str_random(30);
         $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'verification_time' => Carbon::now(),
            'verification_code' => $code,
            'email_verify' => $ev,
            'api_key' => $api,
        ]);
        $services = Service::all();
        foreach ($services as $service){
            $servicePrice = new ServicePrice();
            $servicePrice->category_id = $service->category_id;
            $servicePrice->service_id = $service->id;
            $servicePrice->user_id = $user->id;
            $servicePrice->price = $service->price_per_k;
            $servicePrice->save();
        }
        return $user;

    }
}
