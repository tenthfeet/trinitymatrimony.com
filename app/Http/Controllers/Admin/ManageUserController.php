<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountActivate;

class ManageUserController extends Controller
{
    public function today()
    {
        $today = date('Y-m-d');
        $user = DB::table(USERS)
            ->select('id', 'firstname', 'surname', 'email', 'mobile', 'status','married')
            ->where('id', "!=", 1)
            ->whereDate('created_at', $today)
            ->where('role', 'user')
            ->get();
        return view('admin.dashboard', ['data' => $user]);
    }

    public function userlist()
    {
        $user = DB::table(USERS)
            ->select('id', 'firstname', 'surname', 'email', 'mobile', 'status','married')
            ->where('id', "!=", 1)
            ->where('role', 'user')
            ->get();

        return view('admin.userlist', ['data' => $user]);
    }

    public function updateUserStatus(Request $request)
    {
        $user=DB::table(USERS)->find($request->id);
        $married = DB::table(USERS)->where('id', $request->id)->value('married');
        $is_activated = DB::table(USERS)->where('id', $request->id)->value('is_activated');
        $email = $user->email;
        $name=$user->firstname.' '.$user->surname;

        $affectedRows = 0;

        if ($married == "No" && $is_activated == "No" && $request['status'] == "active") {
            $count = DB::table(PROFILES)->count();
            ++$count;
            $pid = 'TM' . str_pad($count, 5, "0", STR_PAD_LEFT);

            $profile = DB::table(PROFILES)->insert([
                'pid' => $pid,
                'uid' => $request->id
            ]);

            if ($profile) {
                $affectedRows = DB::table(USERS)
                    ->where('id', $request['id'])
                    ->update([
                        'status' => $request['status'],
                        'is_activated' => 'Yes'
                    ]);
                if ($affectedRows > 0) {
                    // Mail::to($email)->send(new AccountActivate($name));
                    return response()->json(['msg' => 'success']);
                }
            }
        } else {
            $affectedRows = DB::table(USERS)
                ->where('id', $request['id'])
                ->update([
                    'status' => $request['status'],
                    'married'=>$request['married']
                ]);
        }



        if ($affectedRows > 0) {
            return response()->json(['msg' => 'success']);
        } else {
            return response()->json(['msg' => 'failed']);
        }
    }
}
