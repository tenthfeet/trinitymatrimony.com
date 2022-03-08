<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;
use App\Mail\ContactMail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('welcome');
        $latest = DB::table(USERS)
            ->select('pid', 'uid', 'firstname', 'surname', 'dob','qualification','photo', 'occupation','height','state','district')
            ->join(PROFILES, USERS . '.id', '=', PROFILES . '.uid')
            ->where(USERS . '.status', '=', 'active')
            ->where(USERS . '.married', '=', 'No')
            ->where(PROFILES . '.dob', '!=', '1970-01-01')
            ->where(PROFILES . '.photo', '!=', null)
            ->orderBy(PROFILES . '.id', 'desc')
            ->limit(10)
            ->get();

        $testimonial = DB::table(TESTIMONIAL)
            ->select('name', 'content')
            ->orderBy('id','desc')
            ->limit(10)
            ->get();

        return view('welcome', ['data'=>['latest' => $latest,'testimonial'=>$testimonial]]);
    }

    public function contact(Request $data){

        $data->validate([
            'name' => ['required'],
            'email' => ['required'],
            'subject' => ['required'],
            'message' => ['required'],
        ]);

        Mail::to(trinity_email)->send(new ContactMail($data));

        if(Mail::failures()){
            return redirect()->back()->with('error', 'Could not submit enquiry..!');
        }
        return redirect()->back()->with('success', 'Enquiry submitted sucessfully..!');
    }
}
