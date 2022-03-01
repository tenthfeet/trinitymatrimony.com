<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{


    public function view($id = 0)
    {

        if ($id) {
            $viewed = DB::table(PROFILES)->where('uid', Auth::user()->id)->value('viewed');
            if ($viewed == null) {
                DB::table(PROFILES)
                    ->where('uid', Auth::user()->id)
                    ->update([
                        'viewed' => $id,
                    ]);
            } else {
                $v_arr = explode(",", $viewed);
                if (!in_array($id, $v_arr)) {
                    array_push($v_arr, $id);
                    $v_str = implode(",", $v_arr);
                    DB::table(PROFILES)
                        ->where('uid', Auth::user()->id)
                        ->update([
                            'viewed' => $v_str,
                        ]);
                }
            }

            if (DB::table(PROFILES)->where('uid', $id)->exists()) {
                $user = DB::table(USERS)
                    ->join(PROFILES, USERS . '.id', '=', PROFILES . '.uid')
                    ->where(PROFILES . '.uid', $id)
                    ->first();
                return view('viewprofile', ['data' => $user]);
            } else {
                return redirect()->back();
            }
        } else {

            $user = DB::table(USERS)
                ->join(PROFILES, USERS . '.id', '=', PROFILES . '.uid')
                ->where('uid', Auth::user()->id)
                ->first();
            return view('viewprofile', ['data' => $user]);
        }
    }

    public function update()
    {
        $user = DB::table(PROFILES)
            ->where('uid', Auth::user()->id)
            ->first();
        return view('updateprofile', ['data' => $user]);
    }

    public function basicInfo(Request $request)
    {
        $request->validate([
            'housename' => ['required', 'string', 'max:150'],
            'gender' => ['required', 'not_in:0'],
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
            'photo' => ['image', 'max:2048'],
            'about' => ['required', 'string'],
            'preference' => ['required', 'string']
        ]);

        $profiledata = DB::table(PROFILES)
            ->where('uid', Auth::user()->id)
            ->update([
                'housename' => $request['housename'],
                'gender' => $request['gender'],
                'dob' => date('Y-m-d', strtotime($request['dob'])),
                'dobap' => date('Y-m-d', strtotime($request['dobap'])),
                'mothertongue' => $request['mothertongue'],
                'otherlang' => $request['otherlang'],
                'particularchurch' => $request['particularchurch'],
                'noncath_church' => $request['noncath_church'],
                'height' => $request['height'],
                'weight' => $request['weight'],
                'blood' => $request['blood'],
                'complex' => $request['complex'],
                'maritalstatus' => $request['maritalstatus'],
                // 'photo' => $request['housename'],
                'about' => $request['about'],
                'preference' => $request['preference']
            ]);


        $photo = 0;
        if ($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {
                $location = DB::table(PROFILES)->where('uid', Auth::user()->id)->value('photo');
                if ($location == null) {
                    $del = true;
                } else {
                    $del = File::delete($location);
                }
                if ($del) {
                    $name = $request->pid . "_" . date("dmyHis") . "." . $request->photo->extension();
                    // $path = $request->photo->storeAs('profile_pic', $name);
                    $path = $request->photo->move('profile_picture', $name);
                    $photo = DB::table(PROFILES)
                        ->where('uid', Auth::user()->id)
                        ->update([
                            'photo' => $path
                        ]);
                }
            }
        }


        if (($profiledata > 0) && ($photo > 0)) {
            return redirect()->back()->with('msg', 'Profile data & Photo Updated successfully..!');
        } elseif (($profiledata > 0)) {
            return redirect()->back()->with('msg', 'Profile data Updated successfully..!');
        } elseif (($photo > 0)) {
            return redirect()->back()->with('msg', 'Profile photo Updated successfully..!');
        } else {
            return redirect()->back()->with('msg', 'Profile not Updated..!');
        }
    }

    public function career(Request $request)
    {
        $request->validate([
            'qualification' => ['required', 'string'],
            'occupation' => ['required', 'string'],
            'area' => ['required', 'string'],
            'income' => ['required', 'integer'],
            'firmaddress' => ['required', 'string']
        ]);

        $profiledata = DB::table(PROFILES)
            ->where('uid', Auth::user()->id)
            ->update([
                'qualification' => $request['qualification'],
                'occupation' => $request['occupation'],
                'area' => $request['area'],
                'income' => $request['income'],
                'firmaddress' => $request['firmaddress']
            ]);
        if ($profiledata > 0) {
            return response()->json(['status' => 'success', 'msg' => 'Career data updated successfully..!']);
        } else {
            return response()->json(['status' => 'danger', 'msg' => 'Could not update Career data..!']);
        }
    }

    public function family(Request $request)
    {
        // ["fathername", "fhouse", "foccupation", "mothername", "mhouse","moccupation","siblings"];
        $request->validate([
            'fathername' => ['required', 'string'],
            'fhouse' => ['required', 'string'],
            'foccupation' => ['required', 'string'],
            'mothername' => ['required', 'string'],
            'mhouse' => ['required', 'string'],
            'moccupation' => ['required', 'string'],
            'siblings' => ['required', 'string']
        ]);

        $profiledata = DB::table(PROFILES)
            ->where('uid', Auth::user()->id)
            ->update([
                'fathername' => $request['fathername'],
                'fhouse' => $request['fhouse'],
                'foccupation' => $request['foccupation'],
                'mothername' => $request['mothername'],
                'mhouse' => $request['mhouse'],
                'moccupation' => $request['moccupation'],
                'siblings' => $request['siblings']
            ]);
        if ($profiledata > 0) {
            return response()->json(['status' => 'success', 'msg' => 'Family data updated successfully..!']);
        } else {
            return response()->json(['status' => 'danger', 'msg' => 'Family data not updated..!']);
        }
    }

    public function contact(Request $request)
    {
        // ["pparish", "pyear", "fparish", "housetype", "caddress", "paddress", "mobile2"]
        $request->validate([
            'pparish' => ['required', 'string'],
            // 'pyear' => ['required'],
            'fparish' => ['required', 'string'],
            'housetype' => ['required', 'string'],
            'caddress' => ['required', 'string'],
            'paddress' => ['required', 'string'],
            'mobile2' => ['nullable', 'string', 'size:10']
        ]);

        $profiledata = DB::table(PROFILES)
            ->where('uid', Auth::user()->id)
            ->update([
                'pparish' => $request['pparish'],
                'pyear' => $request['pyear'],
                'fparish' => $request['fparish'],
                'housetype' => $request['housetype'],
                'caddress' => $request['caddress'],
                'paddress' => $request['paddress'],
                'mobile2' => $request['mobile2']
            ]);
        if ($profiledata > 0) {
            return response()->json(['status' => 'success', 'msg' => 'Contact details updated successfully..!']);
        } else {
            return response()->json(['status' => 'danger', 'msg' => 'Contact details not updated..!']);
        }
    }

    public function addsibling(Request $request)
    {
        $request->validate([
            "SiblingName" => "required",
            "SiblingAge" => "required",
        ]);

        $insert = DB::table(SIBLINGS)->insert([
            'uid' => Auth::user()->id,
            'sibname' => $request['SiblingName'],
            'sibage' => $request['SiblingAge'],
            'sibjob' => $request['sibjob'],
            'sibpartner' => $request['sibpartner'],
            'sibhouse' => $request['sibhouse']
        ]);

        if ($insert) {
            return response()->json(['status' => 'success', 'msg' => 'Your Sibling added successfully..!']);
        } else {
            return response()->json(['status' => 'failed', 'msg' => 'Could not add your Silbling...']);
        }
    }

    public function deletesibling(Request $request)
    {

        $deleted = DB::table(SIBLINGS)->where('id', $request->sid)->delete();

        if ($deleted > 0) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'failed']);
        }
    }

    public function sibling(Request $request)
    {
        $users = DB::table(SIBLINGS)->where('uid', $request->id)->get();
        return Response::json($users);
    }

    public function profilesearch(Request $req){
        if (DB::table(PROFILES)->where('pid', $req->pid)->exists()) {
            $uid=DB::table(PROFILES)->where('pid', $req->pid)->value('uid');
            return redirect('/viewprofile/'.$uid);
        }else{
            return redirect()->back();
        }
    }
}
