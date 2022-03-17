<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileSearchController extends Controller
{
    public function show()
    {
        return view('/search');
    }

    public function result(Request $request)
    {

        $date = date("Y-m-d");
        $condition = [
            [PROFILES . '.gender', '=', $request->gender],
            [USERS . '.married', '=', 'No'],
        ];
        if ($request->qualification) {
            array_push($condition, [PROFILES . '.qualification', '=', $request->qualification]);
        }
        if ($request->afrm) {
            $from = date("Y-m-d", strtotime($date . ' -' . $request->afrm . 'year'));
            array_push($condition, [PROFILES . '.dob', '<', $from]);
        }
        if ($request->ato) {
            $to = date("Y-m-d", strtotime($date . ' -' . $request->ato . 'year'));
            array_push($condition, [PROFILES . '.dob', '>', $to]);
        }

        if ($request->income) {
            $s = [
                "1" => [0, 500000],
                "2" => [500000, 1000000],
                "3" => [1000000, 10000000]
            ];
            array_push($condition, [PROFILES . '.income', '>', $s[$request->income][0]]);
            array_push($condition, [PROFILES . '.income', '<', $s[$request->income][1]]);
        }

        $users = DB::table(USERS)
            ->select('pid', 'uid', 'firstname', 'surname', 'dob','qualification', 'height', 'photo','occupation','state','district')
            ->join(PROFILES, USERS . '.id', '=', PROFILES . '.uid')
            ->where($condition)
            ->paginate(10)
            ->withQueryString();

        // $tnor = DB::table(USERS)
        //     ->select('pid', 'uid', 'firstname', 'surname', 'dob', 'about', 'qualification', 'income', 'photo')
        //     ->join(PROFILES, USERS . '.id', '=', PROFILES . '.uid')
        //     ->where($condition)
        //     ->count();



        return view('search',['profiles'=>$users]);
        // return response()->json(["tnor" => $tnor, "data" => $users]);
    }

    public function viewedProfile()
    {
        $viewed = DB::table(PROFILES)->where('uid', Auth::user()->id)->value('viewed');
        $v_arr = explode(",", $viewed);
        $users = DB::table(USERS)
            ->select('pid', 'uid', 'firstname', 'surname', 'dob', 'occupation', 'qualification', 'height', 'photo','state','district')
            ->join(PROFILES, USERS . '.id', '=', PROFILES . '.uid')
            ->where(USERS . '.married', '=', 'No')
            ->where(PROFILES . '.dob', '!=', '1970-01-01')
            ->where(USERS . '.id', '!=', Auth::user()->id)
            ->whereIn(PROFILES . '.uid', $v_arr)
            ->paginate(10);

        return view('viewed',['collection'=>$users]);

    }

    public function newProfile()
    {
        $viewed = DB::table(PROFILES)->where('uid', Auth::user()->id)->value('viewed');
        $v_arr = explode(",", $viewed);
        $gender=(Auth::user()->gender=="male")?"Female":"Male";
        $users = DB::table(USERS)
            ->select('pid', 'uid', 'firstname', 'surname', 'dob', 'occupation', 'qualification', 'height', 'photo','state','district')
            ->join(PROFILES, USERS . '.id', '=', PROFILES . '.uid')
            ->where(USERS . '.married', '=', 'No')
            ->where(USERS . '.gender', '=', $gender)
            ->where(USERS . '.id', '!=', Auth::user()->id)
            ->where(PROFILES . '.dob', '!=', '1970-01-01')
            ->whereNotIn(PROFILES . '.uid', $v_arr)
            ->paginate(10);

        return view('newprofile',['collection'=>$users]);

    }
}
