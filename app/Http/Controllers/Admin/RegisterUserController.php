<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;

use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterUserController extends Controller
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
    protected $redirectTo = '/tmadmin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');


    }

    public function showRegistrationForm($id=0)
    {
        // $id=$request->has('id')?$request->id:0;
        if ($id) {
            $user = DB::table(USERS)
                ->select('id', 'firstname','surname', 'email', 'mobile','gender')
                ->where('id', "=", $id)
                ->first();
            return view('admin.register_user', ['data' => $user]);
            // return view('admin.adminlist', ['data' => $adminlist]);
        } else {
            return view('admin.register_user');
        }
    }

    public function update(Request $request)
    {
        // echo "From update method";
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
        ]);

        $affectedRows = DB::table(USERS)
            ->where('id', $request['id'])
            ->update([
                'firstname' => $request['name'],
                'status' => $request['status']
            ]);

        if($affectedRows>0){
            return redirect()->back()->with('msg', 'Updated successfully..!');
            // return redirect()->back()->withSuccess('Updated successfully..!');
        }else{
            return redirect()->back()->with('msg', 'Record not updated...');
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
            'gender'=>['required','string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . USERS],
            'mobile' => ['required', 'string', 'max:10', 'unique:' . USERS],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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

        // print_r($data);

        // session()->forget(['reg_otp','reg_email','otp_time']);
        return User::create([
            'firstname' => $data['firstname'],
            'surname' => $data['surname'],
            'gender'=>$data['gender'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'status' => 'disabled',
            'role' => 'user',
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
        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath())
            ->withSuccess('Admin user added Successfully..!');
    }

    public function list()
    {
        $adminlist = DB::table(USERS)
            ->select('id', 'firstname', 'email', 'status')
            ->where('id', '!=', 1)
            ->where(function($query){
                $query->where('role','admin')
                      ->orWhere('role','superadmin');
            })
            ->get();
        return view('admin.adminlist', ['data' => $adminlist]);
    }

}
