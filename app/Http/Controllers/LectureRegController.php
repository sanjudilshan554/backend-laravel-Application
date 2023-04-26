<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LectureReg;

class LectureRegController extends Controller
{
    public function store(Request $request){
         
        $validate_data=$request ->validate([
            'fname'=>[''],
            'lname'=>[''],
            'age'=>[''],
            'address'=>[''],
            'postelCode'=>[''],
            'city'=>[''],
            'province'=>[''],
            'district'=>[''],
            'country'=>[''],
            'styrSub'=>[''],
            'ndyrSub'=>[''],
            'rdyrSub'=>[''],
            'thyrSub'=>[''],
            'EduQualification'=>[''],
            'mobNumber'=>[''],
            'gender'=>[''],
            // 'email'=>['required','email'],
            'email'=>[''],
            'empNo'=>[''],
            'password'=>[''],
          
        ]);

        // return $request;

        $role="lecture";
        
        $data=LectureReg::create([
            'fname'=>$validate_data['fname'],
            'lname'=> $validate_data['lname'],
            'age'=> $validate_data['age'],
            'address'=> $validate_data['address'],
            'postelCode'=> $validate_data['postelCode'],
            'city'=> $validate_data['city'],
            'province'=> $validate_data['province'],
            'district'=> $validate_data['district'],
            'country'=> $validate_data['country'],
            '1styrSub'=> $validate_data['styrSub'],
            '2ndyrSub'=> $validate_data['ndyrSub'],
            '3rdyrSub'=> $validate_data['rdyrSub'],
            '4thyrSub'=> $validate_data['thyrSub'],
            'EduQualification'=> $validate_data['EduQualification'],
            'mobNumber'=> $validate_data['mobNumber'],
            'gender'=> $validate_data['gender'],
            'email'=> $validate_data['email'],
            'empNo'=> $validate_data['empNo'],
            'password'=> $validate_data['password'],
         // 'password'=> Hash::make($validate_data['password']),
            'role'=>$role,
            
        ]);
        //return $data;
        //return $request;
        return response()->json(['data'=>$data,'status'=>'200','message'=>'data saved']);
    }
}