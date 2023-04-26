<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
// use Illuminate\Support\Facades\Hash; //Adding hash method to encrypt password

class RegistrationController extends Controller
{
    public function stroe(Request $request){
        
        $validate_data =$request ->validate([
            'first_name'=>[''],
            'last_name'=>[''],
            'age'=>[''],
            'work_place'=>[''],
            'school'=>[''],
            // 'email'=>['required','email'],
             'email'=>[''],
            'address'=>[''],
            'postal_code'=>[''],
            'city'=>[''],
            'province'=>[''],
            'district'=>[''],
            'coutry'=>[''],
            'gender'=>[''],
            'mb_No'=>[''],
            'current_Degree'=>[''],
            'current_year'=>[''],
            'Special_knowledge'=>[''],
            'Edu_qualification'=>[''],
            'Fam_soft'=>[''],
            'Special_Sub'=>[''],
            'Certification'=>[''],
            'University_Reg_No'=>[''],
            'New_Password'=>[''],
             
        ]);

        $role = "student";
        
        $data=Registration::create([
            //databse item => ahead data / also postman data
            'fname'=> $validate_data['first_name'],
            'lname'=> $validate_data['last_name'],
            'age'=> $validate_data['age'],
            'workingPlace'=> $validate_data['work_place'],
            'school'=> $validate_data['school'],
            'email'=> $validate_data['email'],
            'address'=> $validate_data['address'],
            'postelcode'=> $validate_data['postal_code'],
            'city'=> $validate_data['city'],
            'Province'=> $validate_data['province'],
            'District'=> $validate_data['district'],
            'country'=> $validate_data['coutry'],
            'gender'=> $validate_data['gender'],
            'mobNo'=> $validate_data['mb_No'],
            'currentDegree'=> $validate_data['current_Degree'],
            'currentYear'=> $validate_data['current_year'],
            'SpKnowledge'=> $validate_data['Special_knowledge'],
            'EdQualification'=> $validate_data['Edu_qualification'],
            'FamSoftware'=> $validate_data['Fam_soft'],
            'SubjectKnow'=> $validate_data['Special_Sub'],
            'Certification'=> $validate_data['Certification'],
            'unvRegNo'=> $validate_data['University_Reg_No'],
            // 'password' => Hash::make($validate_data['New_Password']),
            'password'=> $validate_data['New_Password'],
            'role'=> $role,
        ]);
        
        return response()->json(['data'=>$data,'status'=>'200','message'=>'data save']);
    } 

     
}