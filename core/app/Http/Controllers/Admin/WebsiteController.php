<?php

namespace App\Http\Controllers\Admin;

use App\GeneralSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsiteController extends Controller
{
    public function genSetting(){
        $item = GeneralSetting::first();
        return view('admin.website.general', compact('item'));
    }

    public function updateGenSetting(Request $request){
        $general = GeneralSetting::first();
        $general->title = $request->title;
        $general->base_color = $request->color;
        $general->base_currency = $request->base_currency;
        $general->currency_symbol = $request->currency_symbol;
        $general->currency_rate = $request->currency_rate;
        $general->reg = $request->reg =="1" ?1:0 ;
        $general->email_verification = $request->emailver =="1" ?1:0 ;
        $general->email_notification = $request->emailnotf=="1" ?1:0;
        $res = $general->save();
        if ($res) {
            session()->flash('success', 'Updated Successfully!');
            return back();
        }else{
            session()->flash('alert', 'Problem With Updating');
            return back();
        }
    }

    public function emailSetting(){
        $item = GeneralSetting::first();
        return view('admin.website.emailtemplate', compact('item'));
    }

    public function updateEmailSetting(Request $request){
        $emailtemp = GeneralSetting::first();
        if($emailtemp){
            $emailtemp->e_sender = $request->esender;
            $emailtemp->e_message = $request->emessage;
        }else{
            $emailtemp = new GeneralSetting();
            $emailtemp->e_sender = $request->esender;
            $emailtemp->e_message = $request->emessage;
        }
        $em = $emailtemp->save();
        if ($em) {
            session()->flash('success', 'Updated Successfully!');
            return back();
        }else{
            session()->flash('alert', 'Problem With Updating');
            return back();
        }
    }
}
