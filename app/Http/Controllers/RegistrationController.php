<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterOtp;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function register()
    {
        $latest = DB::table(USERS)
            ->select('pid', 'uid', 'firstname', 'surname', 'dob', 'about', 'qualification', 'income', 'photo', 'occupation')
            ->join(PROFILES, USERS . '.id', '=', PROFILES . '.uid')
            ->where(USERS . '.married', '=', 'No')
            ->where(PROFILES . '.photo', '!=', null)
            ->orderBy(PROFILES . '.id', 'desc')
            ->limit(6)
            ->get();

        $testimonial = DB::table(TESTIMONIAL)
            ->select('name', 'content')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();

        return view('registration', ['data' => ['latest' => $latest, 'testimonial' => $testimonial]]);
    }
    protected function verify()
    {
        if (session()->has('reg_otp')) {
            $latest = DB::table(USERS)
                ->select('pid', 'uid', 'firstname', 'surname', 'dob', 'about', 'qualification', 'income', 'photo', 'occupation')
                ->join(PROFILES, USERS . '.id', '=', PROFILES . '.uid')
                ->where(USERS . '.married', '=', 'No')
                ->where(PROFILES . '.photo', '!=', null)
                ->orderBy(PROFILES . '.id', 'desc')
                ->limit(6)
                ->get();

            $testimonial = DB::table(TESTIMONIAL)
                ->select('name', 'content')
                ->orderBy('id', 'desc')
                ->limit(10)
                ->get();

            return view('verify', ['data' => ['latest' => $latest, 'testimonial' => $testimonial]]);
        } else {
            return redirect('/registration');
        }
    }

    protected function otp(Request $data)
    {
        $data->validate([
            'mobile' => ['required', 'digits:10', 'unique:' . USERS]
        ]);

        $otp = mt_rand(1000, 9999);
        // $otp = 1234;
        session(['reg_mobile' => $data['mobile'], 'reg_otp' => $otp, 'otp_time' => strtotime(date("Y-m-d H:i:s"))]);
        // // Mail::to($data['email'])->send(new RegisterOtp());

        // OTP SMS
        $fields = array(
            "variables_values" => $otp,
            "route" => "otp",
            "numbers" => $data['mobile'],
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($fields),
            CURLOPT_HTTPHEADER => array(
                "authorization: IgCRX1TO62SPYLla8o7eyZMH9GBiFUvzqDKjr0QJEbcVtkAshxd3QGa1rPyLVRbFo6eYKnZTSlmUzx8t",
                "accept: */*",
                "cache-control: no-cache",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            // echo "cURL Error #:" . $err;
            return redirect()->back()->withErrors(['msg' => 'Could not send OTP, Please try again later...']);
        } else {
            // echo $response; //{"return":true,"request_id":"zsnc51xrp4umh7o","message":["SMS sent successfully."]}
            $res = json_decode($response);
            if ($res->return) {

                return redirect('/verify')->with('otp_res', 'OTP sent successfully.');
            }
        }
    }

    protected function verifyOtp(Request $data)
    {
        $t_diff = strtotime(date("Y-m-d H:i:s")) - session('otp_time');
        if ($t_diff <= 300) {
            if ($data['otp'] == session('reg_otp')) {
                session(['verified_mobile' => true]);
                return redirect('/register');
            } else {
                return redirect()->back()->withErrors(['msg' => 'OTP is wrong..!']);
            }
        } else {
            return redirect()->back()->withErrors(['msg' => 'OTP verification time expired..!']);
        }
    }
}
