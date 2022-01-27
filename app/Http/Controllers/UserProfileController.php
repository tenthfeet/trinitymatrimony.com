<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function view(){
        return view('viewprofile');
    }

    public function update(){
        $user = DB::table(PROFILES)
        // ->select('id', 'firstname', 'email', 'mobile', 'status')
        ->where('uid', Auth::user()->id)
        ->first();
        return view('updateprofile',['data' => $user]);
    }

    public function basicInfo(Request $request){
        $request->validate([
            'housename' => ['required', 'string', 'max:150'],
            'gender' => ['required','not_in:0'],
            'dob' => ['required', 'date'],
            // 'dobap' => ['date'],
            'mothertongue' => ['required', 'string'],
            'otherlang' => ['max:150'],
            // 'particularchurch' => ['string'],
            'noncath_church' => ['max:150'],
            'height' => ['required', 'integer'],
            'weight' => ['required', 'integer'],
            'blood' => ['required', 'string', 'max:20'],
            'complex' => ['max:200'],
            'maritalstatus' => ['required'],
            'photo' => ['image','max:2048'],
            'about' => ['required', 'string'],
            'preference' => ['required', 'string']
        ]);

    }

}
