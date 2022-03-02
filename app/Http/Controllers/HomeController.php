<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
            ->select('pid', 'uid', 'firstname', 'surname', 'dob', 'about', 'qualification', 'income', 'photo', 'occupation')
            ->join(PROFILES, USERS . '.id', '=', PROFILES . '.uid')
            ->where(USERS . '.married', '=', 'No')
            ->where(PROFILES . '.photo', '!=', null)
            ->orderBy(PROFILES . '.id', 'desc')
            ->limit(6)
            ->get();

        $testimonial = DB::table(TESTIMONIAL)
            ->select('name', 'content')
            ->orderBy('id','desc')
            ->limit(10)
            ->get();

        return view('welcome', ['data'=>['latest' => $latest,'testimonial'=>$testimonial]]);
    }
}
