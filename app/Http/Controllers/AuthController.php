<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Registration;
use App\Models\LectureReg;

class AuthController extends Controller
{
    public function Adminregister(Request $request)
    {
        // return $request;
        $validate_data=$request->validate([
            'name'=>['required'],
            'email'=>['required'],
            'address'=>['required'],
            'role'=>['required'],
            'status'=>['required'],
            'user_level'=>['required'],
            'password'=>['required'],
            
        ]);
        // return $validate_data;
        $user = User::create([
            'name' => $validate_data['name'],
            'email' => $validate_data['email'],
            'address' => $validate_data['address'],
            'role' => $validate_data['role'],
            'status' => $validate_data['status'],
            'user_level' => $validate_data['user_level'],
            'password' => Hash::make($validate_data['password']),
        ]);

        return response()->json(['data'=>$user]);
    }

    
    public function Adminlogin(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json(['message'=>'email or password dont match']);
        } else {
            $user = User::where('email', $request->email)->first();
        }
        return response()->json(['data'=>$user, 'message' => 'User is correct']);
    }

    public function Studentlogin(Request $request)
    {
        // if (!Auth::attempt($request->only(['unvRegNo', 'password']))) {
        //     return response()->json(['message'=>'unvRegNo or password dont match']);
        // } else {
        //     $Registration = Registration::where('unvRegNo', $request->unvRegNo)->first();
        // }
        
        $index = $request->unvRegNo;
        $password = $request->password;
    
        $Registration = Registration::where('unvRegNo',  $index)->where('password',$password)->first();
        if($Registration) {
            if($Registration->unvRegNo === $index || $Registration->password === $password) {
                return response()->json(['data'=>$Registration, 'message' => 'User is correct','status'=>'200']);
            }
        } else {
            return response()->json(['message' => 'User is Incorrect','status'=>'500']);
        }
    }


    public function Lecuturelogin(Request $request)
    {
        $index=$request->empNo;
        $password=$request->password;

        $LectureReg= LectureReg::where('empNo',$index)->where('password',$password)->first();
        if($LectureReg) {
            if($LectureReg->empNo === $index || $LectureReg->password === $password){
                return response()->json(['data'=>$LectureReg,'message'=>'User is correct','status'=>'200']);
            }
        } else {
            return response()->json(['message'=>'User is Incorrect','status'=>'500']);
        }        
    }
       
 }




