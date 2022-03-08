<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }



    public function showRegistrationForm()
    {
        if (session()->has('verified_mobile')) {
            $latest = DB::table(USERS)
                ->select('pid', 'uid', 'firstname', 'surname', 'dob', 'about', 'qualification', 'photo', 'occupation','height','state','district')
                ->join(PROFILES, USERS . '.id', '=', PROFILES . '.uid')
                ->where(USERS . '.married', '=', 'No')
                ->where(PROFILES . '.dob', '!=', '1970-01-01')
                ->where(PROFILES . '.photo', '!=', null)
                ->orderBy(PROFILES . '.id', 'desc')
                ->limit(10)
                ->get();

            $testimonial = DB::table(TESTIMONIAL)
                ->select('name', 'content')
                ->orderBy('id', 'desc')
                ->limit(10)
                ->get();

            return view('auth.register', ['data' => ['latest' => $latest, 'testimonial' => $testimonial]]);
        } else {
            return redirect('/registration');
        }
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
            'firstname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'gender'=>['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . USERS],
            'mobile' => ['required', 'string', 'max:10', 'unique:' . USERS],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'surname' => $data['surname'],
            'firstname' => $data['firstname'],
            'gender'=>$data['gender'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'status' => 'disabled',
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }
        // return $request->wantsJson()
        //     ? new JsonResponse([], 201)
        //     : redirect($this->redirectPath())
        //     ->withSuccess('Registration Completed Successfully...You Can Login after activation of your account...');

        if($request->wantsJson()){
            session()->forget(['reg_mobile', 'reg_otp','otp_time','verified_mobile']);
            return new JsonResponse([], 201);
        }else{
            session()->forget(['reg_mobile', 'reg_otp','otp_time','verified_mobile']);
            return redirect($this->redirectPath())
            ->withSuccess('Hurray ! First step of your registration completed successfully !! Your account yet to activate, you can enter your profile once it is activated.');
        }
    }

}
