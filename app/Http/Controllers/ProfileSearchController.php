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
        if ($request->from) {
            $from = date("Y-m-d", strtotime($date . ' -' . $request->from . 'year'));
            array_push($condition, [PROFILES . '.dob', '<', $from]);
        }
        if ($request->to) {
            $to = date("Y-m-d", strtotime($date . ' -' . $request->to . 'year'));
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
            ->select('pid', 'uid', 'firstname', 'surname', 'dob', 'about', 'qualification', 'income', 'photo')
            ->join(PROFILES, USERS . '.id', '=', PROFILES . '.uid')
            ->where($condition)
            ->get();

        $tnor = DB::table(USERS)
            ->select('pid', 'uid', 'firstname', 'surname', 'dob', 'about', 'qualification', 'income', 'photo')
            ->join(PROFILES, USERS . '.id', '=', PROFILES . '.uid')
            ->where($condition)
            ->count();



        // return view('search',['collection'=>$users,'req'=>$request]);
        return response()->json(["tnor" => $tnor, "data" => $users]);
    }

    public function viewedProfile()
    {
        $viewed = DB::table(PROFILES)->where('uid', Auth::user()->id)->value('viewed');
        $v_arr = explode(",", $viewed);
        $users = DB::table(USERS)
            ->select('pid', 'uid', 'firstname', 'surname', 'dob', 'about', 'qualification', 'income', 'photo')
            ->join(PROFILES, USERS . '.id', '=', PROFILES . '.uid')
            ->where(USERS . '.married', '=', 'No')
            ->where(USERS . '.id', '!=', Auth::user()->id)
            ->whereIn(PROFILES . '.uid', $v_arr)
            ->paginate(10);

        return view('viewed',['collection'=>$users]);

    }

    public function newProfile()
    {
        $viewed = DB::table(PROFILES)->where('uid', Auth::user()->id)->value('viewed');
        $v_arr = explode(",", $viewed);
        $users = DB::table(USERS)
            ->select('pid', 'uid', 'firstname', 'surname', 'dob', 'about', 'qualification', 'income', 'photo')
            ->join(PROFILES, USERS . '.id', '=', PROFILES . '.uid')
            ->where(USERS . '.married', '=', 'No')
            ->where(USERS . '.id', '!=', Auth::user()->id)
            ->whereNotIn(PROFILES . '.uid', $v_arr)
            ->paginate(10);

        return view('newprofile',['collection'=>$users]);

    }
}
