<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterOtp;

class RegistrationController extends Controller
{
    
    protected function register()
    {
        return view('registration');
    }

    protected function otp(Request $data)
    {
        $data->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.USERS]
        ]);

        //$otp=mt_rand(1000,9999);
        $otp=1234;
        session(['reg_email'=>$data['email'],'reg_otp'=>$otp,'otp_time'=>strtotime(date("Y-m-d H:i:s"))]);
        //Mail::to($data['email'])->send(new RegisterOtp());
        return redirect('/verify');
    }

    protected function verifyOtp(Request $data)
    {
        $t_diff=strtotime(date("Y-m-d H:i:s"))-session('otp_time');
        if($t_diff<=300){
            if($data['otp']==session('reg_otp')){
                return redirect('/register');
            }else{
                return redirect()->back()->withErrors(['msg' => 'OTP is wrong..!']);    
            }
        }else{
            return redirect()->back()->withErrors(['msg' => 'OTP verification time expired..!']);
        }
    }


}
