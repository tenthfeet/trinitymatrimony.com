<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProfileSearchController extends Controller
{
    public function result(Request $request)
    {
        $date = date("Y-m-d");
        $condition = [
            [PROFILES . '.gender', '=', $request->gender],
        ];
        if ($request->qualification) {
            array_push($condition, [PROFILES . '.qualification', '=', $request->qualification]);
        }
        if ($request->from) {
            $from = date("Y-m-d", strtotime($date . ' -' . $request->from . 'year'));
            array_push($condition, [PROFILES .'.dob', '<', $from]);
        }
        if ($request->to) {
            $to = date("Y-m-d", strtotime($date . ' -' . $request->to . 'year'));
            array_push($condition, [PROFILES .'.dob', '<', $to]);
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
            ->select('pid', 'uid', 'firstname', 'surname', 'dob', 'about', 'qualification', 'income','photo')
            ->join(PROFILES, USERS . '.id', '=', PROFILES . '.uid')
            ->where($condition)
            ->get();
        

        return view('search',['collection'=>$users]);
    }
}
