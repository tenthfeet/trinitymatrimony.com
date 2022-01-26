<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageUserController extends Controller
{
    public function today(){
        $today = date('Y-m-d');
        $user = DB::table(USERS)
                    ->select('id', 'firstname','surname', 'email', 'mobile', 'status')
                    ->where('id', "!=", 1)
                    ->whereDate('created_at',$today)
                    ->where('role','user')
                    ->get();
        return view('admin.dashboard', ['data' => $user]);
    }

    public function userlist(){
        $user = DB::table(USERS)
                    ->select('id', 'firstname','surname', 'email', 'mobile', 'status')
                    ->where('id', "!=", 1)
                    ->where('role','user')
                    ->get();
        
        return view('admin.userlist', ['data' => $user]);
    }

    public function updateUserStatus(Request $request){
        $affectedRows = DB::table(USERS)
            ->where('id', $request['id'])
            ->update([
                'status' => $request['status']
            ]);

        if($affectedRows>0){
            return response()->json(['msg' => 'success']);
        }else{
            return response()->json(['msg' => 'failed']);
        }
    }

}
